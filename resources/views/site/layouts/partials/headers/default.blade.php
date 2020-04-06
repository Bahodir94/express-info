<header class="header-site" id="header">
    <div class="container-fluid">
        <div class="header-wrap">
            <div class="header-left">
                <div class="header-main-toggle">
                    <button class="btn-toggle" type="button" data-toggle="offcanvas"><i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="header-logo"><a class="qdesk-logo" href="#" title="VID"><img class="qdesk-logo-white"
                                                                                         src="{{ asset('front/images/VID.png') }}"
                                                                                         alt="VID"><img
                            class="qdesk-logo-black" src="{{ asset('front/images/VID-black.png') }}" alt="VID"></a>
                </div>
                <div class="navigation" id="navigation">
                    <ul class="main-menu">
                        <li class="active"><a href="/">Главная</a></li>
                        @foreach($needs as $need)
                            <li class="header-menu-item"><a href="#">{{ $need->ru_title }} <i
                                        class="fas fa-caret-down"></i></a>
                                <ul class="sub-menu">
                                    @foreach($need->menuItems as $item)
                                        <li class="menu-item dropdown-submenu">
                                            <a class="d-flex justify-content-between align-items-center"
                                               href="{{ route('site.catalog.main', $item->ru_slug) }}">{{ $item->ru_title }}
                                                <i class="fas fa-caret-right ml-2 mr-3"></i></a>
                                            <ul class="sub-menu">
                                                @foreach($item->categories as $category)
                                                    <li>
                                                        <a href="{{ route('site.catalog.main', $category->ru_slug) }}">{{ $category->getTitle() }}</a>
                                                    </li>
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
            <div class="header-right">
                @guest
                    <ul>
                        <li><a href="{{ route('site.tenders.common.create') }}"><i class="fas fa-plus-circle"></i>
                                Добавить заказ</a></li>
                        <li><a href="{{ route('login')}}"><i class="fas fa-sign-out-alt"></i> Вход</a><span> / </span><a
                                href="{{ route('register')}}">Регистрация</a></li>
                    </ul>
                @endguest
                @auth
                    <ul>
                        @if (auth()->user()->hasRole('customer')) <li><a href="{{ route('site.tenders.common.create') }}"><i class="fas fa-plus-circle"></i>
                                Добавить заказ</a></li>@endif
                        <li>
                            <a href="#" id="navBarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@if (Auth::user()->name) {{ Auth::user()->name }} @else {{ Auth::user()->email }} @endif <span class="caret"></span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-primary" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </div>
</header>
