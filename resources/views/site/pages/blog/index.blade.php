<style>
    .sequence {
        display: flex;
        align-items: center;
        list-style: none;
        padding: 0;
        margin: 83px 0;
        flex-wrap: wrap;

    }

    .sequence li {
        margin-right: 17px;
        color: #102840;
        font-size: 18px;
        /* font-family: 'opensans'; */
        font-weight: 400;
        margin-top: 10px;
    }

    .sequence li a {
        color: #102840;
        text-decoration: none;
    }</style>
@extends('site.layouts.app')
@section('title')
    Блог
    {{--@if(empty($category->meta_title))
        {{ $category->getTitle() }} в Ташкенте
    @else
        {{ $category->meta_title }}
    @endif--}}
@endsection
{{--@section('meta')
    <meta name="title" content="@if(empty($category->meta_title)) {{ $category->getTitle() }} в Ташкенте @else {{ $category->meta_title }} @endif">
    <meta name="description" content="@if (empty($category->meta_description)) {{ strip_tags($category->ru_description) }} @else {{ $category->meta_description }} @endif">
    <meta name="keywords" content="{{ $category->meta_keywords }}">
@endsection--}}
{{--@section('css')
    @if ($category->hasCguFiles())
        <style>
            .main_item_img {
                width: 100%;
                overflow: hidden;
                padding-top: 21px;
                padding-bottom: 5px;
            }

            .main_item_img img {
                object-fit: cover;
                max-height: 200px;
                width: 130px !important;
                height: 130px !important;
            }

            .main_item {
                display: flex;
                flex-flow: column;
            }

            .main_item_p {
                color: #00C3CE;
                font-family: "OpenSans-Semibold";
                font-size: 12px;
                text-transform: uppercase;
            }
        </style>
    @endif
@endsection--}}
@section('header')
    @include('site.layouts.partials.headers.default')
@endsection
@section('content')
    <!-- Search settings -->
    <!-- <div class="my-container">
        <div class="capsule_item">
            <div class="capsule_img">
                <img src="images/search (1).svg" alt="">
            </div>
            <a href="#">
                <p>Все результаты</p>
            </a>
        </div>
        <div class="capsule_item">
            <div class="capsule_img">
                <img src="images/office-briefcase.svg" alt="">
            </div>
            <a href="#">
                <p>Места и заведения</p>
            </a>
        </div>
        <div class="capsule_item">
            <div class="capsule_img">
                <img src="images/office-briefcase.svg" alt="">
            </div>
            <a href="#">
                <p>Мероприятия</p>
            </a>
        </div>
        <div class="capsule_item">
            <div class="capsule_img">
                <img src="images/office-briefcase.svg" alt="">
            </div>
            <a href="#">
                <p>Акции</p>
            </a>
        </div>
    </div> -->
    <!-- Search settings end -->

    {{--<div class="uk-container uk-container-xlarge uk-margin-small uk-margin-medium-bottom">
    <!--
        <div class="uk-child-width-auto uk-child-width-auto@m uk-grid-small" uk-grid>
             <div>
                        <div class="uk-card uk-card-default uk-card-body">Item</div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">Item</div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">Item</div>
                </div>
            <div>
                <div class="plus_item">
                    <div class="plus_img">
                --}}{{--        <img src="{{ asset('assets/img/left-arrow.svg') }}" alt="Go back">
                    </div>
                    <a href="

--}}{{----}}{{--{{ $category->hasParentCategory() ? route('site.catalog.main', $category->parent_id) : route('site.catalog.index') }}--}}{{----}}{{--

            ">
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
                        <a href="{{ route('site.catalog.main', $child->id) }}">
                            <p>{{ $child->ru_title }} <span>({{ $child->getAllCompaniesCount() }})</span></p>
                        </a>
                    </div>
                </div>
            @endforeach--}}{{--
            </div>
-->
 --}}{{--       <ul class="cat-tab uk-tab">
            <li class="uk-active">
                <a href="{{ $category->hasParentCategory() ? route('site.catalog.main', $category->parent->getAncestorsSlugs()) : route('site.catalog.index') }}">
                    <span uk-icon="arrow-left"></span>
                    <span>Назад</span>
                </a>
            </li>
            @foreach($category->categories as $child)
                <li>
                    <a href="{{ route('site.catalog.main', $child->getAncestorsSlugs()) }}">
                        <div class="uk-flex uk-flex-middle">
                        <!--                                <span><img src="{{ $child->getImage() }}" alt=""></span>-->
                            <span>{{ $child->ru_title }} </span>
                            <span class="countcat">({{ $child->getAllCompaniesCount() }})</span>
                        </div>
                    </a>
                </li>
        @endforeach--}}{{--
        <!--
            <li>
                <a href="#">More <span class="uk-margin-small-left" uk-icon="icon: triangle-down"></span></a>
                <div uk-dropdown="mode: click">
                    <ul class="uk-nav uk-dropdown-nav">
                        <li class="uk-active"><a href="#">Active</a></li>
                        <li><a href="#">Item</a></li>
                        <li class="uk-nav-header">Header</li>
                        <li><a href="#">Item</a></li>
                        <li><a href="#">Item</a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="#">Item</a></li>
                    </ul>
                </div>
            </li>
-->
    --}}{{--    </ul>--}}{{--
        <!-- <div class="uk-margin text-left">
            <div uk-grid class="uk-grid-magrin uk-grid-stack">
                <div class="uk-width-1-1@m">
                </div>
            </div>
        </div> -->
        <div class="sorting uk-grid-small uk-flex-middle" uk-grid>
            <p>Цена: </p>
            <form action="" method="get">
                <div class="uk-flex">
                    <select name="price" class="uk-select" id="price">
                        <option value="asc" @if (request()->get('price') == 'asc') selected @endif>Самые дешевые
                        </option>
                        <option value="desc" @if (request()->get('price') == 'desc') selected @endif>Самые дорогие
                        </option>
                    </select>
                    <input type="submit" value="Применить" class="uk-button uk-button-success-outline uk-margin-left">
                </div>
            </form>
        </div>
    </div>--}}

    <section class="uk-section-xsmall">
        <div class="uk-container uk-container-center uk-container-xlarge uk-margin-top">
            <div uk-grid class="uk-child-width-1-2@s uk-child-width-1-3@m uk-margin-large-top uk-grid-match uk-grid">
                @foreach($blogposts as $blogpost)
                    <div>
                        <div class="uk-card uk-card-small uk-card-border" itemscope
                             itemtype="http://schema.org/Product">
                            <div class="uk-card-media-top uk-position-relative uk-light">
                                <img itemprop="image" uk-img height="200" src="{{ $blogpost->getImage() }}"
                                     class="code-mage" alt="Course Title">
                                <div class="uk-position-cover uk-overlay-xlight"></div>
                            </div>
                            <div class="uk-card-body">
                                <h2 itemprop="name"
                                    class="uk-card-title uk-margin-small-bottom">{{ $blogpost->ru_title ?? ""}}</h2>
                                <div itemprop="name"
                                     class="uk-card-title uk-margin-small-bottom">{!! $blogpost->ru_short_content !!}</div>
                                <div itemprop="category"
                                     class="uk-text-muted uk-text-small">{!! $blogpost->category->ru_title ?? ""!!}</div>

                                <ul>
                                </ul>
                            </div>
                            <a href="{{ route('site.blog.main', $blogpost->getAncestorsSlugs()) }}"
                               class="uk-position-cover"></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    {{-- <section class="uk-section-xsmall uk-padding-remove-vertical">
         <div class="uk-container uk-container-xlarge uk-container-center">
             <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top" uk-grid>
                 <div class="wrapper_title">
                     <h1>{{ $category->getTitle() }}</h1>
                     {!! $category->ru_description !!}
                 </div>
                 <div class="uk-width-expand@m"></div>

             </div>
         </div>
     </section>
     <section class="uk-section-xsmall uk-padding-remove-vertical">
         <div class="uk-container uk-container-xlarge uk-container-center container uk-margin-top">
             <ul class="sequence" itemscope itemtype="http://schema.org/BreadcrumbList">
                 <li itemprop="itemListElement" itemscope
                     itemtype="http://schema.org/ListItem"><a itemprop="item"
                                                              href="{{ route('site.catalog.index') }}"><span
                                 itemprop="name"><meta itemprop="position" content="1"/>Главная</span></a></li>
                 <li><img src="{{ asset('assets/img/next.svg') }}" alt=""></li>
                 @foreach ($category->ancestors as $parentCategory)
                     <li itemprop="itemListElement" itemscope
                         itemtype="http://schema.org/ListItem"><a itemprop="item"
                                                                  href="{{ route('site.catalog.main', $parentCategory->getAncestorsSlugs()) }}"><span
                                     itemprop="name"><meta itemprop="position" content="2"/>{{ $parentCategory->getTitle() }}</span></a>
                     </li>
                     <li><img src="{{ asset('assets/img/next.svg') }}" alt=""></li>
                 @endforeach
                 <li itemprop="itemListElement" itemscope
                     itemtype="http://schema.org/ListItem"><span itemprop="name"><meta itemprop="position" content="3"/>{{ $category->getTitle() }}</span>
                 </li>
             </ul>
         </div>
     </section>--}}

@endsection
