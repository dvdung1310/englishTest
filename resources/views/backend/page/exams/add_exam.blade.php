@extends('backend.dashboard')
@section('content')
    <div id="app-content">
        <div class="app-content-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-12">
                        <!-- Page header -->
                        <div class="mb-5 d-flex justify-content-between align-items-center">
                            <h3 class="mb-0 ">Thêm bài test</h3>
                            <a href="{{ route('list_exam') }}" class="mb-0 fw-bold">Danh sách bài test</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-lg-9 col-12">
                            <!-- card -->
                            <form id="form_file" action="{{ route('store_exam') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card mb-4">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div>
                                            <!-- input -->
                                            <div class="mb-3">
                                                <label class="form-label">Tên bài test</label>
                                                <input type="text" name="test_name" class="form-control"
                                                    placeholder="Nhập tên bài test" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card -->
                                <div class="card mb-4">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div>
                                            <div class="mb-4">
                                                <!-- heading -->
                                                <h4 class="mb-4">Thêm ảnh</h4>
                                                <input type="file" name="test_img" class="form-control" required>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <button id="submitButton" type="submit" class="btn btn-primary">
                                        Lưu
                                    </button>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success mt-5">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </form>

                            <script>
                                document.getElementById('form_file').addEventListener('submit', function(event) {
                                    var fileInput = document.querySelector('input[type="file"]');
                                    var file = fileInput.files[0];
                                    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

                                    if (!allowedExtensions.exec(file.name)) {
                                        alert('Chỉ được phép tải lên các file ảnh có định dạng: .jpg, .jpeg, .png, .gif');
                                        event.preventDefault(); // Ngăn chặn gửi biểu mẫu
                                    }
                                });
                            </script>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
