<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta
        content="DayOne - It is one of the Major Dashboard Template which includes - HR, Employee and Job Dashboard. This template has multipurpose HTML template and also deals with Task, Project, Client and Support System Dashboard."
        name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="keywords"
          content="admin dashboard, admin panel template, html admin template, dashboard html template, bootstrap 4 dashboard, template admin bootstrap 4, simple admin panel template, simple dashboard html template,  bootstrap admin panel, task dashboard, job dashboard, bootstrap admin panel, dashboards html, panel in html, bootstrap 4 dashboard"/>

    <!-- Title -->
    <title>املاک خندان</title>

    <!--Favicon -->
    <link rel="icon" href="{{asset('assets/images/brand/favicon.ico')}}" type="image/x-icon"/>

    <!-- Bootstrap css -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.css')}}">
    <!-- Style css -->
    <link href="{{asset('assets/css-rtl/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css-rtl/dark.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet"/>

    <link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/sweet-alert/jquery.sweet-modal.min.css')}}" rel="stylesheet">
    <!-- Animate css -->
    <link href="{{asset('assets/css-rtl/animated.css')}}" rel="stylesheet"/>

    <!--Sidemenu css -->
    <link href="{{asset('assets/css-rtl/sidemenu.css')}}" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="{{asset('assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet"/>

    <!---Icons css-->
    <link href="{{asset('assets/css-rtl/icons.css')}}" rel="stylesheet"/>

    <!---Sidebar css-->
    <link href="{{asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet"/>
    <link rel="stylesheet"
          href="{{asset('assets/plugins/date-time-picker-persian/jquery.md.bootstrap.datetimepicker.style.css')}}"/>

    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"/>

    <!--- INTERNAL jvectormap css-->
    <link href="{{asset('assets/plugins/jvectormap/jqvmap.css')}}" rel="stylesheet"/>


    <!-- INTERNAL Data table css -->
    {{-- <link href="{{asset('assets/FontAwesome/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" /> --}}

    <link href="{{asset('assets/css-rtl/style-rtl.css')}}" rel="stylesheet"/>

    <link href="{{asset('assets/css/fonts.css')}}" rel="stylesheet"/>

</head>

<body class="app sidebar-mini">

<!---Global-loader-->
<div id="global-loader">
    <img src="{{asset('assets/images/svgs/loader.svg')}}" alt="loader">
</div>

<div class="page">
    <div class="page-main">

        <!--aside open-->
    @include('admin.layouts.menu')
    <!--aside closed-->

        @include('admin.layouts.header')
        <div class="app-content" style="padding: 20px;">
                @yield('content')
        </div>
    </div>
</div>
        <a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>

        <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>
        <script src="{{asset('assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
        <script src="{{asset('assets/plugins/p-scrollbar/p-scroll1.js')}}"></script>
        <script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>
        <script src="{{asset('assets/plugins/date-time-picker-persian/jquery.md.bootstrap.datetimepicker.js')}}"
                type="text/javascript"></script>
        <script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>

        <script src="{{asset('assets/js/delete-items.js')}}"></script>
        <script src="{{asset('assets/js/custom.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>

        @yield('scripts')
</body>
</html>
