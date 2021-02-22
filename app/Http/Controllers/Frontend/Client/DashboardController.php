<?php

namespace App\Http\Controllers\Frontend\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer_Detail;
use App\Models\Shipping_Detail;
use App\Models\Wishlist;

class DashboardController extends Controller
{
    public function index() 
    {
        $user =  auth()->user();
        if(Customer_Detail::where('customer_id', '=', $user->id)->first() == null){
            $add = Customer_Detail::create([
                'customer_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]);
            if($add){
                if(Shipping_Detail::where('customer_id', '=', $user->id)->first() == null){
                    $add = Shipping_Detail::create([
                        'customer_id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                    ]);
                }
                if($add){
                    $wishlists = Wishlist::where('customer_id', '=', $user->id)->get();
                    $shipping = Shipping_Detail::where('customer_id', '=', $user->id)->firstorfail();
                    $customer = Customer_Detail::where('customer_id', '=', $user->id)->firstorfail();
                    return view('frontend.client.dashboard' , 
                    [
                        'customer' => $customer ,
                        'shipping' => $shipping,
                        'wishlists' => $wishlists         
                    ]);
                }else{
                    return view('frontend.client.home' , 
                    [
                        'result'=>'error', 'message' =>'Something went wrong.'        
                    ]);
                }
            }else{
                return view('frontend.client.home' , 
                [
                    'result'=>'error', 'message' =>'Something went wrong.'        
                ]);
            }
        }else{
            $wishlists = Wishlist::where('customer_id', '=', $user->id)->with('getProductRelation')->with('getStorageRelation')->with('getColorRelation')->with('getImageRelation')->with('getDetailRelation')->orderBy("listed_date", 'desc')->get();
            // return count($wishlists);
            $shipping = Shipping_Detail::where('customer_id', '=', $user->id)->firstorfail();
            $customer = Customer_Detail::where('customer_id', '=', $user->id)->firstorfail();
            return view('frontend.client.dashboard' , 
            [
                'customer' => $customer ,
                'shipping' => $shipping,
                'wishlists' => $wishlists           
            ]);
        }
    }
}
