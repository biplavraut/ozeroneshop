<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electronics extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id','title','slug','image','icon','type','display','parent_id','child','order_item','excerpt','user_id'
    ];
    public function getSectionRelation(){
        return $this->hasOne('App\Models\Shopsection', 'id', 'section_id');
    }
}
