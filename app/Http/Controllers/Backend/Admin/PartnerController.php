<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Partner;

class PartnerController extends Controller
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
            return Partner::orderBy("order_item")->get();
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
            $path = public_path().'/img/partner';
            if(!file_exists($path)){
                \File::makeDirectory($path, $mode = 0777, true, true);
                \File::makeDirectory($path . '/thumbs', $mode = 0777, true, true);
            }
            if ($request->image){
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $slug;
                $image_name = $imageName.'.'.$extension;
                \Image::make($request->image)->save($path.'/'.$image_name);
                resize_crop_image(200, 200, $path."/". $image_name, $path.'/thumbs/'. $image_name, $extension);
                $request->merge(['image' => $image_name]);
                $image = $image_name;
            }else{
                $image_name = "no-image.png";
            }
    
            $order = Partner::max('order_item')+1;
            if($request->display == ''){
                $request->merge(['display' =>0]);
            }
    
            $add = Partner::create([
                'title' => $request['title'],
                'slug' => $slug,
                'image' => $image,
                'display' => $request['display'],
                'order_item' => $order,
                'link' => $request['link']
            ]);

            if($add){
                return ['result'=>'success', 'message' =>'Partner added successfully'];
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
            $partner = Partner::where('slug', '=', $slug)->firstOrFail();
            $request->merge(['slug' => $this->createSlug($request->title, $request->id)]);    // generate new slug

            if($request->image != $partner->image){
                $path = public_path().'/img/partner';
                $partnerPhoto = public_path('img/partner/').$partner->image;
                $partnerThumb = public_path('img/partner/thumbs/').$partner->image;
                //Delete old partner image
                unlink($partnerPhoto);
                unlink($partnerThumb);
                $extension = explode('/',explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                $imageName = $request->slug;
                $image_name = $imageName.'.'.$extension;
                \Image::make($request->image)->save($path.'/'.$image_name);
                resize_crop_image(200, 200, $path."/". $image_name, $path.'/thumbs/'. $image_name, $extension);
                $request->merge(['image' => $image_name]);
            }

            // Renaming image to new name
            if ($partner->slug != $request->slug && $request->image == $partner->image){
                $ext = getExtension($partner->image);
                $partnerPhoto = public_path().'/img/partner/';
                $partnerThumb = public_path().'/img/partner/thumbs/';
                rename($partnerPhoto.$partner->image, $partnerPhoto.$request->slug.'.'.$ext);
                rename($partnerThumb.$partner->image, $partnerThumb.$request->slug.'.'.$ext);
                $request->merge(['image' => $request->slug.'.'.$ext]);
            }

            $update = $partner->update($request->all());
            if($update){
                return ['result'=>'success', 'message' =>'Partner updated successfully'];
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
            $content = Partner::where('slug', '=', $slug)->firstOrFail();
            $old_image =  $content->image;
            $partnerPhoto = public_path('img/partner/').$old_image;
            $partnerThumb = public_path('img/partner/thumbs/').$old_image;
                if(file_exists($partnerPhoto)){
                    unlink($partnerPhoto);
                    unlink($partnerThumb);
                }
            //delete the partner
            $content->delete();
            return ['result'=>'success', 'message' => $content->title .' deleted successfully'];
        }else{
            return ['result'=>'error', 'message' =>'Unauthorized! Access Denied'];
        }
    }

    public function orderPartner(Request $request){
        $newlist = $request->newpartner;
        return $this->saveList($newlist);
    }

    //search
    public function search(){
        if (\Gate::allows('canView')){
            if($search = \Request::get('q')){
                $partner_search = Partner::where(function($query) use($search){
                    $query->where('title','LIKE',"%$search%");
                })->get();
            }else{
                $partner_search = Partner::latest()->get();

            }
            return $partner_search;
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

        throw new \Exception('Can not create a unique slug- Many Partner of same Name');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Partner::select('slug')->where('slug', 'like', '%'.$slug.'%')
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
        $partner = Partner::findOrFail($id);
        if ($partner){
            return Partner::where('id', '=', $id)->update(['order_item' => $m_order]);
        }

    }
}
