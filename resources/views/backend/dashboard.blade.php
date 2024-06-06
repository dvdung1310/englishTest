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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}">


    <!-- Libs CSS -->
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/%40mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet">



    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">

    <title>Đề thi của tôi</title>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> --}}
</head>

<body>
    <!-- Wrapper -->
    <main id="main-wrapper" class="main-wrapper">
        
       <!-- header -->
       @include('backend.common.header')
     <!-- end header -->
        <!-- Sidebar -->
        @include('backend.common.sidebar')
         <!-- end Sidebar -->


         @yield('content')
       
        <!-- Scripts -->

        <!-- Libs JS -->
        <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/feather-icons/dist/feather.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>




        <!-- Theme JS -->
        <script src="{{ asset('assets/js/theme.min.js') }}"></script>
        <!-- popper js -->
        <script src="{{ asset('assets/libs/%40popperjs/core/dist/umd/popper.min.js') }}"></script>
        <!-- tippy js -->
        <script src="{{ asset('assets/libs/tippy.js/dist/tippy-bundle.umd.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendors/tooltip.js') }}"></script>
        <script src="{{ asset('assets/js/vendors/counter.js') }}"></script>


</body>

<!-- Mirrored from dashui.codescandy.com/dashuipro/pages/invoice-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2024 09:15:52 GMT -->

</html>
