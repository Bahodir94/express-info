@extends('site.layouts.app')

@section('title', $company->getTitle())

@section('content')
    <!-- Banner -->
    <div class="banner" style="background-image: url({{ asset('assets/img/a3e020abb83a5d95bbdce5ef77dff132.png') }})">
        <div class="uk-section-small	">
            <div class="uk-container uk-container-expand main-container uk-container-center">
                <div class="contact_info">
                    <div class="contact_logo">
                        <img src="{{ $company->getImage() }}" alt="">
                    </div>
                    <div class="contact_title">
                        <h3>{{ $company->ru_title }}</h3>
                        <p>{{ $company->category->ru_title }}</p>
                    </div>
                    <div class="uk-grid-collapse uk-grid contact_phone" uk-grid>
                    <div class="uk-first-column">
                        <a class="phone" href="tel:{{ $company->phone_number }}" target="_blank">
                            <img src="{{ asset('assets/img/Path 1211.svg') }}" alt=""> 
                            <span>
                                {{ $company->phone_number }}
                            </span>
                        </a>
                    </div>
                    <div>
                        @if ($company->url && $company->url != '')
                            <a class="site" href="{{ $company->url }}" target="_blank">
                                
                                <img src="{{ asset('assets/img/Group 77.svg') }}" alt=""> 
                                <span>
                                    {{ parse_url($company->url, PHP_URL_HOST) }}
                                </span>
                                
                            </a>
                        @endif
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Banner end-->

    <div class="payment">
        <div class="uk-container uk-container-expand uk-container-center">
            <div class="payment_wrapper">
                <div class="payment_list">
                    <ul>
                        <li><a href="">Click</a></li>
                        <li><a href="">Payme</a></li>
                        <li><a href="">UzCard</a></li>
                        <li><a href="">Humo</a></li>
                        <li><a href="">Работают круглосуточно</a></li>
                    </ul>
                </div>
                <div class="soc">
                    <ul>
                        <span>Соц сети</span>
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                        <li><a href=""><i class="fa fa-paper-plane"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <hr class="new">

    <!-- Main Info -->
    <div class="uk-container uk-container-expand uk-container-center container margin-top">
        <div class="main-info" uk-grid>
            <div class="uk-width-3-5@l uk-width-3-5@m uk-width-3-5@s">
                <div class="text_info">
                    <h2>Информация</h2>
                    <p>{{ $company->ru_description }}</p>
                </div>
            </div>
            <div class="uk-width-1-3@l uk-width-2-5@m uk-width-2-5@s padding-left">
                <div class="adress">
                    <img src="{{ asset('assets/img/pin.svg') }}" alt="">
                    <h4>{{ $company->address }}</h4>
                </div>
                <div class="img">
                        <iframe src="https://yandex.uz/map-widget/v1/-/CCh~UnA"  frameborder="1" allowfullscreen="true"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Info -->

    <div class="uk-container uk-container-expand uk-container-center container uk-margin-top">
        <ul class="sequence">
            <li><a href="{{ route('site.catalog.index') }}">Главная</a></li>
            <li><img src="{{ asset('assets/img/next.svg') }}" alt=""></li>
            @foreach ($company->category->ancestors as $parentCategory)
                <li><a href="{{ route('site.catalog.category', $parentCategory->id) }}">{{ $parentCategory->getTitle() }}</a></li>
                <li><img src="{{ asset('assets/img/next.svg') }}" alt=""></li>
            @endforeach
            <li><a href="{{ route('site.catalog.category', $company->category->id) }}">{{ $company->category->getTitle() }}</a></li>
            <li><img src="{{ asset('assets/img/next.svg') }}" alt=""></li>
            <li>{{ $company->getTitle() }}</li>
        </ul>
    </div>
@endsection
