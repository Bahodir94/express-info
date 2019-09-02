@extends('site.layouts.app')

@section('title', $category->getTitle())

@section('content')

    @include('site.components.search')

    <hr class="new">

    <div class="uk-container uk-container-large uk-container-center">
        <div class="wrapper">
            <div class="wrapper_title">
                <h3>{{ $category->getTitle() }}</h3>
            </div>
            @if ($category->services()->count() > 0)
                <div class="sorting">
                    <p>Сортировать: </p>
                    <div class="dropdown-menu" id="dropdown-menu">
                        <button class="dropdown_title">Выбрать<img src="{{ asset('assets/img/Path 1204.svg') }}" alt=""></button>
                        <div data-uk-dropdown>
                            <ul class="uk-nav uk-dropdown-nav">
                                @foreach($category->services as $service)
                                    @if ($service->companies()->count() > 0)
                                        <li>
                                            <a href="{{ route('site.catalog.category', [$category->id, 'service' => $service->id]) }}">{{ $service->ru_title }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="uk-container uk-container-large uk-container-center container">
        <div class="plus_item">
            <div class="plus_img">
                <img src="{{ asset('assets/img/left-arrow.svg') }}" alt="Go back">
            </div>
            <a href="{{ $category->hasParentCategory() ? route('site.catalog.category', $category->parent_id) : route('site.catalog.index') }}">
                <p>Назад</p>
            </a>
        </div>
        @foreach($category->categories as $child)
            <div class="plus_item">
                <div class="plus_img">
                    <img src="{{ $child->getImage() }}" alt="">
                </div>
                <a href="{{ route('site.catalog.category', $child->id) }}">
                    <p>{{ $child->ru_title }} <span>({{ $child->companies()->count() }})</span></p>
                </a>
            </div>
        @endforeach
    </div>

    <div class="uk-container uk-container-center uk-container-large uk-margin-top">
        <div class="uk-grid uk-grid-width-1-1 uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-4" data-uk-grid-margin>
            @foreach($companies as $company)
                <a href="{{ route('site.catalog.company', $company->id) }}" class="uk-container-center">
                    <div class="inner">
                        <div class="header_logo">
                            <div class="inner_logo">
                                <img src="{{ $company->getImage() }}" alt="">
                            </div>
                        </div>
                        <div class="inner_tages">
                            <div class="title">
                                <h2>{{ $company->ru_title }}</h2>
                            </div>
                        </div>
                        <div class="description">
                            <p>{{ $company->category->ru_title }}</p>
                            <ul>
                                @foreach($company->services as $service)
                                    <li><img src="{{ $service->getImage() }}" alt="{{ $service->ru_title }}"></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
