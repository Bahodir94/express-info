@extends('site.layouts.app')


@section('title')
Войти
@endsection

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('content')
<div class="wrapper" id="wrapper">


  <main class="main-content">
    <div class="primary-page">
    <div class="container">
      <div class="sign-up">
      <div class="sign-up-header">
        <h2>Мы рады видеть вас снова!</h2>
        <p>Нет аккаунта? <a href="{{ route('register') }}">Регистрация!</a></p>
      </div>
      <div class="form-sign-up">
        <form method="POST" action="{{ route('login') }}">
          @csrf
        <div class="input-group-icons">
          <input class="form-control" type="email" placeholder="Email адресс" name="email" value="{{ old('email') }}" required autocomplete="email"><span class="prepend-icon"><i class="fas fa-at"></i></span>
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="input-group-icons">
          <input class="form-control" type="password" placeholder="Пароль" name="password" required autocomplete="current-password"><span class="prepend-icon"><i class="fas fa-key"></i></span>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="text-password">
          <div class="text-remeber">
          <input type="checkbox" id="txt-remeber">
          <label for="txt-remeber">Запомнить меня</label>
          </div><a href="{{ route('password.request') }}">Забыли пароль?</a>
        </div>
        <button class="btn btn-light-green w-100" type="submit">Вход</button>
      </form>
      </div>

      </div>
    </div>
    </div>
   </main>

</div>
@endsection
