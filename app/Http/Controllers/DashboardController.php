<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\ExamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
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
    public function dashboard(){
        
        $this->check_login();
        $exam = ExamModel::all();
        return view('backend.page.exams.list_exam',compact('exam'));
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
<<<<<<< HEAD
            return Redirect::to('/list_exam');
=======
            return Redirect::to('dashboard');
>>>>>>> 8469fd47b502a85bfab77b2336a5c0e562463856
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
