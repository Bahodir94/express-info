<!-- Mobile menu -->

<div id="offcanvas" uk-offcanvas="flip: true; overlay: true" class="uk-offcanvas vid-offcanvas" >
    <div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
        <div class="uk-margin-bottom content-header-item ">
            <a class="link-effect font-w700" href="{{ route('site.catalog.index') }}">
                <span class="icon">
                    <iconify-icon data-icon="simple-line-icons:fire"></iconify-icon>
                </span>
                <span class="font-size-xl text-dual-primary-dark">Tez</span><span class="font-size-xl text-primary">Info</span>
            </a>
            <nav class="uk-navbar-container vid-bar" uk-navbar>
                <div class="uk-navbar-left">

<!--
                    <ul class="uk-navbar-nav">
                        <li class="uk-active"><a href="#">Регистрация</a></li>
                        <li ><a href="">Войти</a></li>
                    </ul>
-->

                </div>
            </nav>

        </div>
        <ul class="uk-margin-small-bottom uk-nav-primary uk-nav-parent-icon uk-list uk-list-divider" uk-nav="multiple: true">
            <!--class="uk-active"-->
            <li ><a href="{{ route('site.catalog.index') }}">Главная</a></li>
            @foreach ($needs as $need)
                @if (!empty($need->url))
                    <li><a href="{{ $need->url }}">{{ $need->ru_title }}</a></li>
                @else
                <li class="uk-parent">
                    <a>{{ $need->ru_title }}</a>
                    <ul class="uk-nav-sub uk-nav-parent-icon uk-list uk-list-divider" uk-nav="multiple: true">
                        @foreach ($need->menuItems as $menu)
                            <li class="" >
                                <a href="{{ route('site.catalog.main', $menu->ru_slug) }}">{{ $menu->ru_title }}</a>
                                <ul class="uk-nav-sub uk-list">
                                    @foreach ($menu->categories as $category)
                                        <li><a href="{{ route('site.catalog.main', $category->getAncestorsSlugs()) }}">{{ $category->getTitle() }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @endif
            @endforeach
        </ul>
        <a class="uk-button uk-button-primary uk-button-large uk-margin-top" href="#">Добавить компанию</a>



<!--

        <hr class="uk-margin-medium">
        <h3 class="uk-h4 uk-margin-remove-top uk-margin-small-bottom">Полезная информация</h3>

        <ul class="uk-nav uk-nav-default uk-margin-small-bottom">
            <li><a href="#">Помощь FAQ</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Блог</a></li>
        </ul>
-->
    </div>
</div>


<!-- Mobile menu end -->
