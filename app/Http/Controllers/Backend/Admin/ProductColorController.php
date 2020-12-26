<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product_Color;
use App\Models\Product;

class ProductColorController extends Controller
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
        //
        if (\Gate::allows('canAdd')){
            $this->validate($request, [
                'image' => 'required',
                'color' => 'required|string',
                'hex' => 'required',
                'quantity' => 'required'
            ]);
            $path = public_path().'/img/product/'.$request->content_slug;
            if(!file_exists($path)){
                \File::makeDirectory($path, $mode = 0777, true, true);
                \File::makeDirectory($path . '/thumbs', $mode = 0777, true, true);
            }
            if ($request->image){  
                $color = Str::slug($request->color);              
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $request->content_slug;
                $image_name = $imageName.'_'.$color.'.'.$extension;
                \Image::make($request->image)->save($path.'/'.$image_name);
                resize_crop_image(1000, 1000, $path."/". $image_name, $path."/thumbs/" . $image_name, $extension);                
            }else{
                $image_name = "no-image.png";
            }
            $request->merge(['image' => $image_name]);
            $add = Product_Color::create($request->all());
            if($add){
                return ['result'=>'success', 'message' =>'Product Color added successfully'];
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
            $product = Product_Color::where('id', '=', $id)->firstOrFail();
            $update = $product->update($request->all());
            if($update){
                return ['result'=>'success', 'message' =>'Color Option updated successfully'];
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
            $content = Product_Color::where('id', '=', $id)->firstOrFail(); 
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
            return ['result'=>'success', 'message' => 'Color Option deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }
}
