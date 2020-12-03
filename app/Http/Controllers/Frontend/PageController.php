<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;


class PageController extends Controller
{
    public function index() 
    {
        return view('frontend.index');
    }
    public function mobile() 
    {
        return view('mobile.index');
    }
    public function shop() 
    {
        return view('mobile.products');
    }
    public function list()
    {
        return Slider::orderBy("order_item")->get();
    }
}
