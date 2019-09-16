@extends('site.layouts.app')

@section('title', 'Каталог')

@section('header')
    @include('site.layouts.partials.headers.main')
@endsection

@section('content')





    <!-- Favorites Category -->
<section class="uk-section-xsmall ">
    <div class="uk-container uk-container-expand uk-margin-medium uk-container-center uk-slider">
        <div class="uk-container uk-container-expand uk-container-center gutter" uk-slider="autoplay: true; autoplay-interval: 5000;">
            <ul class="uk-slider-items uk-child-width-auto uk-grid-large uk-grid">

                @foreach ($favoritesCategories as $category)
                    <li class="slide">
                        <div class="card">
                            <a href="{{ route('site.catalog.main', $category->getAncestorsSlugs()) }}">
                                
                            <div class="card_img">
                                <img src="{{ $category->getImage() }}" alt="">
                            </div>
                            <h2>
                                <a href="{{ route('site.catalog.main', $category->getAncestorsSlugs()) }}">
                                    {{ $category->getTitle() }}
                                </a>
                            </h2>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>





    <!-- Favorites Category end-->






<section class="uk-section-xsmall">
    <div class="uk-container uk-container-expand uk-margin-medium uk-container-center">
        <ul class="uk-grid uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-3@l uk-child-width-1-4@xl" data-uk-grid-margin>
            @foreach($parentCategories as $category)
                <li class="uk-container-center uk-margin-medium-bottom">
                    <div class="item uk-flex-middle">
                        <div class="item_icon">
                            <div class="item_circle">
                                <img src="{{ $category->getImage() }}" alt="">
                            </div>
                        </div>
                        <div class="item_text">
                            <h2><a href="{{ route('site.catalog.main', $category->ru_slug) }}">{!! $category->ru_title !!}</a></h2>
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
</section>
@endsection

<!-- Slider Favorite Companies -->


<!--

<div class="uk-section uk-flex uk-flex-middle" uk-height-viewport="offset-top: true; offset-bottom: 20;" style="min-height: calc((100vh - 80px) - 20vh);">

    <div class="uk-width-1-1">

        <div class="uk-container uk-container-expand">
            <div class="uk-grid-margin uk-grid" uk-grid="">
                <div class="uk-width-2-3@m uk-first-column">

                    <div uk-slideshow="minHeight: 537;" data-id="page#4" class="uk-margin uk-slideshow">
                        <div class="uk-position-relative">

                            <ul class="uk-slideshow-items" >
                                <li class="el-item uk-active uk-transition-active" tabindex="-1" style="transform: translateX(0px);">

                                    <img src="/assets/img/slide1.webp" sizes="(max-aspect-ratio: 2560/1197) 214vh" data-width="2560" data-height="1197" class="el-image uk-cover" alt="" uk-cover="" style="width: 944px; height: 442px;">

                                </li>
                                <li class="el-item" tabindex="-1">

                                    <img src="/assets/img/slide2.webp" sizes="(max-aspect-ratio: 2560/1197) 214vh" data-width="2560" data-height="1197" class="el-image uk-cover" alt="" uk-cover="">

                                </li>
                            </ul>

                            <div class="uk-visible@s">
                                <a class="el-slidenav uk-position-medium uk-position-center-left uk-icon uk-slidenav-previous uk-slidenav" href="#" uk-slidenav-previous="" uk-slideshow-item="previous">
                                    <svg width="17" height="30" viewBox="0 0 17 30" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-previous">
                                        <polyline fill="none" stroke="#000" stroke-width="2" points="15,2 2,15 15,28"></polyline>
                                    </svg>
                                </a>
                                <a class="el-slidenav uk-position-medium uk-position-center-right uk-icon uk-slidenav-next uk-slidenav" href="#" uk-slidenav-next="" uk-slideshow-item="next">
                                    <svg width="17" height="30" viewBox="0 0 17 30" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-next">
                                        <polyline fill="none" stroke="#000" stroke-width="2" points="2,28 15,15 2,2"></polyline>
                                    </svg>
                                </a>
                            </div>

                            <div class="uk-position-bottom-center uk-position-medium uk-visible@s">
                                <ul class="el-nav uk-dotnav uk-flex-center" uk-margin="">
                                    <li uk-slideshow-item="0" class="uk-active uk-first-column">
                                        <a href="#"></a>
                                    </li>
                                    <li uk-slideshow-item="1">
                                        <a href="#"></a>
                                    </li>
                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="uk-width-expand@m">
                    <div uk-grid="" class="uk-grid uk-grid-match uk-grid-small uk-child-width-1-2 uk-child-width-1-2@s ">
                        <div class="uk-container-center">
                            <div class="inner">
                                <div class="header_logo">
                                    <div class="inner_logo">
                                        <img src="/uploads/companies/wD0NGisfHW.png" alt="">
                                    </div>
                                </div>
                                <div class="inner_tages">
                                    <div class="title">
                                        <h2 class="uk-margin-remove-bottom	">
                                            <a href="http://tezinfo.uz/sport/fitness-rooms/inova-fitness">Inova Fitness</a>
                                        </h2>
                                        <span class="link">
                                            <a href="http://inovafit.uz/" target="_blank">
                                                inovafit.uz
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="description">
                                    <p>Фитнес залы</p>
                                </div>
                            </div>
                        </div>
                        <div class="uk-container-center">
                            <div class="inner">
                                <div class="header_logo">
                                    <div class="inner_logo">
                                        <img src="/uploads/companies/Nr0M4LaK0W.jpeg" alt="">
                                    </div>
                                </div>
                            <div class="inner_tages">
                                <div class="title">
                                    <h2 class="uk-margin-remove-bottom	">
                                        <a href="http://tezinfo.uz/sport/fitness-rooms/magic-galaxy">Magic Galaxy</a>
                                    </h2>
                                    <span class="link">
                                        <a href="https://magicgalaxy.uz/" target="_blank">
                                            magicgalaxy.uz
                                        </a>
                                    </span>
                                </div>
                                </div>
                            <div class="description">
                                <p>Фитнес залы</p>
                            </div>
                            </div>
                        </div>
                        <div class="uk-container-center">
                            <div class="inner">
                                <div class="header_logo">
                                    <div class="inner_logo">
                                        <img src="/uploads/companies/GCCKsG0Mqg.png" alt="">
                                    </div>
                                </div>
                                <div class="inner_tages">
                                    <div class="title">
                                        <h2 class="uk-margin-remove-bottom	"><a href="http://tezinfo.uz/sport/fitness-rooms/chekhovsport">Chekhovsport</a></h2>

                                                                        <span class="link">
                                            <a href="http://chekhovsport.uz/" target="_blank">
                                                chekhovsport.uz
                                            </a>
                                        </span>
                                                                    </div>



                                        <div class="tags">    
                                            <ol>

                                                    <li>Коньтетн</li><li>Коньтетн</li><li>Коньтетн</li><li>Коньтетн</li>

                                            </ol>
                                        </div>

                                                            </div>
                                <div class="description">
                                    <p>Фитнес залы</p>
                                </div>
                            </div>
                        </div>
                        <div class="uk-container-center">
                            <div class="inner">
                                <div class="header_logo">
                                    <div class="inner_logo">
                                        <img src="/uploads/companies/i0eRrZud8J.png" alt="">
                                    </div>
                                </div>
                                <div class="inner_tages">
                                    <div class="title">
                                        <h2 class="uk-margin-remove-bottom	">
                                            <a href="http://tezinfo.uz/sport/fitness-rooms/nika-sport">Nika Sport</a>
                                        </h2>
                                        <span class="link">
                                            <a href="http://www.nikasport.uz/" target="_blank">
                                                www.nikasport.uz
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="description">
                                    <p>Фитнес залы</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

-->


<!-- Slider Favorite Companies End -->
