<header class="header-site" id="header">
    <div class="container-fluid">
        <div class="header-wrap">
            <div class="header-left">
                <div class="header-main-toggle">
                    <button class="btn-toggle" type="button" data-toggle="offcanvas"><i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="header-logo"><a class="qdesk-logo" href="#" title="QDesk"><img class="qdesk-logo-white"
                                                                                           src="{{ asset('front/images/VID.png') }}"
                                                                                           alt="VID"><img
                            class="qdesk-logo-black" src="{{ asset('front/images/logo-black.png') }}" alt="VID"></a></div>
                <div class="navigation" id="navigation">
                    <ul class="main-menu">
                        <li class="active"><a href="/">Главная</a></li>
                        @foreach($needs as $need)
                            <li><a href="#">{{ $need->ru_title }} <i class="fas fa-caret-down"></i></a>
                                <ul class="sub-menu">
                                    @foreach($need->menuItems as $item)
                                        <li><a href="{{ route('site.catalog.main', $item->ru_slug) }}">{{ $item->ru_title }} <i class="fas fa-caret-right"></i></a>
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
                <ul>
                    <li><a href="#"><i class="fas fa-plus-circle"></i> Добавить заказ</a></li>
                    <li><a href="29_sign_in.html"><i class="fas fa-sign-out-alt"></i> Вход</a><span> / </span><a
                            href="30_register.html">Регистрация</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>





