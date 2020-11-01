<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Models\Seo;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Gate::allows('canView')){
            $seo = Seo::findOrFail(1);
            return $seo;
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
            $add = Seo::create([
                'title' => 'TEST',
                'keyword' => 'TEST',
                'subject' => 'TEST',
                'topic' => 'TEST',
                'summary' => 'TEST',
                'classification' => 'TEST',
                'categories' => 'TEST',
                'excerpt' => 'TEST'
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

    // public function profile()
    // {
    //     $seo = Seo::findOrFail(1);
    //     return $seo;

    // }

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
            $seo = Seo::findOrFail($id);
            $update = $seo->update($request->all());
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
    public function destroy($id)
    {

    }
}
