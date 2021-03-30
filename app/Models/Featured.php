<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','slug','price','sub_title','sub_title_color','image','display','order_item','link', 'excerpt'
    ];
}
