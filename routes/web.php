<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;




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
    return view('welcome');
});

Route::get('register', function () {
    return view('register');
});
Route::get('dashboard', function () {
    return view('user.dashboard')->name('dashboard');
});
Route::get('admin', function () {
    return view('/admin/dashboard')->name('dashboard');
});
Route::get('login', function () {
    return view('Login');
});

Route::post('register',[AuthenticationController::class,'register'])->name('register');
Route::post('login',[AuthenticationController::class,'login'])->name('login');
Route::get('logout',[AuthenticationController::class,'logout'])->name('logout');
Route::resource('pages', PageController::class);
Route::resource('category', CategoryController::class);

Route::group(['middleware' => ['role.redirect']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});