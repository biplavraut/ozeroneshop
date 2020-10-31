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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function() {
    
    Route::apiResources(['admin'=> Backend\Admin\AdminController::class]);
    Route::apiResources(['seo'=> Backend\Admin\SeoController::class]);
     
    Route::get('profile',[App\Http\Controllers\Backend\Admin\AdminController::class, 'profile']);
    Route::put('profile',[App\Http\Controllers\Backend\Admin\AdminController::class, 'updateProfile']);
    Route::post('updatePassword',[App\Http\Controllers\Backend\Admin\AdminController::class, 'updatePassword']);
    Route::get('findAdmin',[App\Http\Controllers\Backend\Admin\AdminController::class, 'search']);

    Route::apiResources(['slider'=> Backend\Admin\SliderController::class]);
    Route::post('orderSlider', [App\Http\Controllers\Backend\Admin\SliderController::class, 'orderSlider']);
    Route::get('findSlider', [App\Http\Controllers\Backend\Admin\SliderController::class, 'search']);

    Route::apiResources(['shopsection'=> Backend\Admin\ShopSectionController::class]);
    Route::post('orderShopSectionList', [App\Http\Controllers\Backend\Admin\ShopSectionController::class, 'orderSection']);
    Route::get('findShopSection', [App\Http\Controllers\Backend\Admin\ShopSectionController::class, 'search']);

    Route::apiResources(['brand'=> Backend\Admin\BrandController::class]);
    Route::post('orderBrand', [App\Http\Controllers\Backend\Admin\BrandController::class, 'orderBrand']);
    Route::get('findBrand', [App\Http\Controllers\Backend\Admin\BrandController::class, 'search']);
    

    
    // Route::get('loadseodata', [App\Http\Controllers\Backend\Admin\SeoController::class, 'profile']);

});