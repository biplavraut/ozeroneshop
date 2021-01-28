<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id','product_id','product_title','unit_price','discount','quantity','tax','sub_total','shipping_price','image','color','storage','order_date','updated','updated_date','remove','product_status'
    ];
}
