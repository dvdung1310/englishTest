<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\ExamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
// session_start();
class DashboardController extends Controller
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
    public function dashboard(Request $request){
        $this->check_login();
        if(Session::get('admin')->admin_level==1 || Session::get('admin')->admin_level==3){
        $exam = ExamModel::all();
        return view('backend.page.exams.list_exam',compact('exam'));
        }
        else{
            $key = $request->search;
            $admin_id = Session::get('admin')->admin_id;
            $student = DB::table('tbl_student')
            ->orderBy('student_id','desc')
            ->where('sale_id', $admin_id)
            ->where('student_firstname','like','%'.$key.'%')
            ->paginate(20)->appends(['search' => $key]);
            return view('backend.page.sale.student.list_student',compact('student'));
        }
    }
    public function login_account(){
        return view('backend.login_account.login');
    }
    public function admin_login(Request $request){
        $admin_user = $request->admin_user;
        $admin_password = $request->admin_password;
        // dd( $username,$password);
        $result =AdminModel::where('admin_user',$admin_user)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin', $result);
            return Redirect::to('dashboard');
        }
        else{
        //    Session::put('error','Mật khẩu hoặc tài khoản không đúng');
            return redirect()->back();
        }
    }
    public function logout_admin(){
        Session::put('admin',null);
        return view('backend.login_account.login');
    }
}
