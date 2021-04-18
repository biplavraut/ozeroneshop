<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Featured;
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
        $body_featured = Featured::orderBy("order_item")->where('display','=',1)->get();
        $blogs = Blog::with('getBrandRelation')->where('display','=',1)->orderBy("order_item")->limit(1)->get();
        $featured = Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->where('featured','=',1)->limit(10)->get();

        $electronics_products = Product_Electronics::where('electronic_id','=',1)->pluck('product_id');
        $smart_phones = Product::where('display','=',1)->where('featured','!=',1)->whereIn('id', $electronics_products)->with('getImageRelation')->limit(10)->get();
        $all_products = Product::with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->orderBy("order_item")->whereNotIn('id', $electronics_products)->where('display','=',1)->where('featured','!=',1)->limit(12)->get();

        return view('frontend.index' , 
        [
            'sliders' => $sliders,
            'body_featured' => $body_featured,
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
    public function terms(){
        return view('frontend.terms' , 
        [
            //'product' => $product            
        ]);
    }
    public function privacy(){
        return view('frontend.privacy' , 
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
    
    public function searching(Request $request){
        $brand_id = Brand::where('title','LIKE',"%$request->search_query%")->where('display','=',1)->pluck('id');
        $electronic_id = Electronics::where('title','LIKE',"%$request->search_query%")->where('display','=',1)->pluck('id');
        //return count($electronic_id);
        if(count($brand_id) > 0){
            $search_products = Product::with('getImageRelation')
                ->where('display','=',1)
                ->whereIn('brand_id', $brand_id)
                ->orWhere('title','LIKE',"%$request->search_query%")
                ->orderBy('order_item')->limit(5)->get();
        }elseif(count($electronic_id) > 0){
            $products_id = Product_Electronics::whereIn('electronic_id', $electronic_id)->pluck('product_id');
            $search_products = Product::with('getImageRelation')
                ->where('display','=',1)
                ->whereIn('id', $products_id)
                ->orWhere('title','LIKE',"%$request->search_query%")
                ->orderBy('order_item')->limit(5)->get();
        }else{
            $search_products = Product::with('getImageRelation')
                ->where('display','=',1)
                ->where('title','LIKE',"%$request->search_query%")
                ->orWhere('meta_keywords','LIKE',"%$request->search_query%")
                ->orWhere('meta_tags','LIKE',"%$request->search_query%")
                ->orWhere('meta_categories','LIKE',"%$request->search_query%")
                ->orderBy('order_item')->limit(5)->get();
        }
        if(count($search_products) == 0){
            $search_products = Product::with('getImageRelation')
                ->where('display','=',1)
                ->where('title','LIKE',"%$request->search_query%")
                ->orWhere('meta_keywords','LIKE',"%$request->search_query%")
                ->orWhere('meta_tags','LIKE',"%$request->search_query%")
                ->orWhere('meta_categories','LIKE',"%$request->search_query%")
                ->orderBy('order_item')->get();
        }
        return Response($search_products);
    }
    public function search(Request $request){
        $brand_id = Brand::where('title','LIKE',"%$request->search%")->where('display','=',1)->pluck('id');
        $electronic_id = Electronics::where('title','LIKE',"%$request->search%")->where('display','=',1)->pluck('id');
        if(count($brand_id) > 0){
            $search_products = Product::with('getImageRelation')
                ->where('display','=',1)
                ->whereIn('brand_id', $brand_id)
                ->orWhere('title','LIKE',"%$request->search%")
                ->orderBy('order_item')->get();
        }elseif(count($electronic_id) > 0){
            $products_id = Product_Electronics::whereIn('electronic_id','=',$electronic_id)->pluck('product_id');
            $search_products = Product::with('getImageRelation')
                ->where('display','=',1)
                ->whereIn('id', $products_id)
                ->orWhere('title','LIKE',"%$request->search%")
                ->orderBy('order_item')->get();
        }else{
            $search_products = Product::with('getImageRelation')
                ->where('display','=',1)
                ->where('title','LIKE',"%$request->search%")
                ->orWhere('meta_keywords','LIKE',"%$request->search%")
                ->orWhere('meta_tags','LIKE',"%$request->search%")
                ->orWhere('meta_categories','LIKE',"%$request->search%")
                ->orderBy('order_item')->get();
        }
        if(count($search_products) == 0){
            $search_products = Product::with('getImageRelation')
                ->where('display','=',1)
                ->where('title','LIKE',"%$request->search%")
                ->orWhere('meta_keywords','LIKE',"%$request->search%")
                ->orWhere('meta_tags','LIKE',"%$request->search%")
                ->orWhere('meta_categories','LIKE',"%$request->search%")
                ->orderBy('order_item')->get();
        }

        return view('frontend.search' , 
        [
            'products' => $search_products          
        ]);
    }
    public function filter(Request $request){
        $filter_category = array();
        $filter_brand = array();
        if(is_null($request->category)){
            $filter_category = Electronics::where('display','=',1)->pluck('id');
        }else{
            $filter_category = $request->category;
        }
        if(is_null($request->brand)){
            $filter_brand = Brand::where('display','=',1)->pluck('id');
        }else{
            $filter_brand = $request->brand;
        }
        $electronics_products_id = Product_Electronics::whereIn('electronic_id', $filter_category)->pluck('product_id');
        //return $electronics_products_id;
        $products =  Product::whereIn('id', $electronics_products_id)->whereIn('brand_id', $filter_brand)->whereBetween('price', [(int)$request->min, (int)$request->max])->with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("order_item")->where('display','=',1)->get();
        if(count($products) == 0){
            return "<b>Filtered Product Not Found</b>";
        }
        $count = 0;
        $res = '<li class="grid-sizer"></li>';
        foreach($products as $product){
            $res .= '<li class="grid-item">';
            $res .= '<div class="product-box border-radius-6px margin-25px-bottom xs-margin-15px-bottom box-shadow-small">';
            $res .= '<div class="product-image">';
            $res .= '<a href="/product-detail/'. $product->slug .'">';
            foreach($product->getImageRelation as $display_image){
                if($display_image->primary == 1){
                    $image = $display_image->image;
                    $res .= '<img class="lazyload" src="/img/thumbnail.jpg" data-src="/img/product/'.$product->slug.'/thumbs/'.$image.'" alt="'.$product->slug.'"/>';
                }
            }
            if($product->discount){$res .= '<span class="product-badge green">sale</span>';}
            $res .= '</a>';
            if ($product->discount > 0){
                $marked_price = $product->price;
                $discount = $product->discount;
                $price = round($marked_price - ($discount/100*$marked_price));
            }else{
                $price = $product->price;
            }
            $res .= '<div class="product-overlay bg-gradient-extra-midium-gray-transparent"></div>';
            $res .= '<div class="product-hover-bottom text-center padding-30px-tb">';
            $res .= '<a href="/product-detail/'.$product->slug.'" class="product-link-icon move-top-bottom" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Detail"><i class="feather  icon-feather-external-link"></i></a>';

            // if(count($product->getStorageRelation) > 0){
            //     $res .= '<a href="/product-detail/'.$product->slug.'" class="product-link-icon move-top-bottom" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Detail"><i class="feather  icon-feather-external-link"></i></a>';
            // }else{
            //     $res .= '<a href="javascript:void(0);" onclick="addtocart('.$product->id.','.$product->title.','.$price.', '.$image.' )" class="product-link-icon move-top-bottom" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Bag"><i class="feather icon-feather-shopping-cart"></i></a>';
            // }

            $res .= '</div>';
            $res .= '</div>';
            $res .= '<div class="product-footer bg-light-blue text-center padding-25px-tb xs-padding-10px-tb">';
            $res .= '<a href="/product-detail/'.$product->slug.'" class="text-extra-dark-gray font-weight-500 d-inline-block" title="'.$product->title.'">'.substr($product->title, 0, 30).'</a>';
            $res .= '<div class="product-price text-medium">'.number_format($price).'</div>';
            $res .= '</div>';
            $res .= '</div>';
            $res .= '</li>';
        }
        return $res;
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
