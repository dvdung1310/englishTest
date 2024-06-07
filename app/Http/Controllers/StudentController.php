<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class StudentController extends Controller
{
    public function check_login()
    {
       $admin = Session::get('admin');
       if ($admin) {
          return Redirect::to('dashboard');
       } else {
          return Redirect::to('login_account')->send();
       }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->check_login();
        $key = $request->search;
        if(Session::get('admin')->admin_level==1){
            $student = DB::table('tbl_student')
            ->orderBy('student_id','desc')
            ->where('student_firstname','like','%'.$key.'%')
            ->paginate(20)->appends(['search' => $key]);
            return view('backend.page.student.list_student',compact('student'));
        }
        else{
            return back();
        }
      
    }
    public static function get_admin($admin_id) {
        $admin = AdminModel::where('admin_id', $admin_id)->first();
        if ($admin) {
            return $admin->admin_name;
        } else {
            return '';
        }
    }

    public function student_edit($student_id){
        $this->check_login();
        $teacher = AdminModel::where('admin_level', 3)->where('admin_status', 1)->get();
        $sale = AdminModel::where('admin_level', 2)->where('admin_status', 1)->get();
        $student = StudentModel::where('student_id',$student_id)->first();
        return view('backend.page.student.edit_student',compact('teacher','sale','student'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $this->check_login();
        if(Session::get('admin')->admin_level==1 || Session::get('admin')->admin_level==2){
            $teacher = AdminModel::where('admin_level', 3)->where('admin_status', 1)->get();
            $sale = AdminModel::where('admin_level', 2)->where('admin_status', 1)->get();
            return view('backend.page.student.add_student', compact('teacher', 'sale'));
        }
        else{
            return back();
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = new StudentModel();
            $data['student_username'] = $request->student_username;
            $data['student_password'] = $request->student_password;
            $data['student_lastname'] = $request->student_lastname;
            $data['student_firstname'] = $request->student_firstname;
            $data['student_phone'] = $request->student_phone;
            $data['student_email'] = $request->student_email;
            $data['student_type'] = $request->student_type;
            $data['teacher_id'] = $request->teacher_id;
            $data['sale_id'] = $request->sale_id;
            $data['student_status'] = 1;
            $data->save();
            if($data){
                Mail::send('backend.page.student.email.email_account', ['data' => $data], function ($message) use ($data) {
                    $message->to($data->student_email);
                    $message->subject('Chào mừng bạn đến với VUE!');
                });
            }
            return back()->with('message', 'Thêm mới thành công !');
        } catch (\Throwable $th) {
            return back()->with('error', 'Thêm mới không thành công !' . $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($student_id)
    {
        $this->check_login();
        $teacher = AdminModel::where('admin_level', 3)->where('admin_status', 1)->get();
        $sale = AdminModel::where('admin_level', 2)->where('admin_status', 1)->get();
        return view('backend.page.student.add_student', compact('teacher', 'sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student_id)
    {
        try {
            $data = StudentModel::findorFail($student_id);
            $data['student_username'] = $request->student_username;
            $data['student_password'] = $request->student_password;
            $data['student_lastname'] = $request->student_lastname;
            $data['student_firstname'] = $request->student_firstname;
            $data['student_phone'] = $request->student_phone;
            $data['student_email'] = $request->student_email;
            $data['student_type'] = $request->student_type;
            $data['teacher_id'] = $request->teacher_id;
            $data['sale_id'] = $request->sale_id;
            $data['student_status'] = $request->student_status;
            $data->save();
            return redirect()->route('student.index')->with('message', 'Cập nhật thông tin thành công !');
           } catch (\Throwable $th) {
            return back()->with('error', 'Cập nhật thông tin không thành công !' . $th);
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete_student($student_id){
        try {
            $delete = StudentModel::where('student_id',$student_id)->delete();
            return back()->with('message', 'Xóa học viên thành công !');
        } catch (\Throwable $th) {
            return back()->with('error', 'Xóa học viên không thành công !');
        }
    }

  
}
