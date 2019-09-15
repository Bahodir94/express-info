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

                    <ul class="uk-navbar-nav">
                        <li class="uk-active"><a href="#">Регистрация</a></li>
                        <li ><a href="">Войти</a></li>
                    </ul>

                </div>
            </nav>
        <!--
            <a class="uk-logo" href="{{ route('site.catalog.index') }}">
                <img src="" width="134" height="30" alt="Project Logo" hidden="true">
            </a>
-->
        </div>
        <ul class="uk-margin-small-bottom uk-nav-primary uk-nav-parent-icon uk-list uk-list-divider" uk-nav="multiple: true">
            <!--class="uk-active"-->
            <li ><a href="{{ route('site.catalog.index') }}">Главная</a></li>
            @foreach($needs as $need)
                <li class="uk-parent">
                    <a href="#">{{ $need->ru_title }}</a>
                    <ul class="uk-nav-sub uk-nav-parent-icon uk-list uk-list-divider" uk-nav="multiple: true">

                        @foreach ($need->menuItems as $menu)
                            <li class="uk-parent" >
                                <a href="#">{{ $menu->ru_title }}</a>
                                <ul class="uk-nav-sub uk-list">
                                    @foreach ($menu->categories as $category)
                                        <li><a href="{{ route('site.catalog.category', $category->getAncestorsSlugs()) }}">{{ $category->getTitle() }}</a></li>
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


<!-- Fixed Button and Offcanvas -->
<a href="#fixedbutton" uk-toggle class="button_wrapper uk-position-fixed uk-position-center-left" uk-icon="cog"></a>
<div id="fixedbutton"  uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
        <div class="continer-title">
            <h3 class="offcanvas_title"><span uk-icon="cog"></span>Lorem ipsum dolor sit amet.</h3>
        </div>
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <ul class="uk-list padding-top uk-list-divider">
            <li><a href="">List item 1</a></li>
            <li><a href="">List item 2</a></li>
            <li><a href="">List item 3</a></li>
        </ul>
    </div>
</div>
<!-- Fixed Button and Offcanvas -->
