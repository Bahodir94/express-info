@extends('site.layouts.app')

@section('title', 'Результаты поиска')

@section('header')
    @include('site.layouts.partials.headers.main')
@endsection

@section('content')
    
    @if ($categories->count() > 0)
        <div class="uk-container uk-container-xlarge uk-margin-medium uk-container-center">
            <div class="wrapper_title">
                <h3>Найденные категории</h3>
            </div>
            <ul class="uk-grid uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-3@l uk-child-width-1-4@xl" data-uk-grid-margin>
                @foreach($categories as $category)
                    <li class="uk-container-center uk-margin-medium-bottom">
                        <div class="item uk-flex-middle">
                            <div class="item_icon">
                                <div class="item_circle">
                                    <img src="{{ $category->getImage() }}" alt="">
                                </div>
                            </div>
                            <div class="item_text">
                                <h2><a href="{{ route('site.catalog.main', $category->getAncestorsSlugs()) }}">{!! $category->ru_title !!}</a></h2>
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
    @endif
    @if ($companies->count() > 0)
        <div class="uk-container uk-container-center uk-container-xlarge uk-margin-top">
            <div class="wrapper_title">
                <h3>Найденные компании</h3>
            </div>
            <div class="uk-grid uk-grid-match uk-grid-medium  uk-child-width-1-2@s uk-child-width-1-4@m uk-child-width-1-4@l">
                @foreach($companies as $company)
                    <div  class="uk-container-center">
                        <div class="inner">
                            <div class="header_logo">
                                <div class="inner_logo">
                                    <img src="{{ $company->getImage() }}" alt="">
                                </div>
<!--
                                <ul class="dots">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
-->
                            </div>
                            <div class="inner_tages">
                                <div class="title">
                                    <h2><a href="{{ route('site.catalog.main', $company->getAncestorsSlugs()) }}">{{ $company->ru_title }}</a></h2>
                                </div>
                                @if ($company->hasAdvantages())
                                    <div class="tags">
                                        <ol>
                                            @foreach ($company->advantagesAsArray() as $advantage)
                                                <li>{{ $advantage }}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                @endif
                            </div>
                            <div class="description">
                                @if ($company->category)
                                    <p>{!! $company->category->ru_title !!}</p>
                                @endif
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
    @endif


@endsection
