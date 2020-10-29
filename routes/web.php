<?php

//use Illuminate\Support\Facades\Route;

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
    Auth::routes();

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Frontend\Client\DashboardController::class, 'index'])->name('dashboard');
    });
});


// No Auth Need

Route::namespace('Frontend')->group(function() {
    Route::get('/', [App\Http\Controllers\Frontend\PageController::class, 'index']);
});