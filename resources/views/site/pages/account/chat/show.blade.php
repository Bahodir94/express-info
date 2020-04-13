@extends('site.layouts.account')

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('title', 'Чат')

@section('account.title', 'Чат')

@section('account.content')
    <div class="bod-admin">
        <div class="header-box-admin">
            <h3>Диалог с </h3>
        </div>
        <div class="body-box-admin">
            <div id="app">

            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
