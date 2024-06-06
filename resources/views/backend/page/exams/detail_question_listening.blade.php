<?php
use App\Http\Controllers\ExamController;
?>
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

                        .css-text p{
                             margin-bottom: 3px;
                        }

                        .css_true p{
                         font-weight:bold;
                        }
                    </style>

                    <div class="col-lg-12 col-12">
                        <div class="d-flex align-items-center">
                            <label class="form-label fw-bold me-3 mb-0">File âm thanh :</label>
                            <audio controls>
                                <source src="{{ asset($question_music->question_name) }}"
                                    type="audio/{{ pathinfo($question_music->question_name, PATHINFO_EXTENSION) }}">
                            </audio>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                @foreach ($quesionListCate as $key => $item)
                                    <a
                                        href="{{ route('detail_question_listening', ['question_music_id' => $question_music->question_id, 'question_cate_id' => $item->question_id]) }}">
                                        <button class="btn-question-writing btn">Question {{ $key + 1 }}</button>
                                    </a>
                                @endforeach
                            </div>


                            <div class="">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab_by_id" data-bs-toggle="pill"
                                            href="#pills_home_id" role="tab" aria-controls="pills_home_id"
                                            aria-selected="true">+ Thêm câu hỏi</a>
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
                            <div class="tab-pane fade" id="pills_home_id" role="tabpanel" aria-labelledby="tab_by_id">
                                <div class="card mb-4">
                                    <form action="{{ route('store_question_listening') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $question_music->question_id }}" name="question_id">
                                        <input type="hidden" value="{{ $question_music->skills_id }}" name="skills_id">
                                        <div class="card-body">
                                            <div>
                                                <div class="mb-5 editorContainer">
                                                    <label class="form-label fw-bold">Câu hỏi chung</label>
                                                    <textarea name="question_name" class="form-control " id="editor_listening"></textarea>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button id="writingsubmit" type="submit" class="btn btn-primary">
                                                    Lưu câu hỏi
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Lua chon --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <form action="{{ route('store_question_listening') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $question_music->question_id }}" name="question_id">
                                        <input type="hidden" value="{{ $question_music->skills_id }}" name="skills_id">
                                        <div class="card-body">
                                            <div>
                                                <div class="mb-5 editorContainer">
                                                    <label class="form-label fw-bold">Câu hỏi chung</label>
                                                    <textarea name="question_name" class="form-control " id="editor_question_listening">{{ $questionCate->question_name }}</textarea>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button id="writingsubmit" type="submit" class="btn btn-primary">
                                                    Sửa câu hỏi
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card mb-4 p-5">
                                    <!-- javascript behavior pills -->
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                href="#pills-home" role="tab" aria-controls="pills-home"
                                                aria-selected="true">Câu tự luận</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                aria-selected="false">Câu trắc nhiệm</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content p-3 pb-0" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                            aria-labelledby="pills-home-tab">
                                            <form action="{{ route('store_question_answer_listening') }}" method="get">
                                                <input type="hidden" name="parent_id"
                                                    value="{{ $questionCate->question_id }}">
                                                <input type="hidden" value="{{ $questionCate->skills_id }}"
                                                    name="skills_id">
                                                <input type="hidden" value="{{ $question_music->question_id }}"
                                                    name="question_music_id">

                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                    aria-labelledby="pills-home-tab">
                                                    <label class="form-label fw-bold">Câu hỏi</label>
                                                    <textarea name="question_name" class="form-control " id="editor_question"></textarea>

                                                    <label class="form-label fw-bold mt-3">Câu trả lời</label>
                                                    <textarea name="question_answer" class="form-control" id="editor_question_answer"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-3">
                                                    Lưu câu hỏi
                                                </button>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                            aria-labelledby="pills-profile-tab">

                                            <form action="{{ route('store_question_answer_choice_listening') }}"
                                                method="get">
                                                <input type="hidden" name="parent_id"
                                                    value="{{ $questionCate->question_id }}">
                                                <input type="hidden" value="{{ $questionCate->skills_id }}"
                                                    name="skills_id">
                                                <input type="hidden" value="{{ $question_music->question_id }}"
                                                    name="question_music_id">

                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                    aria-labelledby="pills-home-tab">
                                                    <label class="form-label fw-bold">Câu hỏi</label>
                                                    <textarea name="question_name" class="form-control" id="editor_question_choice"></textarea>

                                                    <label class="form-label fw-bold mt-3">Câu trả lời</label>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label class="form-label fw-bold">Câu A</label>
                                                            <input type="radio" name="radio" value="A" checked>
                                                            <textarea name="question_answer_1" class="form-control" id="editor_answer_1"></textarea>
                                                        </div>

                                                        <div class="col-6">
                                                            <label class="form-label fw-bold">Câu B</label>
                                                            <input type="radio" name="radio" value="B">
                                                            <textarea name="question_answer_2" class="form-control" id="editor_answer_2"></textarea>
                                                        </div>

                                                        <div class="col-6">
                                                            <label class="form-label fw-bold">Câu C</label>
                                                            <input type="radio" name="radio" value="C">
                                                            <textarea name="question_answer_3" class="form-control" id="editor_answer_3"></textarea>
                                                        </div>

                                                        <div class="col-6">
                                                            <label class="form-label fw-bold">Câu D</label>
                                                            <input type="radio" name="radio" value="D">
                                                            <textarea name="question_answer_4" class="form-control" id="editor_answer_4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-3">Lưu câu hỏi</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table id="example" class="table text-nowrap table-centered mt-0"
                                            style="width: 100%">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên câu hỏi</th>
                                                    <th>Câu trả lời</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($questionChildren as $key => $item)
                                                    <tr>
                                                        <th>{{ $key + 1 }}</th>
                                                        <td>
                                                            {!! $item->question_name !!}
                                                        </td>
                                                        <?php
                                                        $answer = ExamController::getAnswerByQuestionId($item->question_id);
                                                        if ($answer !== null) {
                                                            $count = $answer->count();
                                                        } else {
                                                            $count = 0;
                                                        }
                                                        ?>
                                                        <td>
                                                            @foreach ($answer as $itemAnswer)
                                                                @if ($count == 1)
                                                                    <div class="fw-bold css-text css_true" style="color: green;">
                                                                        {!! $itemAnswer->answer_name !!}
                                                                    </div>
                                                                @else
                                                                    @if ($itemAnswer->answer_boolean == 1)
                                                                        <div class="css-text css_true" style="color: green;">
                                                                            {!! $itemAnswer->answer_name !!}
                                                                        </div>
                                                                    @else
                                                                        <div class="css-text">
                                                                            {!! $itemAnswer->answer_name !!}
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                       
                                                        <td>
                                                            <a href="#!"
                                                                class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                                data-template="eyeOne">
                                                                <i data-feather="eye" class="icon-xs"></i>
                                                                <div id="eyeOne" class="d-none">
                                                                    <span>View</span>
                                                                </div>
                                                            </a>
                                                            <a href="#!"
                                                                class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                                data-template="editOne">
                                                                <i data-feather="edit" class="icon-xs"></i>
                                                                <div id="editOne" class="d-none">
                                                                    <span>Edit</span>
                                                                </div>
                                                            </a>
                                                            <a href="#!"
                                                                class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                                                                data-template="trashOne">
                                                                <i data-feather="trash-2" class="icon-xs"></i>
                                                                <div id="trashOne" class="d-none">
                                                                    <span>Delete</span>
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
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
            .create(document.querySelector('#editor_listening'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_question_listening'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_question'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_question_answer'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_question_choice'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_answer_1'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_answer_2'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_answer_3'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_answer_4'))
            .catch(error => {
                console.error(error);
            });

        document.addEventListener('DOMContentLoaded', function() {
            var homeTab = document.getElementById('tab_by_id');
            var homeContent = document.getElementById('pills_home_id');

            homeTab.addEventListener('click', function(e) {
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
