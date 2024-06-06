@extends('backend.dashboard')
@section('content')
    <div id="app-content">
        <div class="app-content-area">
            <div class="container_create_studen mt-3 p-4">
                <h2>Thêm mới học viên</h2>
                <form class="g-3 mt-5" action="{{ route('student.update',$student->student_id)}}"  method="post">
                    {{ csrf_field() }}
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="student_username" class="form-label">Tên đăng nhập</label>
                            <input type="text" class="form-control" required name="student_username"
                                id="student_username" value="{{$student->student_username}}">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_password" class="form-label">Mật khẩu</label>
                            <input type="text" class="form-control" required name="student_password"
                                id="student_password" value="{{$student->student_password}}">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_lastname" class="form-label">Họ</label>
                            <input type="text" class="form-control" required name="student_lastname"
                                id="student_lastname" value="{{$student->student_lastname}}">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_firstname" class="form-label">Tên</label>
                            <input type="text" class="form-control" required id="student_firstname"
                                name="student_firstname" value="{{$student->student_firstname}}">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_phone" class="form-label">Số điện thoại</label>
                            <input type="phone" class="form-control" required id="student_phone" name="student_phone" value="{{$student->student_phone}}">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="student_email" class="form-label">Email</label>
                            <input type="email" class="form-control" required id="student_email" name="student_email"
                                aria-describedby="emailHelp" value="{{$student->student_email}}">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Loại học viên</label>
                            <select class="form-select" required name="student_type" aria-label="Default select example">
                                <option selected value="">---Loại học viên---</option>
                                <option value="1" <?php if($student->student_type == 1) echo "selected" ?>>Học viên chính thức</option>
                                <option value="2" <?php if($student->student_type == 2) echo "selected" ?>>Học viên học thử</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Giáo viên quản lý </label>
                            <select class="form-select" name="teacher_id" aria-label="Default select example">
                                <option selected value="">---Chọn giáo viên---</option>
                                @foreach ($teacher as $item)
                                    <option value="{{ $item->admin_id }}" <?php if($student->teacher_id == $item->admin_id) echo "selected" ?>>{{ $item->admin_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Sale quản lý </label>
                            <select class="form-select" name="sale_id" aria-label="Default select example">
                                <option selected value="">---Chọn sale---</option>
                                @foreach ($sale as $item)
                                    <option value="{{ $item->admin_id }}" <?php if($student->sale_id == $item->admin_id) echo "selected" ?>>{{ $item->admin_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Trạng thái hoạt động </label>
                            <select class="form-select" required name="student_status" aria-label="Default select example">
                                <option selected value="">---Trạng thái---</option>
                                <option value="0" <?php if($student->student_status == 0) echo "selected" ?>>Không hoạt động</option>
                                <option value="1" <?php if($student->student_status == 1) echo "selected" ?>>Đang hoạt động</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary ">Cập nhật thông tin</button>
                            </div>
                            <i class="mt-3"><b>Lưu ý</b>: khi tạo tài khoản học viên, tài khoản và mật khẩu sẽ được gửi tới học viên đó qua email</i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
