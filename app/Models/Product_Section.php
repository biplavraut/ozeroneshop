<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id','section_id'
    ];
    public function getProductRelation(){
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    public function getSectionRelation(){
        return $this->hasOne('App\Models\Shopsection', 'id', 'section_id');
    }
}
