<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer_Detail;
use App\Models\Order;
use App\Models\Shipping_Detail;
use App\Models\Wishlist;

class AccountController extends Controller
{
    public function accountdetail() 
    {
        $user =  auth()->user();
        //return Customer_Detail::where('customer_id', '=', $user->id)->get();
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
                    $customer = Customer_Detail::where('customer_id', '=', $user->id)->firstorfail();
                    return view('mobile.client.accountdetail' , 
                    [
                        'customer' => $customer
                    ]);
                }else{
                    return view('mobile.client.dashboard' , 
                    [
                        'result'=>'error', 'message' =>'Something went wrong.'        
                    ]);
                }
            }else{
                return view('mobile.client.dashboard' , 
                [
                    'result'=>'error', 'message' =>'Something went wrong.'        
                ]);
            }
        }else{
            $customer = Customer_Detail::where('customer_id', '=', $user->id)->firstorfail();
            return view('mobile.client.accountdetail' , 
            [
                'customer' => $customer
            ]);
        }        
    }

    public function accountupdate(Request $request) 
    {
        $user =  auth()->user();
        $update = Customer_Detail::where('customer_id', $user->id)->update([
            'name' => $request->name,
            'primary_phone' => $request->primary_phone,
            'secondary_phone' => $request->secondary_phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address
        ]);
        if($update){
            $shipping_address = Shipping_Detail::where('customer_id', '=', $user->id)->first();
            if($shipping_address->primary_phone == null && $shipping_address->address == null){
                $update = Shipping_Detail::where('customer_id', $user->id)->update([
                    'primary_phone' => $request->primary_phone,
                    'secondary_phone' => $request->secondary_phone,
                    'primary' => 1,
                    'address' => $request->address
                ]);
            }
            session()->flash('success_message','Your Account has been Updated.');
            return redirect('/accountdetail');
            
        }else{
            session()->flash('error_message','Oops! Something went wrong.');
            return redirect('/accountdetail');
        }
    }

    public function shippingdetail(Request $request) 
    {
        $user =  auth()->user();
        $shipping = Shipping_Detail::where('customer_id', '=', $user->id)->firstorfail();
        return view('mobile.client.add-edit-shipping-address' , 
        [
            'shipping' => $shipping
        ]);
    }
    
    public function updateshipping(Request $request) 
    {
        $user =  auth()->user();
        $update = Shipping_Detail::where('customer_id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'primary_phone' => $request->primary_phone,
            'secondary_phone' => $request->secondary_phone,
            'primary' => 1,
            'address' => $request->address
        ]);
        if($update){
            session()->flash('success_message','Shipping address has been Updated.');
            return redirect('/shippingdetail');
        }else{
            session()->flash('error_message','Oops! Something went wrong.');
            return redirect('/shippingdetail');
        }
    }
    public function addwishlist(Request $request) 
    {
        $user =  auth()->user();
        //return Customer_Detail::where('customer_id', '=', $user->id)->get();
        if(Wishlist::where('customer_id', '=', $user->id)->where('product_id', '=', $request->id)->first() == null){
            $add = Wishlist::create([
                'customer_id' => $user->id,
                'product_id' => $request->id,
                'price' => $request->price,
            ]);
            if($add){
                return response()->json(['message' => 'wishlist_added']);
            }else{
                return response()->json(['message' => 'wishlist_error']);
            }

        }else{
            return response()->json(['message' => 'wishlist_exist']);
        }
    }
    
}
