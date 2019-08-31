@extends('site.layouts.app')

@section('title', 'Каталог')

@section('search')
    @include('site.components.search')
@endsection

@section('content')
    <div class="uk-container uk-container-large uk-margin uk-container-center margin">
        <ul class="uk-grid uk-grid-width-1-1 uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-3" data-uk-grid-margin>
            @foreach($categories as $category)
                <li class="uk-container-center uk-margin-large-bottom">
                    <div class="item">
                        <div class="item_icon">
                            <div class="item_circle">
                                <img src="{{ $category->getImage() }}" alt="{{ $category->getTitle() }}">
                            </div>
                        </div>
                        <div class="item_text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, saepe!
                        </div>
                        <a href="{{ route('site.catalog.category', $category->id) }}">
                            <img src="{{ asset('assets/img/next.svg') }}" alt="next">
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
