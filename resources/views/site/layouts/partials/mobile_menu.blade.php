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
            
            <ul class="uk-navbar-nav uk-visible@m">
<!--                        <li ><a href="{{ route('site.catalog.index') }}">Главная</a></li>-->
                <li ><a href="#">Регистрация</a></li>
                <li ><a href="">Войти</a></li>
            </ul>
        <!--
            <a class="uk-logo" href="{{ route('site.catalog.index') }}">
                <img src="" width="134" height="30" alt="Project Logo" hidden="true">
            </a>
-->
        </div>
        <ul class="uk-margin-small-bottom uk-nav-primary uk-nav-parent-icon" uk-nav="multiple: true">
            <!--class="uk-active"-->
            <li ><a href="{{ route('site.catalog.index') }}">Главная</a></li>
            @foreach($needs as $need)
                <li class="uk-parent">
                    <a href="#">{{ $need->ru_title }}</a>
                    <ul class="uk-nav-sub uk-nav-parent-icon" uk-nav="multiple: true">

                        @foreach ($need->menuItems as $menu)
                            <li class="uk-parent" >
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
        
        <a class="uk-button uk-button-primary uk-button-large uk-margin-top" href="#">Разместить рекламу</a>

        <hr class="uk-margin-medium">
        <h3 class="uk-h4 uk-margin-remove-top uk-margin-small-bottom">Полезная информация</h3>

        <ul class="uk-nav uk-nav-default uk-margin-small-bottom">
            <li><a href="#">Помощь FAQ</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Блог</a></li>
        </ul>
    </div>
</div>


<!-- Mobile menu end -->
