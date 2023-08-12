<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<title>Old Barber Chair</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">


    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/charts-c3/plugin.css') }}" /> -->

    <!-- MAIN Project CSS file -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body data-theme="light" class="font-nunito">
    <div id="wrapper" class="theme-cyan">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{ asset('assets/logo_chico.png') }}" width="48" height="48" alt="old barber"></div>
                <p>Cargando Espere...</p>
            </div>
        </div>

        <!-- Top navbar div start -->
        @include('admin.parts._header')

        <!-- main left menu -->
        @include('admin.parts._menu')

        <!-- rightbar icon div -->
        <!-- <div class="right_icon_bar">
            <ul>
                <li><a href="app-inbox.html"><i class="fa fa-envelope"></i></a></li>
                <li><a href="app-chat.html"><i class="fa fa-comments"></i></a></li>
                <li><a href="app-calendar.html"><i class="fa fa-calendar"></i></a></li>
                <li><a href="file-dashboard.html"><i class="fa fa-folder"></i></a></li>
                <li><a href="app-contact.html"><i class="fa fa-id-card"></i></a></li>
                <li><a href="blog-list.html"><i class="fa fa-globe"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fa fa-plus"></i></a></li>
                <li><a href="javascript:void(0);" class="right_icon_btn"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div> -->

        <!-- mani page content body part -->
        <div id="main-content">
            @yield('content')
        </div>

    </div>
    <!-- Javascript -->
    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>

    <!-- page vendor js file -->
    <!-- <script src="{{ asset('assets/vendor/toastr/toastr.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script> -->

    <!-- page js file -->
    <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
    <!-- <script src="../js/index.js') }}"></script> -->
</body>

</html>
