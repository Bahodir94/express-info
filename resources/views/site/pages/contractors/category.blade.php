@extends('site.layouts.app')

@section('title')
    @if(empty($category->meta_title))
        {{ $category->getTitle() }}
    @else
        {{ $category->meta_title }}
    @endif
@endsection

@section('meta')

    <meta name="title"
          content="@if(empty($category->meta_title)) {{ $category->getTitle() }} в Ташкенте @else {{ $category->meta_title }} @endif">
    <meta name="description"
          content="@if (empty($category->meta_description)) {{ strip_tags($category->ru_description) }} @else {{ $category->meta_description }} @endif">
    <meta name="keywords" content="{{ $category->meta_keywords }}">

@endsection

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('content')
    <div class="primary-page">
        <div class="container">
            <div class="header-page">
                <div class="row">
                    <div class="col-md-8">
                        <div class="section-heading">
                            <h1 class="title-page">Каталог исполнителей</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('site.catalog.index') }}">Главная</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('site.contractors.index') }}">Исполнители</a>
                                    </li>
                                    @foreach($category->ancestors as $ancestor)
                                        <li class="breadcrumb-item"><a
                                                href="{{ route('site.catalog.main', $ancestor->getAncestorsSlugs()) }}">{{ $ancestor->getTitle() }}</a>
                                        </li>
                                    @endforeach
                                    <li class="breadcrumb-item active"
                                        aria-current="page">{{ $category->getTitle() }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="search-form">
                            <input class="form-control" type="text" placeholder="Поиск здесь...">
                            <button class="btn-clear"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="toggle-sidebar-left d-lg-none">Filter Job</div>
                    <div class="sidebar-left">
                        <button class="btn-close-sidebar-left btn-clear"><i class="fa fa-times-circle"></i></button>
                        <div class="box-sidebar">
                            <div class="header-box d-flex justify-content-between flex-wrap">
                                <h3 class="title-box">Категории</h3>
                            </div>
                            <div class="body-box">
                                <ul class="list-check-filter-job">
                                    @foreach($category->categories as $child)
                                        <li>
                                            <a href="{{ route('site.catalog.main', $child->getAncestorsSlugs()) }}">{{ $child->getTitle() }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="box-sidebar">
                            <div class="header-box">
                                <h3 class="title-box">Бюджет вашего проекта</h3>
                            </div>
                            <div class="body-box">
                                <div class="salary-range">
                                    <input id="amount" type="text" readonly="readonly">
                                    <div id="slider-range"
                                         class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                        <div class="ui-slider-range ui-corner-all ui-widget-header"
                                             style="left: 0%; width: 12.5533%;"></div>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                              style="left: 0%;"></span><span tabindex="0"
                                                                             class="ui-slider-handle ui-corner-all ui-state-default"
                                                                             style="left: 16.46%;"></span>
                                        <div class="ui-slider-range ui-corner-all ui-widget-header"
                                             style="left: 0%; width: 16.46%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="content-main-right list-jobs">
                        <div class="header-list-job d-flex flex-wrap justify-content-between align-items-center">
                            <h4>{{ count($contractors) }} Исполнителей найдено</h4>
                        </div>
                        <div class="list">
                            @foreach($contractors as $contractor)
                                <div class="candidate-item hover">
                                    <div class="candidate-img"><a
                                            href="{{ route('site.contractors.show', $contractor->slug) }}"><img
                                                src="{{ $contractor->getImage() }}"
                                                alt="{{ $contractor->getContractorTitle() }}"></a></div>
                                    <div class="candidate-content">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <div class="candidate-info">
                                                    <h3 class="title-job"><a
                                                            href="{{ route('site.contractors.show', $contractor->slug) }}">{{ $contractor->getContractorTitle() }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="candidate-button"><a class="btn btn-light btn-lg" href="#">Добавить
                                                        в конкурс</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="candidate-content mt-3" style="margin-left: 36px;">
                                        <div class="row">
                                            @if($contractor->about_myself)
                                                <div class="col-md-6">
                                                    <div class="candidate-info">
                                                        <h3 class="title-job">Описание</h3>
                                                        <div class="date-job"><p>{!! $contractor->about_myself !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-6">
                                                <div class="candidate-info">
                                                    <h3 class="title-job">Цены на услуги</h3>
                                                    @foreach($contractor->categories as $contractorCategory)
                                                        <div class="price-item">
                                                            <i class="fa fa-check-circle text-primary"></i> <span
                                                                class="service-name">{{ $contractorCategory->getTitle() }}: </span>
                                                            <span class="price-from">{{ $contractorCategory->pivot->price_from }}</span> - <span class="price-to">{{ $contractorCategory->pivot->price_to }}</span> сум
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
