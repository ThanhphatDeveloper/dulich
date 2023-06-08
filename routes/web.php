<?php

use App\Http\Controllers\TourController;
use App\Http\Controllers\LoaiTourController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
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
    //Route::get('/admin/users-search', [UserController::class, 'getUserSearch']);
    
    Route::resource('/admin/tours', TourController::class);
    Route::resource('/admin/loaitours', LoaiTourController::class);
    
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
    return view('home.home');
});