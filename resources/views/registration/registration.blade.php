@extends('site.layouts.app')

@section('title')
Регистрация
@endsection

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('content')
<div class="uk-text-center" uk-grid>
    <div class="uk-width-1-1">
      <ul class="uk-subnav uk-subnav-pill" uk-switcher>
          <li class="uk-width-1-1"><a href="#">Я заказчик</a></li>
          <li class="uk-width-1-1"><a href="#">Я специалист</a></li>

      </ul>
      <ul class="uk-switcher uk-margin">
        <li>
        <div class="uk-card uk-card-default uk-card-body">
            <form class="uk-form-horizontal uk-margin-large" method="POST" action="{{ route('register') }}">
              @csrf
                <div class="uk-margin">
                  <label class="uk-form-label uk-text-bolder" for="form-horizontal-text">Имя</label>
                  <div class="uk-form-controls">
                      <input class="uk-input" id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="uk-margin ">
                  <label class="uk-form-label uk-text-bolder" for="form-horizontal-text">Email</label>
                  <div class="uk-form-controls">
                      <input class="uk-input" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>


                <div class="uk-margin">
                   <label class="uk-form-label" for="form-horizontal-select">Выбор</label>
                   <div class="uk-form-controls">
                       <select class="uk-select" id="customer_type" name="customer_type">
                           <option value="company">Я из компании</option>
                           <option value="private">Я частное лицо</option>
                       </select>
                   </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label uk-text-bolder" for="form-horizontal-text">Пароль</label>
                  <div class="uk-form-controls">
                      <input class="uk-input" id="form-horizontal-text" type="password" name="password" required autocomplete="new-password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label uk-text-bolder" for="form-horizontal-text">Повторите пароль</label>
                  <div class="uk-form-controls">
                      <input class="uk-input" id="form-horizontal-text" type="password" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>

                <button type="submit" class="uk-button uk-button-primary">
                    Регистрация
                </button>
                <a href="{{ route('login') }}" class="uk-button uk-button-primary">
                    Назад
                </a>
              </form>
          </div>
        </li>
        <li>
          <div class="uk-card uk-card-default uk-card-body">
              <form class="uk-form-horizontal uk-margin-large" method="POST" action="{{ route('register') }}">
                @csrf
                  <input type="hidden" value="" name="customer_type">
                  <div class="uk-margin">
                    <label class="uk-form-label uk-text-bolder" for="form-horizontal-text">Имя</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="uk-margin ">
                    <label class="uk-form-label uk-text-bolder" for="form-horizontal-text">Email</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>


                  <div class="uk-margin">
                    <label class="uk-form-label uk-text-bolder" for="form-horizontal-text">Пароль</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-horizontal-text" type="password" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="uk-margin">
                    <label class="uk-form-label uk-text-bolder" for="form-horizontal-text">Повторите пароль</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-horizontal-text" type="password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>





                  <button type="submit" class="uk-button uk-button-primary">
                      Регистрация
                  </button>
                  <a href="{{ route('login') }}" class="uk-button uk-button-primary">
                      Назад
                  </a>
                </form>
            </div>
        </li>
    </div>
</div>
@endsection
