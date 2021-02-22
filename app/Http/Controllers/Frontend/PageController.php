<?php

namespace App\Http\Controllers\Frontend;
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
    public function desktop() 
    {
        
        $sliders = Slider::orderBy("order_item")->where('display','=',1)->get();
        $blogs = Blog::with('getBrandRelation')->where('display','=',1)->orderBy("order_item")->limit(1)->get();
        $featured = Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->where('featured','=',1)->limit(10)->get();

        $electronics_products = Product_Electronics::where('electronic_id','=',1)->pluck('product_id');
        $smart_phones = Product::where('display','=',1)->where('featured','!=',1)->whereIn('id', $electronics_products)->with('getImageRelation')->limit(10)->get();
        $all_products = Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->orderBy("order_item")->whereNotIn('id', $electronics_products)->where('display','=',1)->where('featured','!=',1)->get();

        return view('frontend.index' , 
        [
            'sliders' => $sliders,
            'blogs' => $blogs,
            'featured' => $featured,
            'smart_phones' => $smart_phones,
            'all_products' => $all_products
            
        ]);
    }
    public function productDetail($slug){
        $product =  Product::with('getStorageRelation')->where('display','=',1)->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->where('slug','LIKE',"%$slug%")->first();
        $electronics_id = Product_Electronics::where('product_id','=',$product->id)->first();
        $electronics_title = Electronics::where('id','=', $electronics_id->electronic_id)->first();
        $brand_title = Brand::where('id','=', $product->brand_id)->first();
        //return $brand_title;
        $related = Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->where('featured','=',1)->get();
        return view('frontend.product-detail' , 
        [
            'product' => $product,
            'related' => $related,
            'electronics_title' => $electronics_title,
            'brand_title' => $brand_title            
        ]);
    }
    public function blogNews(){

        $blogs = Blog::with('getBrandRelation')->where('display','=',1)->orderBy("order_item")->get();
        return view('frontend.blog-news' , 
        [
            'blogs' => $blogs          
        ]);
    }
    
    public function faqs(){
        $faqs = Faq::orderBy("order_item")->where('display','=',1)->get();
        return view('frontend.faqs' , 
        [
            'faqs' => $faqs            
        ]);
    }
    public function about(){
        return view('frontend.about' , 
        [
            //'product' => $product            
        ]);
    }
    public function contact(){
        return view('frontend.contact' , 
        [
            //'product' => $product            
        ]);
    }
    public function products($slug) 
    {
        if($slug == 'all'){
            $products =  Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->get();
            $title =  "All Products";
            $tagline =  "Explore our collection of electronics";
        }else{
            $electronic_id =  Electronics::where('slug','LIKE',"%$slug%")->value('id');
            $title =  Electronics::where('slug','LIKE',"%$slug%")->value('title');
            $tagline =  "Explore our collection of electronics";
            $products_id = Product_Electronics::where('electronic_id','=',$electronic_id)->pluck('product_id');
            $products =  Product::whereIn('id', $products_id)->with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->get();

        }        
        return view('frontend.products', 
        [
            'products' => $products,
            'title' => $title,
            'tagline' => $tagline              
        ]);
    }
    public function brandProducts($slug) 
    {
        if($slug == 'all'){
            $products =  Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->get();
            $title =  "All Products";
            $tagline =  "Explore our collection of electronics";
        }else{
            $brand_id =  Brand::where('slug','LIKE',"%$slug%")->value('id');
            $title =  Brand::where('slug','LIKE',"%$slug%")->value('title');
            $tagline =  Brand::where('slug','LIKE',"%$slug%")->value('excerpt');
            $products_id = Product::where('brand_id','=',$brand_id)->where('display','=',1)->pluck('id');
            $products =  Product::whereIn('id', $products_id)->with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->get();

        }        
        return view('frontend.products', 
        [
            'products' => $products,
            'title' => $title,
            'tagline' => $tagline        
        ]);
    }
    
    public function cartstore(Request $request)
    {
        Cart::add($request['id'], $request['title'],1,$request['price'],['image' => $request['image'],'color' => $request['color'],'storage' => $request['storage']], 0)->associate('App\Models\Product');
        //session()->flash('success_message','Item added to cart');
        //return Cart::content();
        return response()->json(['success'=>'Item added to Cart']);
        
    }
    public function increaseQuantity(Request $request)
    {
        $product = Cart::get($request['rowId']);
        $qty = $product->qty+1;
        Cart::update($request['rowId'], $qty);
        return response()->json(['success'=>'Item quantity increased']);
    }
    public function decreaseQuantity(Request $request)
    {
        $product = Cart::get($request['rowId']);
        $qty = $product->qty-1;
        Cart::update($request['rowId'], $qty);
        if(count(Cart::content()) == 0){
            return response()->json(['success'=>'Cart Empty']);
        }else{
            return response()->json(['success'=>'Item quantity decreased']);
        }
    }
    public function removeCartProduct(Request $request)
    {
        Cart::remove($request['rowId']);
        if(count(Cart::content()) == 0){
            return response()->json(['success'=>'Cart Empty']);
        }else{
            return response()->json(['success'=>'Item removed from Cart']);
        }
    }
    public function destroyCart()
    {
        Cart::destroy();
        return response()->json(['success'=>'Cart removed']);
    }
    public function cart()
    {
        return view('frontend.cart', 
        [
        ]);
    }
    public function checkout()
    {       
        
        if(auth()->user()){
            $user =  auth()->user();
            $shipping = Shipping_Detail::where('customer_id', '=', $user->id)->firstorfail();
            $customer = Customer_Detail::where('customer_id', '=', $user->id)->firstorfail();
            return view('frontend.checkout' , 
            [
                'customer' => $customer ,
                'shipping' => $shipping           
            ]);
        }else{
            
            return view('frontend.checkout', 
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
    public function orderplaced()
    {
        return view('frontend.orderplaced', 
        [
        ]);
    }
    public function orderfailed()
    {
        return view('frontend.orderfailed', 
        [
        ]);
    }
    
}
