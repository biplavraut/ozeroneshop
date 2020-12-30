<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Electronics;
use App\Models\Product_Electronics;
use App\Models\Brand;
use App\Models\Faq;

class PageController extends Controller
{
    public function index() 
    {
        return view('frontend.index');
    }
    public function mobile() 
    {
        $brands = Brand::with('getSectionRelation')->orderBy("order_item")->get();
        $sliders = Slider::orderBy("order_item")->get();
        $blogs = Blog::with('getBrandRelation')->orderBy("order_item")->limit(1)->get();
        $featured = Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->where('featured','=',1)->get();

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
            'brands' => $brands
            
        ]);
    }
    public function productDetail($slug){
        $product =  Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->where('slug','LIKE',"%$slug%")->first();
        return view('mobile.product-detail' , 
        [
            'product' => $product            
        ]);
    }
    public function blogNews(){

        $blogs = Blog::with('getBrandRelation')->orderBy("order_item")->get();
        return view('mobile.blog-news' , 
        [
            'blogs' => $blogs          
        ]);
    }
    
    public function faqs(){
        $faqs = Faq::orderBy("order_item")->get();
        return view('mobile.faqs' , 
        [
            'faqs' => $faqs            
        ]);
    }
    public function about(){
        return view('mobile.about' , 
        [
            //'product' => $product            
        ]);
    }
    public function contact(){
        return view('mobile.contact' , 
        [
            //'product' => $product            
        ]);
    }
    public function products($slug) 
    {
        if($slug == 'all'){
            $products =  Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->get();
        }else{
            $products =  Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->get();

        }        
        return view('mobile.products', 
        [
            'products' => $products            
        ]);
    }
    public function list()
    {
        return Slider::orderBy("order_item")->get();
    }
}
