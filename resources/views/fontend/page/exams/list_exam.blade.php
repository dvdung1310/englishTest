@extends('fontend.welcome')
@section('content')
    <div id="app-content">
        <!-- Container fluid -->
        <div class="app-content-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Page header -->
                        <div class="mb-5">
                            <h3 class="mb-0 ">Danh sách đề thi</h3>
                        </div>
                    </div>
                </div>
                <div>
                    <!-- row -->
                    <div class="row">
                        @foreach ($exam as $item)
                            <div class="col-lg-3 col-md-6 col-12 mb-5">
                                <div class="card card-lift">
                                    <div class="card-body">
                                        <div>
                                            <img class="w-100" style="height: 200px" src="{{ asset($item->exam_img) }}"
                                                alt="">
                                        </div>
                                        <div class="mt-2">
                                            <h3>{{ $item->exam_name }}</h3>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter{{ $item->exam_id }}">
                                                Vào bài thi
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter{{ $item->exam_id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">{{ $item->exam_name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Thời gian làm bài thi sẽ được tính ngay sau khi bạn xác nhận
                                            Vui lòng chọn Yes để tiếp tục.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <a type="button" href="{{ route('startExamWriting',['exam_id'=>$item->exam_id]) }}" class="btn btn-primary">Vào thi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
