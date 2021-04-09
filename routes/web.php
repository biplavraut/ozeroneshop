<?php

use Illuminate\Support\Facades\Route;
use App\Mail\OrderPlaced;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::namespace('Frontend\Client')->group(function() {
        Route::get('/login', [App\Http\Controllers\Frontend\Client\Auth\LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [App\Http\Controllers\Frontend\Client\Auth\LoginController::class, 'login'])->name('login');
        Route::get('/register', [App\Http\Controllers\Frontend\Client\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [App\Http\Controllers\Frontend\Client\Auth\RegisterController::class, 'register'])->name('register');
        Auth::routes();
    
        Route::middleware(['auth'])->group(function () {
            Route::post('/logout', [App\Http\Controllers\Frontend\Client\Auth\LoginController::class, 'logout'])->name('logout');
            Route::get('/dashboard', [App\Http\Controllers\Frontend\Client\DashboardController::class, 'index'])->name('dashboard');
            Route::get('/accountdetail', [App\Http\Controllers\Frontend\AccountController::class, 'accountdetail']);
            Route::post('/accountupdate', [App\Http\Controllers\Frontend\AccountController::class, 'accountupdate']);
            Route::get('/shippingdetail', [App\Http\Controllers\Frontend\AccountController::class, 'shippingdetail']);
            Route::post('/updateshipping', [App\Http\Controllers\Frontend\AccountController::class, 'updateshipping']);
            Route::post('addwishlist', [App\Http\Controllers\Frontend\AccountController::class, 'addwishlist'])->name('addwishlist.post');
        });
    });
    
    // Google login
    Route::get('login/google', [App\Http\Controllers\Frontend\Client\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [App\Http\Controllers\Frontend\Client\Auth\LoginController::class, 'handleGoogleCallback']);

    // Facebook Login
    Route::get('login/facebook', [App\Http\Controllers\Frontend\Client\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('login/facebook/callback', [App\Http\Controllers\Frontend\Client\Auth\LoginController::class, 'handleFacebookCallback']);


    // No Auth Need
    
    Route::namespace('Frontend')->group(function() {
        Route::get('/', [App\Http\Controllers\Frontend\PageController::class, 'desktop']);
        Route::get('/home', [App\Http\Controllers\Frontend\PageController::class, 'desktop']);
        Route::get('/brand/{slug}', [App\Http\Controllers\Frontend\PageController::class, 'brandProducts'])->name('brand.products');
        Route::get('/products/{slug}', [App\Http\Controllers\Frontend\PageController::class, 'products']);
        Route::get('/product-detail/{slug}', [App\Http\Controllers\Frontend\PageController::class, 'productDetail']);

        Route::get('/blog-news', [App\Http\Controllers\Frontend\PageController::class, 'blogNews']);
        Route::get('/faqs', [App\Http\Controllers\Frontend\PageController::class, 'faqs']);
        Route::get('/about', [App\Http\Controllers\Frontend\PageController::class, 'about']);
        Route::get('/contact', [App\Http\Controllers\Frontend\PageController::class, 'contact']);
        Route::get('/terms-of-service', [App\Http\Controllers\Frontend\PageController::class, 'terms']);
        Route::get('/privacy-policy', [App\Http\Controllers\Frontend\PageController::class, 'privacy']);
        
        Route::get('/cart', [App\Http\Controllers\Frontend\PageController::class, 'cart']);
        Route::get('/checkout', [App\Http\Controllers\Frontend\PageController::class, 'checkout']);
        Route::post('/order', [App\Http\Controllers\Frontend\OrderController::class, 'order']);
        Route::post('/nologinorder', [App\Http\Controllers\Frontend\OrderController::class, 'nologinorder']);
        Route::get('/order-placed', [App\Http\Controllers\Frontend\PageController::class, 'orderplaced']);
        Route::get('/order-failed', [App\Http\Controllers\Frontend\PageController::class, 'orderfailed']);
        Route::get('/order-detail/{order_code}', [App\Http\Controllers\Frontend\OrderController::class, 'orderDetail']);

        Route::post('cartstore', [App\Http\Controllers\Frontend\PageController::class, 'cartstore'])->name('cartstore.post');
        Route::post('increasequantity', [App\Http\Controllers\Frontend\PageController::class, 'increaseQuantity'])->name('increasequantity.post');
        Route::post('decreasequantity', [App\Http\Controllers\Frontend\PageController::class, 'decreaseQuantity'])->name('decreasequantity.post');
        Route::post('removecartproduct', [App\Http\Controllers\Frontend\PageController::class, 'removeCartProduct'])->name('removecartproduct.post');
        Route::get('destroycart', [App\Http\Controllers\Frontend\PageController::class, 'destroyCart'])->name('destroycart.get');

        Route::post('searching', [App\Http\Controllers\Frontend\PageController::class, 'searching'])->name('search.post');
        Route::get('search', [App\Http\Controllers\Frontend\PageController::class, 'search'])->name('search.get');
        Route::post('filter', [App\Http\Controllers\Frontend\PageController::class, 'filter'])->name('filter.post');
    });
Route::namespace('Frontend')->group(function() {
    Route::get('front-slider',[App\Http\Controllers\Frontend\PageController::class, 'list']);
});