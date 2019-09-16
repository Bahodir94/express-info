<!-- Header Menu -->



<!--media: 960; show-on-up: true; animation: uk-animation-slide-top; cls-active: uk-navbar-sticky; sel-target: .uk-navbar-container;-->
<!--bottom: #offset; cls-active: uk-navbar-sticky; sel-target: .uk-navbar-container;-->
<div class="uk-light ad-v6">
    <div uk-sticky="animation: uk-animation-slide-top; media: 960; show-on-up: true; cls-active: uk-navbar-sticky; sel-target: .uk-navbar-container;" class="uk-sticky header" style="">
        <div class="uk-navbar-container">
            <div class="uk-container uk-container-expand">
                <nav uk-navbar class="uk-navbar header-top">
                    <div class="uk-navbar-left">
                        <div class="uk-navbar-item  content-header-item ">
                            <a class="link-effect font-w700" href="{{ route('site.catalog.index') }}">
                                <span class="icon">
                                    <iconify-icon data-icon="simple-line-icons:fire"></iconify-icon>
                                </span>
                                <span class="font-size-xl text-dual-primary-dark"></span><span class="font-size-xl text-primary">Porta</span>
                            </a>
                        </div>

                    </div>
                    <div class="uk-navbar-center">
                        <div class="uk-navbar-item uk-visible@m">
                            @include('site.components.search')
                        </div>
                    </div>

                    <div class="uk-navbar-right">
                        <div class="uk-navbar-item uk-hidden@m ">
                            @include('site.layouts.partials.mobile_search')
                        </div>

<!--
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li ><a href="#">Регистрация</a></li>
                            <li ><a href="">Войти</a></li>
                        </ul>
-->
                        <div class="uk-navbar-nav">
                        <a class="uk-button uk-button-primary uk-visible@m " href="#">Добавить компанию</a>
                        </div>
                        <a class="uk-navbar-toggle uk-hidden@m uk-icon uk-navbar-toggle-icon" href="#offcanvas" uk-navbar-toggle-icon="" uk-toggle=""><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="navbar-toggle-icon"><rect y="9" width="20" height="2"></rect><rect y="3" width="20" height="2"></rect><rect y="15" width="20" height="2"></rect></svg></a>




                    </div>

                </nav>

            </div>
        </div>
        <div class="uk-navbar-container " style="">
            <div class="uk-container uk-container-expand">
                <nav uk-navbar class="uk-navbar header-bottom">
                    <div class="uk-navbar-center">
                        <ul class="uk-navbar-nav uk-visible@m">
                            <!--class="uk-active"-->
                            <li ><a href="{{ route('site.catalog.index') }}">Главная</a></li>
                            @foreach ($needs as $need)
                                <li class="uk-parent">
                                        <a href="{{ route('site.catalog.main', $need->ru_slug) }}">{{ $need->ru_title }}</a>
                                        <div uk-dropdown="delay-show: 250;" class="code-dropdown">
                                            <div class=" uk-grid-collapse uk-grid uk-child-width-1-4 " uk-grid>
                                                @foreach ($need->menuItems as $menu)
                                                    <div class="padding-15 ">
                                                        <ul class="uk-nav">
                                                            <div class="dropdown_wrapper">
                                                                <img src="{{ $menu->getImage() }}" alt="">
                                                                <a href="">{{ $menu->ru_title }}</a>
                                                            </div>
                                                            @foreach ($menu->categories as $category)
                                                                <li>
                                                                    <a href="{{ route('site.catalog.main', $category->getAncestorsSlugs()) }}">{!! $category->ru_title !!}</a>
                                                                </li>
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
                </nav>
            </div>
        </div>

    </div>
    <!--  top: 0; bottom: #offset; offset: 75; cls-active: uk-navbar-sticky; sel-target: .uk-navbar-container;  -->
    <!--  top: 0; offset: 75; media: 960; show-on-up: true; cls-active: uk-navbar-sticky; sel-target: .uk-navbar-container;  -->

<!--
    <div uk-sticky="animation: uk-animation-slide-top; top: 0; offset: 75; media: 960; show-on-up: true; cls-active: uk-navbar-sticky; sel-target: .uk-navbar-container;" class="header andir uk-visible@m" style="">

    </div>
-->
</div>

<!--show-hed-search-->


<!-- Header Menu end-->
