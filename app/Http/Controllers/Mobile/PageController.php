<?php

namespace App\Http\Controllers\Mobile;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Electronics;
use App\Models\Product_Electronics;
use App\Models\Brand;
use App\Models\Faq;
use Cart;
use App\Models\Customer_Detail;
use App\Models\Shipping_Detail;
use App\Models\Order;

use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    
    public function index() 
    {
        return view('frontend.index');
    }
    public function mobile() 
    {
        
        $sliders = Slider::orderBy("order_item")->get();
        $blogs = Blog::with('getBrandRelation')->orderBy("order_item")->limit(1)->get();
        $featured = Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->where('featured','=',1)->limit(10)->get();

        $electronics_products = Product_Electronics::where('electronic_id','=',1)->pluck('product_id');
        $smart_phones = Product::where('display','=',1)->where('featured','!=',1)->whereIn('id', $electronics_products)->with('getImageRelation')->limit(6)->get();
        $all_products = Product::with('getImageRelation')->orderBy("order_item")->whereNotIn('id', $electronics_products)->where('display','=',1)->where('featured','!=',1)->get();

        return view('mobile.index' , 
        [
            'sliders' => $sliders,
            'blogs' => $blogs,
            'featured' => $featured,
            'smart_phones' => $smart_phones,
            'all_products' => $all_products
            
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
            $electronic_id =  Electronics::where('slug','LIKE',"%$slug%")->value('id');;
            $products_id = Product_Electronics::where('electronic_id','=',$electronic_id)->pluck('product_id');
            $products =  Product::whereIn('id', $products_id)->with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->get();

        }        
        return view('mobile.products', 
        [
            'products' => $products            
        ]);
    }
    public function brandProducts($slug) 
    {
        if($slug == 'all'){
            $products =  Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->get();
        }else{
            $brand_id =  Brand::where('slug','LIKE',"%$slug%")->value('id');;
            $products_id = Product::where('brand_id','=',$brand_id)->pluck('id');
            $products =  Product::whereIn('id', $products_id)->with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->get();

        }        
        return view('mobile.products', 
        [
            'products' => $products            
        ]);
    }
    
    public function cartstore(Request $request)
    {
        Cart::add($request['id'], $request['title'],1,$request['price'],['image' => $request['image'],'color' => $request['color'],'storage' => $request['storage']], 0)->associate('App\Models\Product');
        //session()->flash('success_message','Item added to cart');
        return response()->json(['success'=>'Item added to Cart']);
        //return view('mobile.cart');
    }
    public function increaseQuantity(Request $request)
    {
        $product = Cart::get($request['rowId']);
        $qty = $product->qty+1;
        Cart::update($request['rowId'], $qty);
    }
    public function decreaseQuantity(Request $request)
    {
        $product = Cart::get($request['rowId']);
        $qty = $product->qty-1;
        Cart::update($request['rowId'], $qty);
    }
    public function removeCartProduct(Request $request)
    {
        Cart::remove($request['rowId']);
    }
    public function cart()
    {
        return view('mobile.cart', 
        [
        ]);
    }
    public function checkout()
    {       
        
        if(auth()->user()){
            $user =  auth()->user();
            $shipping = Shipping_Detail::where('customer_id', '=', $user->id)->firstorfail();
            $customer = Customer_Detail::where('customer_id', '=', $user->id)->firstorfail();
            return view('mobile.checkout' , 
            [
                'customer' => $customer ,
                'shipping' => $shipping           
            ]);
        }else{
            
            return view('mobile.checkout', 
            [
            ]);
        }
    }
    
    public function search(Request $request){
        //return $request->search_query;
        $search_products = Product::with('getImageRelation')->where('display','=',1)->where('title','LIKE',"%{$request->search_query}%")->orderBy('order_item')->limit(8)->get();
        return Response($search_products);
        // View::make('search_products', $search_products);
        // return View::share('search_products', $search_products);
    }
}
