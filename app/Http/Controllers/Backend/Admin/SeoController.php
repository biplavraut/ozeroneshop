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
        $seo = Seo::findOrFail(1);
        return $seo;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Seo::create([
            'title' => $request['title'],
            'keyword' => $request['keyword'],
            'subject' => $request['subject'],
            'topic' => $request['topic'],
            'summary' => $request['summary'],
            'classification' => $request['classification'],
            'categories' => $request['categories'],
            'excerpt' => $request['excerpt']
        ]);
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
        $seo = Seo::findOrFail($id);

        $seo->update($request->all());
        return ['message'=>'seo  Updated'];
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
