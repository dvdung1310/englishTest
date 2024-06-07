<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController as TestBackend ;
use App\Http\Controllers\Frontend\ExamController as ExamFrontend ;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;

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

Route::get('dashboard',[DashboardController::class,'dashboard']);
Route::get('login_account',[DashboardController::class,'login_account']);
Route::post('danh-nhap',[DashboardController::class,'admin_login'])->name('admin_login');
Route::get('danh-xuat',[DashboardController::class,'logout_admin'])->name('logout_admin');
//Học viên 
Route::resource('student','App\Http\Controllers\StudentController');
Route::get('xoa-hoc-vien/{student_id}',[StudentController::class,'delete_student'])->name('delete_student');
Route::get('sua-hoc-vien/{student_id}',[StudentController::class,'student_edit'])->name('student_edit');
//giáo giên
Route::resource('teacher','App\Http\Controllers\TeacherController');
Route::get('xoa-giao-vien/{admin_id}',[TeacherController::class,'delete_teacher'])->name('delete_teacher');
Route::get('sua-giao-vien/{admin_id}',[TeacherController::class,'teacher_edit'])->name('teacher_edit');
//sale
Route::resource('sale','App\Http\Controllers\SaleController');
Route::get('sua-sale/{admin_id}',[SaleController::class,'sale_edit'])->name('sale_edit');
Route::get('giao-vien',[SaleController::class,'teacher_sale'])->name('teacher_sale');
Route::get('hoc-vien',[SaleController::class,'student_sale'])->name('student_sale');


Route::get('/add_exam', function () {
    return view('backend.page.exams.add_exam');
})->name('add_exam');
Route::get('/list_exam',[TestBackend::class,'listExam'])->name('list_exam');
Route::post('/store_exam',[TestBackend::class,'storeExam'])->name('store_exam');
Route::post('/detail_exam',[TestBackend::class,'detailExam'])->name('detail_exam');
Route::get('/skills_exam/{exam_id}',[TestBackend::class,'skillsExam'])->name('skills_exam');

// writing
Route::get('/store_writing',[TestBackend::class,'storeWriting'])->name('store_writing');
Route::get('/add_question_writing/{skills_id}',[TestBackend::class,'addQuestionWriting'])->name('add_question_writing');
Route::get('/store_question_writing',[TestBackend::class,'storeQuestionWriting'])->name('store_question_writing');
Route::get('/detail_question_writing/{question_id}',[TestBackend::class,'detailQuestionWriting'])->name('detail_question_writing');
Route::get('/update_question_writing',[TestBackend::class,'updateQuestionWriting'])->name('update_question_writing');
// listening
Route::get('/store_listening',[TestBackend::class,'storeListening'])->name('store_listening');
Route::get('/add_music_listening/{skills_id}',[TestBackend::class,'addMusicListening'])->name('add_music_listening');
Route::post('/store_music_listening',[TestBackend::class,'storeMusicListening'])->name('store_music_listening');
Route::get('/add_question_listening/{question_id}',[TestBackend::class,'addQuestionListening'])->name('add_question_listening');
Route::post('/store_question_listening',[TestBackend::class,'storeQuestionListening'])->name('store_question_listening');
Route::get('/detail_question_listening/{question_music_id}/{question_cate_id}',[TestBackend::class,'detailQuestionListening'])->name('detail_question_listening');
Route::get('/store_question_answer_listening',[TestBackend::class,'storeQuestionAnswerListening'])->name('store_question_answer_listening');
Route::get('/store_question_answer_choice_listening',[TestBackend::class,'storeQuestionAnswerChoiceListening'])->name('store_question_answer_choice_listening');

Route::get('/update_question_cate_listening',[TestBackend::class,'updateQuestionCateListening'])->name('update_question_cate_listening');
// reading
Route::get('/store_reading',[TestBackend::class,'storeReading'])->name('store_reading');
Route::get('/store_passage_reading',[TestBackend::class,'storePassageReading'])->name('store_passage_reading');
Route::get('/add_question_reading/{question_id}',[TestBackend::class,'addQuestionReading'])->name('add_question_reading');
Route::post('/store_question_reading',[TestBackend::class,'storeQuestionReading'])->name('store_question_reading');
Route::get('/detail_question_reading/{question_passage_id}/{question_cate_id}',[TestBackend::class,'detailQuestionReading'])->name('detail_question_reading');
Route::get('/update_question_cate_reading',[TestBackend::class,'updateQuestionCateReading'])->name('update_question_cate_reading');
Route::get('/store_question_answer_reading',[TestBackend::class,'storeQuestionAnswerReading'])->name('store_question_answer_reading');
Route::get('/store_question_answer_choice_reading',[TestBackend::class,'storeQuestionAnswerChoiceReading'])->name('store_question_answer_choice_reading');
// FRONTEND
Route::get('/startExamWriting/{exam_id}',[ExamFrontend::class,'getQuizWriting'])->name('startExamWriting');
Route::get('/startExamListening/{exam_id}',[ExamFrontend::class,'getQuizListening'])->name('startExamListening');
Route::get('/startExamReading/{exam_id}',[ExamFrontend::class,'getQuizReading'])->name('startExamReading');
Route::get('/store_skills_writing_user',[ExamFrontend::class,'storeSkillWritingUser'])->name('store_skills_writing_user');
Route::get('/store_skills_listening_user',[ExamFrontend::class,'storeSkillListeningUser'])->name('store_skills_listening_user');
Route::get('/store_skills_reading_user',[ExamFrontend::class,'storeSkillReadingUser'])->name('store_skills_reading_user');
// test 
Route::get('/test_view',[ExamFrontend::class,'testView'])->name('test_view');

//frontend
Route::get('/',[UserController::class,'home']);
Route::get('dang-nhap-tai-khoan',[UserController::class,'login_user']);
Route::post('dangnhap',[UserController::class,'user_login'])->name('user_login');
Route::get('dang-xuat-tai-khoan',[UserController::class,'logout_user'])->name('logout_user');

