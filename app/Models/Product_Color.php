<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Color extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id','color','hex','image','available','quantity','ordered_item','sold_item'
    ];
    public function getProductRelation(){
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
