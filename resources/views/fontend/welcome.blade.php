<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dashui.codescandy.com/dashuipro/pages/invoice-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2024 09:15:51 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Codescandy">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-M8S4MT3EYG');
    </script>


    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/theme.min.css">

    <title>Đề thi của tôi</title>
</head>

<body>
    <!-- Wrapper -->
    <main id="main-wrapper" class="main-wrapper">

        <!-- header -->
        @include('fontend.common.header')
        <!-- end header -->
        <!-- Sidebar -->
        @include('fontend.common.sidebar')
        <!-- end Sidebar -->


        @yield('content')

        <!-- Scripts -->

        <!-- Libs JS -->
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/feather-icons/dist/feather.min.js"></script>
        <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>




        <!-- Theme JS -->
        <script src="../assets/js/theme.min.js"></script>
        <!-- popper js -->
        <script src="../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
        <!-- tippy js -->
        <script src="../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
        <script src="../assets/js/vendors/tooltip.js"></script>
        <script src="../assets/js/vendors/counter.js"></script>
        <script>
            $(document).ready(function() {
                // Ẩn thông báo khi trang được tải
                $(".box_alert").hide();
                if ($(".box_alert").length > 0) {
                    $(".box_alert").slideDown().delay(5000).slideUp();
                }
            });
        </script>

</body>

<!-- Mirrored from dashui.codescandy.com/dashuipro/pages/invoice-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2024 09:15:52 GMT -->

</html>
