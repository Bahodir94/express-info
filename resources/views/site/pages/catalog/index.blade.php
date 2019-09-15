@extends('site.layouts.app')

@section('title', 'Каталог')

@section('header')
    @include('site.layouts.partials.headers.main')
@endsection

@section('content')




    <!-- Favorites Category -->
<section class="uk-section-xsmall ">
    <div class="uk-container uk-container-expand uk-margin-medium uk-container-center uk-slider">
        <div class="uk-container uk-container-expand uk-container-center gutter" uk-slider="autoplay: true; autoplay-interval: 5000;">
            <ul class="uk-slider-items uk-child-width-auto uk-grid-large uk-grid">

                @foreach ($favoritesCategories as $category)
                    <li class="slide">
                        <div class="card">
                            <a href="{{ route('site.catalog.category', $category->ru_slug) }}">
                                
                            <div class="card_img">
                                <img src="{{ $category->getImage() }}" alt="">
                            </div>
                            <h2>
                                <a href="{{ route('site.catalog.category', $category->id) }}">
                                    {{ $category->getTitle() }}
                                </a>
                            </h2>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>





    <!-- Favorites Category end-->






<section class="uk-section-xsmall">
    <div class="uk-container uk-container-expand uk-margin-medium uk-container-center">
        <ul class="uk-grid uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-3@l uk-child-width-1-4@xl" data-uk-grid-margin>
            @foreach($parentCategories as $category)
                <li class="uk-container-center uk-margin-medium-bottom">
                    <div class="item uk-flex-middle">
                        <div class="item_icon">
                            <div class="item_circle">
                                <img src="{{ $category->getImage() }}" alt="">
                            </div>
                        </div>
                        <div class="item_text">
                            <h2><a href="{{ route('site.catalog.category', $category->ru_slug) }}">{!! $category->ru_title !!}</a></h2>
                            <p>
                                @foreach ($category->categories()->limit(5)->get() as $child)
                                    <a href="{{ route('site.catalog.category', $child->getAncestorsSlugs()) }}">{!! $child->ru_title !!},</a>
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
