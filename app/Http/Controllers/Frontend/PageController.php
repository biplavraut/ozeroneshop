<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Electronics;
use App\Models\Product_Electronics;

class PageController extends Controller
{
    public function index() 
    {
        return view('frontend.index');
    }
    public function mobile() 
    {
        $sliders = Slider::orderBy("order_item")->get();
        $blogs = Blog::with('getBrandRelation')->orderBy("order_item")->get();
        $featured = Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->where('display','=',1)->where('featured','=',1)->get();
        $elect_product = Product_Electronics::with('getElectronicsRelation')->distinct()->pluck('electronic_id');
        $elect_categories = Electronics::where('display','=',1)->whereIn('id', $elect_product)->orderBy('order_item')->get();
        $electronics_products = Product_Electronics::where('electronic_id','=',1)->pluck('product_id');
        $smart_phones = Product::where('display','=',1)->whereIn('id', $electronics_products)->with('getImageRelation')->get();


        // $contents = Contents::get()->sortBy('order_item');
        // $project = project::get()->sortBy('order_item');

        return view('mobile.index' , 
        [
            'sliders' => $sliders,
            'blogs' => $blogs,
            'featured' => $featured,
            'smart_phones' => $smart_phones,
            'elect_categories' => $elect_categories
            // 'contents' => $contents,
            // 'projects' => $project,
            
        ]);
        // return view('mobile.index');
    }
    public function shop() 
    {
        return view('mobile.products');
    }
    public function list()
    {
        return Slider::orderBy("order_item")->get();
    }
}
