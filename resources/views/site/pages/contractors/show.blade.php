@extends('site.layouts.app')

@section('title', $contractor->getCommonTitle())

@section('meta')
    <meta name="title"
          content="{{ $contractor->getCommonTitle() }}">
    <meta name="description"
          content="{{ strip_tags($contractor->about_myself) }}">
@endsection

@section('css')
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endsection

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('content')
    <div class="primary-page">
        <div class="container">
            <div class="item-detail-special">
                <div class="img"><img src="{{ $contractor->getImage() }}" class="avatar" alt="{{ $contractor->getContractorTitle() }}"></div>
                <div class="text">
                    <div class="row align-items-lg-center">
                        <div class="col-lg-7 col-xl-8">
                            <h2 class="title-detail">{{ $contractor->getContractorTitle() }}</h2>
                            <div class="date-job"><i class="fa fa-check-circle"></i>Magento Certified Developer
                            </div>
                            <div class="meta-job"><span class="phone"><i class="fa fa-mobile-alt"></i>{{ $contractor->phone_number }} </span><span
                                    class="mail"><i class="far fa-envelope"></i><a
                                        href="#" class="__cf_email__"
                                        data-cfemail="25565144574750464e56654c4b434a0b464a48">[email&nbsp;protected]</a></span>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="btn-feature"><a class="btn btn-light-green" href="#"><i
                                        class="fas fa-download"></i> Добавить в конкурс</a>
                                <a class="btn btn-light btn-add-favourites"><i class="far fa-star"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="content-main-right single-detail">
                        <div class="box-description">
                            <h3>Об исполнителе</h3>
                            {!! $contractor->about_myself !!}

                        </div>
                        <hr>
                        <div class="intro-profile">
                            <h3 class="title-box">Предоставляемые услуги</h3>
                            <div class="candidate-box">
                                <div class="tags">
                                    @foreach($contractor->categories as $category)
                                        <a href="{{ route('site.catalog.main', $category->getAncestorsSlugs()) }}">{{ $category->getTitle() }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-right">
                        <div class="sidebar-right-group">
                            <div class="job-detail-summary">
                                <h3 class="title-block">Цены на услуги</h3>
                                <ul>
                                    @foreach($contractor->categories as $category)
                                        <li><span>{{ $category->getTitle() }}</span>: {{ $category->pivot->price_from }} - {{ $category->pivot->price_to }} сум</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="side-right-social">
                                <h3 class="title-block">Поделиться исполнителем</h3>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-1">
              <div class="col-lg-8">
                <div class="content-main-right single-detail">
                  <div class="intro-profile">
                    <h3 class="title-box">Портфолио</h3>
                  <div class="candidate-box">
                    <div class="table-responsive m-1 p-1">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <td>Название проекта</td>
                              <td>Изображение</td>
                              <td>Ссылка</td>
                          </thead>

                          <tbody>
                          @foreach($portfolio as $row)
                          @if($row)
                            <tr>
                              <td>{{ $row->project_name}}</td>
                              <td>
                                <a data-fancybox="gallery" href="{{ asset('images/portfolio/portfolio_contractor/'.$row->filename) }}">
                                    <img class="img-fluid" src="{{ asset('images/portfolio/portfolio_contractor/'.$row->filename) }}" style="height:120px; width:200px"/>
                                </a>
                              </td>
                              @if($row->link)
                                <td>
                                  <a href="{{ $row->link }}">Перейти на проект</a>
                                </td>
                              @else
                                <td>Ссылка не указана исполнителем</td>
                              @endif
                            </tr>
                          @endif
                          @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-lg-4"></div>
        </div>
    </div>
@endsection
