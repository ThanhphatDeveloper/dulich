<?php

use App\Http\Controllers\TourController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookTourController;
use App\Http\Controllers\LoaiTourController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DiaDiemController;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\ThanhToanController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\ImageTourController;
use App\Http\Controllers\TourLienQuanController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\CustomerHomepageController;
use App\Http\Controllers\CustomerBlogController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Models\Tour;
use App\Models\ImageTour;

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
    Route::resource('/admin/tourlienquans', TourLienQuanController::class);
    Route::resource('/admin/blogs', BlogController::class);
    Route::resource('/admin/khachhangs', KhachHangController::class);
    Route::resource('/admin/statistic', StatisticController::class);

    Route::post('/admin/image', 'App\Http\Controllers\ImageTourController@update_image')->name('update_image');
    Route::get('/admin/donhangdaduyets', 'App\Http\Controllers\DonHangController@index_da_duyet')->name('da_duyet');
    Route::get('/admin/chitietdaduyet', 'App\Http\Controllers\DonHangController@show_da_duyet')->name('show_da_duyet');
    Route::get('/admin/chitietkhongduyet', 'App\Http\Controllers\DonHangController@show_khong_duyet')->name('show_khong_duyet');
    Route::get('/admin/donhangkhongduyets', 'App\Http\Controllers\DonHangController@index_khong_duyet')->name('khong_duyet');
    Route::put('/admin/updatestatus_loaitour', 'App\Http\Controllers\LoaiTourController@update_trangthai')->name('updatestatus_loaitour');
    Route::put('/admin/tours', 'App\Http\Controllers\TourController@update_trangthai')->name('updatestatus_tour');

    Route::post('/admin/statistic', 'App\Http\Controllers\StatisticController@index_date')->name('index_date');

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

Route::resource('/customer_blogs', CustomerBlogController::class);

Route::get('/admin/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'authenticate'])->name('login');

Route::get('/admin', function () {
    return view('login.login');
});

Route::resource('/', CustomerHomepageController::class);
Route::resource('/customer_tours', BookTourController::class);
// Route::get('/customer_tours', 'App\Http\Controllers\TourController@index_customer')->name('index_customer');

// Route::get('/tour_detail', 'App\Http\Controllers\TourController@show_customer')->name('tour_detail');

Route::get('/customer_tour_detail', function () {
    $lst = Tour::all();
    $lst_img=ImageTour::all();
    return view('customer.tour-detail-test', ['lst' => $lst, 'lst_img' => $lst_img]);
});

Route::post('/momo_payment_qr', [PaymentController::class, 'momo_payment_qr']);
Route::post('/vnpay_payment', [PaymentController::class, 'vnpay_payment']);

Route::get('/test', function () {
    return view('test');
});

// Route::get('/ckdata', function () {
//     return view('ckdata');
// });

Route::resource('/ckdata', CkeditorController::class);