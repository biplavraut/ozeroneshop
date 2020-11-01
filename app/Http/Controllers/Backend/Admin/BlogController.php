<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;

class BlogController extends Controller
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
            $final_result =  Blog::orderBy("order_item")->get();
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
            try{
                $slug = $this->createSlug($request->title,'');
            }catch (Exception $e) {
                return $e;
            }
            $path = public_path().'/img/blog';
            if(!file_exists($path)){
                \File::makeDirectory($path, $mode = 0777, true, true);
                \File::makeDirectory($path . '/thumbs', $mode = 0777, true, true);
            }
            if ($request->image){
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $slug;
                $image_name = $imageName.'.'.$extension;
                \Image::make($request->image)->save($path.'/'.$image_name);
                resize_crop_image(720, 405, $path."/". $image_name, $path."/thumbs/" . $image_name, $extension);
                    $request->merge(['image' => $image_name]);
            }else{
                $image_name = "no-image.png";
            }
            $order = Blog::max('order_item')+1;
            if($request->display == ''){
                $request->merge(['display' =>0]);
            }
    
            $add = Blog::create([
                'title' => $request['title'],
                'slug' => $slug,
                'image' => $image_name,
                'author' => $request['author'],
                'date' => $request['date'],
                'display' => $request['display'],
                'meta_keywords' => $request['meta_keywords'],
                'meta_tags' => $request['meta_tags'],
                'meta_categories' => $request['meta_categories'],
                'order_item' => $order,
                'excerpt' => $request['excerpt']
            ]);
            if($add){
                return ['result'=>'success', 'message' =>'Blog added successfully'];
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
            $blog = Blog::where('slug', '=', $slug)->firstOrFail();
            $request->merge(['slug' => $this->createSlug($request->title, $request->id)]);    // generate new slug

            if($request->image != $blog->image){
                $path = public_path().'/img/blog';
                $blogPhoto = public_path('img/blog/').$blog->image;
                $blogThumb = public_path('img/blog/thumbs/').$blog->image;
                //Delete old blog image
                unlink($blogPhoto);
                unlink($blogThumb);
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $slug;
                $image_name = $imageName.'.'.$extension;
                \Image::make($request->image)->save($path.'/'.$image_name);
                resize_crop_image(720, 405, $path."/" . $image_name, $path."/thumbs/" . $image_name, $extension);
                $request->merge(['image' => $image_name]);
            }
            // Renaming image to new name
            if ($blog->slug != $request->slug && $request->image == $blog->image){
                $ext = getExtension($blog->image);
                $blogPhoto = public_path().'/img/blog/';
                $blogThumb = public_path().'/img/blog/thumbs/';
                rename($blogPhoto.$blog->image, $blogPhoto.$request->slug.'.'.$ext);
                rename($blogThumb.$blog->image, $blogThumb.$request->slug.'.'.$ext);
                $request->merge(['image' => $request->slug.'.'.$ext]);
            }

            $update = $blog->update($request->all());
            if($update){
                return ['result'=>'success', 'message' =>'Blog updated successfully'];
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
            $content = Blog::where('slug', '=', $slug)->firstOrFail();
            $old_image =  $content->image;
            $blogPhoto = public_path('img/blog/').$old_image;
            $blogThumb = public_path('img/blog/thumbs/').$old_image;
                if(file_exists($blogPhoto)){
                    unlink($blogPhoto);
                    unlink($blogThumb);
                }
            //delete the section
            $content->delete();
            return ['result'=>'success', 'message' => $content->title .' deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }

    public function orderBlog(Request $request){
        $newlist = $request->newblog;
        //return var_dump($newlist);
        return $this->saveList($newlist);
    }

    //search
    public function search(){
        if (\Gate::allows('canView')){
            if($search = \Request::get('q')){
                $section_search = Blog::where(function($query) use($search){
                    $query->where('title','LIKE',"%$search%");
                })->get();
            }else{
                $section_search = Blog::latest()->get();

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
        return Blog::select('slug')->where('slug', 'like', '%'.$slug.'%')
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
        $menu = Blog::findOrFail($id);
        if ($menu){
            return Blog::where('id', '=', $id)->update(['order_item' => $m_order]);
        }

    }

}
