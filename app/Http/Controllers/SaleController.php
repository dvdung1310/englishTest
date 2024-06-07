<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
// session_start();
class SaleController extends Controller
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
        $teacher = AdminModel::where('admin_level', 2)->orderBy('admin_id', 'desc')
            ->paginate(20)->appends(['search' => $key]);
        return view('backend.page.sale.list_sale', compact('teacher'));
        }else{
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->check_login();
        if(Session::get('admin')->admin_level==1){
        return view('backend.page.sale.add_sale');
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
            $data = new AdminModel();
            $data['admin_name'] = $request->admin_name;
            $data['admin_user'] = $request->admin_user;
            $data['admin_password'] = $request->admin_password;
            $data['admin_email'] = $request->admin_email;
            $data['admin_level'] = 2;
            $data['admin_status'] = 1;
            $data->save();
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
    // public function edit($admin_id)
    // {
    //     dd($admin_id);
    //     return view('backend.page.sale.edit_sale');
    // }
    public function sale_edit($admin_id)
    {
        $this->check_login();
        if(Session::get('admin')->admin_level==1){
        $teacher = AdminModel::where('admin_id', $admin_id)->first();
        return view('backend.page.sale.edit_sale',compact('teacher'));
        }else{
            return back();
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $admin_id)
    {
       try {
        $data = AdminModel::findorFail($admin_id);
        $data['admin_name'] = $request->admin_name;
        $data['admin_user'] = $request->admin_user;
        $data['admin_password'] = $request->admin_password;
        $data['admin_email'] = $request->admin_email;
        $data->save();
        return redirect()->route('sale.index')->with('message', 'Cập nhật thông tin thành công !');
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
    public function teacher_sale(Request $request){
        if(Session::get('admin')->admin_level==2){
            $this->check_login();
            $key = $request->search;
            $teacher = AdminModel::where('admin_level', 3)->orderBy('admin_id', 'desc')
                ->paginate(20)->appends(['search' => $key]);
            return view('backend.page.sale.teacher.list_teacher', compact('teacher'));
        }
        else{
            return back();
        }
        
    }

    public function student_sale(Request $request){
        $this->check_login();
        $key = $request->search;
        $admin_id = Session::get('admin')->admin_id;
        if(Session::get('admin')->admin_level==2){
            $student = DB::table('tbl_student')
            ->orderBy('student_id','desc')
            ->where('sale_id', $admin_id)
            ->where('student_firstname','like','%'.$key.'%')
            ->paginate(20)->appends(['search' => $key]);
            return view('backend.page.sale.student.list_student',compact('student'));
        }

    }
}
