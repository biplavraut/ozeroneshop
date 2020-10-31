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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Gate::allows('canView')){
            $section_id = Shopsection::select('id')->where('slug','LIKE',\Request::get('shop_section'))->first();
            $final_result = $this->getFullListFromDB(0, $section_id->id);
            //$final_result = Brand::with('getSectionRelation')->get();
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
            $section_id = Shopsection::select('id')->where('slug','LIKE',$request->shop_section)->first();
            $section_id = $section_id->id;
            try{
                $slug = $this->createSlug($request->title,'');
            }catch (Exception $e) {
                /*report($e);
                return $e;*/
            }
            $path = public_path().'/img/brand';
            if(!file_exists($path)){
                \File::makeDirectory($path, $mode = 0777, true, true);
                \File::makeDirectory($path . '/thumbs', $mode = 0777, true, true);
            }
            if ($request->image){
                
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $slug;
                $image_name = $imageName.'.'.$extension;
                \Image::make($request->image)->save($path.'/'.$image_name);
                resize_crop_image(500, 500, $path."/". $image_name, $path."/thumbs/" . $image_name, $extension);
                
                $request->merge(['image' => $image_name]);
            }else{
                $image_name = "no-image.png";
            }
            $order = Brand::max('order_item')+1;
            if($request->display == ''){
                $request->merge(['display' =>0]);
            }
            if($request->type == ''){
                $request->merge(['type' =>0]);
            }

            $add =  Brand::create([
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
                $brandThumb = public_path('img/brand/thumbs/').$brand->image;
                if(file_exists($brandPhoto)){
                    unlink($brandPhoto);
                    unlink($brandThumb);
                }
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $request->slug;
                $image_name = $imageName.'.'.$extension;
                \Image::make($request->image)->save($path.'/'.$image_name);
                resize_crop_image(500, 500, $path."/". $image_name, $path."/thumbs/" . $image_name, $extension);                
                $request->merge(['image' => $image_name]);
            }

            // Renaming image to new name
            if ($brand->slug != $request->slug){
                $ext = getExtension($brand->image);
                $brandPhoto = public_path().'/img/brand/';
                $brandThumb = public_path().'/img/brand/thumbs/';
                rename($brandPhoto.$brand->image, $brandPhoto.$request->slug.'.'.$ext);
                rename($brandThumb.$brand->image, $brandThumb.$request->slug.'.'.$ext);
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
            $old_image = json_decode(Brand::select('image')->where('slug', 'like', $slug)->get()->first());
            $old_image =  $old_image->image;
            $brandPhoto = public_path('img/brand/').$old_image;
            $brandThumb = public_path('img/brand/thumbs/').$old_image;
                if(file_exists($brandPhoto)){
                    unlink($brandPhoto);
                    unlink($brandThumb);
                }

            //delete the user
            $content->delete();

            return ['result'=>'success', 'message' => $content->title .' deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }

    public function orderBrand(Request $request){
        $newlist = $request->newbrand;
        //return var_dump($newlist);
        return $this->saveList($newlist);
    }

    //search
    public function search(){

        if($search = \Request::get('q')){
            $brands = Brand::where(function($query) use($search){
                $query->where('title','LIKE',"%$search%");
            })->get();
        }else{
            $brands = Brand::latest()->get();

        }
        return $brands;

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
        /*$allSlugs = Menu::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();*/

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

        throw new \Exception('Can not create a unique slug- Many Menu of same Name');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Brand::select('slug')->where('slug', 'like', $slug.'%')
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
        return Brand::where('parent_id','=', $parent_id)->where('section_id','=',$section_id)->orderBy("order_item")->get();
    }

    /*Sorting the content in order and making child*/
    public function saveList($list, $parent_id = 0, $child = 0, &$m_order = 0)
    {
        /*return $list;
        exit();*/
        /*$count = count($list);
        return $count;*/
        foreach ($list as $item) {

            $m_order++;
            /*return $item;
            exit();*/
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
        $menu = Brand::findOrFail($id);
        if ($menu){
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
