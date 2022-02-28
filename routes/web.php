<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Test;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CartController;

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

Route::get('/', function () {
    return view('content.main');
})->name('main');

Route::get('/menu', [ProductController::class, 'index'])->name('menu');

Route::get('/contact', [UserController::class, 'index'])->name('contact');

Route::put('/contact/send', [UserController::class, 'sendMail'])->name('sendMail');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product');


Route::resource('cart', CartController::class);

Route::get('/create-product', [ProductController::class, 'load_type'])->name('create-product');

Route::put('/create-product/submit', [ProductController::class, 'create'])->name('createsubmit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});

 Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

 Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

