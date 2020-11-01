<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','slug','image','author','date','display','order_item','meta_keywords','meta_tags','meta_categories','excerpt'
    ];
}
