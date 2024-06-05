<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController as TestBackend ;;
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
    return view('fontend.page.exams.list_exam');
});


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