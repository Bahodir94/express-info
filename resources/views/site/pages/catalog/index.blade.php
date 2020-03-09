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
