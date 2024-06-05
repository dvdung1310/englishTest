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
        $test = ExamModel::all();
        return view('backend.page.exams.list_exam',compact('test'));
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

    public function skillsExam($exam_id){
        $exam = ExamModel::where('exam_id',$exam_id)->first();

        $skillWriting = EnglishSkillsModel::where('exam_id',$exam_id)->where('type',1)->first();
        return view('backend.page.exams.skills_exam',compact('exam','skillWriting'));
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
}
