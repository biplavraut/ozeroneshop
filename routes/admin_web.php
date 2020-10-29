<?php

use Illuminate\Support\Facades\Route;


// Route::get('/admin', function () {

//     // Auth
//     Route::get('admin/login', [App\Http\Controllers\Backend\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
//     Route::post('admin/login', [App\Http\Controllers\Backend\Admin\Auth\LoginController::class, 'login'])->name('login');

//     Route::middleware(['auth:admin'])->group(function () {
//         Route::post('/logout', [App\Http\Controllers\Backend\Admin\Auth\LoginController::class, 'logout'])->name('logout');
//         Route::get('/', function () {
//             return view('backend.master');
//         });
//     });

// });

Route::name('admin.')
    ->prefix(config('app.prefix_admin_url') . '/admin')
    ->namespace('Backend\Admin')
    ->group(function () {
        // Auth
    Route::get('/login', [App\Http\Controllers\Backend\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Backend\Admin\Auth\LoginController::class, 'login'])->name('login');

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/logout', [App\Http\Controllers\Backend\Admin\Auth\LoginController::class, 'logout'])->name('logout');
        Route::get('/',[App\Http\Controllers\Backend\Admin\IndexController::class, 'index'])->name('index');
        Route::get('{path}',[App\Http\Controllers\Backend\Admin\IndexController::class, 'index'])->name('index')->where('path','([A-z\/_.\d-]+)?');
    });

});