<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer_Detail;
use App\Models\Shipping_Detail;
use App\Models\Order;
use App\Models\Order_Detail;
use Cart;

class OrderController extends Controller
{
    //
    public function order()
    {
        if(auth()->user()){
            $user = auth()->user();
            // Order Code generation
            $today = date("ymd");
            $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
            $order_code = $today . $rand;

            // Estimate Ship date
            $ship_date = date('Y-m-d h:i:s');
            $ship_date = strtotime($ship_date);
            $ship_date = strtotime("+3 day", $ship_date);
            $ship_date = date('Y-m-d h:i:s', $ship_date);
            $shipping_id = Shipping_Detail::where('customer_id', '=', $user->id)->first()->id;
            
            $add_order = Order::create([
                'shipping_id' => $shipping_id,
                'order_code' => $order_code,
                'user' => 1,
                'customer_id' => $user->id,
                'promo_code' => 'No Promo',
                'payment_type' => 'Cash On Delivery',
                'total_price' => Cart::total(),
                'ship_date' => $ship_date,
            ]);
            if($add_order){
                //return Cart::content();
                $order_id = $add_order->id;
                foreach(Cart::content() as $product){
                    $add_order_detail = Order_Detail::create([
                        'order_id' => $order_id,
                        'product_id' => $product->model->id,
                        'product_title' => $product->model->title,
                        'unit_price' => $product->price,
                        'discount' => $product->model->discount,
                        'quantity' => $product->qty,
                        'tax' => $product->tax,
                        'sub_total' => $product->subtotal,
                        'image' => $product->options->image,
                        'color' => $product->options->color,
                        'storage' => $product->options->storage,
                    ]);
                }
                if($add_order_detail){
                    Cart::destroy();
                    session()->flash('order_placed','Your Order has been placed.');
                    return redirect('/checkout');
                }else{
                    session()->flash('order_error','Oops! Something went wrong.');
                    return redirect('/checkout');
                }
            }
        }
        else{
            session()->flash('order_error','Oops! Something went wrong.');
            return redirect('/checkout');
        }
    }

    public function nologinorder(Request $request){
        // Order Code generation
        $today = date("ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $order_code = $today . $rand;

        // Estimate Ship date
        $ship_date = date('Y-m-d h:i:s');
        $ship_date = strtotime($ship_date);
        $ship_date = strtotime("+3 day", $ship_date);
        $ship_date = date('Y-m-d h:i:s', $ship_date);

        $add_customer = Customer_Detail::create([
            'name' => $request->cust_name,
            'email' => $request->cust_email,
            'primary_phone' => $request->cust_primary_phone,
            'address' => $request->cust_address
            
        ]);
        if($add_customer){
            $add_shipping = Shipping_Detail::create([
                'name' => $request->ship_name,
                'email' => $request->ship_email,
                'primary_phone' => $request->ship_primary_phone,
                'primary_phone' => $request->ship_secondary_phone,
                'address' => $request->ship_address
            ]);
        }
        $shipping_id = $add_shipping->id;
        $customer_id = $add_customer->id;
        
        $add_order = Order::create([
            'shipping_id' => $shipping_id,
            'order_code' => $order_code,
            'customer_id' => $customer_id,
            'promo_code' => 'No Promo',
            'payment_type' => 'Cash On Delivery',
            'total_price' => Cart::total(),
            'ship_date' => $ship_date,
        ]);
        if($add_order){
            //return Cart::content();
            $order_id = $add_order->id;
            foreach(Cart::content() as $product){
                $add_order_detail = Order_Detail::create([
                    'order_id' => $order_id,
                    'product_id' => $product->model->id,
                    'product_title' => $product->model->title,
                    'unit_price' => $product->price,
                    'discount' => $product->model->discount,
                    'quantity' => $product->qty,
                    'tax' => $product->tax,
                    'sub_total' => $product->subtotal,
                    'image' => $product->options->image,
                    'color' => $product->options->color,
                    'storage' => $product->options->storage,
                ]);
            }
            if($add_order_detail){
                $update = Shipping_Detail::where('id', $shipping_id)->update([
                    'order_id' => $add_order->id                    
                ]);
                Cart::destroy();
                session()->flash('order_placed','Your Order has been placed.');
                return redirect('/checkout');
            }else{
                session()->flash('order_error','Oops! Something went wrong.');
                return redirect('/checkout');
            }
        }

    }
}
