@extends('site.layouts.account')

@section('title', 'Портфолио')

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('account.title.h1', 'Портфолио')

@section('account.content')

<section class="box-admin">
  <div class="item-detail-special">
    <div class="text">
      <form action="/save" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row align-items-center ml-3">
          <div class="col-auto my-1">
            <strong>Выберите изображение</strong>
          </div>
          <div class="col-sm-6 my-1">
              <input type="file" class="form-control-file" name="filename[]" id="file" multiple="">
          </div>
          <div class="col-auto my-1">
            <div class="form-check">
              <button type="submit" class="btn btn-success">Добавить</button>
            </div>
          </div>

        </div>
      </form>
    </div>
  </div>
</section>
