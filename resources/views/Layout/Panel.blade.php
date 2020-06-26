<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فیلم</title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="{{asset('assets/vendors/bundle.css')}}" type="text/css">
    <!-- end::global styles -->
    <!-- begin::select2 -->
    <link rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}" type="text/css">
    <!-- end::select2 -->
    <link rel="stylesheet" href="{{asset('assets/vendors/dropify/dropify.css')}}">

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" type="text/css">
    <!-- end::custom styles -->

    <!-- begin::favicon -->
    <link rel="shortcut icon" href="{{asset('assets/media/image/favicon.png')}}">
    <!-- end::favicon -->

    <!-- begin::theme color -->
    <meta name="theme-color" content="#3f51b5" />
    <!-- end::theme color -->

</head>

<body class="icon-side-menu">

    <!-- begin::page loader-->
    <div class="page-loader">
        <div class="spinner-border"></div>
        <span>در حال بارگذاری ...</span>
    </div>
    <!-- end::page loader -->
    @include('Includes.Panel.sidebar')
    @include('Includes.Panel.side-menu')
    @include('Includes.Panel.navbar')
    <!-- begin::main content -->
    <main class="main-content">
        @yield('content')
    </main>
    <!-- end::main content -->

    <!-- begin::global scripts -->
    <script src="{{asset('assets/vendors/bundle.js')}}"></script>
    <!-- end::global scripts -->

    <!-- begin::chart -->
    <script src="{{asset('assets/vendors/charts/chart.min.js')}}"></script>
    <script src="{{asset('assets/vendors/charts/sparkline.min.js')}}"></script>
    <script src="{{asset('assets/vendors/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/js/examples/charts.js')}}"></script>
    <!-- end::chart -->
    <!-- dropify -->
    <script src="{{asset('assets/vendors/dropify/dropify.min.js')}}"></script>
    <!-- end::dropify -->
    <script src="{{asset('assets/vendors/jquery-form/jquery.form.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jquery-validate/jquery.validate.js')}}"></script>
    <script src="{{asset('assets/vendors/select2/js/select2.min.js')}}"></script>
    <!-- begin::custom scripts -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <!-- end::custom scripts -->


</body>

</html>