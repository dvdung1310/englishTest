<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
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
        return view('fontend.page.exams.list_exam');
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
            return Redirect::to('/');
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
