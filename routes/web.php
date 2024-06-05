<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/',[DashboardController::class,'dashboard']);
Route::get('login_account',[DashboardController::class,'login_account']);
Route::post('danh-nhap',[DashboardController::class,'admin_login'])->name('admin_login');
Route::get('danh-xuat',[DashboardController::class,'logout_admin'])->name('logout_admin');
//Học viên 
Route::resource('student','App\Http\Controllers\StudentController');