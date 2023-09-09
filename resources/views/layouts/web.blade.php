<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--<![endif]-->
<!-- Header Start -->

<head>
<title>Old Barber Chair</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="old barber chair">
    <meta name="author" content="mikant.com.ar">

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
    <link rel="manifest" href="{{ asset('assets/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!--Main Css Start-->
    <link rel="stylesheet" href="{{ asset('assetsWeb/css/main.css') }}">
    <!--Main Css End-->
    <!--color changing css file-->
    <link rel="stylesheet" id="theme-change" type="text/css" href="#">
    <!--color changing css file end-->
</head>
<!-- Header End -->
<!-- Body Start -->

<body>
    <!-- color picker starts -->

    <!-- color picker ends-->
    <!-- header top section start-->
    @include('web.parts._header')
    <!-- header menu section end -->
    <!-- slider_part -->
    @include('web.parts._slider')
    <!-- slider_part end-->
    <!-- gallery section start-->
    @include('web.parts._products')
    <!-- gallery section end-->
    @include('web.parts._hours')
    <!-- section_accordian -->
    @include('web.parts._count')
    <!-- services -->
    @include('web.parts._services')
    <!-- map -->
    @include('web.parts._map')
    <!-- footer start -->
    @include('web.parts._footer')
    <!-- Bootstrap script -->
    <script src="{{ asset('assetsWeb/js/jquery.min.js') }}">
    </script>
    <script src="{{ asset('assetsWeb/js/bootstrap.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assetsWeb/js/scripts.js') }}">
    </script>
    <!-- script -->
    <!-- bx slider script -->
    <script type="text/javascript" src="{{ asset('assetsWeb/js/plugins/bxcrousel/js/jquery-bxslider.js') }}">
    </script>
    <!-- bx slider script end -->
    <!-- REVOLUTION JS FILES -->
    <script type="text/javascript" src="{{ asset('assetsWeb/js/plugins/revolution/js/jquery.themepunch.tools.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assetsWeb/js/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assetsWeb/js/plugins/revolution/js/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assetsWeb/js/plugins/revolution/js/revolution.extension.navigation.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assetsWeb/js/plugins/revolution/js/revolution.extension.slideanims.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assetsWeb/js/plugins/revolution/js/revolution.extension.actions.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assetsWeb/js/plugins/revolution/js/revolution.extension.parallax.min.js') }}">
    </script>
    <!-- REVOLUTION JS FiLES -->
    <!-- photo gallery -->
    <script src="{{ asset('assetsWeb/js/plugins/photogallery/js/jquery.prettyPhoto.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assetsWeb/js/plugins/portfolio/js/jquery.mixitup.js') }}" type="text/javascript">
    </script>
    <!-- photo gallery -->
    <!-- ui tabs  -->
    <script src="{{ asset('assetsWeb/js/plugins/uitabs/js/jquery-ui.js') }}" type="text/javascript">
    </script>
    <!-- ui tabs  -->
    <!--counter js-->
    <script type="text/javascript" src="{{ asset('assetsWeb/js/plugins/counter/js/jquery.countTo.js') }}">
    </script>
    <!--counter js-->
</body>
<!-- Body End -->

</html>
