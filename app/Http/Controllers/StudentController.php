<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = $request->search;
        $student = DB::table('tbl_student')
        ->join('tbl_admin','tbl_student.sale_id','tbl_admin.admin_id')
        ->orderBy('student_id','desc')
         ->paginate(20)->appends(['search' => $key]);
        return view('fontend.page.student.list_student',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = AdminModel::where('admin_level', 3)->where('admin_status', 1)->get();
        $sale = AdminModel::where('admin_level', 2)->where('admin_status', 1)->get();
        return view('fontend.page.student.add_student', compact('teacher', 'sale'));
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
                Mail::send('fontend.page.student.email.email_account', ['data' => $data], function ($message) use ($data) {
                    $message->to($data->student_email);
                    $message->subject('Welcome to Our Application');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
