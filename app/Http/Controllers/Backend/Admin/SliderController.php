<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    //frontend slider controller

    public function list()
    {
        return Slider::orderBy("order_item")->get();
    }
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
        // The current user can update the post...
        if (\Gate::allows('canView')){
            return Slider::orderBy("order_item")->get();
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
            $path = public_path().'/img/slider';
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
                resize_crop_image(60, 60, $path."/". $image_name, $path."/thumbs/rect_" . $image_name, $extension);
                resize_crop_image(1024, 480, $path."/". $image_name, $path."/thumbs/" . $image_name, $extension);
                $request->merge(['image' => $image_name]);
                $image = $image_name;
            }else{
                $image = "no-image.png";
            }
    
            $order = Slider::max('order_item')+1;
            if($request->display == ''){
                $request->merge(['display' =>0]);
            }
    
            $add = Slider::create([
                'title' => $request['title'],
                'sub_title' => $request['sub_title'],
                'slug' => $slug,
                'image' => $image,
                'display' => $request['display'],
                'order_item' => $order,
                'link' => $request['link']
            ]);
            if($add){
                return ['result'=>'success', 'message' =>'Slider added successfully'];
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
        if (\Gate::allows('canEdit')) {
            $slider = Slider::where('slug', '=', $slug)->firstOrFail();
            $request->merge(['slug' => $this->createSlug($request->title, $request->id)]);    // generate new slug

            //Uploading Image if changed 
            if($request->image != $slider->image){
                $path = public_path().'/img/slider';
                $sliderPhoto = public_path('img/slider/').$slider->image;
                $sliderThumb = public_path('img/slider/thumbs/').$slider->image;
                $sliderThumbRect = public_path('img/slider/thumbs/rect_').$slider->image;
                //Delete old images
                if(file_exists($sliderPhoto)){
                    unlink($sliderPhoto);
                    unlink($sliderThumb);
                    unlink($sliderThumbRect);
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
                resize_crop_image(60, 60, $path."/". $image_name, $path."/thumbs/rect_" . $image_name, $extension);
                resize_crop_image(1024, 480, $path."/". $image_name, $path."/thumbs/" . $image_name, $extension);
                $request->merge(['image' => $image_name]);
            }
            // Renaming image to new name
            if ($slider->slug != $request->slug && $request->image == $slider->image){
                $ext = getExtension($slider->image);
                $sliderPhoto = public_path().'/img/slider/';
                $sliderThumb = public_path().'/img/slider/thumbs/';
                $sliderThumbRect = public_path().'/img/slider/thumbs/rect_';                
                rename($sliderPhoto.$slider->image, $sliderPhoto.$request->slug.'.'.$ext);
                rename($sliderThumb.$slider->image, $sliderThumb.$request->slug.'.'.$ext);
                rename($sliderThumbRect.$slider->image, $sliderThumbRect.$request->slug.'.'.$ext);
                $request->merge(['image' => $request->slug.'.'.$ext]);
            }

            $update = $slider->update($request->all());
            if($update){
                return ['result'=>'success', 'message' =>'Slider updated successfully'];
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
        if (\Gate::allows('canDelete')){
            //$this->authorize('isAdmin');
            $content = Slider::where('slug', '=', $slug)->firstOrFail();
            $old_image =  $content->image;
            $sliderPhoto = public_path('img/slider/').$old_image;
            $sliderThumb = public_path('img/slider/thumbs/').$old_image;
            $sliderThumbRect = public_path('img/slider/thumbs/rect_').$old_image;
            if(file_exists($sliderPhoto)){
                unlink($sliderPhoto);
                unlink($sliderThumb);
                unlink($sliderThumbRect);
            }
            //delete the slider
            $content->delete();

            return ['result'=>'success', 'message' => $content->title .' deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
        
    }
    public function orderSlider(Request $request){
        $newlist = $request->newslider;
        //return var_dump($newlist);
        return $this->saveList($newlist);
    }
    //search
    public function search(){
        if (\Gate::allows('canView')){
            if($search = \Request::get('q')){
                $sliders = Slider::where(function($query) use($search){
                    $query->where('title','LIKE',"%$search%");
                })->get();
            }else{
                $sliders = Slider::latest()->get();
            }
            return $sliders;
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
        return Slider::select('slug')->where('slug', 'like', $slug.'%')
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
        $slider = Slider::findOrFail($id);
        if ($slider){
            return Slider::where('id', '=', $id)->update(['order_item' => $m_order]);
        }

    }
    protected function updateParent($child, $id)
    {
        return Slider::where('id', '=', $id)->update(['child'=> $child]);
    }
}
