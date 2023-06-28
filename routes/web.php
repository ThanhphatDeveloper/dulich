<?php

use App\Http\Controllers\TourController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookTourController;
use App\Http\Controllers\LoaiTourController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DiaDiemController;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\ThanhToanController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\ImageTourController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\CustomerHomepageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function(){
    Route::resource('/admin/users', UserController::class);
    
    Route::resource('/admin/tours', TourController::class);
    Route::resource('/admin/loaitours', LoaiTourController::class);
    Route::resource('/admin/diadiems', DiaDiemController::class);
    Route::resource('/admin/khuyenmais', KhuyenMaiController::class);
    Route::resource('/admin/nhacungcaps', NhaCungCapController::class);
    Route::resource('/admin/thanhtoans', ThanhToanController::class);
    Route::resource('/admin/donhangs', DonHangController::class);
    Route::resource('/admin/imagetours', ImageTourController::class);
    Route::resource('/admin/blogs', BlogController::class);

    Route::post('/admin/image', 'App\Http\Controllers\ImageTourController@update_image')->name('update_image');

    Route::get('/admin/home', function () {
        return view('home.home');
    });
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('admin')->middleware('can:isAdmin')->group(function(){
        Route::get('dashboard', function(){
            return view('admin.dashboard');
        })->name('dashboard');
    });
});

Route::get('/admin/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'authenticate'])->name('login');

Route::get('/admin', function () {
    return view('login.login');
});

Route::resource('/', CustomerHomepageController::class);
Route::resource('/customer_tours', BookTourController::class);

Route::get('/test', function () {
    return view('test');
});

// Route::get('/ckdata', function () {
//     return view('ckdata');
// });

Route::resource('/ckdata', CkeditorController::class);