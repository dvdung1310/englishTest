@extends('backend.dashboard')
@section('content')
    <div id="app-content">
        <div class="app-content-area">
            <div class="container-fluid">
                <div class="row">
                    <style>
                        .ck-editor__editable_inline {
                            height: 100px;
                        }

                        .editorContainer .ck-editor__editable_inline {
                            height: 300px;
                        }

                        .btn-question-writing {
                            color: #fff;
                            border-color: #2dce89;
                            background-color: #2dce89;
                            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
                            padding: 10px;
                            margin-left: 20px;
                        }
                    </style>

                    <div class="col-lg-12 col-12 mb-5">
                        <div class="editorContainer">
                            <label class="form-label fw-bold me-3 mb-0">READING PASSAGE</label>
                            <textarea id="question_passage">
                                {!! $question_passage->question_name !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                @foreach($quesionCate as $key=>$item)
                                <a href="{{ route('detail_question_reading', ['question_passage_id' => $question_passage->question_id, 'question_cate_id' => $item->question_id]) }}">
                                    <button class="btn-question-writing btn">Question {{ $key + 1 }}</button>
                                </a>
                                @endforeach
                            </div>


                            <div class="">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home"
                                           role="tab" aria-controls="pills-home" aria-selected="true">+ Thêm câu hỏi con</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        @if (session('success'))
                            <div class="alert alert-success mt-5 px-5">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="tab-content p-4" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                 aria-labelledby="pills-home-tab">
                                 <div class="card mb-4">
                                    <form action="{{ route('store_question_reading') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $question_passage->question_id }}" name="question_id">
                                        <input type="hidden" value="{{ $question_passage->skills_id }}" name="skills_id">
                                        <div class="card-body">
                                            <div>
                                                <div class="mb-5 editorContainer">
                                                    <label class="form-label fw-bold">Câu hỏi con</label>
                                                    <textarea name="question_name" class="form-control " id="editor_reading"></textarea>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button id="writingsubmit" type="submit" class="btn btn-primary">
                                                    Lưu câu hỏi con
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor_reading'))
            .catch(error => {
                console.error(error);
            });

            ClassicEditor
            .create(document.querySelector('#question_passage'))
            .catch(error => {
                console.error(error);
            });
           
    document.addEventListener('DOMContentLoaded', function () {
        var homeTab = document.getElementById('pills-home-tab');
        var homeContent = document.getElementById('pills-home');

        homeTab.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent the default behavior of the link
            if (homeContent.classList.contains('show')) {
                // If the tab content is visible, hide it
                homeContent.classList.remove('show', 'active');
                homeTab.classList.remove('active');
            } else {
                // If the tab content is hidden, show it
                homeContent.classList.add('show', 'active');
                homeTab.classList.add('active');
            }
        });
    });

    </script>
@endsection
