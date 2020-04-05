@extends('site.layouts.app')

@section('title')
Авторизация
@endsection

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('content')
<div class="uk-text-center" uk-grid>
    <div class="uk-width-1-1">

        <div class="uk-card uk-card-default uk-card-body">
            <form class="uk-form-horizontal uk-margin-large" method="POST" action="{{ route('login') }}">
              @csrf


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
                      <input class="uk-input" id="password" type="password" name="password" required autocomplete="current-password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="uk-margin">
                  <label class="uk-form-label uk-text-bolder" for="form-horizontal-text">Запомнить</label>
                  <div class="uk-form-controls">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                  </div>
                </div>




                <button type="submit" class="uk-button uk-button-primary">
                    Войти
                </button>
                <a href="{{ route('register') }}" class="uk-button uk-button-primary">
                    Регистрация
                </a>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="uk-button uk-button-primary">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
              </form>
          </div>
        </div>
      </div>

@endsection
