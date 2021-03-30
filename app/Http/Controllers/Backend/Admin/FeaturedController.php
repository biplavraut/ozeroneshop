<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Featured;
use Illuminate\Support\Str;


class FeaturedController extends Controller
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
        // The current user can update the post...
        if (\Gate::allows('canView')){
            return Featured::orderBy("order_item")->get();
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
            $this->validate($request,[
                'image' => 'required',
                'title' => 'required|string|max:191',
                'sub_title' => 'required'
            ]);
    
            try{
                $slug = $this->createSlug($request->title,'');
            }catch (Exception $e) {
                return $e;
            }
            $path = public_path().'/img/featured';
            if(!file_exists($path)){
                File::makeDirectory($path, $mode = 0777, true, true);
                File::makeDirectory($path . '/thumbs', $mode = 0777, true, true);
            }
            if ($request->image){
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $slug;
                $image_name = $imageName.'.'.$extension;
                \Image::make($request->image)->save($path.'/'.$image_name);
                if($extension != 'webp'){
                    convertImageToWebP($path."/". $image_name, $path."/" . $imageName.'.webp', $extension);
                    unlink($path."/". $image_name);
                    $image_name = $imageName.'.webp';
                }                
                make_thumb($path."/". $image_name, $path."/thumbs/".$image_name, 400, 400);
                //resize_crop_image(600, 600, $path."/". $image_name, $path."/thumbs/" . $image_name, $extension);
                $request->merge(['image' => $image_name]);
                $image = $image_name;
            }else{
                $image = "no-image.png";
            }
    
            $order = Featured::max('order_item')+1;
            if($request->display == ''){
                $request->merge(['display' =>0]);
            }
    
            $add = Featured::create([
                'title' => $request['title'],
                'sub_title' => $request['sub_title'],
                'sub_title_color' => $request['sub_title_color'],
                'slug' => $slug,
                'image' => $image,
                'display' => $request['display'],
                'order_item' => $order,
                'link' => $request['link'],
                'excerpt' => $request['excerpt'],
                'price' => $request['price']
            ]);
            if($add){
                return ['result'=>'success', 'message' =>'Featured Product added successfully'];
            }else{
                return ['result'=>'error', 'message' =>'Something went wrtong.'];
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
        if (\Gate::allows('canEdit')) {
            $featured = Featured::where('slug', '=', $slug)->firstOrFail();
            $request->merge(['slug' => $this->createSlug($request->title, $request->id)]);    // generate new slug

            //Uploading Image if changed 
            if($request->image != $featured->image){
                $path = public_path().'/img/featured';
                $featuredPhoto = public_path('img/featured/').$featured->image;
                $featuredThumb = public_path('img/featured/thumbs/').$featured->image;
                //Delete old images
                if(file_exists($featuredPhoto)){
                    unlink($featuredPhoto);
                    unlink($featuredThumb);
                }                
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $request->slug;
                $image_name = $imageName.'.'.$extension;
                \Image::make($request->image)->save($path.'/'.$image_name);
                if($extension != 'webp'){
                    convertImageToWebP($path."/". $image_name, $path."/" . $imageName.'.webp', $extension);
                    unlink($path."/". $image_name);
                    $image_name = $imageName.'.webp';
                } 
                make_thumb($path."/". $image_name, $path."/thumbs/".$image_name, 400, 400);
                //resize_crop_image(1024, 480, $path."/". $image_name, $path."/thumbs/" . $image_name, $extension);
                $request->merge(['image' => $image_name]);
            }
            // Renaming image to new name
            if ($featured->slug != $request->slug && $request->image == $featured->image){
                $ext = getExtension($featured->image);
                $featuredPhoto = public_path().'/img/featured/';
                $featuredThumb = public_path().'/img/featured/thumbs/';
                rename($featuredPhoto.$featured->image, $featuredPhoto.$request->slug.'.'.$ext);
                rename($featuredThumb.$featured->image, $featuredThumb.$request->slug.'.'.$ext);
                $request->merge(['image' => $request->slug.'.'.$ext]);
            }

            $update = $featured->update($request->all());
            if($update){
                return ['result'=>'success', 'message' =>'Featured Product updated successfully'];
            }else{
                return ['result'=>'error', 'message' =>'Something went wrong.'];
            }
        }
        else{
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
            $content = Featured::where('slug', '=', $slug)->firstOrFail();
            $old_image =  $content->image;
            $featuredPhoto = public_path('img/featured/').$old_image;
            $featuredThumb = public_path('img/featured/thumbs/').$old_image;
            if(file_exists($featuredPhoto)){
                unlink($featuredPhoto);
                unlink($featuredThumb);
            }
            //delete the featured
            $content->delete();

            return ['result'=>'success', 'message' => $content->title .' deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }

    public function orderFeatured(Request $request){
        $newlist = $request->newfeatured;
        //return var_dump($newlist);
        return $this->saveList($newlist);
    }
    //search
    public function search(){
        if (\Gate::allows('canView')){
            if($search = \Request::get('q')){
                $featureds = Featured::where(function($query) use($search){
                    $query->where('title','LIKE',"%$search%");
                })->get();
            }else{
                $featureds = Featured::latest()->get();
            }
            return $featureds;
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

        throw new \Exception('Can not create a unique slug- Many Menu of same Name');
    }


    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Featured::select('slug')->where('slug', 'like', $slug.'%')
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
        $featured = Featured::findOrFail($id);
        if ($featured){
            return Featured::where('id', '=', $id)->update(['order_item' => $m_order]);
        }

    }
    protected function updateParent($child, $id)
    {
        return Featured::where('id', '=', $id)->update(['child'=> $child]);
    }
}
