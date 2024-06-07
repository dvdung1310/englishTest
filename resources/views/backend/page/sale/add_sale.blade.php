@extends('backend.dashboard')
@section('content')
    <div id="app-content">
        <div class="app-content-area">
            <div class="container_create_studen mt-3 p-4">
                <h2>Thêm mới giáo viên</h2>
                @if (session()->has('message'))
                    <div class="alert box_alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <form class="g-3 mt-5" action="{{ route('sale.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="admin_name" class="form-label">Họ và tên (<span>*</span>)</label>
                            <input type="text" class="form-control" required name="admin_name"
                                id="admin_name">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="admin_user" class="form-label">Tài khoản (<span>*</span>)</label>
                            <input type="text" class="form-control" required name="admin_user"
                                id="admin_user">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="admin_password" class="form-label">Mật khẩu (<span>*</span>)</label>
                            <input type="text" class="form-control" required name="admin_password"
                                id="admin_password">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="admin_email" class="form-label">Email (<span>*</span>)</label>
                            <input type="email" class="form-control" required id="admin_email" name="admin_email"
                                aria-describedby="emailHelp">
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary ">Thêm mới</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
