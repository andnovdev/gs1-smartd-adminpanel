{{-- start coding --}}
<!DOCTYPE html>
{{-- set language --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- end html setting | add head --}}
<head>
    {{-- add meta data --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- end meta data | CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- end csrf token | add title --}}
    <title>{{ config('app.name', 'SMARD DEV2') }}</title>
    {{-- end title | add google font --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700|Indie+Flower" rel="stylesheet">
    {{-- end google font | import css --}}
    <link rel="stylesheet" href="{{ asset('lib/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/css/aos.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('lib/css/style.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
{{-- end head | add body --}}
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div id="app">
        <main class="site-wrap" id="home-section">
            @yield('content')
        </main>
    </div>
    {{-- import jscript --}}
    <script src="{{ asset('lib/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('lib/js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('lib/js/popper.min.js') }}"></script>
    <script src="{{ asset('lib/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('lib/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('lib/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('lib/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('lib/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('lib/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('lib/js/aos.js') }}"></script>
    {{-- main javascript --}}
    <script src="{{ asset('lib/js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
