<?php

use Illuminate\Support\Facades\Route;
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
function isMobile() {
    if(isset($_SERVER['HTTP_USER_AGENT'])) {
    $useragent=$_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/(tablet|ipad|amazon|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($useragent))) {
        return true ;
    } ;

    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
            return true ;
        }
    }
    return 0 ;
}
if(isMobile()) {
    Route::namespace('Mobile\Client')->group(function() {
        Route::get('/login', [App\Http\Controllers\Mobile\Client\Auth\LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [App\Http\Controllers\Mobile\Client\Auth\LoginController::class, 'login'])->name('login');
        Route::get('/register', [App\Http\Controllers\Mobile\Client\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [App\Http\Controllers\Mobile\Client\Auth\RegisterController::class, 'register'])->name('register');
        Auth::routes();
        // Route::get('/password/request', [App\Http\Controllers\Mobile\Client\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('forget-password');
        // Route::get('/password/reset', [App\Http\Controllers\Mobile\Client\Auth\ResetPasswordController::class, 'showResetForm'])->name('reset');
        // Route::post('/password/reset', [App\Http\Controllers\Mobile\Client\Auth\ResetPasswordController::class, 'reset'])->name('reset');
    
    
        Route::middleware(['auth'])->group(function () {
            Route::post('/logout', [App\Http\Controllers\Mobile\Client\Auth\LoginController::class, 'logout'])->name('logout');
            Route::get('/dashboard', [App\Http\Controllers\Mobile\Client\DashboardController::class, 'index'])->name('dashboard');
            Route::get('/accountdetail', [App\Http\Controllers\Mobile\AccountController::class, 'accountdetail']);
            Route::post('/accountupdate', [App\Http\Controllers\Mobile\AccountController::class, 'accountupdate']);
            Route::get('/shippingdetail', [App\Http\Controllers\Mobile\AccountController::class, 'shippingdetail']);
            Route::post('/updateshipping', [App\Http\Controllers\Mobile\AccountController::class, 'updateshipping']);
            Route::post('addwishlist', [App\Http\Controllers\Mobile\AccountController::class, 'addwishlist'])->name('addwishlist.post');
        });
    });  
    
    // Google login
    Route::get('login/google', [App\Http\Controllers\Mobile\Client\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [App\Http\Controllers\Mobile\Client\Auth\LoginController::class, 'handleGoogleCallback']);

    // Facebook Login
    Route::get('login/facebook', [App\Http\Controllers\Mobile\Client\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('login/facebook/callback', [App\Http\Controllers\Mobile\Client\Auth\LoginController::class, 'handleFacebookCallback']);

    // No Auth Need
    
    Route::namespace('Mobile')->group(function() {
        Route::get('/', [App\Http\Controllers\Mobile\PageController::class, 'mobile']);
        Route::get('/home', [App\Http\Controllers\Mobile\PageController::class, 'mobile']);
        Route::get('/brand/{slug}', [App\Http\Controllers\Mobile\PageController::class, 'brandProducts'])->name('brand.products');
        Route::get('/products/{slug}', [App\Http\Controllers\Mobile\PageController::class, 'products']);
        Route::get('/product-detail/{slug}', [App\Http\Controllers\Mobile\PageController::class, 'productDetail']);

        Route::get('/blog-news', [App\Http\Controllers\Mobile\PageController::class, 'blogNews']);
        Route::get('/faqs', [App\Http\Controllers\Mobile\PageController::class, 'faqs']);
        Route::get('/about', [App\Http\Controllers\Mobile\PageController::class, 'about']);
        Route::get('/contact', [App\Http\Controllers\Mobile\PageController::class, 'contact']);        
        Route::get('/terms-of-service', [App\Http\Controllers\Mobile\PageController::class, 'terms']);
        Route::get('/cart', [App\Http\Controllers\Mobile\PageController::class, 'cart']);
        Route::get('/checkout', [App\Http\Controllers\Mobile\PageController::class, 'checkout']);
        Route::get('/order', [App\Http\Controllers\Mobile\OrderController::class, 'order']);
        Route::post('/nologinorder', [App\Http\Controllers\Mobile\OrderController::class, 'nologinorder']);
        
        Route::post('cartstore', [App\Http\Controllers\Mobile\PageController::class, 'cartstore'])->name('cartstore.post');
        Route::post('increasequantity', [App\Http\Controllers\Mobile\PageController::class, 'increaseQuantity'])->name('increasequantity.post');
        Route::post('decreasequantity', [App\Http\Controllers\Mobile\PageController::class, 'decreaseQuantity'])->name('decreasequantity.post');
        Route::post('removecartproduct', [App\Http\Controllers\Mobile\PageController::class, 'removeCartProduct'])->name('removecartproduct.post');

        Route::post('search', [App\Http\Controllers\Mobile\PageController::class, 'search'])->name('search.post');
        
    });

} else {
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
        Route::get('/order', [App\Http\Controllers\Frontend\OrderController::class, 'order']);
        Route::post('/nologinorder', [App\Http\Controllers\Frontend\OrderController::class, 'nologinorder']);
        Route::get('/order-placed', [App\Http\Controllers\Frontend\PageController::class, 'orderplaced']);
        Route::get('/order-failed', [App\Http\Controllers\Frontend\PageController::class, 'orderfailed']);
        
        Route::post('cartstore', [App\Http\Controllers\Frontend\PageController::class, 'cartstore'])->name('cartstore.post');
        Route::post('increasequantity', [App\Http\Controllers\Frontend\PageController::class, 'increaseQuantity'])->name('increasequantity.post');
        Route::post('decreasequantity', [App\Http\Controllers\Frontend\PageController::class, 'decreaseQuantity'])->name('decreasequantity.post');
        Route::post('removecartproduct', [App\Http\Controllers\Frontend\PageController::class, 'removeCartProduct'])->name('removecartproduct.post');
        Route::get('destroycart', [App\Http\Controllers\Frontend\PageController::class, 'destroyCart'])->name('destroycart.get');

        Route::post('searching', [App\Http\Controllers\Frontend\PageController::class, 'searching'])->name('search.post');
        Route::get('search', [App\Http\Controllers\Frontend\PageController::class, 'search'])->name('search.get');
        Route::post('filter', [App\Http\Controllers\Frontend\PageController::class, 'filter'])->name('filter.post');
    });
}
Route::namespace('Frontend')->group(function() {
    Route::get('front-slider',[App\Http\Controllers\Frontend\PageController::class, 'list']);
});