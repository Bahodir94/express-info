@extends('site.layouts.app')

@section('title', 'Конкурсы')

@section('meta')
    @if ($currentCategory)
        @php
            $metaWords = ['Тендеры по', 'Заказы по', 'Работа по']
        @endphp
        <meta name="title" content="{{ $metaWords[array_rand($metaWords, 1)] }} @if(empty($currentCategory->meta_title)) {{ $currentCategory->getTitle() }} @else {{ $currentCategory->meta_title }} @endif в Ташкенте|Узбекистане">
        <meta name="description"
              content="@if (empty($currentCategory->meta_description)) {{ strip_tags($currentCategory->ru_description) }} @else {{ $currentCategory->meta_description }} @endif">
    @endif
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
                            <h1 class="title-page">Каталог конкурсов</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('site.catalog.index') }}">Главная</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Конкурсы</li>
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
                    <div id="leftcolumn">
                        <div class="toggle-sidebar-left d-lg-none">Фильтр</div>
                        <div class="sidebar-left">
                            <button class="btn-close-sidebar-left btn-clear"><i class="fa fa-times-circle"></i>
                            </button>
                            <div class="box-sidebar">
                                <div class="header-box d-flex justify-content-between flex-wrap">
                                    <h3 class="title-box">Категории</h3>
                                </div>
                                <div class="body-box">
                                    <div class="accordion" id="needsAccordion" role="tablist" aria-multiselectable="false">
                                        @foreach($needs as $need)
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between" role="tab" id="heading{{ $need->id }}">
                                                    <span>{{ $need->ru_title }}</span>
                                                    <a href="#collapse{{ $need->id }}" data-toggle="collapse" data-parent="#needsAccordion" aria-expanded="true" aria-controls="collapse{{ $need->id }}"><i class="fas fa-caret-down"></i></a>
                                                </div>
                                                <div class="collapse" id="collapse{{ $need->id }}" role="tabpanel" aria-labelledby="heading{{ $need->id }}" data-parent="#needsAccordion">
                                                    <div class="card-body">
                                                        <div class="accordion" id="categoriesAccordion{{ $need->id }}" role="tablist" aria-multiselectable="false">
                                                            @foreach($need->menuItems as $item)
                                                                <div class="card">
                                                                    <div class="card-header d-flex justify-content-between" id="headingCategory{{ $item->id }}">
                                                                        <a href="{{ route('site.tenders.category', $item->ru_slug) }}">{{ $item->ru_title }}</a>
                                                                        <a href="#collapseCategory{{ $item->id }}" data-toggle="collapse" data-parent="#categoriesAccordion{{ $need->id }}" aria-expanded="true" aria-controls="collapseCategory{{ $item->id }}"><i class="fas fa-caret-down"></i></a>
                                                                    </div>
                                                                    <div class="collapse" id="collapseCategory{{ $item->id }}" role="tabpanel" aria-labelledby="headingCategory{{ $item->id }}" data-parent="#categoriesAccordion{{ $need->id }}">
                                                                        <div class="card-body">
                                                                            <ul class="list-group list-group-flush">
                                                                                @foreach($item->categories as $category)
                                                                                    <a href="{{ route('site.tenders.category', $category->getAncestorsSlugs()) }}" class="list-group-item list-group-item-action">{{ $category->getTitle() }}</a>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
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
                <div class="col-lg-8">
                    <div class="content-main-right list-jobs">
                        <div class="header-list-job d-flex flex-wrap justify-content-between align-items-center">
                            <h4>{{ count($tenders) }} Конкурсов найдено</h4>
                        </div>
                        <div class="list">
                            @foreach($tenders as $tender)
                                <div class="job-item">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <div class="img-job text-center"><a href="#"></a></div>
                                        </div>
                                        <div class="col-md-10 job-info">
                                            <div class="text">
                                                <h3 class="title-job"><a href="{{ route('site.tenders.category', $tender->slug) }}">{{ $tender->title }}</a><span class="ml-2 tags"><a>@if ($tender->checkDeadline()) Открыт @else Срок приёма заявок истёк @endif</a></span></h3>
                                                <div class="date-job"><i class="fa fa-check-circle"></i><span
                                                        class="company-name">Опубликован: {{ $tender->created_at->format('d.m.Y') }}</span>
                                                    <div class="date-job"><i class="fa fa-check-circle"></i><span
                                                            class="company-name">Крайний срок приема заявок: {{ \Carbon\Carbon::create($tender->deadline)->format('d.m.Y') }}</span>
                                                    </div>
                                                </div>
                                                <div class="meta-job">
                                                    <div class="categories">@foreach($tender->categories as $category){{ $category->getTitle() }} @endforeach</div>
                                                    <span class="salary">Бюджет {{  number_format($tender->budget, 0, ',', ' ') }} сум</span>
                                                </div>
                                                <button class="add-favourites"><i class="far fa-star"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
                @if ($currentCategory !== null && $currentCategory->ru_description)
                    <div class="row">
                        <div class="col-lg">
                            <div id="leftcolumn">
                                <div class="sidebar-left">
                                    <div class="box-sidebar" style="margin-top: 40px;">
                                        <div class="header-box d-flex justify-content-between flex-wrap">
                                            <h3 class="title-box">Описание</h3>
                                        </div>
                                        <div class="body-box">
                                            <p>{!! $currentCategory->ru_description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
        </div>
    </div>
@endsection
