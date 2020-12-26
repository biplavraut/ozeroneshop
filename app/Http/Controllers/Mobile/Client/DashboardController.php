<?php

namespace App\Http\Controllers\Mobile\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() 
    {
        return view('mobile.client.dashboard');
    }
}
