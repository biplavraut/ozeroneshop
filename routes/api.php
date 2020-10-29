<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/admin', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function() {
    
     Route::apiResources(['admin'=> Backend\Admin\AdminController::class]);
     
    // Route::get('profile',[App\Http\Controllers\Backend\Admin\AdminController::class, 'profile']);
    // Route::get('findUser',[App\Http\Controllers\Backend\Admin\AdminController::class, 'search']);
    // Route::put('profile',[App\Http\Controllers\Backend\Admin\AdminController::class, 'updateProfile']);
    // Route::post('updatePassword',[App\Http\Controllers\Backend\Admin\AdminController::class, 'updatePassword']);

    // Route::apiResources(['slider'=> Backend\Admin\SliderController::class]);
    // Route::get('findSlider', [App\Http\Controllers\Backend\Admin\SliderController::class, 'search']);
    // Route::post('orderSlider', [App\Http\Controllers\Backend\Admin\SliderController::class, 'orderSlider']);

    Route::apiResources(['seo'=> Backend\Admin\SeoController::class]);
    // Route::get('loadseodata', [App\Http\Controllers\Backend\Admin\SeoController::class, 'profile']);

});