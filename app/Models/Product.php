<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'sku',
        'model',
        'display',
        'featured',
        'order_item',
        'price',
        'discount',
        'total_quantity',
        'brand',
        'brand_id',
        'sub_brand',
        'sub_brand_id',
        'shop_category',
        'screen_detail',
        'operating_system',
        'main_camera',
        'selfie_camera',
        'sensor',
        'battery',
        'excerpt',
        'specs',
        'meta_keywords',
        'meta_tags',
        'meta_categories'
    ];
    public function getStorageRelation(){
        return $this->hasMany('App\Models\Product_Storage', 'product_id', 'id');
    }
    public function getColorRelation(){
        return $this->hasMany('App\Models\Product_Color', 'product_id', 'id');
    }
    public function getDetailRelation(){
        return $this->hasMany('App\Models\Product_Detail', 'product_id', 'id');
    }
    public function getImageRelation(){
        return $this->hasMany('App\Models\Product_Image', 'product_id', 'id');
    }
}
