<div class="tm-header-mobile uk-hidden@l">
    <nav uk-sticky class=uk-navbar-container uk-navbar>
        <div class=uk-navbar-left><a class=uk-navbar-toggle href=#tm-mobile uk-toggle>
                <div uk-navbar-toggle-icon></div>
                <span class=uk-margin-small-left>Меню</span> </a></div>
        <div class=uk-navbar-center><a class="uk-navbar-item uk-logo" href=https://vid.uz> <img alt=Vid height=40px
                                                                                                src=/images/yootheme/logoB.svg>
            </a></div>
        <div class=uk-navbar-right>
            <div class=uk-navbar-item id=module-tm-1 style="display: inherit;">
                <div class=custom>
                    <ul class="uk-grid-small uk-flex-inline uk-flex-middle uk-flex-nowrap uk-grid" uk-grid="">
                        <li class=uk-first-column><a href=tel:+998974248899 class="uk-icon-button uk-icon">
                                <svg width=15 height=15 viewBox="0 0 20 20" xmlns=http://www.w3.org/2000/svg
                                     data-svg=receiver>
                                    <path fill=none stroke=#000 stroke-width=1.01
                                          d="M6.189,13.611C8.134,15.525 11.097,18.239 13.867,18.257C16.47,18.275 18.2,16.241 18.2,16.241L14.509,12.551L11.539,13.639L6.189,8.29L7.313,5.355L3.76,1.8C3.76,1.8 1.732,3.537 1.7,6.092C1.667,8.809 4.347,11.738 6.189,13.611"></path>
                                </svg>
                            </a></li>
                        <li><a href=https://t.me/vovorus class="uk-icon-button uk-icon">
                                <svg xmlns=http://www.w3.org/2000/svg xmlns:xlink=http://www.w3.org/1999/xlink
                                     version=1.1 id=Capa_1 x=0px y=0px viewBox="0 0 512.004 512.004"
                                     style="enable-background:new 0 0 512.004 512.004;" xml:space=preserve width=12
                                     height=12> <path fill=#4a494c
                                                      d="M508.194,20.517c-4.43-4.96-11.42-6.29-17.21-3.76l-482,211c-5.34,2.34-8.85,7.57-8.98,13.41  c-0.13,5.83,3.14,11.21,8.38,13.79l115.09,56.6l28.68,172.06c0.93,6.53,6.06,11.78,12.74,12.73c4.8,0.69,9.57-1,12.87-4.4  l90.86-90.86l129.66,92.62c4.16,2.96,9.52,3.61,14.24,1.74c4.73-1.87,8.19-6.02,9.19-11.01l90-451  C512.604,28.967,511.454,24.177,508.194,20.517z M135.354,283.967l-84.75-41.68l334.82-146.57L135.354,283.967z M182.294,328.557  l-13.95,69.75l-15.05-90.3l183.97-138.49l-150.88,151.39C184.264,323.027,182.854,325.787,182.294,328.557z M191.424,435.857  l15.74-78.67l36.71,26.22L191.424,435.857z M396.834,455.797l-176.73-126.23l252.47-253.31L396.834,455.797z"></path> </svg>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div id=tm-mobile class=uk-modal-full uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-text-center uk-flex uk-height-viewport">
            <button class=uk-modal-close-full type=button uk-close></button>
            <div class="uk-margin-auto-vertical uk-width-1-1">
                <div class=uk-child-width-1-1 uk-grid>
                    <div>
                        <div class=uk-panel id=module-0>
                            <ul class="uk-nav uk-nav-primary uk-nav-center">
                                <li @if($page == 'home') class="uk-active" @endif><a href=/home>Главная</a></li>
                                <li class="@if(strpos($page, 'site') !== false) uk-active @endif uk-parent"><a href=/site>Создание сайтов</a>
                                    <ul class=uk-nav-sub>
                                        <li class=@if(strpos($page, 'landing') !== false) uk-active @endif><a href=/site/lange>Разработка лендингов</a></li>
                                        <li class="@if(strpos($page, 'eshop') !== false) uk-active @endif"><a href=/site/internet-magazin>Интернет магазины</a></li>
                                        <li class="@if(strpos($page, 'korp') !== false) uk-active @endif"><a href=/site/korp>Корпоративные сайты</a></li>
                                        <li class="@if(strpos($page, 'catalog') !== false) uk-active @endif"><a href=/development/site/catalog>Разработка каталогов</a></li>
                                    </ul>
                                </li>
                                <li class="@if(strpos($page, 'dev') !== false) uk-active @endif uk-parent"><a>Разработка </a>
                                    <ul class=uk-nav-sub>
                                        <li class="@if(strpos($page, 'mobile') !== false) uk-active @endif uk-parent"><a>Мобильные приложения</a>
                                            <ul>
                                                <li class="@if(strpos($page, 'android') !== false) uk-active @endif"><a href=/development/mobile-app/android>Android приложения</a>
                                                </li>
                                                <li class="@if(strpos($page, 'ios') !== false) uk-active @endif"><a href=/development/mobile-app/ios>iOS (Apple) приложения</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="@if(strpos($page, 'bot') !== false) uk-active @endif"><a href=/development/bot>Разработка ботов </a></li>
                                    </ul>
                                </li>
                                <li class="@if(strpos($page, 'seo') !== false) uk-active @endif uk-parent"><a>Продвижение</a>
                                    <ul class=uk-nav-sub>
                                        <li class="@if(strpos($page, 'seo') !== false) uk-active @endif uk-parent"><a href=/prodvizhenie-seo>Продвижение в поиске</a>
                                            <ul>
                                                <li class="@if(strpos($page, 'optimization') !== false) uk-active @endif"><a href=/prodvizhenie-seo/optimizatsiya>SEO оптимизация</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="@if(strpos($page, 'smm') !== false) uk-active @endif"><a href=/smm>SMM</a></li>
                                <li class="@if(strpos($page, 'contacts') !== false) uk-active @endif"><a href=/lets-talk>Контакты</a></li>
                            </ul>
                            <div class=uk-navbar-item>
                                <div class=custom>
                                    <ul class="uk-grid-small uk-flex-inline uk-flex-middle uk-flex-nowrap uk-grid"
                                        uk-grid="">
                                        <li class=uk-first-column><a href=tel:+998974248899
                                                                     class="uk-icon-button uk-icon">
                                                <svg width=20 height=20 viewBox="0 0 20 20"
                                                     xmlns=http://www.w3.org/2000/svg data-svg=receiver>
                                                    <path fill=none stroke=#000 stroke-width=1.01
                                                          d="M6.189,13.611C8.134,15.525 11.097,18.239 13.867,18.257C16.47,18.275 18.2,16.241 18.2,16.241L14.509,12.551L11.539,13.639L6.189,8.29L7.313,5.355L3.76,1.8C3.76,1.8 1.732,3.537 1.7,6.092C1.667,8.809 4.347,11.738 6.189,13.611"></path>
                                                </svg>
                                            </a></li>
                                        <li><a href=https://t.me/vovorus class="uk-icon-button uk-icon">
                                                <svg xmlns=http://www.w3.org/2000/svg
                                                     xmlns:xlink=http://www.w3.org/1999/xlink version=1.1 id=Capa_1
                                                     x=0px y=0px viewBox="0 0 512.004 512.004"
                                                     style="enable-background:new 0 0 512.004 512.004;"
                                                     xml:space=preserve width=17 height=17> <path fill=#4a494c
                                                                                                  d="M508.194,20.517c-4.43-4.96-11.42-6.29-17.21-3.76l-482,211c-5.34,2.34-8.85,7.57-8.98,13.41  c-0.13,5.83,3.14,11.21,8.38,13.79l115.09,56.6l28.68,172.06c0.93,6.53,6.06,11.78,12.74,12.73c4.8,0.69,9.57-1,12.87-4.4  l90.86-90.86l129.66,92.62c4.16,2.96,9.52,3.61,14.24,1.74c4.73-1.87,8.19-6.02,9.19-11.01l90-451  C512.604,28.967,511.454,24.177,508.194,20.517z M135.354,283.967l-84.75-41.68l334.82-146.57L135.354,283.967z M182.294,328.557  l-13.95,69.75l-15.05-90.3l183.97-138.49l-150.88,151.39C184.264,323.027,182.854,325.787,182.294,328.557z M191.424,435.857  l15.74-78.67l36.71,26.22L191.424,435.857z M396.834,455.797l-176.73-126.23l252.47-253.31L396.834,455.797z"></path> </svg>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tm-header uk-visible@l" uk-header>
    <div uk-sticky media=@l show-on-up animation=uk-animation-slide-top cls-active=uk-navbar-sticky
         sel-target=.uk-navbar-container>
        <div class=uk-navbar-container>
            <div class=uk-container>
                <nav class=uk-navbar
                     uk-navbar={&quot;align&quot;:&quot;center&quot;,&quot;boundary&quot;:&quot;!.uk-navbar-container&quot;}>
                    <div class=uk-navbar-left><a href=https://vid.uz class="uk-navbar-item uk-logo"> <img alt=Vid
                                                                                                          height=40px
                                                                                                          src=/images/yootheme/logoB.svg><img
                                class=uk-logo-inverse alt=Vid height=40px src=/images/yootheme/logoW.svg></a></div>
                    <div class=uk-navbar-right>
                        <ul class=uk-navbar-nav>
                            <li class="@if(strpos($page, 'home') !== false) uk-active @endif"><a href=/home>Главная</a></li>
                            <li class="@if(strpos($page, 'site') !== false) uk-active @endif uk-parent"><a href=/site>Создание сайтов</a>
                                <div class=uk-navbar-dropdown>
                                    <div class="uk-navbar-dropdown-grid uk-child-width-1-1" uk-grid>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="@if(strpos($page, 'landing') !== false) uk-active @endif"><a href=/site/lange>Разработка лендингов</a>
                                                </li>
                                                <li class="@if(strpos($page, 'eshop') !== false) uk-active @endif"><a href=/site/internet-magazin>Интернет магазины</a></li>
                                                <li class="@if(strpos($page, 'korp') !== false) uk-active @endif"><a href=/site/korp>Корпоративные сайты</a></li>
                                                <li class="@if(strpos($page, 'catalog') !== false) uk-active @endif"><a href=/development/site/catalog>Разработка каталогов</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="@if(strpos($page, 'dev') !== false) uk-active @endif uk-parent"><a>Разработка </a>
                                <div class=uk-navbar-dropdown>
                                    <div class="uk-navbar-dropdown-grid uk-child-width-1-1" uk-grid>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="@if(strpos($page, 'mobile') !== false) uk-active @endif uk-parent"><a>Мобильные
                                                        приложения</a>
                                                    <ul class=uk-nav-sub>
                                                        <li class="@if(strpos($page, 'android') !== false) uk-active @endif"><a href=/development/mobile-app/android>Android
                                                                приложения</a></li>
                                                        <li class="@if(strpos($page, 'ios') !== false) uk-active @endif"><a href=/development/mobile-app/ios>iOS (Apple)
                                                                приложения</a></li>
                                                    </ul>
                                                </li>
                                                <li class="@if(strpos($page, 'bot') !== false) uk-active @endif"><a href=/development/bot>Разработка ботов </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="@if(strpos($page, 'seo') !== false) uk-active @endif uk-parent"><a>Продвижение</a>
                                <div class=uk-navbar-dropdown>
                                    <div class="uk-navbar-dropdown-grid uk-child-width-1-1" uk-grid>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="@if(strpos($page, 'seo') !== false) uk-active @endif uk-parent"><a href=/prodvizhenie-seo>Продвижение в
                                                        поиске</a>
                                                    <ul class=uk-nav-sub>
                                                        <li class="@if(strpos($page, 'optimization') !== false) uk-active @endif"><a href=/prodvizhenie-seo/optimizatsiya>SEO
                                                                оптимизация</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="@if(strpos($page, 'smm') !== false) uk-active @endif"><a href=/smm>SMM</a></li>
                            <li class="@if(strpos($page, 'contacts') !== false) uk-active @endif"><a href=/lets-talk>Контакты</a></li>
                        </ul>
                        <div class=uk-navbar-item>
                            <div class=custom>
                                <ul class="uk-grid-small uk-flex-inline uk-flex-middle uk-flex-nowrap uk-grid"
                                    uk-grid="">
                                    <li class=uk-first-column><a href=tel:+998974248899
                                                                 class="uk-icon-button uk-icon">
                                            <svg width=20 height=20 viewBox="0 0 20 20"
                                                 xmlns=http://www.w3.org/2000/svg data-svg=receiver>
                                                <path fill=none stroke=#000 stroke-width=1.01
                                                      d="M6.189,13.611C8.134,15.525 11.097,18.239 13.867,18.257C16.47,18.275 18.2,16.241 18.2,16.241L14.509,12.551L11.539,13.639L6.189,8.29L7.313,5.355L3.76,1.8C3.76,1.8 1.732,3.537 1.7,6.092C1.667,8.809 4.347,11.738 6.189,13.611"></path>
                                            </svg>
                                        </a></li>
                                    <li><a href=https://t.me/vovorus class="uk-icon-button uk-icon">
                                            <svg xmlns=http://www.w3.org/2000/svg
                                                 xmlns:xlink=http://www.w3.org/1999/xlink version=1.1 id=Capa_1
                                                 x=0px y=0px viewBox="0 0 512.004 512.004"
                                                 style="enable-background:new 0 0 512.004 512.004;"
                                                 xml:space=preserve width=17 height=17> <path fill=#4a494c
                                                                                              d="M508.194,20.517c-4.43-4.96-11.42-6.29-17.21-3.76l-482,211c-5.34,2.34-8.85,7.57-8.98,13.41  c-0.13,5.83,3.14,11.21,8.38,13.79l115.09,56.6l28.68,172.06c0.93,6.53,6.06,11.78,12.74,12.73c4.8,0.69,9.57-1,12.87-4.4  l90.86-90.86l129.66,92.62c4.16,2.96,9.52,3.61,14.24,1.74c4.73-1.87,8.19-6.02,9.19-11.01l90-451  C512.604,28.967,511.454,24.177,508.194,20.517z M135.354,283.967l-84.75-41.68l334.82-146.57L135.354,283.967z M182.294,328.557  l-13.95,69.75l-15.05-90.3l183.97-138.49l-150.88,151.39C184.264,323.027,182.854,325.787,182.294,328.557z M191.424,435.857  l15.74-78.67l36.71,26.22L191.424,435.857z M396.834,455.797l-176.73-126.23l252.47-253.31L396.834,455.797z"></path> </svg>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=uk-navbar-item id=module-tm-1>
                            <div class=custom></div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
