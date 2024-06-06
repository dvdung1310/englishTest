<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController as TestBackend ;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

;
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
Route::get('xoa-hoc-vien/{student_id}',[StudentController::class,'delete_student'])->name('delete_student');
Route::get('sua-hoc-vien/{student_id}',[StudentController::class,'student_edit'])->name('student_edit');
// Route::get('/', function () {
//     return view('fontend.page.exams.list_exam');
// });
//giáo giên
Route::resource('teacher','App\Http\Controllers\TeacherController');
Route::get('xoa-giao-vien/{admin_id}',[TeacherController::class,'delete_teacher'])->name('delete_teacher');
Route::get('sua-giao-vien/{admin_id}',[TeacherController::class,'teacher_edit'])->name('teacher_edit');
//sale
Route::resource('sale','App\Http\Controllers\SaleController');
Route::get('sua-sale/{admin_id}',[SaleController::class,'sale_edit'])->name('sale_edit');
Route::get('giao-vien',[SaleController::class,'teacher_sale'])->name('teacher_sale');
Route::get('hoc-vien',[SaleController::class,'student_sale'])->name('student_sale');

Route::get('/admin', function () {
    return view('backend.page.exams.list_exam');
})->name('admin');

Route::get('/add_exam', function () {
    return view('backend.page.exams.add_exam');
})->name('add_exam');
Route::get('/list_exam',[TestBackend::class,'listExam'])->name('list_exam');
Route::post('/store_exam',[TestBackend::class,'storeExam'])->name('store_exam');
Route::get('/skills_exam/{exam_id}',[TestBackend::class,'skillsExam'])->name('skills_exam');

Route::get('/store_writing',[TestBackend::class,'storeWriting'])->name('store_writing');
Route::get('/store_question_writing',[TestBackend::class,'storeQuestionWriting'])->name('store_question_writing');
Route::get('/store_question_writing',[TestBackend::class,'storeQuestionWriting'])->name('store_question_writing');
