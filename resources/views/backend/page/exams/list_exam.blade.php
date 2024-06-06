@extends('backend.dashboard')
@section('content')
<div id="app-content">
    <!-- Container fluid -->
    <div class="app-content-area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="mb-5">
              <h3 class="mb-0">Danh sách bài test</h3>
            </div>
          </div>
        </div>
        <div>
          <!-- row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-md-flex border-bottom-0">
                  <div class="flex-grow-1">
                    <a href="{{ route('add_exam') }}" class="btn btn-primary">+ Thêm bài test</a>
                  </div>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive table-card">
                    <table id="example" class="table text-nowrap table-centered mt-0" style="width: 100%">
                      <thead class="table-light">
                        <tr>
                          <th>STT</th>
                          <th class="ps-1">Hình ảnh</th>
                          <th>Tên bài test</th>
                          <th>Ngày tạo</th>
                          <th>Câu hỏi</th>
                          <th>Trạng thái</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($exam as $key=>$item)
                        <tr>
                          <th>{{ $key + 1 }}</th>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <img src="{{ asset($item->exam_img) }}" alt=""
                                class="img-4by3-sm rounded-3">
                            </div>
                          </td>
                          <td>{{ $item->exam_name }}</td>
                          <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                          <td><a href="{{ route('skills_exam',['exam_id'=>$item->exam_id]) }}">Chi tiết</a></td>
                         
                          <td>
                            <span class="badge badge-success-soft">Active</span>
                          </td>
                          <td>
                            <a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                              data-template="eyeOne">
                              <i data-feather="eye" class="icon-xs"></i>
                              <div id="eyeOne" class="d-none">
                                <span>View</span>
                              </div>
                            </a>
                            <a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
                              data-template="editOne">
                              <i data-feather="edit" class="icon-xs"></i>
                              <div id="editOne" class="d-none">
                                <span>Edit</span>
                              </div>
                            </a>
                            <a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"
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
@endsection