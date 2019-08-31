<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @yield('meta')
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>
        @yield('title') - Ayko
    </title>
</head>
<body>

<header>
    <nav class="uk-navbar">
        <a href="#" class=" uk-navbar-brend uk-visible-large"><img src="{{ asset('asstes/img/Image 19.svg') }}" alt="Ayko Logo"></a>
        <div class="uk-navbar-center uk-visible-large">
            <ul class="uk-navbar-nav">
                <li ><a href="">Главная</a></li>
                @foreach($needs as $need)
                    <li class="uk-parent" data-uk-dropdown="{pos:'bottom-center'}">
                        <a href="#">{{ $need->ru_title }}</a>
                        <div class="uk-dropdown uk-dropdown-width-4" data-uk-dropdown="{delay: 500}">
                            <div class="uk-grid uk-dropdown-grid">
                                @foreach($need->categories as $category)
                                    <div class="uk-width-1-4">
                                        <ul class="uk-nav">
                                            <div class="dropdown_wrapper">
                                                <img src="{{ $category->getImage() }}" alt="{{ $category->getTitle() }}">
                                                <a href="@if($category->hasCategories()) {{ route('site.catalog.category', $category->id) }} @else # @endif">{{ $category->ru_title }}</a>
                                            </div>
                                            @foreach($category->categories as $child)
                                                <li><a href="{{ route('site.catalog.category', $child->id) }}">{{ $child->ru_title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <a href="#offcanvas" class="coloroff uk-hidden-large" data-uk-offcanvas><i class="fa fa-bars"></i></a>
        <a href="#" class=" uk-navbar-brend uk-navbar-center uk-hidden-large  uk-hidden-small"><img src="{{ asset('assets/img/Image 19.svg') }}" alt=""></a>
        <div class="rig uk-navbar-right">
            <a class="autprization" href=""><span><img src="{{ asset('assets/img/user.svg') }}" alt=""></span> Вход</a>
            <a href="">Регистрация</a>
        </div>
    </nav>
</header>
<!-- Mobile menu -->
<div id="offcanvas" class="uk-offcanvas">
    <div class="uk-offcanvas-bar" data-uk-offcanvas="{mode:'slide'}">
        <ul class="uk-nav uk-nav-offcanvas">
            <li ><a href="">Главная</a></li>
            @foreach($needs as $need)
                <li class="uk-parent" data-uk-dropdown="{pos:'bottom-center'}">
                    <a href="#">{{ $need->ru_title }}</a>
                    <div class="uk-dropdown uk-dropdown-width-4" data-uk-dropdown="{delay: 500}">
                        <div class="uk-grid uk-dropdown-grid">
                            @foreach($need->categories as $category)
                                <div class="uk-width-1-4">
                                    <ul class="uk-nav">
                                        <div class="dropdown_wrapper">
                                            <img src="{{ $category->getImage() }}" alt="{{ $category->getTitle() }}">
                                            <a href="@if($category->hasCategories()) {{ route('site.catalog.category', $category->id) }} @else # @endif">{{ $category->ru_title }}</a>
                                        </div>
                                        @foreach($category->categories as $child)
                                            <li><a href="{{ route('site.catalog.category', $child->id) }}">{{ $child->ru_title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- Mobile menu end -->

@yield('search')

@yield('heading')

@include('site.components.services')

@yield('content')

<!-- Footer -->
<footer>
    <div class=" uk-container-large  uk-container-center">
        <div class="footer_info">
            <ul class="soc">
                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                <li><a href=""><i class="fa fa-youtube-play"></i></a></li>
                <li><a href=""><i class="fa fa-paper-plane"></i></a></li>
            </ul>
            <p>Создано в <a href="https://vid.uz/">VID</a></p>
            <p>©Права защищены</p>
        </div>
    </div>
</footer>
<!-- Footer end -->

<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/uikit.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
