@extends('site.layouts.app')

@section('title', $need->ru_title)

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('content')
    <section class="uk-section-xsmall uk-padding-remove-vertical">
        <div class="uk-container uk-container-expand uk-margin-medium uk-container-center">
            @foreach ($need->menuItems as $menu)
                <div class="wrapper_title">
                    <h3>{{ $menu->ru_title }}</h3>
                </div>
                <ul class="uk-grid uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-3@l uk-child-width-1-4@xl" data-uk-grid-margin>
                    @foreach($menu->categories as $category)
                        <li class="uk-container-center uk-margin-medium-bottom">
                            <div class="item uk-flex-middle">
                                <div class="item_icon">
                                    <div class="item_circle">
                                        <img src="{{ $category->getImage() }}" alt="">
                                    </div>
                                </div>
                                <div class="item_text">
                                    <h2><a href="{{ route('site.catalog.category', $category->getAncestorsSlugs()) }}">{!! $category->ru_title !!}</a></h2>
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
            @endforeach
        </div>
    </section>
@endsection
