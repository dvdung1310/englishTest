@extends('backend.dashboard')
@section('content')
    <div id="app-content">
        <div class="app-content-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Page header -->
                        <div class="mb-5 d-flex justify-content-between align-items-center">
                            <h3 class="mb-0 ">{{ $exam->exam_name }}</h3>
                            <a href="{{ route('list_exam') }}" class="mb-0 fw-bold">Danh sách bài test</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row skills_exam">
                        <style>
                            .skills_exam li {
                                font-size: 20px;
                                margin: 0 20px;
                            }

                            .skills_exam {
                                margin-bottom: 30px;
                                padding-top: 30px;
                                border: 0;
                                box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15);
                            }

                            .ck-editor__editable_inline {
                                height: 100px;
                            }

                            .editorContainer .ck-editor__editable_inline {
                                height: 300px;
                            }
                        </style>
                        <div class="col-12 d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active fw-bold" id="pills-home-tab" data-bs-toggle="pill"
                                        href="#pills-home" role="tab" aria-controls="pills-home"
                                        aria-selected="true">WRITING</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" id="pills-profile-tab" data-bs-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">READING</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" id="pills-contact-tab" data-bs-toggle="pill"
                                        href="#pills-contact" role="tab" aria-controls="pills-contact"
                                        aria-selected="false">LISTENING</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content p-4" id="pills-tabContent">
                            {{-- bài viết WRITING --}}
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="row">
                                    <div class="col-lg-8 col-12">
                                      @if (session('successQuestionWriting'))
                                                    <div class="alert alert-success mb-5">
                                                        {{ session('successQuestionWriting') }}
                                                    </div>
                                                @endif
                                        <form id="writingform" action="{{ route('store_question_writing') }}" method="GET">
                                          <input type="hidden" name="skills_id" value="{{ isset($skillWriting) ? $skillWriting->skills_id : '' }}" >
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div>
                                                        <div class="mb-5 editorContainer">
                                                            <label class="form-label fw-bold">Câu hỏi chung</label>
                                                            <textarea name="question_name" class="form-control " id="editor_writing"></textarea>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Gợi ý</label>
                                                            <input type="text" name="recommend" class="form-control"
                                                                placeholder="Gợi ý cho học sinh" required>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="mb-5">
                                                            <label class="form-label">Câu hỏi con <span
                                                                    style="color: red">(nếu có)</span></label>
                                                            <textarea name="question_name_children" class="form-control " id="editor1"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <button id="writingsubmit" type="submit" class="btn btn-primary">
                                                            Lưu câu hỏi
                                                        </button>
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <form action="{{ route('store_writing') }}" method="GET">
                                            <input type="hidden" name="exam_id" value="{{ $exam->exam_id }}">
                                            <div class="card mb-4">
                                                <div class="card-body">

                                                    <div class="form-check form-switch mb-4">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="flexSwitchStock" checked>
                                                        <label class="form-check-label" for="flexSwitchStock">Trạng
                                                            thái</label>
                                                    </div>

                                                    <div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Thời gian</label>
                                                            <input type="text" name="skills_time"
                                                                value="{{ isset($skillWriting) ? $skillWriting->skills_time : '' }}"
                                                                class="form-control" placeholder="Nhập thời gian">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">
                                                    Tạo WRITING
                                                </button>
                                            </div>

                                            @if (session('successWriting'))
                                                <div class="alert alert-success mt-5">
                                                    {{ session('successWriting') }}
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">...</div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">...</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_writing'))
            .catch(error => {
                console.error(error);
            });

        
    </script>
@endsection
