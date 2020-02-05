@extends('site.layouts.app')

@section('title', 'Справочник Ташкента / Узбекистана | Справочник предприятий Ташкента / Узбекистана')

@section('meta')
    <meta name="title" content="Справочник Ташкента / Узбекистана | Справочник предприятий Ташкента / Узбекистана">
@endsection

@section('header')
    @include('site.layouts.partials.headers.main')
@endsection

@section('content')




<section class="uk-section-xsmall">
    <div class="uk-container uk-container-center uk-container-xlarge uk-margin-top">
            <div data-uk-grid class="uk-child-width-1-2@s uk-child-width-1-3@m uk-margin-large-top uk-grid-match uk-gridl">
            @foreach ($favouritesCompanies as $company)
                <div>
                    <div class="uk-card uk-card-small uk-card-border">
                        <div class="uk-card-media-top uk-position-relative uk-light">
                            <img src="{{ $company->getImage() }}" alt="Course Title">
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
        <ul class="uk-grid uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-3@l" data-uk-grid-margin>
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
@endsection
