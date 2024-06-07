<?php
use App\Http\Controllers\Frontend\ExamController;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Codescandy">
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/theme.min.css">

    <title>Đề thi WRITING</title>
    <style>
        .box-bg {
            overflow: hidden;
            box-sizing: border-box;
            box-shadow: 0 8px 12px rgba(47, 60, 74, .04), 0 2px 6px rgba(47, 60, 74, .08) !important;
            background: #fff;
            border-radius: 5px;
            padding: 0 20px;
        }

        .class_bg {
            background: #E4E4E4;
        }

        textarea {
            border: 5px solid #29B6F6 !important;
        }
    </style>
</head>

<body>
    {{-- writing --}}
    <div class="writing">
        <div class="px-3">
            <div class="card">
                <div class="text-center">
                    <h1 class="fw-bold pt-4">WRITING</h1>
                    <div class="px-5">
                        <div class="fw-bold mt-4 p-4" style="border-top: 1px solid #cccccc ">
                            TIME APPROX. {{ $skills->skills_time }} phút
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-5" style="overflow-x: hidden ">
            <form action="{{ route('store_skills_writing_user') }}" method="get">
                <input type="hidden" value="{{ $skills->exam_id }}" name="exam_id">
                @foreach ($questionCate as $key => $item)
                    <?php
                    $questionChildren = ExamController::getQuizWritingChildren($item->question_id);
                    if (!empty($questionChildren)) {
                        $text = $questionChildren->question_name;
                        $class_css = 'col-md-6 col-6';
                        $class_bg = 'class_bg';
                    } else {
                        $text = '';
                        $class_css = 'col-md-12 col-12';
                        $class_bg = '';
                    }
                    ?>
                    <div class="card mt-5">
                        <div class="row {{ $class_bg }} py-5">
                            <div class="{{ $class_css }}" style="padding: 0 30px 10px 30px;">
                                <div class="box-bg">
                                    <div class="text-center pt-4">
                                        <h3 class="fw-bold">WRITING TASK {{ $key + 1 }}</h3>
                                    </div>
                                    <div class="text-center">
                                        <i>{{ $item->recommend }}</i>
                                    </div>

                                    <div>
                                        {!! $item->question_name !!}
                                    </div>
                                </div>
                            </div>
                            <div class="{{ $class_css }} " style="padding: 0 30px 10px 30px;">
                                <div class="box-bg py-5">
                                    {!! $text !!}
                                    <div>
                                        @if(empty($text))
                                        <textarea class="form-control textarea" name="writing_answers[{{ $item->question_id }}]" id="" rows="14" placeholder="Type your answer ">{{ $writingArray[$item->question_id] }}</textarea>
                                        @else
                                        <textarea class="form-control textarea" name="writing_answers[{{ $questionChildren->question_id }}]" id="" rows="14" placeholder="Type your answer ">{{ $writingArray[$questionChildren->question_id] }} </textarea>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </form>
        </div>
    </div>


    {{-- listening --}}
    <div class="writing">
        <div class="px-3">
            <div class="card">
                <div class="text-center">
                    <h1 class="fw-bold pt-4">LISTENING</h1>
                    <div class="px-5">
                        <div class="fw-bold mt-4 p-4" style="border-top: 1px solid #cccccc ">
                            TIME APPROX. {{ $skillsMusic->skills_time }} phút
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-5" style="overflow-x: hidden ">
            <form action="{{ route('store_skills_listening_user') }}" method="get">
                <input type="hidden" value="{{ $skillsMusic->exam_id }}" name="exam_id">
                @foreach ($questionMusic as $key => $item)
                    <?php
                    $questionCate = ExamController::getQuizListeningChildren($item->question_id);
                    ?>
                    <div class="card mt-5">
                        {{-- file âm thanh --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="col-12">
                                    <div class="text-center pt-4">
                                        <h3 class="fw-bold">SECTION {{ $key + 1 }}</h3>
                                    </div>
                                    <div class="px-5">
                                        <audio class="w-100" controls>
                                            <source src="{{ asset($item->question_name) }}"
                                                type="audio/{{ pathinfo($item->question_name, PATHINFO_EXTENSION) }}">
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($questionCate as $itemQuestionCate)
                            <div class="row class_bg py-5">
                                <div class="col-6" style="padding: 0 30px 10px 30px;">
                                    <div class="box-bg">
                                        <div>
                                            <i>{!! $itemQuestionCate->question_name !!}</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6" style="padding: 0 30px 10px 30px;">
                                    <?php
                                    // danh sách câu hỏi con cuối
                                    $questionChildren = ExamController::getQuizListeningChildren($itemQuestionCate->question_id);
                                    ?>
                                    <div class="box-bg py-5">
                                        @foreach($questionChildren as $itemsQuestionChildren)
                                        <?php
                                        // danh sách đáp án có thể tự luận hoặc trắc nhiệm
                                        $answer = ExamController::getAnswerQuizListeningChildren($itemsQuestionChildren->question_id);
                                        $countAnswer = $answer->count(); 
                                        ?>
                                        <div class="">
                                            <label class="w-100 listening_question_name">{!! $itemsQuestionChildren->question_name !!}</label>
                                            @if($countAnswer == 1)
                                               <textarea style="margin-top: -10px ;margin-bottom: 10px" class="form-control" name="listening_answers[{{ $itemsQuestionChildren->question_id }}]" rows="1">{{ $listeningArray[$itemsQuestionChildren->question_id] }}</textarea> 
                                               @foreach($answer as $key=>$itemAnswer)
                                               <div class="d-flex fw-bold text-success">
                                                Lời giải : <span class="ms-2">{!! $itemAnswer->answer_name !!}</span>
                                               </div>
                                               @endforeach
                                            @else
                                                @foreach($answer as $key=>$itemAnswer)
                                                <div class="rdio fw-bold d-flex listening_radio"> 
                                                    <input
                                                    @if(!empty($listeningArray[$itemsQuestionChildren->question_id]) &&  $listeningArray[$itemsQuestionChildren->question_id] == $itemAnswer->answer_id)
                                                     checked
                                                    @endif
                                                    value="{{ $itemAnswer->answer_id }}" name="listening_answers[{{ $itemsQuestionChildren->question_id }}]" id="{{ $itemAnswer->answer_id }}{{ $itemsQuestionChildren->question_id }}" type="radio">
                                                    <label class="d-flex" for="{{ $itemAnswer->answer_id }}{{ $itemsQuestionChildren->question_id }}"><p class="ms-2"></p>
                                                        @if($itemAnswer->answer_boolean == 1)
                                                        <div class="d-flex fw-bold text-success">
                                                            {!! $itemAnswer->answer_name !!}
                                                        </div>
                                                        @else
                                                        {!! $itemAnswer->answer_name !!}
                                                        @endif    
                                                    
                                                    </label>
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                @endforeach
            </form>
        </div>
    </div>

    {{-- reading --}}
    <div class="writing">
        <div class="px-3">
            <div class="card">
                <div class="text-center">
                    <h1 class="fw-bold pt-4">READING</h1>
                    <div class="px-5">
                        <div class="fw-bold mt-4 p-4" style="border-top: 1px solid #cccccc ">
                            TIME APPROX. {{ $skillsReading->skills_time }} phút
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-5" style="overflow-x: hidden ">
            <form action="{{ route('store_skills_reading_user') }}" method="get">
                <input type="hidden" value="{{ $skillsReading->exam_id }}" name="exam_id">
                @foreach ($questionPassage as $key => $item)
                    <?php
                    $questionCate = ExamController::getQuizListeningChildren($item->question_id);
                    ?>
                    <div class="card mt-5">
                        {{-- câu hỏi chung --}}
                        <div class="row class_bg">
                            <div class="col-6">
                                <div class="p-3">
                                    <div class="p-3 box-bg">
                                        <div>
                                            <h3>READING PASSAGE {{ $key + 1 }}</h3>
                                        </div>
                                            <div>
                                                {!! $item->question_name !!}
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                @foreach ($questionCate as $itemQuestionCate)
                                <div class="row class_bg py-3">
                                    <div class="col-12">
                                        <div class="col-12" style="padding: 0 30px 10px 30px;">
                                            <div class="box-bg">
                                                <div>
                                                    <i>{!! $itemQuestionCate->question_name !!}</i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" style="padding: 0 30px 10px 30px;">
                                            <?php
                                            // danh sách câu hỏi con cuối
                                            $questionChildren = ExamController::getQuizListeningChildren($itemQuestionCate->question_id);
                                            ?>
                                            <div class="box-bg py-5">
                                                @foreach($questionChildren as $itemsQuestionChildren)
                                                <?php
                                                // danh sách đáp án có thể tự luận hoặc trắc nhiệm
                                                $answer = ExamController::getAnswerQuizListeningChildren($itemsQuestionChildren->question_id);
                                                $countAnswer = $answer->count();
                                                ?>
                                                <div class="">
                                                    <label class="w-100 listening_question_name">{!! $itemsQuestionChildren->question_name !!}</label>
                                                    @if($countAnswer == 1)
                                                       <textarea style="margin-top: -10px ;margin-bottom: 10px" class="form-control" name="reading_answers[{{ $itemsQuestionChildren->question_id }}]" rows="1">
                                                        {{ $readingArray[$itemsQuestionChildren->question_id] }}
                                                    </textarea> 
                                                    @else
                                                    @foreach($answer as $key=>$itemAnswer)
                                                    <div class="rdio fw-bold d-flex listening_radio"> 
                                                        <input
                                                        @if(!empty($readingArray[$itemsQuestionChildren->question_id]) &&  $readingArray[$itemsQuestionChildren->question_id] == $itemAnswer->answer_id)
                                                         checked
                                                        @endif
                                                        value="{{ $itemAnswer->answer_id }}" name="listening_answers[{{ $itemsQuestionChildren->question_id }}]" id="{{ $itemAnswer->answer_id }}{{ $itemsQuestionChildren->question_id }}" type="radio">
                                                        <label class="d-flex" for="{{ $itemAnswer->answer_id }}{{ $itemsQuestionChildren->question_id }}"><p class="ms-2"></p>
                                                            @if($itemAnswer->answer_boolean == 1)
                                                            <div class="d-flex fw-bold text-success">
                                                                {!! $itemAnswer->answer_name !!}
                                                            </div>
                                                            @else
                                                            {!! $itemAnswer->answer_name !!}
                                                            @endif    
                                                        
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </form>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/feather-icons/dist/feather.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../assets/js/theme.min.js"></script>
    <script src="../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
    <script src="../assets/js/vendors/tooltip.js"></script>
    <script src="../assets/js/vendors/counter.js"></script>
</body>

</html>
