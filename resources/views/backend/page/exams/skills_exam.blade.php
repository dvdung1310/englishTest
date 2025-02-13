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

                            .btn-question-writing {
                                color: #fff;
                                border-color: #2dce89;
                                background-color: #2dce89;
                                box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
                                padding: 10px;
                                margin-left: 20px;
                            }
                        </style>
                        <div class="col-12 d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" id="pills-home-tab" data-bs-toggle="pill"
                                        href="#pills-home" role="tab" aria-controls="pills-home"
                                        aria-selected="true">WRITING</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  fw-bold" id="pills-profile-tab" data-bs-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">LISTENING</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active fw-bold" id="pills-contact-tab" data-bs-toggle="pill"
                                        href="#pills-contact" role="tab" aria-controls="pills-contact"
                                        aria-selected="false">READING</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content p-4" id="pills-tabContent">
                            {{-- bài viết WRITING --}}
                            <div class="tab-pane fade" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                
                                <div class="row">
                                       <div class="col-lg-12 col-12">
                                        <div class="mb-4">
                                          <div>
                                            <div class="justify-content-between d-md-flex border-bottom-0">
                                              <div>
                                                <h3 class="fw-bold">Danh sách các câu hỏi</h3>
                                              </div>
                                              <div class="">
                                                @if (isset($skillWriting))
                                                <a href="{{ route('add_question_writing',['skills_id'=>$skillWriting->skills_id]) }}" class="btn btn-primary">+ Thêm câu hỏi</a>
                                                @endif
                                               
                                              </div>
                                            </div>
                                          </div>
                                          <div class="d-flex">
                                            @foreach ($quesionWriting as $key=>$item)
                                            <a href="{{ route('detail_question_writing',['question_id'=>$item->question_id]) }}">
                                              <button class="btn-question-writing btn">Câu {{ $key+1 }}</button>
                                          </a>
                                            @endforeach
                                              
                                          </div>
                                      </div>
                                       </div>
                                    
                                    <div class="col-lg-12 col-12">
                                        <div class="row">
                                          <div class="col-md-3 col-12">
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
                                </div>
                            </div>
                            {{-- bài viết LISTENING --}}
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                     <div class="mb-4">
                                       <div>
                                         <div class="justify-content-between d-md-flex border-bottom-0">
                                           <div>
                                             <h3 class="fw-bold">Danh sách các file âm thanh</h3>
                                           </div>
                                         </div>
                                       </div>
                                       <div class="d-flex">
                                         @foreach ($quesionListening as $key=>$item)
                                         <a href="{{ route('add_question_listening',['question_id'=>$item->question_id]) }}">
                                           <button class="btn-question-writing btn">File âm thanh {{ $key+1 }}</button>
                                       </a>
                                         @endforeach
                                           
                                       </div>
                                   </div>
                                    </div>
                                 
                                 <div class="col-lg-12 col-12">
                                     <div class="row">
                                       <div class="col-md-3 col-12">
                                         <form action="{{ route('store_listening') }}" method="GET">
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
                                                               value="{{ isset($skillListening) ? $skillListening->skills_time : '' }}"
                                                               class="form-control" placeholder="Nhập thời gian">
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>

                                           <div class="d-grid">
                                               <button type="submit" class="btn btn-primary">
                                                   Tạo Listening
                                               </button>
                                           </div>

                                           @if (session('successWriting'))
                                               <div class="alert alert-success mt-5">
                                                   {{ session('successWriting') }}
                                               </div>
                                           @endif
                                       </form>
                                       </div>

                                       <div class="col-lg-9 col-12">
                                        <form id="form_file" action="{{ route('store_music_listening') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ isset($skillListening) ? $skillListening->skills_id : '' }}" name="skills_id">
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
            
                                            <div class="d-flex justify-content-end">
                                                <div class="">
                                                    @if (isset($skillListening))
                                                    <button id="submitButton" type="submit" class="btn btn-primary">
                                                        + Thêm file âm thanh
                                                    </button>
                                                    @else
                                                    <i>Chú ý : file tạo file Listening trước mới được thêm file</i>
                                                    @endif
                                                   
                                                  </div>
                                                
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
                            {{-- bài viết READING --}}
                            <div class="tab-pane fade show active" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                            
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                     <div class="mb-4">
                                       <div>
                                         <div class="justify-content-between d-md-flex border-bottom-0">
                                           <div>
                                             <h3 class="fw-bold">Danh sách các READING</h3>
                                           </div>
                                           
                                         </div>
                                       </div>
                                       <div class="d-flex">
                                         @foreach ($quesionReading as $key=>$item)
                                         <a href="{{ route('add_question_reading',['question_id'=>$item->question_id]) }}">
                                           <button class="btn-question-writing btn">READING {{ $key+1 }}</button>
                                       </a>
                                         @endforeach
                                           
                                       </div>
                                   </div>
                                    </div>
                                 
                                 <div class="col-lg-12 col-12">
                                     <div class="row">
                                       <div class="col-md-3 col-12">
                                         <form action="{{ route('store_reading') }}" method="GET">
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
                                                               value="{{ isset($skillReading) ? $skillReading->skills_time : '' }}"
                                                               class="form-control" placeholder="Nhập thời gian">
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>

                                           <div class="d-grid">
                                               <button type="submit" class="btn btn-primary">
                                                   Tạo READING
                                               </button>
                                           </div>

                                           @if (session('successReading'))
                                               <div class="alert alert-success mt-5">
                                                   {{ session('successReading') }}
                                               </div>
                                           @endif
                                       </form>
                                       </div>

                                       <div class="col-lg-9 col-12">
                                        <form id="form_file" action="{{ route('store_passage_reading') }}" method="get"
                                            enctype="multipart/form-data">
                                           
                                            <input type="hidden" value="{{ isset($skillReading) ? $skillReading->skills_id : '' }}" name="skills_id">
                                            <div class="card mb-4">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div>
                                                        <div class="mb-4">
                                                            <!-- heading -->
                                                            <h4 class="mb-4">Thêm READING</h4>
                                                            <textarea name="question_name" id="question_passage_reading"></textarea>
                                                        </div>
            
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="d-flex justify-content-end">
                                                <div class="">
                                                    @if (isset($skillReading))
                                                    <button id="submitButton" type="submit" class="btn btn-primary">
                                                        + Thêm READING
                                                    </button>
                                                    @else
                                                    <i>Chú ý : file tạo file reading trước mới được thêm file</i>
                                                    @endif
                                                   
                                                  </div>
                                                
                                            </div>
            
                                            @if (session('successPassage'))
                                                <div class="alert alert-success mt-5">
                                                    {{ session('successPassage') }}
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                     </div>
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
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_writing'))
            .catch(error => {
                console.error(error);
            });

            ClassicEditor
            .create(document.querySelector('#question_passage_reading'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
