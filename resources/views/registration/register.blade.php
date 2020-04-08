@extends('site.layouts.app')


@section('title')
    Регистрация
@endsection

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('content')
    <div class="primary-page">
        <div class="container">
            <div class="sign-up">
                <div class="sign-up-header">
                    <h2>Давайте создадим ваш аккаунт!</h2>
                    <p>Уже есть аккаунт? <a href="{{ route('login') }}">Вход</a></p>
                </div>
                <div class="form-sign-up">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="user_role" value="contractor">
                        <div class="input-group-icons">
                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                   placeholder="Email адресс"
                                   name="email" value="{{ old('email') }}" required
                                   autocomplete="email"><span class="prepend-icon"><i
                                    class="fas fa-at"></i></span>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                        <div class="input-group-icons">
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                   placeholder="Пароль"
                                   name="password" required autocomplete="new-password"><span
                                class="prepend-icon"><i class="fas fa-key"></i></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                        <div class="input-group-icons">
                            <input class="form-control" type="password" placeholder="Повторите Пароль"
                                   name="password_confirmation" required
                                   autocomplete="new-password"><span class="prepend-icon"><i
                                    class="fas fa-lock"></i></span>
                        </div>
                        <button class="btn btn-light-green w-100" type="submit">Зарегистрировать
                        </button>
                    </form>

                </div>
                <div class="sign-up-other">
                    <div class="text-or">Или</div>
                    <div class="sign-in-social row row-md">
                        <div class="col-md-6"><script async src="https://telegram.org/js/telegram-widget.js?7" data-telegram-login="vid_registration_bot" data-size="medium" data-auth-url="/account/create" data-request-access="write"></script></div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
