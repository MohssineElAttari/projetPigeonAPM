<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/templatemo-chain-app-dev.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animated.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/') }}" rel="stylesheet">
    <link href="{{ asset('css/') }}" rel="stylesheet">
    <!-- Styles -->
    @stack('head')
    

</head>
<body>
    <div id="app">


        <main>
            @yield('content')
        </main>
    </div>
      <!-- Scripts -->
  <script src="{{ asset('jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('js/owl-carousel.js')}}"></script>
  <script src="{{ asset('js/animation.js')}}"></script>
  <script src="{{ asset('imagesloaded.js')}}"></script>
  <script src="{{ asset('js/popup.js')}}"></script>
  <script src="{{ asset('js/custom.js')}}"></script>
</body>
</html>
