<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Shopsection;

class BrandController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Gate::allows('canView')){
                    
            $final_result = $this->getFullListFromDB(0);
            return $final_result;        
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (\Gate::allows('canAdd')){;
            try{
                $slug = $this->createSlug($request->title,'');
            }catch (Exception $e) {
                return $e;
            }
            $path = public_path().'/img/brand';
            if(!file_exists($path)){
                \File::makeDirectory($path, $mode = 0777, true, true);
            }
            if ($request->image){            
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $slug;
                $image_name = $imageName.'.svg';
                if($extension == 'svg+xml'){
                    $svgFile = file_get_contents($request->image);
                    file_put_contents( $path.'/'.$image_name, $svgFile);
                }else{  
                    return ['result'=>'error', 'message' =>'SVG file only supported.'];
                }
            }else{
                $image_name = "no-photos.svg";
            }
            $order = Brand::max('order_item')+1;
            if($request->display == ''){
                $request->merge(['display' =>0]);
            }
            if($request->type == ''){
                $request->merge(['type' =>0]);
            }
            $add =  Brand::create([
                'section_id' => 0,
                'title' => $request['title'],
                'slug' => $slug,
                'image' => $image_name,
                'icon' => $request['icon'],
                'type' => $request['type'],
                'display' => $request['display'],
                'parent_id' => 0,
                'child'=> 0,
                'order_item' => $order,
                'excerpt' => $request['excerpt']
            ]);
            if($add){
                return ['result'=>'success', 'message' =>'Brand added successfully'];
            }else{
                return ['result'=>'error', 'message' =>'Something went wrong.'];
            }

        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
        if (\Gate::allows('canEdit')){
            $brand = Brand::where('slug', '=', $slug)->firstOrFail();                          // find if brand exist
            $request->merge(['slug' => $this->createSlug($request->title, $request->id)]);    // generate new slug
            
            //Uploading Image if changed        
            if($request->image != $brand->image){
                $path = public_path().'/img/brand';                
                $brandPhoto = public_path('img/brand/').$brand->image;
                //Delete old images
                unlink($brandPhoto);
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $request->slug;
                $image_name = $imageName.'.'.$extension;
                $image_name = $imageName.'.svg';
                if($extension == 'svg+xml'){
                    $svgFile = file_get_contents($request->image);
                    file_put_contents( $path.'/'.$image_name, $svgFile);
                }else{  
                    return ['result'=>'error', 'message' =>'SVG file only supported.'];
                }              
                $request->merge(['image' => $image_name]);
            }

            // Renaming image to new name
            if ($brand->slug != $request->slug && $request->image == $brand->image){
                $ext = getExtension($brand->image);
                $brandPhoto = public_path().'/img/brand/';
                rename($brandPhoto.$brand->image, $brandPhoto.$request->slug.'.'.$ext);
                $request->merge(['image' => $request->slug.'.'.$ext]);
            }

            $update = $brand->update($request->all());
            if($update){
                return ['result'=>'success', 'message' =>'Brand info updated successfully'];
            }else{
                return ['result'=>'error', 'message' =>'Something went wrong.'];
            }

        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        if (\Gate::allows('canDelete')){
            //$this->authorize('isAdmin');
            $content = Brand::where('slug', '=', $slug)->firstOrFail();
            $old_image =  $content->image;
            $brandPhoto = public_path('img/brand/').$old_image;
            if(file_exists($brandPhoto)){
                unlink($brandPhoto);
            }
            //delete the brand
            $content->delete();

            return ['result'=>'success', 'message' => $content->title .' deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }

    public function orderBrand(Request $request){
        $newlist = $request->newbrand;
        return $this->saveList($newlist);
    }

    //search
    public function search(){
        if (\Gate::allows('canView')){
            if($search = \Request::get('q')){
                $brands_search = Brand::where(function($query) use($search){
                    $query->where('title','LIKE',"%$search%");
                })->get();
            }else{
                $brands_search = Brand::latest()->get();

            }
            return $brands_search;
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }

    /*Generating Unique Slug*/
    public function createSlug($title, $id)
    {
        if(!($id)):
            $id = 0;
        endif;
        // Normalize the title
        $slug = Str::slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 100; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug- Many Brand of same Name');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Brand::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
    /*End of generating Unique slug*/

    /*Generating list to display*/
    public function getFullListFromDB($parent_id)
    {
        // global declaration
        $result = $this->getChildList($parent_id);

        foreach ($result as &$value) {
            $subresult = $this->getFullListFromDB($value["id"]);

            if (count($subresult) > 0) {
                $value['children'] = $subresult;
            }else{
                $value['children'] = [];
            }
        }
        unset($value);

        return $result;
    }
    protected function getChildList($parent_id)
    {
        return Brand::where('parent_id','=', $parent_id)->orderBy("order_item")->get();
    }

    /*Sorting the content in order and making child*/
    public function saveList($list, $parent_id = 0, $child = 0, &$m_order = 0)
    {
        foreach ($list as $item) {

            $m_order++;
            $this->updateOrder($parent_id, $child, $m_order, $item['id']);

            if (array_key_exists("children", $item)) {
                if (count($item['children']) >= 1){
                    $this->updateParent($child = 1, $item["id"]);
                }else{
                    $this->updateParent($child = 0, $item["id"]);
                }
                $this->saveList($item["children"], $item["id"], 0, $m_order);
            }
        }
    }
    protected function updateOrder($parent_id, $child, $m_order, $id)
    {
        $brands_order = Brand::findOrFail($id);
        if ($brands_order){
            return Brand::where('id', '=', $id)->update(['parent_id' => $parent_id,
                'child'=> $child,
                'order_item' => $m_order]);
        }
    }

    protected function updateParent($child, $id)
    {
        return Brand::where('id', '=', $id)->update(['child'=> $child]);
    }
}
