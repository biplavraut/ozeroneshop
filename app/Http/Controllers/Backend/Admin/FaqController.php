<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Faq;

class FaqController extends Controller
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
            return Faq::orderBy("order_item")->get();
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
    
            $order = Faq::max('order_item')+1;
            if($request->display == ''){
                $request->merge(['display' =>0]);
            }
    
            $add = Faq::create([
                'title' => $request['title'],
                'slug' => $slug,
                'display' => $request['display'],
                'order_item' => $order,
                'link' => $request['link'],
                'excerpt' => $request['excerpt'],
            ]);

            if($add){
                return ['result'=>'success', 'message' =>'Faq added successfully'];
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
            $faq = Faq::where('slug', '=', $slug)->firstOrFail();
            $request->merge(['slug' => $this->createSlug($request->title, $request->id)]);    // generate new slug

            $update = $faq->update($request->all());
            if($update){
                return ['result'=>'success', 'message' =>'Faq updated successfully'];
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
            $content = Faq::where('slug', '=', $slug)->firstOrFail();
            //delete the faq
            $content->delete();
            return ['result'=>'success', 'message' =>'Faq deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }

    public function orderFaq(Request $request){
        $newlist = $request->newfaq;
        return $this->saveList($newlist);
    }
    //search
    public function search(){
        if (\Gate::allows('canView')){
            if($search = \Request::get('q')){
                $faq_search = Faq::where(function($query) use($search){
                    $query->where('title','LIKE',"%$search%");
                })->get();
            }else{
                $faq_search = Faq::latest()->get();

            }
            return $faq_search;
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

        throw new \Exception('Can not create a unique slug- Many FAQ of same Name');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Faq::select('slug')->where('slug', 'like', '%'.$slug.'%')
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
        $faq = Faq::findOrFail($id);
        if ($faq){
            return Faq::where('id', '=', $id)->update(['order_item' => $m_order]);
        }

    }

}
