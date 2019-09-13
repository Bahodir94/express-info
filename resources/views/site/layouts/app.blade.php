<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @yield('meta')
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <title>
        @yield('title') | Tezinfo
    </title>

    <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="https://code.iconify.design/1/1.0.3/iconify.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</head>
<body>

  
    
<!-- Header Menu -->               


   


    
<div uk-sticky="media: 960; show-on-up: true; animation: uk-animation-slide-top; cls-active: uk-navbar-sticky; sel-target: .uk-navbar-container;" class="uk-sticky" style="">
    <div class="uk-navbar-container">
        <div class="uk-container uk-container-expand">
            <nav uk-navbar class="uk-navbar">
                <div class="uk-navbar-left">
                    <div class="uk-navbar-item  content-header-item ">
                        <a class="link-effect font-w700" href="{{ route('home') }}">
                            <span class="icon">
                                <iconify-icon data-icon="simple-line-icons:fire"></iconify-icon>
                            </span>
                            <span class="font-size-xl text-dual-primary-dark">Tez</span><span class="font-size-xl text-primary">Info</span>
                        </a>
                    </div>
<!--
                    <a class="uk-navbar-item uk-logo " href="{{ route('home') }}">
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

<!-- Mobile menu -->
    
<div id="offcanvas" uk-offcanvas="flip: true; overlay: true" class="uk-offcanvas vid-offcanvas" >
    <div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
        <div class="uk-margin-bottom content-header-item ">
            <a class="link-effect font-w700" href="{{ route('home') }}">
                <span class="icon">
                    <iconify-icon data-icon="simple-line-icons:fire"></iconify-icon>
                </span>
                <span class="font-size-xl text-dual-primary-dark">Tez</span><span class="font-size-xl text-primary">Info</span>
            </a>
<!--
            <a class="uk-logo" href="{{ route('home') }}">
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

@yield('content')

<!-- Footer -->
    
    
<div class="uk-section-secondary uk-section uk-section-large" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-slide-left-small; delay: false;">

  <div class="uk-container uk-container-expand">

    <div class="uk-grid-large uk-margin-xlarge uk-grid" uk-grid="">
      <div class="uk-width-medium@m uk-first-column">

        <h3 class="uk-h4 uk-text-left@s uk-text-center uk-scrollspy-inview uk-animation-slide-left-small" uk-scrollspy-class="" style="">Наши соц-сети</h3>
        <div class="uk-margin uk-text-left@s uk-text-center uk-scrollspy-inview uk-animation-slide-left-small" uk-scrollspy-class="" style="">
          <div class="uk-child-width-1-4 uk-flex-left@s uk-flex-center uk-grid" uk-grid="">
            <div class="uk-first-column">
              <a class="el-link uk-icon-button uk-icon" href="http://facebook.com" uk-icon="icon: facebook;">
                <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="facebook">
                  <path d="M11,10h2.6l0.4-3H11V5.3c0-0.9,0.2-1.5,1.5-1.5H14V1.1c-0.3,0-1-0.1-2.1-0.1C9.6,1,8,2.4,8,5v2H5.5v3H8v8h3V10z"></path>
                </svg>
              </a>
            </div>
            <div>
              <a class="el-link uk-icon-button uk-icon" href="http://youtube.com" uk-icon="icon: youtube;">
                <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="youtube">
                  <path d="M15,4.1c1,0.1,2.3,0,3,0.8c0.8,0.8,0.9,2.1,0.9,3.1C19,9.2,19,10.9,19,12c-0.1,1.1,0,2.4-0.5,3.4c-0.5,1.1-1.4,1.5-2.5,1.6 c-1.2,0.1-8.6,0.1-11,0c-1.1-0.1-2.4-0.1-3.2-1c-0.7-0.8-0.7-2-0.8-3C1,11.8,1,10.1,1,8.9c0-1.1,0-2.4,0.5-3.4C2,4.5,3,4.3,4.1,4.2 C5.3,4.1,12.6,4,15,4.1z M8,7.5v6l5.5-3L8,7.5z"></path>
                </svg>
              </a>
            </div>
            <div>
              <a class="el-link uk-icon-button uk-icon" href="http://twitter.com" uk-icon="icon: twitter;">
                <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="twitter">
                  <path d="M19,4.74 C18.339,5.029 17.626,5.229 16.881,5.32 C17.644,4.86 18.227,4.139 18.503,3.28 C17.79,3.7 17.001,4.009 16.159,4.17 C15.485,3.45 14.526,3 13.464,3 C11.423,3 9.771,4.66 9.771,6.7 C9.771,6.99 9.804,7.269 9.868,7.539 C6.795,7.38 4.076,5.919 2.254,3.679 C1.936,4.219 1.754,4.86 1.754,5.539 C1.754,6.82 2.405,7.95 3.397,8.61 C2.79,8.589 2.22,8.429 1.723,8.149 L1.723,8.189 C1.723,9.978 2.997,11.478 4.686,11.82 C4.376,11.899 4.049,11.939 3.713,11.939 C3.475,11.939 3.245,11.919 3.018,11.88 C3.49,13.349 4.852,14.419 6.469,14.449 C5.205,15.429 3.612,16.019 1.882,16.019 C1.583,16.019 1.29,16.009 1,15.969 C2.635,17.019 4.576,17.629 6.662,17.629 C13.454,17.629 17.17,12 17.17,7.129 C17.17,6.969 17.166,6.809 17.157,6.649 C17.879,6.129 18.504,5.478 19,4.74"></path>
                </svg>
              </a>
            </div>
            <div>
              <a class="el-link uk-icon-button uk-icon" href="http://instagram.com" uk-icon="icon: instagram;">
                <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="instagram">
                  <path d="M13.55,1H6.46C3.45,1,1,3.44,1,6.44v7.12c0,3,2.45,5.44,5.46,5.44h7.08c3.02,0,5.46-2.44,5.46-5.44V6.44 C19.01,3.44,16.56,1,13.55,1z M17.5,14c0,1.93-1.57,3.5-3.5,3.5H6c-1.93,0-3.5-1.57-3.5-3.5V6c0-1.93,1.57-3.5,3.5-3.5h8 c1.93,0,3.5,1.57,3.5,3.5V14z"></path>
                  <circle cx="14.87" cy="5.26" r="1.09"></circle>
                  <path d="M10.03,5.45c-2.55,0-4.63,2.06-4.63,4.6c0,2.55,2.07,4.61,4.63,4.61c2.56,0,4.63-2.061,4.63-4.61 C14.65,7.51,12.58,5.45,10.03,5.45L10.03,5.45L10.03,5.45z M10.08,13c-1.66,0-3-1.34-3-2.99c0-1.65,1.34-2.99,3-2.99s3,1.34,3,2.99 C13.08,11.66,11.74,13,10.08,13L10.08,13L10.08,13z"></path>
                </svg>
              </a>
            </div>

          </div>
        </div>

      </div>

      <div class="uk-width-xlarge@m">

        <div class="uk-margin uk-text-left@s uk-text-center">
          <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-grid-match uk-grid" uk-grid="">
            <div class="uk-first-column">
              <div class="el-item uk-panel uk-margin-remove-first-child uk-scrollspy-inview uk-animation-slide-left-small" uk-scrollspy-class="" style="">

                <h3 class="el-title uk-h4 uk-margin-top uk-margin-remove-bottom">                        Быстрое меню                    </h3>

                <div class="el-content uk-panel uk-margin-top">
                    
                    
                    
                  <ul class="uk-list">
                      @foreach($needs as $need)
                    <li>
                      <a href="/themes/joomla/2018/trek/index.php/routes" class="el-link uk-link-reset">{{ $need->ru_title }}</a>
                    </li>
                      @endforeach
 
                  </ul>
                    
                    
                </div>
                  
                  
                  
          
            
                  

              </div>
            </div>
            <div>
              <div class="el-item uk-panel uk-margin-remove-first-child uk-scrollspy-inview uk-animation-slide-left-small" uk-scrollspy-class="" style="">

                <h3 class="el-title uk-h4 uk-margin-top uk-margin-remove-bottom">                        Полезная информация                   </h3>

                <div class="el-content uk-panel uk-margin-top">
                  <ul class="uk-list">
                    <li>
                      <a href="#" class="el-link uk-link-reset">Блог</a>
                    </li>
                    <li>
                      <a href="#" uk-scroll="" class="el-link uk-link-reset">Полезная информация (FAQ)</a>
                    </li>
                    <li>
                      <a href="#" class="el-link uk-link-reset">О нас</a>
                    </li>
                  </ul>
                </div>

              </div>
            </div>
          </div>

        </div>

      </div>

      <div class="uk-width-expand@m">

        <h3 class="uk-h4 uk-text-left@s uk-text-center uk-scrollspy-inview uk-animation-slide-left-small" uk-scrollspy-class="" style="">        Рассылка    </h3>
        <div class="uk-text-left@s uk-text-center uk-scrollspy-inview uk-animation-slide-left-small" uk-scrollspy-class="" style="">
          <form class="uk-form uk-panel js-form-newsletter" method="post" action="/themes/joomla/2018/trek/index.php?p=theme%2Fnewsletter%2Fsubscribe&amp;option=com_ajax&amp;style=9">

            <div class="uk-grid-collapse uk-child-width-expand@s uk-grid" uk-grid="">

              <div class="uk-first-column">
                <input class="el-input uk-input" type="email" name="email" placeholder="Email address" required="">
              </div>
              <div class="uk-width-auto@s">
                <button class="el-button uk-button uk-button-primary" type="submit">Подписаться</button>
              </div>

            </div>

            <input type="hidden" name="settings" value="71BXTsydrHMqLF0t/XXHvw==.aDVYa3VXQzdRejJRQXYrbUpuRHZLUG82aUFaQVlSQXZETWo3bEJGcGxGbHBJbGhPSUROU0p5UFdGa1R3ME94b0ZJZG9MTUJxeTVIdmpxT2VNZCtKZXd3TzlvYWlhb1l4OTdkNVhzQ1VLekVHYkNBZExhQWx2WGpHbFNEYUdsNExpL1NhQzJUQ3RzUG04L0JCOE1sNC8xZ2plOWR5ZE1pdVlsa0ZDZmMreENHUkpFT1VDK1JybW04WGRpWkNSaWVkYm4wWFE5a0dNRVhYMDErdms2amhMUDFvL08wTGxYVkkvOXNDM3laZ0hyU3VVb1dJTUJKYnlSc0gyK3NUK0VPQ0NIT1hhNmJNOUk5ZUtsQ3loMXl6Q3czcFdTaG82WmQrWjk1cExqYWlhamc9.NjUyNTJmNGFhY2UwMzUwZThkOTQxN2E4MTkyY2QxODdlYjlhYzA3OTU3ZjZlYTA1MWM2MzUzOWQ4MmEzMzFjZg==">
            <div class="message uk-margin uk-hidden"></div>

          </form>

        </div>

      </div>
    </div>
  </div>

</div>
<div class="uk-section-muted uk-section uk-section-xsmall">

  <div class="uk-container uk-container-expand">
    <div class="uk-grid-margin uk-grid" uk-grid="">
      <div class="uk-grid-item-match uk-flex-middle uk-width-expand@m uk-first-column">

        <div class="uk-panel uk-width-1-1">
          <div class="uk-text-meta uk-margin uk-text-left@m">© 2019 Создано в <a href="https://vid.uz/">vid.uz</a>. Все права защищены</div>
        </div>

      </div>

      <div class="uk-grid-item-match uk-flex-middle uk-width-medium@m">

        <div class="uk-panel uk-width-1-1">

          <div class="uk-margin uk-text-center@m uk-text-left" uk-scrollspy="target: [uk-scrollspy-class];">
              
              
            <img width="80" class="el-image uk-text-muted" alt="" uk-svg="" uk-img="" src="" hidden="true">
                <div class="uk-text-muted content-header-item ">
                    <a class="link-effect font-w700" href="{{ route('home') }}">
                        <span class="icon">
                            <iconify-icon data-icon="simple-line-icons:fire"></iconify-icon>
                        </span>
                        <span class="font-size-xl text-dual-primary-dark">Tez</span><span class="font-size-xl text-primary">Info</span>
                    </a>
                </div>


          </div>

        </div>

      </div>

      <div class="uk-grid-item-match uk-flex-middle uk-width-expand@m">

        <div class="uk-panel uk-width-1-1">

          <div class="uk-text-right@m uk-text-left">
            <ul class="uk-margin-remove-bottom uk-subnav uk-flex-right@m uk-flex-left" uk-margin="">
              <li class="el-item uk-first-column">
                <a class="el-link" href="/themes/joomla/2019/craft/index.php/contact/terms-of-service">Пользовательское соглашение</a></li>
              <li class="el-item">
                <a class="el-link" href="/themes/joomla/2019/craft/index.php/contact/imprint">Контакты</a></li>
            </ul>

          </div>

        </div>

      </div>
    </div>
  </div>

</div>
    
<!--
    
<footer>
    <div class="uk-container uk-container-expand  uk-container-center">
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
-->
<!-- Footer end -->
</body>
</html>
