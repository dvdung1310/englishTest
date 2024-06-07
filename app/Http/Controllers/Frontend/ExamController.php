<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ExamModel;
use App\Models\EnglishSkillsModel;
use App\Models\QuestionModel;
use App\Models\QuestionAnswerModel;
use App\Models\ExamUserModel;
use App\Models\StudentModel;
use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ExamController extends Controller
{
   //
   public function listExam()
   {
      $exam = ExamModel::all();
      return view('fontend.page.exams.list_exam', compact('exam'));
   }

   public function getQuizWriting($exam_id)
   {
      $skills = EnglishSkillsModel::where('exam_id', $exam_id)->where('type', 1)->first();
      if (!empty($skills)) {
         $questionCate = QuestionModel::where('skills_id', $skills->skills_id)->where('parent_id', 0)->get();
      } else {
         $questionCate = [];
         $skills = [];
      }
      return view('fontend.page.exams.skills_writing', compact('skills', 'questionCate'));
   }

   //  làm về writing nó chỉ có 1 first
   public static function getQuizWritingChildren($question_cate_id)
   {
      $questionChildren = QuestionModel::where('parent_id', $question_cate_id)->first();
      return $questionChildren;
   }

   public function getQuizListening($exam_id)
   {
      $skills = EnglishSkillsModel::where('exam_id', $exam_id)->where('type', 2)->first();
      $questionMusic = QuestionModel::where('skills_id', $skills->skills_id)->where('parent_id', 0)->get();
      return view('fontend.page.exams.skills_listening', compact('skills', 'questionMusic'));
   }

   public function getQuizReading($exam_id)
   {
      $skills = EnglishSkillsModel::where('exam_id', $exam_id)->where('type', 3)->first();
      $questionPassage = QuestionModel::where('skills_id', $skills->skills_id)->where('parent_id', 0)->get();
      return view('fontend.page.exams.skills_reading', compact('skills', 'questionPassage'));
   }

   public static function getQuizListeningChildren($question_music_id)
   {
      $questionCate = QuestionModel::where('parent_id', $question_music_id)->get();
      return $questionCate;
   }

   public static function getAnswerQuizListeningChildren($question_id)
   {
      $answer = QuestionAnswerModel::where('question_id', $question_id)->get();
      return $answer;
   }

   public function storeSkillWritingUser(Request $request)
   {
      $data = $request->all();
      $writingAnswers = json_encode($request->input('writing_answers'));
      $exam_id = $data['exam_id'];
      session(['writing_answers' => $writingAnswers]);
      return redirect()->route('startExamListening', ['exam_id' => $exam_id]);
   }

   public function storeSkillListeningUser(Request $request)
   {
      $data = $request->all();
      $listeningAnswers = json_encode($request->input('listening_answers'));
      $exam_id = $data['exam_id'];
      session(['listening_answers' => $listeningAnswers]);
      return redirect()->route('startExamReading', ['exam_id' => $exam_id]);
   }

   public function storeSkillReadingUser(Request $request)
   {
      $data = $request->all();
      $readingAnswers = json_encode($request->input('reading_answers'));
      $exam_id = $data['exam_id'];
      $writingAnswers = session('writing_answers');
      $listeningAnswers = session('listening_answers');
      $student= session('user');
      $examUser = new ExamUserModel();
      $examUser->user_id = $student->student_id;
      $examUser->exam_id = $exam_id;
      $examUser->writing = $writingAnswers;
      $examUser->listening = $listeningAnswers;
      $examUser->reading = $readingAnswers;
      $examUser->save(); 

      if($examUser){
         $teacherId = $student->teacher_id;
         $saleId = $student->sale_id;
         $teacherMail = AdminModel::where('admin_id', $teacherId)->pluck('admin_email')->first();
         $saleMail = AdminModel::where('admin_id', $saleId)->pluck('admin_email')->first();
         $data = [
             'fullname' =>  $student->student_firstname . $student->student_lastname,
             'phone' =>  $student->student_phone,
             'email' => $student->student_email,
         ];
        
         

         if ($teacherMail) {
            Mail::send('fontend.page.email.view_email', ['data' => $data], function ($email) use ($teacherMail) {
                $email->to($teacherMail);
                $email->subject('THÔNG TIN HỌC SINH ĐÃ LÀM BÀI TEST');
            });
        }

        if ($saleMail) {
         Mail::send('fontend.page.email.view_email', ['data' => $data], function ($email) use ($saleMail) {
             $email->to($saleMail);
             $email->subject('THÔNG TIN HỌC SINH ĐÃ LÀM BÀI TEST');
         });
     }

        

     }
      return view('fontend.page.exams.notifi_exam'); 
   }

   public function testView(){
      $skills = EnglishSkillsModel::where('exam_id', 2)->where('type', 1)->first();
      if (!empty($skills)) {
         $questionCate = QuestionModel::where('skills_id', $skills->skills_id)->where('parent_id', 0)->get();
      } else {
         $questionCate = [];
      }
      $skillsMusic = EnglishSkillsModel::where('exam_id', 2)->where('type', 2)->first();
      $questionMusic = QuestionModel::where('skills_id', $skillsMusic->skills_id)->where('parent_id', 0)->get();

      $skillsReading = EnglishSkillsModel::where('exam_id', 2)->where('type', 3)->first();
      $questionPassage = QuestionModel::where('skills_id', $skillsReading->skills_id)->where('parent_id', 0)->get();



      $examUserWriting = ExamUserModel::where('exam_id',2)->where('user_id',1)->pluck('writing')->first();
      $writingArray = json_decode($examUserWriting, true);

      $examUserListening = ExamUserModel::where('exam_id',2)->where('user_id',1)->pluck('listening')->first();
      $listeningArray = json_decode($examUserListening, true);

      $examUserReading = ExamUserModel::where('exam_id',2)->where('user_id',1)->pluck('reading')->first();
      $readingArray = json_decode($examUserReading, true);
      
      return view('fontend.page.exams.test_view', compact('skills', 'questionMusic','questionCate','skillsMusic','writingArray','listeningArray','skillsReading','questionPassage','readingArray'));
   }
}
