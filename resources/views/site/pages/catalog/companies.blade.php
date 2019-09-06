@extends('site.layouts.app')

@section('title', $category->getTitle())

@section('content')

    @include('site.components.search')

    <!-- Line -->
    <hr class="new">
    <!-- Line end -->

    <div class="uk-container uk-container-expand uk-container-center">
        <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle" uk-grid>
            <div class="wrapper_title">
                <h3>{{ $category->getTitle() }}</h3>
            </div>
            <div class="uk-width-expand@m"></div>
            @if ($category->services()->count() > 0)
                <div class="sorting uk-grid-small uk-flex-middle" uk-grid>
                    <p>Сортировать: </p>
                    <div id="dropdown-menu" class="dropdown-menu">
                        @isset($currentService)
                            <span class="dropdown_title"><img src="{{ $currentService->getImage() }}" alt="">{{ $currentService->ru_title }}</span>
                        @endisset
                        <ul>
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
            @endif
        </div>
    </div>

    <div class="uk-container uk-container-expand uk-margin-small uk-margin-medium-bottom">
        <div class="uk-child-width-auto uk-child-width-auto@m uk-grid-small" uk-grid>
            <div>
                <div class="plus_item">
                    <div class="plus_img">
                        <img src="{{ asset('assets/img/left-arrow.svg') }}" alt="Go back">
                    </div>
                    <a href="{{ $category->hasParentCategory() ? route('site.catalog.category', $category->parent_id) : route('site.catalog.index') }}">
                        <p>Назад</p>
                    </a>
                </div>
            </div>
            @foreach($category->categories as $child)
                <div>
                    <div class="plus_item">
                        <div class="plus_img">
                            <img src="{{ $child->getImage() }}" alt="">
                        </div>
                        <a href="{{ route('site.catalog.category', $child->id) }}">
                            <p>{{ $child->ru_title }} <span>({{ $child->companies()->count() }})</span></p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="uk-container uk-container-center uk-container-expand uk-margin-top">
            <div class="uk-grid uk-grid-match uk-grid-medium  uk-child-width-1-2@s uk-child-width-1-4@m uk-child-width-1-4@l">
            @foreach($companies as $company)
                <div  class="uk-container-center">
                    <div class="inner">
                        <div class="header_logo">
                            <div class="inner_logo">
                                <img src="{{ $company->getImage() }}" alt="">
                            </div>
                        </div>
                        <div class="inner_tages">
                            <div class="title">
                                <h2><a href="{{ route('site.catalog.company', $company->id) }}">{{ $company->ru_title }}</a></h2>
                            </div>
                        </div>
                        <div class="description">
                            <p>{!! $company->category->ru_title !!}</p>
                            <ul>
                                @foreach($company->services as $service)
                                    <li><img src="{{ $service->getImage() }}" alt=""></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="uk-container uk-container-expand uk-container-center container uk-margin-top">
        <ul class="sequence">
            <li><a href="{{ route('site.catalog.index') }}">Главная</a></li>
            <li><img src="{{ asset('assets/img/next.svg') }}" alt=""></li>
            @foreach ($category->ancestors as $parentCategory)
                <li><a href="{{ route('site.catalog.category', $parentCategory->id) }}">{{ $parentCategory->getTitle() }}</a></li>
                <li><img src="{{ asset('assets/img/next.svg') }}" alt=""></li>
            @endforeach
            <li>{{ $category->getTitle() }}</li>
        </ul>
    </div>
@endsection
