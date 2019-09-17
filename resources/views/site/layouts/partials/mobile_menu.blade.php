<!-- Mobile menu -->

<div id="offcanvas" uk-offcanvas="flip: true; overlay: true" class="uk-offcanvas vid-offcanvas" >
    <div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
        <div class="uk-margin-bottom content-header-item ">
            <a class="link-effect font-w700" href="{{ route('site.catalog.index') }}">
                <span class="icon">
                    <iconify-icon data-icon="simple-line-icons:fire"></iconify-icon>
                </span>
                <span class="font-size-xl text-dual-primary-dark"></span><span class="font-size-xl text-primary">Porta</span>
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
            @foreach($needs as $need)
                <li class="uk-parent">
                    <a href="{{ route('site.catalog.main', $need->ru_slug) }}">{{ $need->ru_title }}</a>
                    <ul class="uk-nav-sub uk-nav-parent-icon uk-list uk-list-divider" uk-nav="multiple: true">

                        @foreach ($need->menuItems as $menu)
                            <li class="uk-parent" >
                                <a href="#">{{ $menu->ru_title }}</a>
                                <ul class="uk-nav-sub uk-list">
                                    @foreach ($menu->categories as $category)
                                        <li><a href="{{ route('site.catalog.main', $category->getAncestorsSlugs()) }}">{{ $category->getTitle() }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
            <li><a href="http://porta.uz/government-resources">Госс-порталы</a></li>
        </ul>
        <a class="uk-button uk-button-primary uk-button-large uk-margin-top" href="#">Реклама в ЦГУ</a>
        <a  uk-toggle ="target:#phone" class="uk-button uk-button-primary uk-button-large uk-margin-top" href="#">Контакты</a>
        
        <div id="phone" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                            <div class="container-pop">
                                <h2>
                                    размещение web сайтов и рекламы в цгу:
                                </h2>
                                <div class="phone-numbers">
                                        <a href="tel:+998953411717" class="contacts_popup_inner_link">
                                            +99895 341 17 17
                                        </a>
                                        <a href="tel:+998954781717" class="contacts_popup_inner_link">
                                            +99895 478 17 17
                                        </a>
                                        <a href="tel:+998954761717" class="contacts_popup_inner_link">
                                            +99895 476 17 17
                                        </a>
                                        <a href="tel:+998954791717" class="contacts_popup_inner_link">
                                            +99895 479 17 17
                                        </a>
                                </div>
                            </div>
            </div>
        </div>
<!--
        <a class="uk-button uk-button-primary uk-button-large uk-margin-top" href="#">Разместить рекламу</a>

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


<!-- Fixed Button and Offcanvas -->
<!--
<a href="#fixedbutton" uk-toggle class="button_wrapper uk-position-fixed uk-position-center-left">
<img src="/assets/img/hex.svg" uk-svg="" height="40"></a>
<div id="fixedbutton"  uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar off-top">
        <div class="content-header-item">
          <a class="link-effect font-w700" href="{{ route('site.catalog.index') }}">
                <span class="icon">
                    <iconify-icon data-icon="simple-line-icons:fire"></iconify-icon>
                </span>
                <span class="font-size-xl text-dual-primary-dark"></span><span class="font-size-xl text-primary">Porta</span>
            </a>
                
            <button class="uk-offcanvas-close" type="button" uk-close></button>
        </div>
    </div>
    <div class="uk-offcanvas-bar off-bot uk-offcanvas-bar-animation uk-offcanvas-slide">
            <button class="uk-offcanvas-close" type="button" style="display:none;" uk-close></button>


        <div>
            
        
            <ul class="uk-list padding-top uk-list">
                <li><a href="#">
                    <div class="uk-margin uk-text-left@m uk-text-center uk-panel" >
                        <div class="uk-child-width-expand uk-grid uk-grid-small" uk-grid="">
                            <div class="uk-width-auto uk-first-column"> 
                                <span uk-icon="icon: check;ratio: 1.4" class="el-image uk-icon">
                                    
                                </span> 
                            </div>
                            <div class="">
                                <div class="el-title uk-margin uk-h5">Public Service </div>
                            </div>
                        </div>
                    </div>
                    
                    </a></li>
                      <li><a href="#">
                    <div class="uk-margin uk-text-left@m uk-text-center uk-panel" >
                        <div class="uk-child-width-expand uk-grid uk-grid-small" uk-grid="">
                            <div class="uk-width-auto uk-first-column"> 
                                <span uk-icon="icon: check;ratio: 1.4" class="el-image uk-icon">
                                    
                                </span> 
                            </div>
                            <div class="">
                                <div class="el-title uk-margin uk-h5">О проекте</div>
                            </div>
                        </div>
                    </div>
                    
                    </a></li>
                      <li><a href="#">
                    <div class="uk-margin uk-text-left@m uk-text-center uk-panel" >
                        <div class="uk-child-width-expand uk-grid uk-grid-small" uk-grid="">
                            <div class="uk-width-auto uk-first-column"> 
                                <span uk-icon="icon: check;ratio: 1.4" class="el-image uk-icon">
                                    
                                </span> 
                            </div>
                            <div class="">
                                <div class="el-title uk-margin uk-h5">Разместить рекламу </div>
                            </div>
                        </div>
                    </div>
                    
                    </a></li>
            </ul>
        </div>
-->
<!--
        <div>
            <h3>Категории</h3>
            <ul class="uk-list padding-top uk-list-divider">
                <li><a href="#">Porta</a></li>
                <li><a href="">Public Service</a></li>
                <li><a href="">List item 3</a></li>
            </ul>
        </div>
-->
        
        
        
    </div>
</div>







<!-- Fixed Button and Offcanvas -->
