@extends('backend.dashboard')
@section('content')
    <?php
    use App\Http\Controllers\StudentController;
    ?>
    <div id="app-content">
        <div class="app-content-area">
            <div class="container_list_student">
                <div class="d-flex justify-content-between mb-4">
                    <h3>Danh sách học viên</h3>
                    <form>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" value="{{ old('search') }}"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
                @if (session()->has('message'))
                    <div class="alert box_alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Tên đăng nhập</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Loại học viên</th>
                                <th>Giáo viên</th>
                                <th>Sale</th>
                                <th>Trạng thái</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->student_lastname }} {{ $item->student_firstname }}</td>
                                    <td>{{ $item->student_username }}</td>
                                    <td>{{ $item->student_phone }}</td>
                                    <td>{{ $item->student_email }}</td>
                                    <td>
                                        <?php
                                    if ($item->student_type == 1) {
                                    ?>
                                        <a 
                                            class="btn status_btn p-0">chính thức</a>
                                        <?php
                                    } else {
                                    ?>
                                        <a 
                                            class="btn   status_btn_st p-0">test thử</a>
                                        <?php
                                    }
                                    ?>
                                    </td>
                                    </td>
                                    <td>
                                        @if($item->teacher_id != '')
                                            {{ StudentController::get_admin($item->teacher_id) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->sale_id != '')
                                            {{ StudentController::get_admin($item->sale_id) }}
                                        @endif
                                    </td>
                                    <td >
                                        <?php
                                    if ($item->student_status == 1) {
                                    ?>
                                        <a 
                                            class="btn  status_btn">Hoạt động</a>
                                        <?php
                                    } else {
                                    ?>
                                        <a 
                                            class="btn  status_btn_st ">Không hoạt động</a>
                                        <?php
                                    }
                                    ?>
                                    </td>
                                    
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
