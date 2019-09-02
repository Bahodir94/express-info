@extends('site.layouts.app')

@section('title', 'Каталог')

@section('content')
    @include('site.components.search')

    <hr class="new">

    <div class="slider uk-container uk-container-center uk-margin-top">
        <ul class="slider_wrapper">
            @foreach($favoritesCategories as $category)
                <li class="slide">
                    <a href="{{ route('site.catalog.category', $category->id) }}">
                        <div class="card">
                            <div class="card_img">
                                <img src="{{ $category->getImage() }}" alt="">
                            </div>
                            <p>
                                {!! $category->ru_title !!}
                            </p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="uk-container uk-container-large uk-margin uk-container-center margin">
        <ul class="uk-grid uk-grid-width-1-1 uk-grid-width-small-1-2  uk-grid-width-medium-1-2 uk-grid-width-large-1-3" data-uk-grid-margin>
            @foreach($parentCategories as $category)
                <li class="uk-container-center uk-margin-large-bottom">
                    <a href="{{ route('site.catalog.category', $category->id) }}" class="item">
                        <div class="item_icon">
                            <div class="item_circle"><img src="{{ $category->getImage() }}"
                                                          alt=""></div>
                        </div>
                        <div class="item_text">
                            <p style="font-weight: bold;">{!!  $category->ru_title !!}</p>
                            <p>{{ implode(', ',  $category->categories()->count() ? $category->categories()->limit(5)->pluck('ru_title')->toArray() : $category->companies()->limit(5)->pluck('ru_title')->toArray()) }}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
