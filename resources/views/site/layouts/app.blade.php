<!doctype html>
<html lang="ru">
<head>
    <meta name="theme-color" content="#586994">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @yield('meta')
    
    
    <link rel="shortcut icon" type="image/png" href="https://via.placeholder.com/16x16" >

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">

    @yield('css')
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->
    <title>
        @yield('title') | TezInfo
    </title>
    <script src="{{ asset('assets/js/uikit.js') }}"></script>

</head>
<body>
    @yield('header')

    @include('site.layouts.partials.mobile_menu')

    @yield('content')

    @include('site.layouts.partials.footer')
</body>
</html>
