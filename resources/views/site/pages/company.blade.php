@extends('site.layouts.app')

@section('title', $company->getTitle())

@section('content')
    <!-- Banner -->
    <div class="banner">
        <div class="uk-container uk-container-large uk-container-center container">
            <div class="contact_info">
                <div class="contact_logo">
                    <img src="{{ $company->getImage()}}" alt="">
                </div>
                <div class="contact_title">
                    <h3>{{ $company->title_ru }}</h3>
                </div>
                <div class="contact_phone">
                    <div class="phone"><img src="{{ asset('assets/img/Path 1211.svg') }}" alt=""> <p>{{ $company->phone_number }}</p></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner end-->
    <div class="payment">
        <div class="uk-continer uk-container-large uk-container-center container">
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
    <div class="uk-container uk-container-large uk-container-center container margin-top">
        <div class="main-info">
            <div class="uk-width-large-5-10 uk-width-medium-1-1 uk-width-small-1-1"  >
                <div class="text_info">
                    <h2>Информация</h2>
                    <p>{{ $company->ru_description }}</p>
                </div>
            </div>
            <div class="uk-width-large-4-10 uk-width-small-1-1">
                <div class="adress">
                    <img src="{{ asset('assets/img/pin.svg') }}" alt="">
                    <h4>{{ $company->address }}</h4>
                </div>
                <div class="img">
                    <img src="{{ asset('assets/img/ddb6b5dcf3863670aed4f40f6d49529c.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Main Info -->
@endsection
