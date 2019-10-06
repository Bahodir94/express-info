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
    <div class="uk-container uk-container-xlarge uk-margin-medium uk-container-center sot-body uk-visible@l">
        <div class="honeycombs honeycombs-wrapper">
            <div class="honeycombs-inner-wrapper  ">
              @foreach ($favouritesCompanies as $company)
                <div class="comb-container">


                    <div class="comb row3">
                        <div class="hex_l" style="width: 180px; height: 155.885px;">
                          <div class="hex_r" style="width: 180px; height: 155.885px;">
                            <div class="hex_inner" style="width: 180px; height: 155.885px;">
                              <div class="inner_span">
                                <a href="@if ($company->show_page) {{ route('site.catalog.main', $company->getAncestorsSlugs()) }} @else {{ $company->url }} @endif" class="mobile_main_item_inner_link uk-position-cover">
                                    <img src="{{ $company->getImage() }}" alt="{{ $company->getTitle() }}" class="mobile_main_item_icon uk-position-center" >


                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="uk-border-circle uk-box-shadow-large uk-position-cover hex-bot" style="">
                        </div>

                  </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="uk-container uk-container-xlarge uk-container-center uk-hidden@l">
        <div class=" gutter " uk-slider="autoplay: true; autoplay-interval: 5000;">
            <ul class="uk-slider-items uk-child-width-1-3 slide-ttg ">
                    @foreach ($favouritesCompanies as $company)
                    <li class="">
                        <a href="@if ($company->show_page) {{ route('site.catalog.main', $company->getAncestorsSlugs()) }} @else {{ $company->url }} @endif" class="">
                            <img src="{{ $company->getImage() }}" alt="{{ $company->getTitle() }}" class="fav_mob" >
                        </a>
                    </li>
                    @endforeach


            </ul>
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
