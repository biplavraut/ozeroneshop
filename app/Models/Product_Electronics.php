<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Electronics extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id','electronic_id'
    ];
    public function getProductRelation(){
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    public function getElectronicsRelation(){
        return $this->hasOne('App\Models\Electronics', 'id', 'electronic_id');
    }
}
