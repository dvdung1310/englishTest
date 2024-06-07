<?php

namespace App\Http\Controllers;

use App\Models\ExamModel;
use App\Models\EnglishSkillsModel;
use App\Models\QuestionModel;
use App\Models\QuestionAnswerModel;
use Illuminate\Http\Request;

class examController extends Controller
{
    //
    public function listExam(){
        $exam = ExamModel::all();
        return view('backend.page.exams.list_exam',compact('exam'));
    }
    public function storeExam(Request $request)
    {
        $data = $request->all();
        $files = $request->file('test_img');
        $filename = time() . '_' . $files->getClientOriginalName();
        $path_upload = 'uploads/exam/';
        $files->move($path_upload, $filename);
        $path_imgs = $path_upload . $filename;
        $exam = new ExamModel();
        $exam->exam_name = $data['test_name'];
        $exam->exam_img = $path_imgs;
        $exam->save();
        return redirect()->back()->with('success', 'Bài test đã được lưu thành công.');
    }

    public function detailExam($exam_id){
         
    }

    public function skillsExam($exam_id){
        $exam = ExamModel::where('exam_id',$exam_id)->first();
        $skillWriting = EnglishSkillsModel::where('exam_id',$exam_id)->where('type',1)->first();
        if($skillWriting){
            $quesionWriting = QuestionModel::where('skills_id',$skillWriting->skills_id)->where('parent_id',0)->get();
        }else{
            $quesionWriting = [];
        }

        $skillListening = EnglishSkillsModel::where('exam_id',$exam_id)->where('type',2)->first();
        
        if($skillListening){
            $quesionListening = QuestionModel::where('skills_id',$skillListening->skills_id)->where('parent_id',0)->get();
        }else{
            $quesionListening = [];
        }

        $skillReading = EnglishSkillsModel::where('exam_id',$exam_id)->where('type',3)->first();
        
        if($skillReading){
            $quesionReading = QuestionModel::where('skills_id',$skillReading->skills_id)->where('parent_id',0)->get();
        }else{
            $quesionReading = [];
        }

        return view('backend.page.exams.skills_exam',compact('exam','skillWriting','quesionWriting','skillListening','quesionListening','skillReading','quesionReading'));
    }

    public function storeWriting(Request $request){
        $data = $request->all();
        $skillWriting = EnglishSkillsModel::where('exam_id',$data['exam_id'])->where('type',1)->first();
        if(isset($skillWriting)){
            $skillWriting->skills_status = 1;
            $skillWriting->skills_time = $data['skills_time'];
        }else{
            $skillWriting = new EnglishSkillsModel();
            $skillWriting->skills_name = 'WRITING';
            $skillWriting->skills_status = 1;
            $skillWriting->skills_time = $data['skills_time'];
            $skillWriting->exam_id = $data['exam_id'];
            $skillWriting->type = 1;
        }
        $skillWriting->save();
        
        return redirect()->back()->with('successWriting', 'Bài lưu Writing thành công.');
    }

    public function storeListening(Request $request){
        $data = $request->all();
        $skillListening = EnglishSkillsModel::where('exam_id',$data['exam_id'])->where('type',2)->first();
        if(isset($skillListening)){
            $skillListening->skills_status = 1;
            $skillListening->skills_time = $data['skills_time'];
        }else{
            $skillListening = new EnglishSkillsModel();
            $skillListening->skills_name = 'LISTENING';
            $skillListening->skills_status = 1;
            $skillListening->skills_time = $data['skills_time'];
            $skillListening->exam_id = $data['exam_id'];
            $skillListening->type = 2;
        }
        $skillListening->save();
        
        return redirect()->back()->with('successListening', 'Bài lưu Listening thành công.');
    }

    public function storeReading(Request $request){
        $data = $request->all();
        $skillReading = EnglishSkillsModel::where('exam_id',$data['exam_id'])->where('type',3)->first();
        if(isset($skillReading)){
            $skillReading->skills_status = 1;
            $skillReading->skills_time = $data['skills_time'];
        }else{
            $skillReading = new EnglishSkillsModel();
            $skillReading->skills_name = 'READING';
            $skillReading->skills_status = 1;
            $skillReading->skills_time = $data['skills_time'];
            $skillReading->exam_id = $data['exam_id'];
            $skillReading->type = 3;
        }
        $skillReading->save();
        
        return redirect()->back()->with('successReading', 'Bài lưu Reading thành công.');
    }


    public function addQuestionWriting($skills_id){
       $skills_id = $skills_id;
       return view('backend.page.exams.add_question_writing',compact('skills_id'));
    }

    public function addMusicListening ($skills_id){
        $skills_id = $skills_id;
        return view('backend.page.exams.add_music_listening',compact('skills_id'));
     }


    public function storeQuestionWriting(Request $request){
        $data = $request->all();
        $questionNameChildren = $data['question_name_children'];
        $quesion = new QuestionModel();
        $quesion->question_name = $data['question_name'];
        $quesion->recommend = $data['recommend'];
        $quesion->question_status = 1;
        $quesion->parent_id = 0;
        $quesion->skills_id = $data['skills_id'];
        $quesion->save();
        if(!empty($questionNameChildren) && $quesion){
            $quesionChildren = new QuestionModel();
            $quesionChildren->question_name = $data['question_name_children'];
            $quesionChildren->question_status = 1;
            $quesionChildren->parent_id = $quesion->question_id;
            $quesionChildren->skills_id = $data['skills_id'];
            $quesionChildren->save();
        }
        return redirect()->back()->with('successQuestionWriting', 'Bài lưu câu hỏi Writing thành công.');
    }

    public function storeMusicListening(Request $request){
        $data = $request->all();
        $files = $request->file('question_name');
        $filename = time() . '_' . $files->getClientOriginalName();
        $path_upload = 'uploads/exam/';
        $files->move($path_upload, $filename);
        $path_imgs = $path_upload . $filename;
        $music = new QuestionModel();
        $music->question_name = $path_imgs;
        $music->question_status = 1;
        $music->parent_id = 0;
        $music->skills_id = $data['skills_id'];
        $music->save();
        return redirect()->back()->with('successFileMusic', 'File âm thanh đã được lưu thành công.');

    }

    public function storePassageReading(Request $request){
        $data = $request->all();
        $passage = new QuestionModel();
        $passage->question_name = $data['question_name'];
        $passage->question_status = 1;
        $passage->parent_id = 0;
        $passage->skills_id = $data['skills_id'];
        $passage->save();
        return redirect()->back()->with('successPassage', 'File âm thanh đã được lưu thành công.');
    }

    public function detailQuestionWriting($question_id){
        $quesion =  QuestionModel::where('question_id',$question_id)->first();
        $quesionChildren =  QuestionModel::where('parent_id',$quesion->question_id)->first();
        return view('backend.page.exams.update_question_writing',compact('quesion','quesionChildren'));
    }

    public function updateQuestionWriting(Request $request){
        $data = $request->all();
        $quesion =  QuestionModel::where('question_id',$data['question_id'])->first();
        $quesion->question_name = $data['question_name'];
        $quesion->recommend = $data['recommend'];
        $quesion->save();
        if(!empty($data['question_children_id'])){
            $quesionChildren =  QuestionModel::where('question_id',$data['question_children_id'])->first();
            $quesionChildren->question_name = $data['question_children_name'];
            $quesionChildren->save();
        }
        return redirect()->back()->with('successQuestionWriting', 'Bạn đã sửa câu hỏi Writing thành công.');
    }

    public function addQuestionListening($question_id){
        // file âm thanh
        $question_music =  QuestionModel::where('question_id',$question_id)->first();
        if($question_music){
            $quesionCate =  QuestionModel::where('parent_id',$question_music->question_id)->get();
        }else{
            $quesionCate = [];
        }
        return view('backend.page.exams.add_question_listening',compact('question_music','quesionCate'));
    }

    public function addQuestionReading($question_id){
        // file âm thanh
        $question_passage =  QuestionModel::where('question_id',$question_id)->first();
        if($question_passage){
            $quesionCate =  QuestionModel::where('parent_id',$question_passage->question_id)->get();
        }else{
            $quesionCate = [];
        }
        return view('backend.page.exams.add_question_reading',compact('question_passage','quesionCate'));
    }

    public function storeQuestionListening(Request $request){
        $data = $request->all();
        $question = new QuestionModel();
        $question->question_name = $data['question_name'];
        $question->question_status = 1;
        $question->parent_id = $data['question_id'];
        $question->skills_id = $data['skills_id'];
        $question->save();
         return redirect()->back()->with('success', 'Bạn đã lưu câu hỏi thành công.');
    }

    public function storeQuestionReading(Request $request){
        $data = $request->all();
        $question = new QuestionModel();
        $question->question_name = $data['question_name'];
        $question->question_status = 1;
        $question->parent_id = $data['question_id'];
        $question->skills_id = $data['skills_id'];
        $question->save();
         return redirect()->back()->with('success', 'Bạn đã lưu câu hỏi con thành công.');
    }

    public function updateQuestionCateListening(Request $request){
        $data = $request->all();
        $question = QuestionModel::where('question_id',$data['question_cate_id'])->first();
        $question->question_name = $data['question_name'];
        $question->save();
        return redirect()->route('detail_question_listening',['question_music_id'=>$data['question_music_id'],'question_cate_id'=>$data['question_cate_id']]);
    }

    public function updateQuestionCateReading(Request $request){
        $data = $request->all();
        $question = QuestionModel::where('question_id',$data['question_cate_id'])->first();
        $question->question_name = $data['question_name'];
        $question->save();
        return redirect()->route('detail_question_reading',['question_passage_id'=>$data['question_passage_id'],'question_cate_id'=>$data['question_cate_id']]);
    }

    public function detailQuestionListening($question_music_id , $question_cate_id){
        
        $question_music =  QuestionModel::where('question_id',$question_music_id)->first();
        if($question_music){
            // danh sachs
            $quesionListCate =  QuestionModel::where('parent_id',$question_music->question_id)->get();
        }else{
            $quesionListCate = [];
        }

        $questionCate =  QuestionModel::where('question_id',$question_cate_id)->first();
        $questionChildren =  QuestionModel::where('parent_id',$questionCate->question_id)->get();
        
        return view('backend.page.exams.detail_question_listening',compact('question_music','quesionListCate','questionCate','questionChildren'));
    }

    public function detailQuestionReading($question_passage_id , $question_cate_id){
        $question_passage =  QuestionModel::where('question_id',$question_passage_id)->first();
        if($question_passage){
            // danh sachs
            $quesionListCate =  QuestionModel::where('parent_id',$question_passage->question_id)->get();
        }else{
            $quesionListCate = [];
        }

        $questionCate =  QuestionModel::where('question_id',$question_cate_id)->first();
        $questionChildren =  QuestionModel::where('parent_id',$questionCate->question_id)->get();
        
        return view('backend.page.exams.detail_question_reading',compact('question_passage','quesionListCate','questionCate','questionChildren'));
    }

    public static function  getAnswerByQuestionId($quesionId){
           $answer = QuestionAnswerModel::where('question_id',$quesionId)->get();
           return $answer;
    }

    public function storeQuestionAnswerListening(Request $request){
      $data = $request->all();
      $question_music_id = $data['question_music_id'];
      $question_cate_id = $data['parent_id'];
      $question = new QuestionModel();
      $question->question_name = $data['question_name'];
      $question->question_status = 1;
      $question->parent_id = $data['parent_id'];
      $question->skills_id = $data['skills_id'];
      $question->save();
      if($question){
        $answer = new QuestionAnswerModel();
        $answer->answer_name = $data['question_answer'];
        $answer->answer_boolean = 1;
        $answer->answer_status = 1;
        $answer->question_id = $question->question_id;
        $answer->save();
      }
      return redirect()->route('detail_question_listening',['question_music_id'=>$question_music_id,'question_cate_id'=>$question_cate_id]);
    }

    public function storeQuestionAnswerReading(Request $request){
        $data = $request->all();
        $question_music_id = $data['question_music_id'];
        $question_cate_id = $data['parent_id'];
        $question = new QuestionModel();
        $question->question_name = $data['question_name'];
        $question->question_status = 1;
        $question->parent_id = $data['parent_id'];
        $question->skills_id = $data['skills_id'];
        $question->save();
        if($question){
          $answer = new QuestionAnswerModel();
          $answer->answer_name = $data['question_answer'];
          $answer->answer_boolean = 1;
          $answer->answer_status = 1;
          $answer->question_id = $question->question_id;
          $answer->save();
        }
        return redirect()->route('detail_question_reading',['question_passage_id'=>$question_music_id,'question_cate_id'=>$question_cate_id]);
      }

    public function storeQuestionAnswerChoiceListening(Request $request){
        $data = $request->all();
        $question_music_id = $data['question_music_id'];
        $question_cate_id = $data['parent_id'];
        $question = new QuestionModel();
        $question->question_name = $data['question_name'];
        $question->question_status = 1;
        $question->parent_id = $data['parent_id'];
        $question->skills_id = $data['skills_id'];
        $question->save();
        if($question){
            if(!empty($data['question_answer_1'])){
                $answer = new QuestionAnswerModel();
                $answer->answer_name = $data['question_answer_1'];
                if($data['radio'] == 'A'){
                    $answer->answer_boolean = 1;
                }else{
                    $answer->answer_boolean = 0;
                }
                
                $answer->answer_status = 1;
                $answer->question_id = $question->question_id;
                $answer->save();
            }

            if(!empty($data['question_answer_2'])){
                $answer = new QuestionAnswerModel();
                $answer->answer_name = $data['question_answer_2'];
                if($data['radio'] == 'B'){
                    $answer->answer_boolean = 1;
                }else{
                    $answer->answer_boolean = 0;
                }
                $answer->answer_status = 1;
                $answer->question_id = $question->question_id;
                $answer->save();
            }

            if(!empty($data['question_answer_3'])){
                $answer = new QuestionAnswerModel();
                $answer->answer_name = $data['question_answer_3'];
                if($data['radio'] == 'C'){
                    $answer->answer_boolean = 1;
                }else{
                    $answer->answer_boolean = 0;
                }
                $answer->answer_status = 1;
                $answer->question_id = $question->question_id;
                $answer->save();
            }

            if(!empty($data['question_answer_4'])){
                $answer = new QuestionAnswerModel();
                $answer->answer_name = $data['question_answer_4'];
                if($data['radio'] == 'D'){
                    $answer->answer_boolean = 1;
                }else{
                    $answer->answer_boolean = 0;
                }
                $answer->answer_status = 1;
                $answer->question_id = $question->question_id;
                $answer->save();
            }
          
        }
        return redirect()->route('detail_question_listening',['question_music_id'=>$question_music_id,'question_cate_id'=>$question_cate_id]);
      }

      public function storeQuestionAnswerChoiceReading(Request $request){
        $data = $request->all();
        $question_music_id = $data['question_music_id'];
        $question_cate_id = $data['parent_id'];
        $question = new QuestionModel();
        $question->question_name = $data['question_name'];
        $question->question_status = 1;
        $question->parent_id = $data['parent_id'];
        $question->skills_id = $data['skills_id'];
        $question->save();
        if($question){
            if(!empty($data['question_answer_1'])){
                $answer = new QuestionAnswerModel();
                $answer->answer_name = $data['question_answer_1'];
                if($data['radio'] == 'A'){
                    $answer->answer_boolean = 1;
                }else{
                    $answer->answer_boolean = 0;
                }
                
                $answer->answer_status = 1;
                $answer->question_id = $question->question_id;
                $answer->save();
            }

            if(!empty($data['question_answer_2'])){
                $answer = new QuestionAnswerModel();
                $answer->answer_name = $data['question_answer_2'];
                if($data['radio'] == 'B'){
                    $answer->answer_boolean = 1;
                }else{
                    $answer->answer_boolean = 0;
                }
                $answer->answer_status = 1;
                $answer->question_id = $question->question_id;
                $answer->save();
            }

            if(!empty($data['question_answer_3'])){
                $answer = new QuestionAnswerModel();
                $answer->answer_name = $data['question_answer_3'];
                if($data['radio'] == 'C'){
                    $answer->answer_boolean = 1;
                }else{
                    $answer->answer_boolean = 0;
                }
                $answer->answer_status = 1;
                $answer->question_id = $question->question_id;
                $answer->save();
            }

            if(!empty($data['question_answer_4'])){
                $answer = new QuestionAnswerModel();
                $answer->answer_name = $data['question_answer_4'];
                if($data['radio'] == 'D'){
                    $answer->answer_boolean = 1;
                }else{
                    $answer->answer_boolean = 0;
                }
                $answer->answer_status = 1;
                $answer->question_id = $question->question_id;
                $answer->save();
            }
          
        }
        return redirect()->route('detail_question_reading',['question_passage_id'=>$question_music_id,'question_cate_id'=>$question_cate_id]);
      }
}
