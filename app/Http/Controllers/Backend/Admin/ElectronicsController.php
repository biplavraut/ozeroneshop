<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Electronics;
use App\Models\Shopsection;

class ElectronicsController extends Controller
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
            try{
                if(\Request::get('shop_section')){
                    $section_id = Shopsection::select('id')->where('slug','LIKE',\Request::get('shop_section'))->first();
                    $final_result = $this->getFullListFromDB(0, $section_id->id);
                }else{
                    return Electronics::orderBy("order_item")->get();
                    //$final_result = $this->getListForDetail(0);
                }                
            }catch (Exception $e) {
                return $e;
            }
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
        if (\Gate::allows('canAdd')){
            $this->validate($request, [
                'image' => 'required',
                'title' => 'required|string'
            ]);
            $section_id = Shopsection::select('id')->where('slug','LIKE',$request->shop_section)->first();
            $section_id = $section_id->id;
            try{
                $slug = $this->createSlug($request->title,'');
            }catch (Exception $e) {
                return $e;
            }
            $path = public_path().'/img/electronics';
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
            $order = Electronics::max('order_item')+1;
            if($request->display == ''){
                $request->merge(['display' =>0]);
            }
            if($request->type == ''){
                $request->merge(['type' =>0]);
            }
            $add =  Electronics::create([
                'section_id' => $section_id,
                'title' => $request['title'],
                'slug' => $slug,
                'image' => $image_name,
                'icon' => $request['icon'],
                'type' => $request['type'],
                'display' => $request['display'],
                'parent_id' => 0,
                'child'=> 0,
                'order_item' => $order,
                'excerpt' => $request['excerpt'],
                'user_id' => $request['user_id']
            ]);
            if($add){
                return ['result'=>'success', 'message' =>'Electronics added successfully'];
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
            $this->validate($request, [
                'image' => 'required',
                'title' => 'required|string'
            ]);
            $electronics = Electronics::where('slug', '=', $slug)->firstOrFail();                          // find if Electronics exist
            $request->merge(['slug' => $this->createSlug($request->title, $request->id)]);    // generate new slug
            
            //Uploading Image if changed        
            if($request->image != $electronics->image){
                $path = public_path().'/img/electronics';                
                $electronicsPhoto = public_path('img/electronics/').$electronics->image;
                //Delete old images
                if(file_exists($electronicsPhoto)){
                    unlink($electronicsPhoto);
                } 
                
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $request->slug;
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
            if ($electronics->slug != $request->slug && $request->image == $electronics->image){
                $ext = getExtension($electronics->image);
                $electronicsPhoto = public_path().'/img/electronics/';
                rename($electronicsPhoto.$electronics->image, $electronicsPhoto.$request->slug.'.'.$ext);
                $request->merge(['image' => $request->slug.'.'.$ext]);
            }

            $update = $electronics->update($request->all());
            if($update){
                return ['result'=>'success', 'message' =>'Electronics info updated successfully'];
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
            $content = Electronics::where('slug', '=', $slug)->firstOrFail();
            if($content->child == 1){
                return ['result'=>'error', 'message' =>'Item has sub category.'];
            }
            $old_image =  $content->image;
            $electronicsPhoto = public_path('img/electronics/').$old_image;
            if(file_exists($electronicsPhoto)){
                unlink($electronicsPhoto);
            }
            //delete the electronics
            $content->delete();

            return ['result'=>'success', 'message' => $content->title .' deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }

    public function orderElectronics(Request $request){
        $newlist = $request->newelectronics;
        return $this->saveList($newlist);
    }

    //search
    public function search(){
        if (\Gate::allows('canView')){
            if($search = \Request::get('q')){
                $electronics_search = Electronics::where(function($query) use($search){
                    $query->where('title','LIKE',"%$search%");
                })->get();
            }else{
                $electronics_search = Electronics::latest()->get();

            }
            return $electronics_search;
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

        throw new \Exception('Can not create a unique slug- Many Electronics of same Name');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Electronics::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
    /*End of generating Unique slug*/

    /*Generating list to display*/
    public function getFullListFromDB($parent_id, $section_id)
    {
        // global declaration
        $result = $this->getChildList($parent_id , $section_id);

        foreach ($result as &$value) {
            $subresult = $this->getFullListFromDB($value["id"] , $section_id);

            if (count($subresult) > 0) {
                $value['children'] = $subresult;
            }else{
                $value['children'] = [];
            }
        }
        unset($value);

        return $result;
    }
    protected function getChildList($parent_id, $section_id)
    {
        return Electronics::where('parent_id','=', $parent_id)->where('section_id','=',$section_id)->orderBy("order_item")->get();
    }
    /*end of Generating list to display*/

    /*Generating list to show in product detail*/
    public function getListForDetail($parent_id)
    {
        // global declaration
        $result = $this->getDetailChildList($parent_id);

        foreach ($result as &$value) {
            $subresult = $this->getListForDetail($value["id"]);

            if (count($subresult) > 0) {
                $value['children'] = $subresult;
            }else{
                $value['children'] = [];
            }
        }
        unset($value);

        return $result;
    }
    protected function getDetailChildList($parent_id)
    {
        return Electronics::where('parent_id','=', $parent_id)->orderBy("order_item")->get();
    }
    /* end of Generating list to show in product detail*/


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
        $electronics_order = Electronics::findOrFail($id);
        if ($electronics_order){
            return Electronics::where('id', '=', $id)->update(['parent_id' => $parent_id,
                'child'=> $child,
                'order_item' => $m_order]);
        }
    }

    protected function updateParent($child, $id)
    {
        return Electronics::where('id', '=', $id)->update(['child'=> $child]);
    }
}
