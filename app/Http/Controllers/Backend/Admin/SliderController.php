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
        $sliders = Slider::get();

        //dd($sliders);
        return view('frontend.index' , ['sliders_list' => $sliders]);
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
            $final_result =  $this->getFullListFromDB();
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
        if (\Gate::allows('canAdd')){
            $this->validate($request,[
                'title' => 'required|string|max:191',
            ]);
    
            try{
                $slug = $this->createSlug($request->title,'');
            }catch (Exception $e) {
                return ['result'=>'error', 'message' =>'Something! went wrong'];
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
                resize_crop_image(60, 60, $path."/". $image_name, $path."/thumbs/rect_" . $image_name, $extension);
                resize_crop_image(900, 600, $path."/". $image_name, $path."/thumbs/" . $image_name, $extension);
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
            $this->validate($request,[
                'title' => 'required|string|max:191',
            ]);
            $content = Slider::where('slug', '=', $slug)->firstOrFail();
    
            $newSlug = Str::slug($request->title);
            if ($request->slug != $newSlug){
                $request->merge(['slug' => $this->createSlug($request->title, $request->id)]);
            }
            if($request->image){
                $path = public_path().'/img/slider';
                $old_image = json_decode(Slider::select('image')->where('id', 'like', $request->id)->get()->first());
                $old_image =  $old_image->image;
                if($request->image != $old_image){
                    $sliderPhoto = public_path('img/slider/').$old_image;
                    $sliderThumb = public_path('img/slider/thumbs/').$old_image;
                    $sliderThumbRect = public_path('img/slider/thumbs/rect_').$old_image;
                    if(file_exists($sliderPhoto)){
                        unlink($sliderPhoto);
                        unlink($sliderThumb);
                        unlink($sliderThumbRect);
    
                    }
                    $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                    $imageName = $slug;
                    $image_name = $imageName.'.'.$extension;
                    \Image::make($request->image)->save($path.'/'.$image_name);
                    resize_crop_image(60, 60, $path."/". $image_name, $path."/thumbs/rect_" . $image_name, $extension);
                    resize_crop_image(900, 600, $path."/". $image_name, $path."/thumbs/" . $image_name, $extension);
                    
                    $request->merge(['image' => $image_name]);
                }
            }
            $update = $content->update($request->all());
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

    public function orderSlider(Request $request){
        $newlist = $request->newslider;
        //return var_dump($newlist);
        return $this->saveList($newlist);
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
            $old_image = json_decode(Slider::select('image')->where('slug', 'like', $slug)->get()->first());
            $old_image =  $old_image->image;
            $sliderPhoto = public_path('img/slider/').$old_image;
            $sliderThumb = public_path('img/slider/thumbs/').$old_image;
            $sliderThumbRect = public_path('img/slider/thumbs/rect_').$old_image;
                if(file_exists($sliderPhoto)){
                    unlink($sliderPhoto);
                    unlink($sliderThumb);
                    unlink($sliderThumbRect);
                }

            //delete the user
            $content->delete();

            return ['result'=>'success', 'message' => $content->title .' deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
        
    }
    //search
    public function search(){

        if($search = \Request::get('q')){
            $sliders = Slider::where(function($query) use($search){
                $query->where('title','LIKE',"%$search%");
            })->get();
        }else{
            $sliders = Slider::latest()->get();

        }
        return $sliders;

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
        return Slider::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
    /*End of generating Unique slug*/

    /*Generating list to display*/

    protected function getFullListFromDB()
    {
        return Slider::orderBy("order_item")->get();
    }

    public function uploadImage($img, $img_name)
    {

        /*Upload the image in server*/
        //$currentPhoto = $testimonials->image;
        //$slug = Str::slug($request->name);

        $imageName = $img_name;

        $name = $imageName.'.'.explode('/',explode(':', substr($img, 0, strpos($img, ';')))[1])[1];
        \Image::make($img)->save(public_path('img/slider/').$name);
        \File::makeDirectory('img/slider/thumbs', $mode = 0777, true, true);//making directory
        \Image::make($img)->resize(1920, 1080)->save(public_path('img/slider/thumbs/').$name);//resize image
        \Image::make($img)->resize(60, 60)->save(public_path('img/slider/thumbs/rect_').$name);//resize image


        return $name;

    }

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
