<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_Image;
use App\Models\Product;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->image;
        if (\Gate::allows('canAdd')){
            $this->validate($request, [
                'image' => 'required'
            ]);
            $old_display_image = Product_Image::where('product_id', '=', $request->product_id)->get();
            if(count($old_display_image) > 0){
                $request->merge(['primary' => 0]);
            }else{
                $request->merge(['primary' => 1]);
            }
            $path = public_path().'/img/product/'.$request->content_slug;
            if(!file_exists($path)){
                \File::makeDirectory($path, $mode = 0777, true, true);
                \File::makeDirectory($path . '/thumbs', $mode = 0777, true, true);
            }
            if ($request->image){  
                $unique = time();              
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $request->content_slug;
                $image_name = $imageName.'_'.$unique.'.'.$extension;
                \Image::make($request->image)->save($path.'/'.$image_name);
                resize_crop_image(300, 300, $path."/". $image_name, $path."/thumbs/" . $image_name, $extension);                
            }else{
                $image_name = "no-image.png";
            }
            $request->merge(['image' => $image_name]);
            $add = Product_Image::create($request->all());
            if($add){
                return ['result'=>'success', 'message' =>'Product Image added successfully'];
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
    public function update(Request $request, $id)
    {
        //
        if (\Gate::allows('canEdit')){
            
            $old_display_image = Product_Image::where('primary', '=', 1)->where('product_id', '=', $request->product_id)->firstOrFail();
            if($old_display_image){
                $update = $old_display_image->update(['primary' => 0]);
            }
            $request->merge(['primary' => 1]);
            $product = Product_Image::where('id', '=', $id)->firstOrFail();
            $update = $product->update($request->all());
            if($update){
                return ['result'=>'success', 'message' =>'Display Image Changed'];
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
    public function destroy($id)
    {
        //
        if (\Gate::allows('canDelete')){
            //$this->authorize('isAdmin');
            $content = Product_Image::where('id', '=', $id)->firstOrFail(); 
            $product = Product::where('id', '=', $content->product_id)->firstOrFail(); 
            $old_image =  $content->image;
            $path = public_path().'/img/product/'.$product->slug;
            $productPhoto = $path.'/'.$old_image;
            $productThumb = $path.'/thumbs/'.$old_image;
            if(file_exists($productPhoto)){
                unlink($productPhoto);
                unlink($productThumb);
            }         
            $content->delete();
            return ['result'=>'success', 'message' => 'Product Image deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }
}
