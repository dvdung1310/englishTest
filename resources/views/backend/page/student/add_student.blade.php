@extends('backend.dashboard')
@section('content')
    <div id="app-content">
        <div class="app-content-area">
            <div class="container_create_studen mt-3 p-4">
                <h2>Thêm mới học viên</h2>
                @if (session()->has('message'))
                    <div class="alert box_alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif 
                @if(Session::get('admin')->admin_level==1)
                <form class="g-3 mt-5" action="{{ route('student.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="student_username" class="form-label">Tên đăng nhập (<span>*</span>)</label>
                            <input type="text" class="form-control" required name="student_username"
                                id="student_username">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_password" class="form-label">Mật khẩu (<span>*</span>)</label>
                            <input type="text" class="form-control" required name="student_password"
                                id="student_password">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_lastname" class="form-label">Họ (<span>*</span>)</label>
                            <input type="text" class="form-control" required name="student_lastname"
                                id="student_lastname">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_firstname" class="form-label">Tên (<span>*</span>)</label>
                            <input type="text" class="form-control" required id="student_firstname"
                                name="student_firstname">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_phone" class="form-label">Số điện thoại (<span>*</span>)</label>
                            <input type="phone" class="form-control" required id="student_phone" name="student_phone">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_email" class="form-label">Email (<span>*</span>)</label>
                            <input type="email" class="form-control" required id="student_email" name="student_email"
                                aria-describedby="emailHelp">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Loại học viên (<span>*</span>)</label>
                            <select class="form-select" required name="student_type" aria-label="Default select example">
                                <option selected value="">---Loại học viên---</option>
                                <option value="1">Học viên chính thức</option>
                                <option value="2">Học viên học thử</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Giáo viên quản lý </label>
                            <select class="form-select" name="teacher_id" aria-label="Default select example">
                                <option selected value="">---Chọn giáo viên---</option>
                                @foreach ($teacher as $item)
                                    <option value="{{ $item->admin_id }}">{{ $item->admin_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Sale quản lý </label>
                            <select class="form-select" name="sale_id" aria-label="Default select example">
                                <option selected value="">---Chọn sale---</option>
                                @foreach ($sale as $item)
                                    <option value="{{ $item->admin_id }}">{{ $item->admin_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary ">Thêm mới</button>
                            </div>
                            <i class="mt-3"><b>Lưu ý</b>: khi tạo tài khoản học viên, tài khoản và mật khẩu sẽ được gửi tới học viên đó qua email</i>
                        </div>
                    </div>
                </form>

                @elseif(Session::get('admin')->admin_level==2)
                <form class="g-3 mt-5" action="{{ route('student.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="student_username" class="form-label">Tên đăng nhập (<span>*</span>)</label>
                            <input type="text" class="form-control" required name="student_username"
                                id="student_username">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_password" class="form-label">Mật khẩu (<span>*</span>)</label>
                            <input type="text" class="form-control" required name="student_password"
                                id="student_password">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_lastname" class="form-label">Họ (<span>*</span>)</label>
                            <input type="text" class="form-control" required name="student_lastname"
                                id="student_lastname">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_firstname" class="form-label">Tên (<span>*</span>)</label>
                            <input type="text" class="form-control" required id="student_firstname"
                                name="student_firstname">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_phone" class="form-label">Số điện thoại (<span>*</span>)</label>
                            <input type="phone" class="form-control" required id="student_phone" name="student_phone">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_email" class="form-label">Email (<span>*</span>)</label>
                            <input type="email" class="form-control" required id="student_email" name="student_email"
                                aria-describedby="emailHelp">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Loại học viên (<span>*</span>)</label>
                            <select class="form-select" required name="student_type" aria-label="Default select example">
                                <option selected value="">---Loại học viên---</option>
                                <option value="1">Học viên chính thức</option>
                                <option value="2">Học viên học thử</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Giáo viên quản lý </label>
                            <select class="form-select" name="teacher_id" aria-label="Default select example">
                                <option selected value="">---Chọn giáo viên---</option>
                                @foreach ($teacher as $item)
                                    <option value="{{ $item->admin_id }}">{{ $item->admin_name }}</option>
                                @endforeach
                            </select>
                        </div>
                           
                        <div class="col-md-12 mt-3">
                            <input type="hidden" name="sale_id" value="{{Session::get('admin')->admin_id}}">
                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary ">Thêm mới</button>
                            </div>
                            <i class="mt-3"><b>Lưu ý</b>: khi tạo tài khoản học viên, tài khoản và mật khẩu sẽ được gửi tới học viên đó qua email</i>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
@endsection
