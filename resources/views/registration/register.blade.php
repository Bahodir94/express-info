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

                    <ul class="nav nav-tabs btn-group-toggle" data-toggle="buttons" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#contractor"
                               role="tab" aria-controls="contractor" aria-selected="true">Исполнитель</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#customer" role="tab"
                               aria-controls="customer" aria-selected="false">Заказчик</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="contractor" role="tabpanel"
                             aria-labelledby="home-tab">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <input type="hidden" name="user_role" value="contractor">
                                <div class="input-group-icons">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email адресс"
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
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Пароль"
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
                        <div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-pane fade show active" id="contractor" role="tabpanel"
                                 aria-labelledby="home-tab">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <input type="hidden" name="user_role" value="customer">
                                    <div class="input-group-icons">
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email адресс"
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
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Пароль"
                                               name="password" required autocomplete="new-password"><span
                                            class="prepend-icon"><i class="fas fa-key"></i></span>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                                        @enderror
                                    </div>
                                    <div class="input-group-icons">
                                        <input class="form-control" type="password"
                                               placeholder="Повторите Пароль" name="password_confirmation"
                                               required autocomplete="new-password"><span
                                            class="prepend-icon"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <button class="btn btn-light-green w-100" type="submit">Зарегистрировать
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
