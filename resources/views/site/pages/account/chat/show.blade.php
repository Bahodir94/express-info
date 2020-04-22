@extends('site.layouts.account')

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('title', 'Чат')

@section('account.title', 'Чат')

@section('account.content')
    @php
        $anotherUser = $chat->getAnotherUser()
    @endphp
    <div class="bod-admin">
        <div class="header-box-admin">
            <h3>Диалог с {{ $anotherUser->getCommonTitle() }}</h3>
        </div>
        <div class="body-box-admin">

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
