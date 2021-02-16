<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'shipping_id','order_code','delivered','user','customer_id','promo_code','payment_type','payment_verified','discount','shipping_cost','vat','service_charge','total_price','order_date','ship_date','transaction_status','deleted'
    ];
    public function getOrderDetail(){
        return $this->hasMany('App\Models\Order_Detail', 'order_id', 'id');
    }
    public function getCustomerDetail(){
        return $this->hasOne('App\Models\Customer_Detail', 'id', 'customer_id');
    }
    public function getShippingDetail(){
        return $this->hasOne('App\Models\Shipping_Detail', 'id', 'shipping_id');
    }
}
