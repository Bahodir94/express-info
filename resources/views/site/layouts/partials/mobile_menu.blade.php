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
        @include('site.components.search')
        <a class="uk-button uk-button-primary uk-button-large uk-margin-top" href="https://yootheme.com/signup">Разместить рекламу</a>

        <hr class="uk-margin-medium">
        <h3 class="uk-h4 uk-margin-remove-top uk-margin-small-bottom">Documentation</h3>

        <ul class="uk-nav uk-nav-default uk-margin-small-bottom">
            <li><a href="https://yootheme.com/support/yootheme-pro">YOOtheme Pro</a></li>
            <li><a href="https://yootheme.com/support/warp">Warp Themes</a></li>
            <li><a href="https://yootheme.com/support/widgetkit">Widgetkit</a></li>
            <li><a href="https://yootheme.com/support/zoo">ZOO</a></li>
        </ul>
    </div>
</div>


<!-- Mobile menu end -->
