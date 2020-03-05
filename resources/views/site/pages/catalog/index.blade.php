@extends('site.layouts.app')

@section('title', 'Фриланс биржа узбекистана | Сайт для фрилансера и компаний')

@section('meta')
    <meta name="title" content="фриланс биржа узбекистана | фрилансер сайт">
@endsection
@section('meta')
    <meta name="description" content="Каталог фриланс услуг и услуг компаний по продвижению бизнеса. Интернет реклама в Ташкенте. Создание сайта в Ташкенте. Реклама в метро в Ташкенте. Наружная реклама в Ташкенте и многое другое">
@endsection
@section('header')
    @include('site.layouts.partials.headers.main')
@endsection

@section('content')


<section class="uk-section-xsmall">
    <div class="uk-container uk-container-center uk-container-xlarge uk-margin-top">
            <div uk-grid class="uk-child-width-1-2@s uk-child-width-1-3@m uk-margin-large-top uk-grid-match uk-grid">
            @foreach ($favouritesCompanies as $company)
                <div>
                    <div class="uk-card uk-card-small uk-card-border">
                        <div class="uk-card-media-top uk-position-relative uk-light">
                            <img uk-img height="200" src="{{ $company->getImage() }}" class="code-mage" alt="Course Title">
                            <div class="uk-position-cover uk-overlay-xlight"></div>
                            <div class="uk-position-top-left">
                                <span class="uk-text-bold uk-text-price uk-text-small">$27.00</span>
                            </div>
    <!-- ### Favorites
                        <div class="uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
                        </div>            
    -->
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title uk-margin-small-bottom">{{ $company->ru_title }}</h3>
                            <div class="uk-text-muted uk-text-small">{!! $company->category->ru_title !!}</div>

                            <ul>
                                @foreach($company->services as $service)
                                    <li><img src="{{ $service->getImage() }}" alt=""></li>
                                @endforeach
                            </ul>
                            @if ($company->hasUrl() and $company->show_page)
                            <span class="link">
                                <a href="{{ $company->url }}" target="_blank">
                                     {{ parse_url($company->url, PHP_URL_HOST) }}
                                </a>
                            </span>
                            @endif
                            @if ($company->hasAdvantages())
                                <div class="tags">
                                    <ol>
                                        @foreach ($company->advantagesAsArray() as $advantage)
                                            <li>{{ $advantage }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            @endif
    <!-- ### Rating
                            <div class="uk-text-muted uk-text-small uk-rating uk-margin-small-top">
                                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
                                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
                                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
                                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
                                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
                                <span class="uk-margin-small-left uk-text-bold">5.0</span>
                                <span>(324)</span>
                            </div>
    -->
                        </div>
                        <a href="@if ($company->show_page) {{ route('site.catalog.main', $company->getAncestorsSlugs()) }} @else {{ $company->url }} @endif" class="uk-position-cover"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="uk-section-xsmall home-cat">
    <div class="uk-container uk-container-xlarge uk-margin-medium uk-container-center">
        <ul class="uk-grid uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-3@l" uk-grid>
            @foreach($parentCategories as $category)
                <li class="uk-container-center uk-margin-medium-bottom">
                    <div class="item uk-flex-middle">
                        <div class="item_icon">
                            <div class="item_circle">
                                <img src="{{ $category->getImage() }}" alt="">
                            </div>
                        </div>
                        <div class="item_text">
                            <h2><a href="{{ route('site.catalog.main', $category->ru_slug) }}">{!! $category->ru_title !!}</a></h2>
                            <p>
                                @foreach ($category->categories()->limit(5)->get() as $child)
                                    <a href="{{ route('site.catalog.main', $child->getAncestorsSlugs()) }}">{!! $child->ru_title !!},</a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
<section>
<div class="uk-section uk-section-large uk-background-cover uk-background-norepeat 
  uk-background-center-center uk-background-blend-soft-light uk-light uk-background-primary" style="background-image: url(https://source.unsplash.com/QckxruozjRg);">
  <div class="uk-container uk-container-large">
    <div class="uk-width-1-2@m">
      <h2 class="uk-heading-small uk-margin-remove"><mark>Хочешь выделиться?</mark></h2>
    </div>
  </div>
  <div class="uk-container uk-container-large uk-margin-large-top">
    <div class="uk-grid-large uk-grid" data-uk-grid="">
      <div class="uk-width-1-3@m uk-first-column">
        <p class="uk-text-large">Создай сайт привязанный к нашей платформе.
          </p>
        <a href="tel:+998909408196" class="uk-button uk-button-success-outline uk-button-large uk-margin-medium-top">Заказать</a>
      </div>
      <div class="uk-width-expand@m">

        <div data-uk-slider="sets: true" class="uk-slider">
          <h3 class="uk-heading-xsmall"><mark>Как это работает? Один клик и ты поймешь</mark></h3><div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
            <div class="uk-slider-container">
              <div class="uk-position-absolute uk-slidenav-above">
                <a class="uk-slidenav-large uk-visible@m uk-text-success uk-margin-right uk-icon uk-slidenav-previous uk-slidenav" href="#" data-uk-slidenav-previous="" data-uk-slider-item="previous"><svg width="25px" height="40px" viewBox="0 0 25 40" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-previous-large"><polyline fill="none" stroke="#000" stroke-width="2" points="20.527,1.5 2,20.024 20.525,38.547 "></polyline></svg></a>
                <a class="uk-slidenav-large uk-visible@m uk-text-success uk-icon uk-slidenav-next uk-slidenav" href="#" data-uk-slidenav-next="" data-uk-slider-item="next"><svg width="25px" height="40px" viewBox="0 0 25 40" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-next-large"><polyline fill="none" stroke="#000" stroke-width="2" points="4.002,38.547 22.527,20.024 4,1.5 "></polyline></svg></a>
              </div>
              <ul class="uk-slider-items uk-child-width-1-3@s uk-grid-large" style="transform: translate3d(-246.932px, 0px, 0px);">
                <li tabindex="-1" class="uk-active" style="order: 1;">
                  <div class="uk-card uk-border-light-hover uk-card-small uk-height-small uk-inline uk-border-light-xlarge uk-flex uk-flex-column">
                    <div class="uk-card-body uk-margin-auto-top">
                      <h3 class="uk-card-title uk-margin-remove">Боты</h3>
                      
                    </div>
                    <a href="/development/bot" class="uk-position-cover"></a>
                  </div>
                </li>
                <li tabindex="-1" class="" style="order: 1;">
                  <div class="uk-card uk-border-light-hover uk-card-small uk-height-small uk-inline uk-border-light-xlarge uk-flex uk-flex-column">
                    <div class="uk-card-body uk-margin-auto-top">
                      <h3 class="uk-card-title uk-margin-remove">Seo</h3>
                      
                    </div>
                    <a href="/prodvizhenie-seo/optimizatsiya" class="uk-position-cover"></a>
                  </div>
                </li>
                <li tabindex="-1" class="" style="">
                  <div class="uk-card uk-border-light-hover uk-card-small uk-height-small uk-inline uk-border-light-xlarge uk-flex uk-flex-column">
                    <div class="uk-card-body uk-margin-auto-top">
                      <h3 class="uk-card-title uk-margin-remove">Smm</h3>
                      
                    </div>
                    <a href="/smm" class="uk-position-cover"></a>
                  </div>
                </li>
                <li tabindex="-1" class="uk-active" style="">
                  <div class="uk-card uk-border-light-hover uk-card-small uk-height-small uk-inline uk-border-light-xlarge uk-flex uk-flex-column">
                    <div class="uk-card-body uk-margin-auto-top">
                      <h3 class="uk-card-title uk-margin-remove">Android</h3>
                      
                    </div>
                    <a href="/development/mobile-app/android" class="uk-position-cover"></a>
                  </div>
                </li>
                <li tabindex="-1" class="uk-active" style="">
                  <div class="uk-card uk-border-light-hover uk-card-small uk-height-small uk-inline uk-border-light-xlarge uk-flex uk-flex-column">
                    <div class="uk-card-body uk-margin-auto-top">
                      <h3 class="uk-card-title uk-margin-remove">Сайты</h3>
                      
                    </div>
                    <a href="/site" class="uk-position-cover"></a>
                  </div>
                </li>
              </ul>
            </div>
            <a class="uk-position-center-left uk-position-small uk-hidden@m uk-icon uk-slidenav-previous uk-slidenav" href="#" data-uk-slidenav-previous="" data-uk-slider-item="previous"><svg width="14px" height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-previous"><polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline></svg></a>
            <a class="uk-position-center-right uk-position-small uk-hidden@m uk-icon uk-slidenav-next uk-slidenav" href="#" data-uk-slidenav-next="" data-uk-slider-item="next"><svg width="14px" height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-next"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline></svg></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<section>

    <!-- Footer -->


<div class="uk-section-secondary uk-section uk-section-large" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-slide-left-small; delay: false;">

    <div class="uk-container uk-container-large">

        <div class="uk-grid-large uk-margin-xlarge uk-grid" uk-grid="">
            <div class="uk-width-medium@m uk-first-column">
                <h3 class="uk-h4 uk-text-left@s uk-text-center uk-scrollspy-inview" uk-scrollspy-class="" style="">Наши соц-сети</h3>
                <div class="uk-margin uk-text-left@s uk-text-center uk-scrollspy-inview" uk-scrollspy-class="" style="">
                    <div class="uk-child-width-1-4 uk-flex-left@s uk-flex-center uk-grid" uk-grid="">
                        <div class="uk-first-column">
                            <a rel="nofollow" target="_blank" class="el-link uk-icon-button uk-icon" href="http://facebook.com/tezinfo.uz" uk-icon="icon: facebook;">
                                <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="facebook">
                                    <path d="M11,10h2.6l0.4-3H11V5.3c0-0.9,0.2-1.5,1.5-1.5H14V1.1c-0.3,0-1-0.1-2.1-0.1C9.6,1,8,2.4,8,5v2H5.5v3H8v8h3V10z"></path>
                                </svg>
                            </a>
                        </div>
<!--
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
-->
                        <div>
                            <a rel="nofollow" target="_blank" class="el-link uk-icon-button uk-icon" href="http://instagram.com/tezinfo.uz" uk-icon="icon: instagram;">
                                <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="instagram">
                                    <path d="M13.55,1H6.46C3.45,1,1,3.44,1,6.44v7.12c0,3,2.45,5.44,5.46,5.44h7.08c3.02,0,5.46-2.44,5.46-5.44V6.44 C19.01,3.44,16.56,1,13.55,1z M17.5,14c0,1.93-1.57,3.5-3.5,3.5H6c-1.93,0-3.5-1.57-3.5-3.5V6c0-1.93,1.57-3.5,3.5-3.5h8 c1.93,0,3.5,1.57,3.5,3.5V14z"></path>
                                    <circle cx="14.87" cy="5.26" r="1.09"></circle>
                                    <path d="M10.03,5.45c-2.55,0-4.63,2.06-4.63,4.6c0,2.55,2.07,4.61,4.63,4.61c2.56,0,4.63-2.061,4.63-4.61 C14.65,7.51,12.58,5.45,10.03,5.45L10.03,5.45L10.03,5.45z M10.08,13c-1.66,0-3-1.34-3-2.99c0-1.65,1.34-2.99,3-2.99s3,1.34,3,2.99 C13.08,11.66,11.74,13,10.08,13L10.08,13L10.08,13z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <h3 class="uk-h4 uk-text-left@s uk-text-center uk-scrollspy-inview" uk-scrollspy-class="" style="">По поводу рекламы</h3>
                <div class="el-content uk-panel uk-margin uk-text-left@s uk-text-center">
                    <ul class="uk-list">

                        <li><a class="el-link uk-link-reset" href="tel:+998909408196">+998 90 9408196</a></li>
                    
                        <li visibility:="" hidden=""><a class="el-link uk-link-reset" href="mailto:mail@tezinfo.uz">mail@tezinfo.uz</a></li>
                        <!-- <li><a class="el-link uk-link-reset" href="mailto:mail@example.com">mail@tezinfo.uz</a></li> -->

                    </ul>

                </div>
            </div>
            <div class="uk-width-xlarge@m">
                <div class="uk-margin uk-text-left@s uk-text-center">
                    <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-grid-match uk-grid" uk-grid="">
                        <div class="uk-first-column">
                            <div class="el-item uk-panel uk-margin-remove-first-child uk-scrollspy-inview" uk-scrollspy-class="" style="">
                                <h3 class="el-title uk-h4 uk-margin-top uk-margin-remove-bottom">                        Быстрое меню                    </h3>
                                <div class="el-content uk-panel uk-margin-top">
                                    <ul class="uk-list">
                                                                                    <li>
                                                <a rel="nofollow" target="_blank" href="http://gpd.vid.uz/it" class="el-link uk-link-reset">IT</a>
                                            </li>
                                                                                    <li>
                                                <a rel="nofollow" target="_blank" href="http://gpd.vid.uz/prodvizhenie-i-marketing" class="el-link uk-link-reset">Продвижение и Маркетинг</a>
                                            </li>
                                                                                    <li>
                                                <a rel="nofollow" target="_blank" href="http://gpd.vid.uz/multimedia" class="el-link uk-link-reset">Мультимедиа</a>
                                            </li>
                                                                                    <li>
                                                <a rel="nofollow" target="_blank" href="http://gpd.vid.uz/tekst" class="el-link uk-link-reset">Текст</a>
                                            </li>
                                                                                    <li>
                                                <a rel="nofollow" target="_blank" href="http://gpd.vid.uz/biznes" class="el-link uk-link-reset">Бизнес</a>
                                            </li>
                                                                            </ul>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="el-item uk-panel uk-margin-remove-first-child uk-scrollspy-inview" uk-scrollspy-class="" style="">

                                <h3 visibility:="" hidden="" class="el-title uk-h4 uk-margin-top uk-margin-remove-bottom">                        Полезная информация                   </h3>

                                <div class="el-content uk-panel uk-margin-top">
                                    <ul class="uk-list">
<!--
                                        <li>
                                            <a href="#" class="el-link uk-link-reset">Блог</a>
                                        </li>
                                        <li>
                                            <a href="#" uk-scroll="" class="el-link uk-link-reset">Полезная информация (FAQ)</a>
                                        </li>
                                        <li>
                                            <a href="#" class="el-link uk-link-reset">О нас</a>
                                        </li>
-->
                                        <livisibility: hidden="">
                                            <a rel="nofollow" target="_blank" href="http://price.tezinfo.uz" class="el-link uk-link-reset">Рекламодателям</a>
                                        
                                        <livisibility: hidden="">
                                            <a rel="nofollow" target="_blank" href="http://price.tezinfo.uz" class="el-link uk-link-reset">Добавить компанию</a>
                                        
                                    </livisibility:></livisibility:></ul>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="uk-width-expand@m">

                <h3 class="uk-h4 uk-text-left@s uk-text-center uk-scrollspy-inview" uk-scrollspy-class="" style="">
                    Рассылка
                </h3>
                <div class="uk-text-left@s uk-text-center uk-scrollspy-inview" uk-scrollspy-class="" style="">
                    <form class="uk-form uk-panel js-form-newsletter mail-form" method="post" action="">

                        <div class="uk-grid-collapse uk-grid" uk-grid="">

                            <div class="uk-width-expand@s uk-margin-auto-left uk-first-column">
                                <input class="el-input uk-input srh-input" type="email" name="email" placeholder="Почтовый адрес" required="">
                            </div>
                            <div class="uk-width-auto@s uk-margin-auto-right">
                                <button class="el-button uk-button uk-button-primary  srh-but" type="submit">Подписаться</button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

</div>
<div class="uk-section-muted uk-section uk-section-xsmall ux-footer">

    <div class="uk-container uk-container-large">
        <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid="">
            <div class="uk-grid-item-match uk-flex-middle uk-width-expand@m uk-first-column">

                <div class="uk-panel uk-width-1-1">
                    <div class="uk-text-meta uk-margin uk-text-left@m uk-text-center">© 2019 Создано в <a href="https://vid.uz/">vid.uz</a>. Все права защищены</div>
                </div>

            </div>

         <!--    <div class="uk-grid-item-match uk-flex-middle uk-width-medium@m">

               <div class="uk-panel uk-width-1-1">

                    <div class="uk-margin uk-text-center" uk-scrollspy="target: [uk-scrollspy-class];">


                        <img width="80" class="el-image uk-text-muted" alt="" uk-svg="" uk-img="" src="" hidden="true">
                        <div class="uk-text-muted content-header-item ">
                            <a class="link-effect font-w700" href="http://gpd.vid.uz">
                        <span class="icon">
                            <img src="/assets/img/hex.svg" width="35" height="35" alt="TezInfo Logo" uk-svg="" hidden="true">
                        </span>
                                <span class="font-size-xl text-dual-primary-dark">Tez</span><span class="font-size-xl text-primary">Info</span>
                            </a>
                        </div>


                    </div>

                </div>

            </div> -->

<!--
            <div class="uk-grid-item-match uk-flex-middle uk-width-expand@m">

                <div class="uk-panel uk-width-1-1">

                    <div class="uk-text-right@m uk-text-left">
                        <ul class="uk-margin-remove-bottom uk-subnav uk-flex-right@m uk-flex-left" uk-margin="">
                            <li class="el-item uk-first-column">
                                <a class="el-link" href="#">Пользовательское соглашение</a></li>
                            <li class="el-item">
                                <a class="el-link" href="#">Контакты</a></li>
                        </ul>

                    </div>

                </div>

            </div>
-->
        </div>
    </div>

</div>

<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Store",
      "image": [
        "https://lh3.googleusercontent.com/proxy/RomJGetxyExSuPoNnZJKatWVJtl5XU3OFfcnpg57HN12QIQ9yG6uoK4gDm74Cu6OK088oxzsi_ls_IExxfZ5spEj5TZwR9oILWSPkR00SA9UF8GnntVLiLf-VWb5FSI2PdlfJg"
       ],
      "@id": "vid.uz",
      "name": "Каталог фриланс исполнителей и компаний для продвижения бизнеса",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Yunusobod 13",
        "addressLocality": "Tashkent",
        "addressRegion": "UZ",
        "postalCode": "100114",
        "addressCountry": "UZ"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
        },
        "author": {
          "@type": "Person",
          "name": "Murad Ikramhodjaev"
        }
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 41.2825125,
        "longitude": 69.1392828
      },
      "url": "https://www.vid.uz",
      "telephone": "+998909408196",
      "priceRange": "$$$",
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Monday",
            "Tuesday"
          ],
          "opens": "9:00",
          "closes": "22:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Wednesday",
            "Thursday",
            "Friday"
          ],
          "opens": "9:00",
          "closes": "23:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Saturday",
          "opens": "9:00",
          "closes": "23:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Sunday",
          "opens": "9:00",
          "closes": "22:00"
        }
      ]
  
    }
    </script>

</section></section>
@endsection
