<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id','title','slug','display','excerpt'
    ];
    public function getProductRelation(){
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}