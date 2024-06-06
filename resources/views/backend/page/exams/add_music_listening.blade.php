@extends('backend.dashboard')
@section('content')
    <div id="app-content">
        <div class="app-content-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-12">
                        <!-- Page header -->
                        <div class="mb-5 d-flex justify-content-between align-items-center">
                            <h3 class="mb-0 ">Thêm bài file âm thanh</h3>
                            <a href="{{ route('list_exam') }}" class="mb-0 fw-bold">Danh sách bài test</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-lg-9 col-12">
                            <form id="form_file" action="{{ route('store_music_listening') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $skills_id }}" name="skills_id">
                                <div class="card mb-4">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div>
                                            <div class="mb-4">
                                                <!-- heading -->
                                                <h4 class="mb-4">Thêm file âm thanh</h4>
                                                <input type="file" name="question_name" class="form-control" required>
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
                                    var allowedExtensions = /(\.mp3|\.wav|\.ogg|\.flac)$/i;
                            
                                    if (!allowedExtensions.exec(file.name)) {
                                        alert('Chỉ được phép tải lên các file âm thanh có định dạng: .mp3, .wav, .ogg, .flac');
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
