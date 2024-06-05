@extends('fontend.welcome')
@section('content')
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
                            @foreach ($student as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->student_lastname}} {{$item->student_firstname}}</td>
                                <td>{{$item->student_username}}</td>
                                <td>{{$item->student_phone}}</td>
                                <td>{{$item->student_email}}</td>
                                <td>{{$item->student_email}}</td>
                                <td>{{$item->student_email}}</td>
                                <td>{{$item->student_email}}</td>
                                
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
