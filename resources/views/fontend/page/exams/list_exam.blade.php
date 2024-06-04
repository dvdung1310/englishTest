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
                        <h3 class="mb-0 ">Đề thi của tôi</h3>
                    </div>
                </div>
            </div>
            <div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mb-5">
                        <div class="card card-lift">
                            <div class="card-body">
                                <div class="">
                                     <h2>IELTS PLACEMENT TEST CODE 1.1</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-5">
                        <div class="card card-lift">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="icon-shape icon-md bg-info-soft text-info rounded-3">
                                        <i data-feather="file-text" class="icon-xs"></i>
                                    </div>
                                    <div>
                                        <span class="text-danger"><i data-feather="arrow-down-right"
                                                class="icon-xs"></i>
                                            -3.18 %</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="fw-semi-bold">Invoices</span>
                                    <h3 class="mb-0 mt-1 fw-bold ">
                                        <span class="counter-value" data-target="167">0</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-5">
                        <div class="card card-lift">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="icon-shape icon-md bg-danger-soft text-danger rounded-3">
                                        <i data-feather="heart" class="icon-xs"></i>
                                    </div>
                                    <div>
                                        <span class="text-success"><i data-feather="arrow-up-right"
                                                class="icon-xs"></i>
                                            +183</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="fw-semi-bold">Sent Invoiced</span>
                                    <h3 class="mb-0 mt-1 fw-bold ">
                                        $<span class="counter-value" data-target="41.56">0</span>k
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-5">
                        <div class="card card-lift">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-5">
                                    <div class="icon-shape icon-md bg-primary-soft text-primary rounded-3">
                                        <i data-feather="activity" class="icon-xs"></i>
                                    </div>
                                    <div>
                                        <span class="text-success"><i data-feather="arrow-up-right"
                                                class="icon-xs"></i>
                                            +6.18 %</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="fw-semi-bold">Paid</span>
                                    <h3 class="mb-0 mt-1 fw-bold ">
                                        $<span class="counter-value" data-target="33.16">0</span>k
                                    </h3>
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