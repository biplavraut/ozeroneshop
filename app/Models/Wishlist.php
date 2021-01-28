<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id','product_id','price','delete','listed_date'
    ];
    public function getProductRelation(){
        return $this->hasMany('App\Models\Product', 'id', 'product_id');
    }
    public function getStorageRelation(){
        return $this->hasMany('App\Models\Product_Storage', 'product_id', 'product_id');
    }
    public function getColorRelation(){
        return $this->hasMany('App\Models\Product_Color', 'product_id', 'product_id');
    }
    public function getDetailRelation(){
        return $this->hasMany('App\Models\Product_Detail', 'product_id', 'product_id');
    }
    public function getImageRelation(){
        return $this->hasMany('App\Models\Product_Image', 'product_id', 'product_id');
    }
}
