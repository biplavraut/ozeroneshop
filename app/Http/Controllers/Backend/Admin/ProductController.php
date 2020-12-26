<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Product_Section;
use App\Models\Product_Electronics;

class ProductController extends Controller
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
            if(\Request::get('slug')){
                $slug = \Request::get('slug');
                //return Contents::latest()->where('slug','LIKE',"%$slug%")->get();
                return Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->where('slug','LIKE',"%$slug%")->first();
            }else{
                return Product::orderBy("order_item")->get();
            }
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
            $this->validate($request, [
                'title' => 'required|string|max:250'
            ]);
            try{
                $slug = $this->createSlug($request->title,'');
            }catch (Exception $e) {
                return $e;
            }
            try{
                $sku = $this->createSlug($request->title,'');
            }catch (Exception $e) {
                return $e;
            }
            $path = public_path().'/img/product/'. $slug;
            if(!file_exists($path)){
                \File::makeDirectory($path, $mode = 0777, true, true);
                \File::makeDirectory($path . '/thumbs', $mode = 0777, true, true);
            }
            $order = Product::max('order_item')+1;
    
            $add = Product::create([
                'title' => $request['title'],
                'slug' => $slug,
                'sku' => $sku,
                'display' => 0,
                'featured' => 0,
                'order_item' => $order
            ]);
            if($add){
                return ['result'=>'success', 'message' =>'Product added successfully', 'slug'=>$slug];
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
            if($request->change_shop_category == 1){
                $del = Product_Electronics::where('product_id', '=', $request->id)->delete();
                $product_id = $request->id;
                $categories = array();
                $categories = $request->shop_category;
                for($i = 0; $i < count($categories); $i++) {
                    $electronic_id = $categories[$i]['id'];
                    $add_electronics = Product_Electronics::create([
                        'product_id' => $product_id,
                        'electronic_id' => $electronic_id
                    ]);
                }
            }
            $this->validate($request, [
                'title' => 'required|string|max:250'
            ]);
            $product = Product::where('slug', '=', $slug)->firstOrFail();
            $request->merge(['slug' => $this->createSlug($request->title, $request->id)]);    // generate new slug
            // Renaming image folder to new name
            if ($product->slug != $request->slug){
                if(is_dir(public_path('img/product/').$slug)){
                    rename(public_path('img/product/').$product->slug, public_path('img/product/').$request->slug );
                }
            }
            $update = $product->update($request->all());
            if($update){
                return ['result'=>'success', 'message' =>'Product updated successfully'];
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
            $content = Product::where('slug', '=', $slug)->firstOrFail();
            if(is_dir(public_path('img/product/').$slug)){
                $this->deletefolder(public_path('img/product/').$slug);
            }            
            $content->delete();
            return ['result'=>'success', 'message' => $content->title .' deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }
    public function deletefolder($dir){
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? $this->deletefolder("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }

    public function orderProducts(Request $request){
        $newlist = $request->newproduct;
        //return var_dump($newlist);
        return $this->saveList($newlist);
    }

    //search
    public function search(){
        if (\Gate::allows('canView')){
            if($search = \Request::get('q')){
                $section_search = Product::where(function($query) use($search){
                    $query->where('title','LIKE',"%$search%");
                })->get();
            }else{
                $section_search = Product::latest()->get();

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
        return Product::select('slug')->where('slug', 'like', '%'.$slug.'%')
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
        $menu = Product::findOrFail($id);
        if ($menu){
            return Product::where('id', '=', $id)->update(['order_item' => $m_order]);
        }

    }
}
