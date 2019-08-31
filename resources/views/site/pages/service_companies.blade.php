@extends('site.layouts.app')

@section('title', $service->getTitle())

@section('search')
    @include('site.components.search')
@endsection

@section('heading')
    <div class="uk-container uk-container-large uk-container-center ">
        <div class="wrapper">
            <div class="wrapper_title">
                <h3>{{ $service->ru_title }}</h3>
            </div>
            <div class="sorting">
                <p>Сортировать по типу </p>
                <div id="dropdown-menu" class="dropdown-menu">
                    <span class="dropdown_title"><img src="{{ asset('assets/img/planet-earth-1.svg') }}" alt=""> Международные <img src="{{ asset('assets/img/Path 1204.svg') }}" alt=""></span>
                    <ul>
                        <li><a href="#"> Международные </a></li>
                        <li><a href="#">  Городские</a></li>
                    </ul>
                </div>
                <div class="buttons">
                    <a href="#" class="setting_button right"> <i class="fa fa-bars"></i></a>
                    <a href="#" class="setting_button left uk-icon-justify uk-icon-th-large"></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="uk-container uk-container-center uk-container-large uk-margin-top">
        <div class="uk-grid uk-grid-width-1-1 uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-4" data-uk-grid-margin>
            @foreach($service->companies as $company)
                <a href="@if($company->url && $company->url != '') {{ $company->url }} @else {{ route('site.catalog.company', $company->id) }} @endif" class="uk-container-center">
                    <div class="inner">
                        <div class="header_logo">
                            <div class="inner_logo">
                                <img src="{{ $company->getImage() }}" alt="{{ $company->getTitle() }}">
                            </div>
                        </div>
                        <div class="inner_tages">
                            <div class="title">
                                <h2>{{ $company->ru_title }}</h2>
                            </div>
                            <div class="tags">
                                <ol>
                                    <li>Работают до 24:00</li>
                                    <li>Терминал</li>
                                    <li>Есть доставка</li>
                                    <li>Click</li>
                                    <li>PayMe</li>
                                </ol>
                            </div>
                        </div>
                        <div class="description">
                            <p>{{ $company->ru_description }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
