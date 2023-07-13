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
use App\Http\Controllers\CustomerBlogController;
use App\Http\Controllers\CustomerHomepageController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\PaymentController;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\KhuyenMai;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Models\Tour;
use App\Models\ImageTour;
use Illuminate\Support\Facades\Session;

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

Route::get('/customer_tour_detail', function () {
    return view('customer.tour-detail');
});

Route::get('/tour/{tentour}', 'App\Http\Controllers\BookTourController@show_tour')->name('show_tour');

Route::post('/momo_payment_qr', [PaymentController::class, 'momo_payment_qr']);
Route::post('/vnpay_payment', [PaymentController::class, 'vnpay_payment']);
Route::post('/momo_payment', [PaymentController::class, 'momo_payment']);

Route::get('/test', function () {
    return view('test');
});

Route::get('/policy', function () {
    return view('customer.policy');
});

Route::get('/payment', function () {
    return view('customer.payment');
});

Route::get('/contact', function () {
    return view('customer.contact');
});

// Route::get('/ckdata', function () {
//     return view('ckdata');
// });

Route::resource('/abc', CkeditorController::class);

Route::get('/thanhtoan', 
function () {

    $phuongthuc = Session::get('dulieu')[0]['a'];
    $ten = Session::get('dulieu')[0]['ten'];
    $email = Session::get('dulieu')[0]['email'];
    $sdt = Session::get('dulieu')[0]['sdt'];
    $sokhach = Session::get('dulieu')[0]['sokhach'];
    $gioitinh = Session::get('dulieu')[0]['gioitinh'];
    $tour_id = Session::get('dulieu')[0]['tour_id'];
    $km_id = Session::get('dulieu')[0]['km_id'];
    $money = Session::get('dulieu')[0]['money'];
    $giagoc = Session::get('dulieu')[0]['giagoc'];
    $thoigiankhoihanh = Session::get('dulieu')[0]['thoigiankhoihanh'];
    //dd($phuongthuc);

    if($phuongthuc == 1){
    
        if($_GET['resultCode'] != 0){
            return view('customer.thanhtoan-thatbai');
        }
        else{
            $km = KhuyenMai::where('id', $km_id)->first();
            KhuyenMai::where('id', $km_id)->where('id', '!=' , 1)->update(
                [
                    'hansudung'=>$km->hansudung-1
                ]
            );
            $id_kh = 0;
            if(KhachHang::where('sdt', $sdt)->exists()){
                KhachHang::where('sdt', $sdt)->update(
                    [
                        'hoten'=>$ten,
                        'email'=>$email,
                        'gioitinh'=>$gioitinh,
                    ]
                );
                $kh = KhachHang::where('sdt', $sdt)->first();
                $id_kh = $kh->id;
            }else{
                $k = KhachHang::create(
                    [
                        'hoten'=>$ten,
                        'email'=>$email,
                        'sdt'=>$sdt,
                        'gioitinh'=>$gioitinh,
                    ]
                );
                $k->save();
                $id_kh = $k->id;
            }

            $d = DonHang::create(
                [
                    'ten'=>$ten,
                    'email'=>$email,
                    'sdt'=>$sdt,
                    'thoigiankhoihanh'=>$thoigiankhoihanh,
                    'sokhach'=>$sokhach,
                    'ngaydat'=>Carbon::now()->toDateTimeString(),
                    'tongtien'=>$giagoc,
                    'khuyen_mai_id'=>$km_id,
                    'tour_id'=>$tour_id,
                    'tenphuongthuctt'=>'momo',
                    'tienthanhtoan'=>$money,
                    'mathanhtoan'=>$_GET['orderId'],
                    'thoigianthanhtoan'=>Carbon::now()->toDateTimeString(),
                    'khach_hang_id'=>$id_kh,
                    'trangthai'=>0,
                ]
            );
            
            $d->save();

            $tentour = Tour::where('id', $tour_id)->first();
            $km = KhuyenMai::where('id', $km_id)->first();

            return view('customer.thanhtoan-thanhcong');
        }

    }
    else{
        if($_GET['vnp_ResponseCode'] != 0){
            return view('customer.thanhtoan-thatbai');
        }
        else{
            $km = KhuyenMai::where('id', $km_id)->first();
            KhuyenMai::where('id', $km_id)->where('id', '!=' , 1)->update(
                [
                    'hansudung'=>$km->hansudung-1
                ]
            );
            $id_kh = 0;
            if(KhachHang::where('sdt', $sdt)->exists()){
                KhachHang::where('sdt', $sdt)->update(
                    [
                        'hoten'=>$ten,
                        'email'=>$email,
                        'gioitinh'=>$gioitinh,
                    ]
                );
                $kh = KhachHang::where('sdt', $sdt)->first();
                $id_kh = $kh->id;
            }else{
                $k = KhachHang::create(
                    [
                        'hoten'=>$ten,
                        'email'=>$email,
                        'sdt'=>$sdt,
                        'gioitinh'=>$gioitinh,
                    ]
                );
                $k->save();
                $id_kh = $k->id;
            }

            $d = DonHang::create(
                [
                    'ten'=>$ten,
                    'email'=>$email,
                    'sdt'=>$sdt,
                    'thoigiankhoihanh'=>$thoigiankhoihanh,
                    'sokhach'=>$sokhach,
                    'ngaydat'=>Carbon::now()->toDateTimeString(),
                    'tongtien'=>$giagoc,
                    'khuyen_mai_id'=>$km_id,
                    'tour_id'=>$tour_id,
                    'tenphuongthuctt'=>'vnpay',
                    'tienthanhtoan'=>$money,
                    'mathanhtoan'=>$_GET['vnp_BankTranNo'],
                    'thoigianthanhtoan'=>Carbon::now()->toDateTimeString(),
                    'khach_hang_id'=>$id_kh,
                    'trangthai'=>0,
                ]
            );
            
            $d->save();
            
            return view('customer.thanhtoan-thanhcong');
        }
    }

    

});

Route::get('/thanhtoan/vnpay', 
function () {

    $ten = Session::get('dulieu')[0]['ten'];
    $email = Session::get('dulieu')[0]['email'];
    $sdt = Session::get('dulieu')[0]['sdt'];
    $sokhach = Session::get('dulieu')[0]['sokhach'];
    $gioitinh = Session::get('dulieu')[0]['gioitinh'];
    $tour_id = Session::get('dulieu')[0]['tour_id'];
    $km_id = Session::get('dulieu')[0]['km_id'];
    $money = Session::get('dulieu')[0]['money'];
    $giagoc = Session::get('dulieu')[0]['giagoc'];
    $thoigiankhoihanh = Session::get('dulieu')[0]['thoigiankhoihanh'];
    //dd($phuongthuc);

    
    
        if($_GET['vnp_ResponseCode'] != 0){
            return view('customer.thanhtoan-thatbai');
        }
        else{
            $km = KhuyenMai::where('id', $km_id)->first();
            KhuyenMai::where('id', $km_id)->where('id', '!=' , 1)->update(
                [
                    'hansudung'=>$km->hansudung-1
                ]
            );
            $id_kh = 0;
            if(KhachHang::where('sdt', $sdt)->exists()){
                KhachHang::where('sdt', $sdt)->update(
                    [
                        'hoten'=>$ten,
                        'email'=>$email,
                        'gioitinh'=>$gioitinh,
                    ]
                );
                $kh = KhachHang::where('sdt', $sdt)->first();
                $id_kh = $kh->id;
            }else{
                $k = KhachHang::create(
                    [
                        'hoten'=>$ten,
                        'email'=>$email,
                        'sdt'=>$sdt,
                        'gioitinh'=>$gioitinh,
                    ]
                );
                $k->save();
                $id_kh = $k->id;
            }

            $d = DonHang::create(
                [
                    'ten'=>$ten,
                    'email'=>$email,
                    'sdt'=>$sdt,
                    'thoigiankhoihanh'=>$thoigiankhoihanh,
                    'sokhach'=>$sokhach,
                    'ngaydat'=>Carbon::now()->toDateTimeString(),
                    'tongtien'=>$giagoc,
                    'khuyen_mai_id'=>$km_id,
                    'tour_id'=>$tour_id,
                    'tenphuongthuctt'=>'vnpay',
                    'tienthanhtoan'=>$money,
                    'mathanhtoan'=>$_GET['vnp_BankTranNo'],
                    'thoigianthanhtoan'=>Carbon::now()->toDateTimeString(),
                    'khach_hang_id'=>$id_kh,
                    'trangthai'=>0,
                ]
            );
            
            $d->save();
            
            return view('customer.thanhtoan-thanhcong');
        
    }

    

});