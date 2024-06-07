<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();
class UserController extends Controller
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
    public function home()
    {
        $this->check_login();
        return view('fontend.page.exams.list_exam');
    }
    public function login_user()
    {
        return view('fontend.common.user_login');
    }
    public function user_login(Request $request)
    {
        $student_username = $request->student_username;
        $student_password = $request->student_password;
        $result = StudentModel::where('student_username', $student_username)->where('student_password', $student_password)->first();
        if ($result) {
            Session::put('user', $result);
            return Redirect::to('/');
        } else {
            //    Session::put('error','Mật khẩu hoặc tài khoản không đúng');
            return redirect()->back();
        }
    }
    public function logout_user(){
        Session::put('user',null);
        return view('fontend.common.user_login');
    }
}
