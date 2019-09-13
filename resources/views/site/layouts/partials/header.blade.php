<!-- Header Menu -->






<div uk-sticky="media: 960; show-on-up: true; animation: uk-animation-slide-top; cls-active: uk-navbar-sticky; sel-target: .uk-navbar-container;" class="uk-sticky" style="">
    <div class="uk-navbar-container">
        <div class="uk-container uk-container-expand">
            <nav uk-navbar class="uk-navbar">
                <div class="uk-navbar-left">
                    <div class="uk-navbar-item  content-header-item ">
                        <a class="link-effect font-w700" href="{{ route('site.catalog.index') }}">
                            <span class="icon">
                                <iconify-icon data-icon="simple-line-icons:fire"></iconify-icon>
                            </span>
                            <span class="font-size-xl text-dual-primary-dark">Tez</span><span class="font-size-xl text-primary">Info</span>
                        </a>
                    </div>
                <!--
                    <a class="uk-navbar-item uk-logo " href="{{ route('site.catalog.index') }}">
                        <img src="/site/images/yootheme-logo.svg" width="134" height="30" alt="YOOtheme Logo" uk-svg="" hidden="true">
                    </a>
-->

                </div>
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav uk-visible@m">
                        <!--class="uk-active"-->
                        <li ><a href="{{ route('site.catalog.index') }}">Главная</a></li>
                        @foreach ($needs as $need)
                            <li class="uk-parent">
                                <a href="#">{{ $need->ru_title }}</a>
                                <div class="code-dropdown uk-dropdown uk-dropdown-width-4 uk-dropdown-stack uk-dropdown-bottom-left" data-uk-dropdown="{delay: 500}" style="left: 108.65625px; top: 32px;">
                                    <div class="uk-grid-collapse uk-grid uk-child-width-1-4" uk-grid>
                                        @foreach ($need->menuItems as $menu)
                                            <div class="padding-15 ">
                                                <ul class="uk-nav">
                                                    <div class="dropdown_wrapper">
                                                        <img src="{{ $menu->getImage() }}" alt="">
                                                        <a href="">{{ $menu->ru_title }}</a>
                                                    </div>
                                                    @foreach ($menu->categories as $category)
                                                        <li>
                                                            <a href="{{ route('site.catalog.category', $category->id) }}">{!! $category->ru_title !!}</a>
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
                    <a class="uk-navbar-toggle uk-hidden@m uk-icon uk-navbar-toggle-icon" href="#offcanvas" uk-navbar-toggle-icon="" uk-toggle=""><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="navbar-toggle-icon"><rect y="9" width="20" height="2"></rect><rect y="3" width="20" height="2"></rect><rect y="15" width="20" height="2"></rect></svg></a>
                    <div class="uk-navbar-item uk-visible@m">
                        @include('site.components.search')

                    </div>



                    <!--
                                    <div class="uk-grid-medium uk-child-width-auto uk-flex-middle uk-grid uk-grid-stack" uk-grid="margin: uk-margin-small-top">
                                        <div class="uk-first-column">
                                            <div class="uk-panel edj" id="module-193">

                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                    -->
                </div>
            <!--
            <div class="contact">
                <button uk-toggle ="target:#phone" type="button" class="contact-buttons">
                    <div class="contact_img">
                        <img src="{{ asset('assets/img/phone-receiver.png') }}" alt="">
                    </div>
                    <h2>
                        Контакты
                    </h2>
                </button>
                <a href="{{ route('home.cgu.ad') }}" class="contact-buttons">
                    <div class="contact_img">
                        <img src="{{ asset('assets/img/photo228.png') }}" alt="">
                    </div>
                    <h2>
                        Реклама в Цгу
                    </h2>
                </a>
            </div>
            <div id="phone" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                    <div class="container-pop">
                        <h2>
                            <img src="{{ asset('assets/img/phone-receiver.png') }}" alt="">
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
-->
            </nav>

        </div>
    </div>
</div>
<div class="uk-sticky-placeholder" ></div>




<!--
    <div class="uk-container uk-flex uk-flex-middle  ">

        <div class="uk-margin-auto-left">
            <div class="uk-grid-medium uk-child-width-auto uk-flex-middle uk-grid uk-grid-stack" uk-grid="margin: uk-margin-small-top">
              <div class="uk-first-column">
                <div class="uk-panel" >
                    <div class="custom">
                        <ul class="uk-grid-medium uk-flex-inline uk-flex-middle uk-flex-nowrap uk-grid  uk-grid-divider">

                          <li>
                            <h6><a class="el-link uk-link-heading" href="https://t.me/Grand_Broker_Trade"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.004 512.004" style="margin-right: 10px; enable-background:new 0 0 512.004 512.004;" xml:space="preserve" width="20" height="20">
            <path fill="#4a494c" d="M508.194,20.517c-4.43-4.96-11.42-6.29-17.21-3.76l-482,211c-5.34,2.34-8.85,7.57-8.98,13.41  c-0.13,5.83,3.14,11.21,8.38,13.79l115.09,56.6l28.68,172.06c0.93,6.53,6.06,11.78,12.74,12.73c4.8,0.69,9.57-1,12.87-4.4  l90.86-90.86l129.66,92.62c4.16,2.96,9.52,3.61,14.24,1.74c4.73-1.87,8.19-6.02,9.19-11.01l90-451  C512.604,28.967,511.454,24.177,508.194,20.517z M135.354,283.967l-84.75-41.68l334.82-146.57L135.354,283.967z M182.294,328.557  l-13.95,69.75l-15.05-90.3l183.97-138.49l-150.88,151.39C184.264,323.027,182.854,325.787,182.294,328.557z M191.424,435.857  l15.74-78.67l36.71,26.22L191.424,435.857z M396.834,455.797l-176.73-126.23l252.47-253.31L396.834,455.797z"></path>
            </svg>+998 99 485 9525</a></h6>

                          </li>

                        </ul>
                    </div>
                  </div>
                </div>
            </div>
        </div>


    </div>
-->


<!-- Header Menu end-->
