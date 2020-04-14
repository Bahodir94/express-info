@extends('site.layouts.account')

@section('title', 'Портфолио')

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('css')
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></
@endsection

@section('account.title.h1', 'Портфолио')

@section('account.content')

<section class="box-admin edit-profile">
  <div class="card-body">


   @if (count($errors) > 0)
       <div class="alert alert-danger">
          
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
   </div>
  <div class="header-box-admin">
      <h3>Добавить изображения</h3>
  </div>
  <div class="body-box-admin p-0">
    <form action="{{ route('site.account.portfolio.save') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-row align-items-center ml-3">
        <div class="col-sm-4 my-1">
            <input type="file" class="form-control-file" name="filename[]" id="file" multiple="">
        </div>
        <div class="col-8 my-1" style="text-align:left">
            <button type="submit" class="btn btn-success">Добавить</button>
        </div>
      </div>
    </form>
    <div class="intro-profile pt-5">
      <div class="header-box-admin">
          <h3>Вы уже загрузили</h3>
      </div>
      <div class="candidate-box">
        <div class="item-list">
          @foreach($data as $image)
            <div class="col-lg-3 col-md-4 col-6 thumb border-right border-bottom">
              <?php foreach (json_decode($image->filename)as $picture) { ?>
                <a data-fancybox="gallery" href="{{ asset('images/portfolio/portfolio_contractor/'.$picture) }}">
                    <img class="img-fluid" src="{{ asset('images/portfolio/portfolio_contractor/'.$picture) }}" style="height:120px; width:200px"/>
                </a>
                <hr>
                <?php } ?>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>


</section>
@endsection
