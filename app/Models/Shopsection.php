<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopsection extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','slug','image','icon','type','display','child','order_item','excerpt'
    ];
    public function getElectronicsRelation(){
        return $this->hasMany('App\Models\Electronics', 'section_id', 'id');
    }
}
