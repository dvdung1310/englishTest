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
                    <div class="col-lg-12 col-12">
                        @if (session('successQuestionWriting'))
                            <div class="alert alert-success mb-5">
                                {{ session('successQuestionWriting') }}
                            </div>
                        @endif
                        <form id="writingform" action="{{ route('update_question_writing') }}"
                            method="GET">
                            <input type="hidden" value="{{ $quesion->question_id }}" name="question_id">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div>
                                        <div class="mb-5 editorContainer">
                                            <label class="form-label fw-bold">Câu hỏi chung</label>
                                            <textarea name="question_name" class="form-control " id="editor_writing">{{ $quesion->question_name }}</textarea>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mb-3">
                                            <label class="form-label">Gợi ý</label>
                                            <input type="text" value="{{ $quesion->recommend }}" name="recommend" class="form-control"
                                                placeholder="Gợi ý cho học sinh" required>
                                        </div>
                                    </div>

                                    @if(isset($quesionChildren))
                                    <div>
                                        <input type="hidden" value="{{ $quesionChildren->question_id }}" name="question_children_id">
                                        <div class="mb-5">
                                            <label class="form-label">Câu hỏi con <span
                                                    style="color: red">(nếu có)</span></label>
                                            <textarea name="question_children_name" class="form-control " id="editor1">
                                                {{ isset($quesionChildren) ? $quesionChildren->question_name : '' }}</textarea>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="">
                                        <button id="writingsubmit" type="submit" class="btn btn-primary">
                                            Sửa câu hỏi
                                        </button>
                                    </div>


                                </div>
                            </div>
                        </form>

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
