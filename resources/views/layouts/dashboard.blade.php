<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="apm pigeon">
    <meta name="keywords" content="apm pigeon">
    <meta name="author" content="Apm">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="apple-touch-icon" href="{{ asset('images/dashboard/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/dashboard/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/dashboard/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/dashboard/css/charts/apexcharts.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('vendors/dashboard/css/extensions/toastr.min.css') }}"> --}}
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/themes/semi-dark-layout.css') }}">


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('css/dashboard/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css"
        {{-- href="{{ asset('css/dashboard/plugins/extensions/ext-component-toastr.css') }}"> --}}
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/style.css') }}"> --}}
    <!-- END: Custom CSS-->

    <!-- Scripts -->
    <!-- BEGIN: Vendor JS-->
    <script defer src="{{ asset('vendors/dashboard/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script defer src="{{ asset('vendors/dashboard/js/ui/jquery.sticky.js') }}"></script>
    {{-- <script defer src="{{ asset('vendors/dashboard/js/charts/apexcharts.min.js') }}"></script> --}}
    {{-- <script defer src="{{ asset('vendors/dashboard/js/extensions/toastr.min.js') }}"></script> --}}
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script defer src="{{ asset('js/dashboard/core/app-menu.js') }}"></script>
    <script defer src="{{ asset('js/dashboard/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script defer src="{{ asset('js/dashboard/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <!-- END: Page JS-->

    {{-- <script defer>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script> --}}
    {{-- end script --}}
    @stack('head')


</head>

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="">
    <div id="app">

        @yield('navbar')
        {{-- @include('layouts/navbar') --}}
        <main>
            @yield('content')
        </main>
        @yield('footer')

    </div>

</body>

</html>
