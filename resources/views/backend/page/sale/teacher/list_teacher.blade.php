@extends('backend.dashboard')
@section('content')
    <div id="app-content">
        <div class="app-content-area">
            <div class="container_list_student">
                <div class="d-flex justify-content-between mb-4">
                    <h3>Danh sách giáo viên</h3>
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
                                <th>ID</th>
                                <th>Họ và tên</th>
                                <th>Tài khoản</th>
                                {{-- <th>Mật khẩu</th> --}}
                                <th>Email</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teacher as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->admin_id}}</td>
                                    <td>{{ $item->admin_name }}</td>
                                    <td>{{ $item->admin_user }}</td>
                                    {{-- <td>{{ $item->admin_password }}</td> --}}
                                    <td>{{ $item->admin_email }}</td>
                                    <td>
                                        <?php
                                    if ($item->admin_status == 1) {
                                    ?>
                                        <a href="{{ URL::to('active-news/' . $item->admin_id) }}"
                                            class="btn status_btn_st ">Hoạt động</a>
                                        <?php
                                    } else {
                                    ?>
                                        <a href="{{ URL::to('unactive-news/' . $item->admin_id) }}"
                                            class="btn  status_btn ">Không hoạt động</a>
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
