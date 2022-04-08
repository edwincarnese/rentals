<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Capstone</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    {{-- <link href="assets/images/favicon.ico" type="img/x-icon" rel="shortcut icon"> --}}
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/iconfont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/helper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">   
    <!-- Modernizr JS -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>

    <div id="main-wrapper">
        @include('partials.header')

        @yield('content')

        @include('partials.footer')
    </div>

<!-- All jquery file included here -->
{{-- <script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script> --}}
<script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22"></script>
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-1.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
{{-- <script src="{{ asset('assets/js/map-place.js') }}"></script> --}}
<script src="{{ asset('assets/js/main.js') }}"></script>

@yield('js')
</body>
</html>
