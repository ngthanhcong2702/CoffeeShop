<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Test;


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

Route::get('/today', function () {
    return view('content.today');
})->name('today');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product');

Route::get('/test', [Test::class, 'test'])->name('test');

Route::get('/order', function () {
    return view('content.order');
})->name('order');

Route::get('/signin', function () {
    return view('login.signIn');
})->name('signin');

Route::get('/signup', function () {
    return view('login.signUp');
})->name('signup');


Route::put('/signup/send', [CustomerController::class, 'SignUp'])->name('signupsubmit');
Route::put('/signin/send', [CustomerController::class, 'SignIn'])->name('signinsubmit');
Route::get('/logout', [CustomerController::class, 'LogOut'])->name('logoutsubmit');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


