@extends('site.layouts.app')

@section('title')
Востановление пароля
@endsection

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('content')
<div class="uk-text-center" uk-grid>
    <div class="uk-width-1-1">

        <div class="uk-card uk-card-default uk-card-body">
            <form class="uk-form-horizontal uk-margin-large" method="POST" action="{{ route('password.email') }}">
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





                <button type="submit" class="uk-button uk-button-primary">
                    Отправить ссылку на востановление пароля
                </button>

              </form>
          </div>
        </div>
      </div>
@endsection
