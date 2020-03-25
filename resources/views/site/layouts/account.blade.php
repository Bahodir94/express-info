@extends('site.layouts.app')

@section('content')
        <div class="uk-container uk-container-xlarge uk-container-center">
            <div class="uk-grid">
                <div class="uk-width-3-4">
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top" uk-grid>
                        <div class="wrapper_title">
                            <h1>@yield('account.title')</h1>
                        </div>
                    </div>
                        @yield('content.account')
                </div>
                <div class="uk-width-1-4">
                        @if ($user->hasRole('contractor'))
                            <ul class="uk-nav uk-nav-default uk-margin-medium-left uk-margin-xlarge-top account-nav-list">
                                <li @if($accountPage == 'personal')class="uk-active"@endif><a href="{{ route('site.account.index') }}"><span uk-icon="user" class="uk-margin-small-right"></span> Личные данные</a></li>
                                <li class="uk-nav-divider"></li>
                                <li @if($accountPage == 'professional')class="uk-active"@endif><a href="{{ route('site.account.contractor.professional') }}"><span uk-icon="bookmark" class="uk-margin-small-right"></span>Проф. данные</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href=""><span uk-icon="star" class="uk-margin-small-right"></span>Погртфолио</a></li>
                            </ul>
                        @elseif($user->hasRole('customer') && $user->customer_type=='company')
                            <ul class="uk-nav uk-nav-default uk-margin-medium-left uk-margin-xlarge-top account-nav-list">
                                <li @if($accountPage == 'company')class="uk-active"@endif><a href="{{ route('site.account.index') }}"><span uk-icon="nut" class="uk-margin-small-right"></span> Профиль компании</a></li>
                                <li class="uk-nav-divider"></li>
                                <li @if($accountPage == 'personal')class="uk-active"@endif><a href=""><span uk-icon="user" class="uk-margin-small-right"></span> Мой профиль</a></li>
                            </ul>
                        @endif
                </div>
            </div>
        </div>
@endsection
