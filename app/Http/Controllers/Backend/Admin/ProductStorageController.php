<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_Storage;

class ProductStorageController extends Controller
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
        if (\Gate::allows('canAdd')){
    
            $add = Product_Storage::create($request->all());
            if($add){
                return ['result'=>'success', 'message' =>'Product Storage added successfully'];
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
        if (\Gate::allows('canEdit')){
            $this->validate($request, [
                'price' => 'required'
            ]);
            $product = Product_Storage::where('id', '=', $id)->firstOrFail();
            $update = $product->update($request->all());
            if($update){
                return ['result'=>'success', 'message' =>'Storage Option updated successfully'];
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
        if (\Gate::allows('canDelete')){
            //$this->authorize('isAdmin');
            $content = Product_Storage::where('id', '=', $id)->firstOrFail();          
            $content->delete();
            return ['result'=>'success', 'message' => 'Storage Option deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }
}
