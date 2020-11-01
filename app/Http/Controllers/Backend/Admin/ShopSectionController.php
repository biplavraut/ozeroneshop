<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Shopsection;

class ShopSectionController extends Controller
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
        //
        if (\Gate::allows('canView')){
            $final_result =  Shopsection::with('getBrandRelation')->orderBy("order_item")->get();
            return $final_result;
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }

    // For home page master blade Sidebar section
    static public function showSections(){
        return Shopsection::orderBy("order_item")->get();
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
            try{
                $slug = $this->createSlug($request->title,'');
            }catch (Exception $e) {
                return $e;
            }
            $path = public_path().'/img/shopsection';
            if(!file_exists($path)){
                \File::makeDirectory($path, $mode = 0777, true, true);
                \File::makeDirectory($path . '/thumbs', $mode = 0777, true, true);
            }
            if ($request->image){
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $slug;
                $image_name = $imageName.'.'.$extension;
                \Image::make($request->image)->save($path.'/'.$image_name);
                resize_crop_image(500, 500, $path."/". $image_name, $path.'/thumbs/'. $image_name, $extension);
                $request->merge(['image' => $image_name]);
                $image = $image_name;
            }else{
                $image_name = "no-image.png";
            }
            $order = Shopsection::max('order_item')+1;
            if($request->display == ''){
                $request->merge(['display' =>0]);
            }
            if($request->type == ''){
                $request->merge(['type' =>0]);
            }
    
            $add = Shopsection::create([
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
                return ['result'=>'success', 'message' =>'Shop section added successfully'];
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
        if (\Gate::allows('canEdit')){
            $section = Shopsection::where('slug', '=', $slug)->firstOrFail();
            $request->merge(['slug' => $this->createSlug($request->title, $request->id)]);    // generate new slug

            if($request->image != $section->image){
                $path = public_path().'/img/shopsection';
                $sectionPhoto = public_path('img/shopsection/').$section->image;
                $sectionThumb = public_path('img/shopsection/thumbs/').$section->image;
                //Delete old section image
                unlink($sectionPhoto);
                unlink($sectionThumb);
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $request->slug;
                $image_name = $imageName.'.'.$extension;
                \Image::make($request->image)->save($path.'/'.$image_name);
                resize_crop_image(500, 500, $path."/". $image_name, $path.'/thumbs/'. $image_name, $extension);
                $request->merge(['image' => $image_name]);
            }

            // Renaming image to new name
            if ($section->slug != $request->slug && $request->image == $section->image){
                $ext = getExtension($section->image);
                $sectionPhoto = public_path().'/img/shopsection/';
                $sectionThumb = public_path().'/img/shopsection/thumbs/';
                rename($sectionPhoto.$section->image, $sectionPhoto.$request->slug.'.'.$ext);
                rename($sectionThumb.$section->image, $sectionThumb.$request->slug.'.'.$ext);
                $request->merge(['image' => $request->slug.'.'.$ext]);
            }

            $update = $section->update($request->all());
            if($update){
                return ['result'=>'success', 'message' =>'Shop section updated successfully'];
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
        if (\Gate::allows('canDelete')){
            //$this->authorize('isAdmin');
            $content = Shopsection::where('slug', '=', $slug)->firstOrFail();
            $old_image =  $content->image;
            $sectionPhoto = public_path('img/shopsection/').$old_image;
            $sectionThumb = public_path('img/shopsection/thumbs/').$old_image;
                if(file_exists($sectionPhoto)){
                    unlink($sectionPhoto);
                    unlink($sectionThumb);
                }
            //delete the section
            $content->delete();
            return ['result'=>'success', 'message' => $content->title .' deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }

    public function orderSection(Request $request){
        $newlist = $request->newshopsection;
        return $this->saveList($newlist);
    }

    //search
    public function search(){
        if (\Gate::allows('canView')){
            if($search = \Request::get('q')){
                $section_search = Shopsection::where(function($query) use($search){
                    $query->where('title','LIKE',"%$search%");
                })->get();
            }else{
                $section_search = Shopsection::latest()->get();

            }
            return $section_search;
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

        throw new \Exception('Can not create a unique slug- Many Shop Section of same Name');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Shopsection::select('slug')->where('slug', 'like', '%'.$slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
    /*End of generating Unique slug*/

    /*Sorting the content in order and making child*/
    public function saveList($list, &$m_order = 0)
    {
        foreach ($list as $item) {
            $m_order++;
            $this->updateOrder($m_order, $item['id']);
        }
    }
    protected function updateOrder($m_order, $id)
    {
        $menu = Shopsection::findOrFail($id);
        if ($menu){
            return Shopsection::where('id', '=', $id)->update(['order_item' => $m_order]);
        }

    }
}