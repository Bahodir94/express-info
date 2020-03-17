
<style>
    .sequence{
        display: flex;
        align-items: center;
        list-style: none;
        padding: 0;
        margin: 83px 0;
        flex-wrap: wrap;

    }
    .sequence li{
        margin-right: 17px;
        color: #102840;
        font-size: 18px;
        /* font-family: 'opensans'; */
        font-weight: 400;
        margin-top: 10px;
    }
    .sequence li a{
        color: #102840;
        text-decoration: none;
    }</style>
@extends('site.layouts.app')
@section('title')
    @if(empty($category->meta_title))
        {{ $category->getTitle() }}
    @else
        {{ $category->meta_title }}
    @endif
@endsection
@section('meta')
    <meta name="title" content="@if(empty($category->meta_title)) {{ $category->getTitle() }} @else {{ $category->meta_title }} @endif">
    <meta name="description" content="@if (empty($category->meta_description)) {{ strip_tags($category->ru_description) }} @else {{ $category->meta_description }} @endif">
    <meta name="keywords" content="{{ $category->meta_keywords }}">
@endsection
@section('header')
    @include('site.layouts.partials.headers.default')
@endsection
@section('content')

    <div class="uk-container uk-container-xlarge uk-margin-small uk-margin-medium-bottom">
        <ul class="cat-tab uk-tab" >
            <li>
                <a href="{{ route('site.blog.index') }}">
                    <span uk-icon="arrow-left"></span>
                    <span>Назад</span>
                </a>
            </li>
            @foreach($categories as $child)
                <li  @if ($child->ru_title == $category->ru_title) class="uk-active" @endif>
                    <a href="{{ route('site.blog.main', $child->ru_slug) }}">
                        <div class="uk-flex uk-flex-middle">
                            <span>{{ $child->ru_title }} </span>
                            <span class="countcat">({{ $child->posts()->count() }})</span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <section class="uk-section-xsmall">
        <div class="uk-container uk-container-center uk-container-xlarge uk-margin-top">
            <div uk-grid class="uk-child-width-1-2@s uk-child-width-1-3@m uk-margin-large-top uk-grid-match uk-grid">
                @foreach($category->posts as $post)
                    <div>
                        <div class="uk-card uk-card-small uk-card-border" itemscope itemtype="http://schema.org/Product">
                            <div class="uk-card-media-top uk-position-relative uk-light">
                                <img itemprop="image" uk-img height="200" src="{{ $post->getImage() }}" class="code-mage" alt="Course Title">
                                <div class="uk-position-cover uk-overlay-xlight"></div>
                            </div>
                            <div class="uk-card-body">
                                <h2 itemprop="name" class="uk-card-title uk-margin-small-bottom">{{ $post->ru_title }}</h2>
                                <div itemprop="category" class="uk-text-muted uk-text-small">{!! $post->ru_short_content !!}</div>
                            </div>
                            <a href="{{ route('site.blog.main', $post->getAncestorsSlugs()) }}" class="uk-position-cover"></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="uk-section-xsmall uk-padding-remove-vertical">
        <div class="uk-container uk-container-xlarge uk-container-center container uk-margin-top">
            <ul class="sequence" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem"><a href="{{ route('site.catalog.index') }}"
                                                             itemprop="item"><span itemprop="name"><meta
                                itemprop="position" content="1"/>Главная</span></a></li>
                <li><img src="{{ asset('assets/img/next.svg') }}" alt=""></li>
                <li itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem"><a href="{{ route('site.blog.index') }}"
                                                             itemprop="item"><span itemprop="name"><meta
                                itemprop="position" content="2"/>Блог</span></a></li>
                <li><img src="{{ asset('assets/img/next.svg') }}" alt=""></li>
                <li itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem"><span itemprop="name"><meta itemprop="position"
                                                                                      content="4"/>{{ $category->getTitle() }}</span>
                </li>
            </ul>
        </div>
    </section>

@endsection
