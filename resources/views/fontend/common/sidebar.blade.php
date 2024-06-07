<div class="navbar-vertical navbar nav-dashboard">
    <div class="h-100" data-simplebar>
        <!-- Brand logo -->
        <a class="navbar-brand" href="{{URL::to('/')}}">
            <img src="{{asset('frontend/images/logo-app.png')}}"
                alt="dash ui - bootstrap 5 admin dashboard template">
        </a>
        <!-- Navbar admin nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse"
                    data-bs-target="#navEmail" aria-expanded="false" aria-controls="navEmail">
                    <i data-feather="mail" class="nav-icon me-2 icon-xxs">
                    </i> Học viên
                </a>
                <div id="navEmail" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link has-arrow " href="{{ URL::to('student') }}">
                                Danh sách
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="card bg-light shadow-none text-center mx-4 my-8">
            <div class="card-body py-6">
                <img src="../assets/images/background/giftbox.png" alt="dash ui - admin dashboard template">
                <div class="mt-4">
                    <h5>Chúc bạn làm bài thi thật tốts</h5>
                    <p class="fs-6 mb-4">
                        Hãy tạo thói quen học hỏi mỗi ngày. Bản thân bạn là nguồn tài nguyên quý báu nhất của mình.
                        Không có người hoàn hảo, chỉ có người đang phấn đấu trở nên tốt hơn. Hãy tìm kiếm sự hỗ trợ và
                        học hỏi từ người khác. Sự đổi mới là kết quả của sự dám thử nghiệm và rủi ro
                    </p>
                    <a href="#" class="btn btn-secondary btn-sm">novateen.vn</a>
                </div>
            </div>
        </div>

    </div>
</div>
