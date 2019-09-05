<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @yield('meta')
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <title>
        @yield('title') | Tezinfo
    </title>

    <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</head>
<body>

<!-- Header Menu -->
<header>
    <div class="uk-container uk-container-expand uk-container-center">
        <nav class="uk-navbar">
            <div class="content-header-item uk-visible-large">
                <a class="link-effect font-w700" href="{{ route('home') }}">
                    <span class="icon">
                        <iconify-icon data-icon="simple-line-icons:fire"></iconify-icon>
                    </span>
                    <span class="font-size-xl text-dual-primary-dark">Tez</span><span class="font-size-xl text-primary">Info</span>
                </a>
            </div>
            <div class="uk-navbar-center uk-visible-large">
                <ul class="uk-navbar-nav">
                    <li ><a href="{{ route('site.catalog.index') }}">Главная</a></li>
                    @foreach ($needs as $need)
                        <li class="uk-parent">
                            <a href="#">{{ $need->ru_title }}</a>
                            <div class="uk-dropdown uk-dropdown-width-4" data-uk-dropdown="{delay: 500}">
                                <div class=" uk-dropdown-grid uk-grid-collapse" uk-grid>
                                    @foreach ($need->menuItems as $menu)
                                        <div class="uk-width-1-4 padding-15">
                                            <ul class="uk-nav">
                                                <div class="dropdown_wrapper">
                                                    <img src="{{ $menu->getImage() }}" alt="">
                                                    <a href="#">{{ $menu->ru_title }}</a>
                                                </div>
                                                @foreach ($menu->categories as $category)
                                                    <li><a href="{{ route('site.catalog.category', $category->id) }}">{!! $category->ru_title !!}</a></li>
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
            <button type="button" class="menu-button uk-hidden-large" uk-toggle="target: #offcanvas-slide" ><i class="fa fa-bars"></i></button>

            <div class="content-header-item uk-hidden-large  uk-hidden-small">
                <a class="link-effect font-w700" href="{{ route('home') }}">
                    <i class="si si-fire text-primary"></i>
                    <span class="font-size-xl text-dual-primary-dark">Tez</span><span class="font-size-xl text-primary">Info</span>
                </a>
            </div>
        </nav>
    </div>
</header>
<!-- Header Menu end-->

<!-- Mobile menu -->
<div id="offcanvas-slide" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <ul class="uk-nav uk-nav-default" uk-nav>
            <li ><a href="{{ route('site.catalog.index') }}">Главная</a></li>
            @foreach($needs as $need)
                <li class="uk-parent">
                    <a href="#">{{ $need->ru_title }}</a>
                    <ul class="uk-nav-sub">
                        @foreach ($need->menuItems as $menu)
                            <li>
                                <a href="#">{{ $menu->ru_title }}</a>
                                <ul class="uk-nav-sub">
                                    @foreach ($menu->categories as $category)
                                        <li><a href="{{ route('site.catalog.category', $category->id) }}">{{ $category->getTitle() }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- Mobile menu end -->

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
