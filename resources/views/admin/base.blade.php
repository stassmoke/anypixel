<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/efc7be1369.js"></script>
    <title>Anypixel - Admin</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('/admin/assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('/admin/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body>

<div id="preloader">
    <div class="loader"></div>
</div>

<div class="page-container">
    @include('admin.inculdes.side')

    <div class="main-content">

        @include('admin.inculdes.header')

        <div class="main-content-inner">
            @yield('body')
        </div>
    </div>

    @include('admin.inculdes.footer')

</div>
<!-- offset area end -->
<!-- jquery latest version -->
<script src="{{ asset('/admin/assets/js/jquery-3.4.1.min.js') }}"></script>
<!-- bootstrap 4 js -->
<script src="{{ asset('/admin/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/jquery.slicknav.min.js') }}"></script>

<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- start zingchart js -->
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
</script>
<!-- all line chart activation -->
<script src="{{ asset('/admin/assets/js/line-chart.js') }}"></script>
<!-- all pie chart -->
<script src="{{ asset('/admin/assets/js/pie-chart.js') }}"></script>
<!-- others plugins -->
<script src="{{ asset('/admin/assets/js/plugins.js') }}"></script>
<script src="{{ asset('/admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('/admin/assets/js/preloader.js') }}"></script>
</body>
</html>

