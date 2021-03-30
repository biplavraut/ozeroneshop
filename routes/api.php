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

    Route::apiResources(['featured'=> Backend\Admin\FeaturedController::class]);
    Route::post('orderFeatured', [App\Http\Controllers\Backend\Admin\FeaturedController::class, 'orderFeatured']);
    Route::get('findFeatured', [App\Http\Controllers\Backend\Admin\FeaturedController::class, 'search']);

    Route::apiResources(['shopsection'=> Backend\Admin\ShopSectionController::class]);
    Route::post('orderShopSectionList', [App\Http\Controllers\Backend\Admin\ShopSectionController::class, 'orderSection']);
    Route::get('findShopSection', [App\Http\Controllers\Backend\Admin\ShopSectionController::class, 'search']);

    Route::apiResources(['brand'=> Backend\Admin\BrandController::class]);
    Route::post('orderBrand', [App\Http\Controllers\Backend\Admin\BrandController::class, 'orderBrand']);
    Route::get('findBrand', [App\Http\Controllers\Backend\Admin\BrandController::class, 'search']);

    Route::apiResources(['electronics'=> Backend\Admin\ElectronicsController::class]);
    Route::post('orderElectronics', [App\Http\Controllers\Backend\Admin\ElectronicsController::class, 'orderElectronics']);
    Route::get('findElectronics', [App\Http\Controllers\Backend\Admin\ElectronicsController::class, 'search']);
    
    Route::apiResources(['product'=> Backend\Admin\ProductController::class]);
    Route::post('orderProduct', [App\Http\Controllers\Backend\Admin\ProductController::class, 'orderProducts']);
    Route::get('findProduct', [App\Http\Controllers\Backend\Admin\ProductController::class, 'search']);
    Route::apiResources(['product_storage'=> Backend\Admin\ProductStorageController::class]);
    Route::apiResources(['product_color'=> Backend\Admin\ProductColorController::class]);
    Route::apiResources(['product_image'=> Backend\Admin\ProductImageController::class]);
    Route::apiResources(['product_detail'=> Backend\Admin\ProductDetailController::class]);


    Route::apiResources(['blog'=> Backend\Admin\BlogController::class]);
    Route::post('orderBlog', [App\Http\Controllers\Backend\Admin\BlogController::class, 'orderBlog']);
    Route::get('findBlog', [App\Http\Controllers\Backend\Admin\BlogController::class, 'search']);
    
    Route::apiResources(['partner'=> Backend\Admin\PartnerController::class]);
    Route::post('orderPartner', [App\Http\Controllers\Backend\Admin\PartnerController::class, 'orderPartner']);
    Route::get('findPartner', [App\Http\Controllers\Backend\Admin\PartnerController::class, 'search']);

    Route::apiResources(['faq'=> Backend\Admin\FaqController::class]);
    Route::post('orderFaq', [App\Http\Controllers\Backend\Admin\FaqController::class, 'orderFaq']);
    Route::get('findFaq', [App\Http\Controllers\Backend\Admin\FaqController::class, 'search']);
    
    Route::apiResources(['customer'=> Backend\Admin\CustomerController::class]);
         
    // Route::get('customer-profile',[App\Http\Controllers\Backend\Admin\CustomerController::class, 'profile']);
    // Route::put('customer-profile',[App\Http\Controllers\Backend\Admin\CustomerController::class, 'updateProfile']);
    // Route::post('customer-updatePassword',[App\Http\Controllers\Backend\Admin\CustomerController::class, 'updatePassword']);
    // Route::get('findCustomer',[App\Http\Controllers\Backend\Admin\CustomerController::class, 'search']);

    Route::apiResources(['order'=> Backend\Admin\OrderController::class]);
    
    // Route::get('loadseodata', [App\Http\Controllers\Backend\Admin\SeoController::class, 'profile']);

});