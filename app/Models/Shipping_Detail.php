<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id','order_id','name','email','primary_phone','secondary_phone','primary','region','city','area','address','label'
    ];
}
