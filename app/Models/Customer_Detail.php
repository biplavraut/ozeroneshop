<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id','name','email','primary_phone','secondary_phone','gender','dob','region','city','area','address','label'
    ];
}
