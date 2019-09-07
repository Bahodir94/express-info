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
                <div class="payment_list">
            <div class="uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-grid uk-grid-stack " uk-grid="">
                <div>
                    <div class="payment_list">
                        <ul>
                            <li><a href="">Click</a></li>
                            <li><a href="">Payme</a></li>
                            <li><a href="">UzCard</a></li>
                            <li><a href="">Humo</a></li>
                            <li><a href="">Работают круглосуточно</a></li>
                        </ul>
                    </div>
                </div>
                <div class="uk-width-expand@m"></div>
                <div >
                    <div class="uk-child-width-auto uk-grid-small uk-flex-right@m uk-flex-center uk-grid uk-flex-middle" uk-grid="">
                        <div>
                            <span>Соц сети</span>
                        </div>
                        <div>
                            <a class="el-link uk-icon-button uk-icon" href="http://www.facebook.com/yootheme" uk-icon="icon: facebook;">
                                <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="facebook"><path d="M11,10h2.6l0.4-3H11V5.3c0-0.9,0.2-1.5,1.5-1.5H14V1.1c-0.3,0-1-0.1-2.1-0.1C9.6,1,8,2.4,8,5v2H5.5v3H8v8h3V10z"></path></svg>
                            </a>        
                        </div>
                        <div>
                            <a class="el-link uk-icon-button uk-icon" href="http://www.instagram.com" uk-icon="icon: instagram;">
                                <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="instagram"><path d="M13.55,1H6.46C3.45,1,1,3.44,1,6.44v7.12c0,3,2.45,5.44,5.46,5.44h7.08c3.02,0,5.46-2.44,5.46-5.44V6.44 C19.01,3.44,16.56,1,13.55,1z M17.5,14c0,1.93-1.57,3.5-3.5,3.5H6c-1.93,0-3.5-1.57-3.5-3.5V6c0-1.93,1.57-3.5,3.5-3.5h8 c1.93,0,3.5,1.57,3.5,3.5V14z"></path><circle cx="14.87" cy="5.26" r="1.09"></circle><path d="M10.03,5.45c-2.55,0-4.63,2.06-4.63,4.6c0,2.55,2.07,4.61,4.63,4.61c2.56,0,4.63-2.061,4.63-4.61 C14.65,7.51,12.58,5.45,10.03,5.45L10.03,5.45L10.03,5.45z M10.08,13c-1.66,0-3-1.34-3-2.99c0-1.65,1.34-2.99,3-2.99s3,1.34,3,2.99 C13.08,11.66,11.74,13,10.08,13L10.08,13L10.08,13z"></path></svg>
                            </a>        
                        </div>
                        <div>
                            <a class="el-link uk-icon-button uk-icon" href="http://www.twitter.com/yootheme" uk-icon="icon: twitter;">
                                <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="twitter"><path d="M19,4.74 C18.339,5.029 17.626,5.229 16.881,5.32 C17.644,4.86 18.227,4.139 18.503,3.28 C17.79,3.7 17.001,4.009 16.159,4.17 C15.485,3.45 14.526,3 13.464,3 C11.423,3 9.771,4.66 9.771,6.7 C9.771,6.99 9.804,7.269 9.868,7.539 C6.795,7.38 4.076,5.919 2.254,3.679 C1.936,4.219 1.754,4.86 1.754,5.539 C1.754,6.82 2.405,7.95 3.397,8.61 C2.79,8.589 2.22,8.429 1.723,8.149 L1.723,8.189 C1.723,9.978 2.997,11.478 4.686,11.82 C4.376,11.899 4.049,11.939 3.713,11.939 C3.475,11.939 3.245,11.919 3.018,11.88 C3.49,13.349 4.852,14.419 6.469,14.449 C5.205,15.429 3.612,16.019 1.882,16.019 C1.583,16.019 1.29,16.009 1,15.969 C2.635,17.019 4.576,17.629 6.662,17.629 C13.454,17.629 17.17,12 17.17,7.129 C17.17,6.969 17.166,6.809 17.157,6.649 C17.879,6.129 18.504,5.478 19,4.74"></path></svg>
                            </a>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="new">

    <!-- Main Info -->
    <div class="uk-container uk-container-expand uk-container-center margin-top text_info">
        <h2>Информация</h2>
        <div class="" uk-grid>
            
            <div class="uk-width-expand@m">
                <div class="">
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.


                        {{ $company->ru_description }}</p>
                </div>
            </div>
            <div class="uk-width-1-3">
                <div>
<!--                @l uk-width-2-5@m uk-width-2-5@s -->
                    <div class="img">
                        <iframe src="https://yandex.uz/map-widget/v1/-/CCh~UnA"  frameborder="1" allowfullscreen="true"></iframe>
                    </div>
                    <div class="adress">
                        <img src="{{ asset('assets/img/pin.svg') }}" alt="">
                        <h4>{{ $company->address }}</h4>
                    </div>
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
