@extends('site.layouts.app')

@section('title')
    @if(empty($company->meta_title))
        {{ $company->getTitle() }} в Ташкенте
    @else
        {{ $company->meta_title }}
    @endif
@endsection

@section('meta')

    <meta name="title" content="@if(empty($company->meta_title)) {{ $company->getTitle() }} в Ташкенте @else {{ $company->meta_title }} @endif">
    <meta name="description" content="{{ $company->meta_description }}">
    <meta name="keywords" content="{{ $company->meta_keywords }}">

@endsection

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('content')
    <!-- Banner -->

<header id="header" class="uk-background-cover uk-background-norepeat uk-background-center-center uk-background-blend-soft-light uk-background-primary" 
  style="background-image: url(https://via.placeholder.com/1600x800);">
	<div class="uk-container uk-container-large uk-light" uk-height-viewport="offset-top: true">
		<div uk-grid uk-height-viewport="offset-top: true">
			<div class="uk-header-left uk-section uk-visible@m uk-flex uk-flex-bottom">
				<div class="uk-text-xsmall uk-text-bold">
					<a class="hvr-back" href="#course" uk-scroll="offset: 80"><span class="uk-margin-small-right" 
						data-uk-icon="arrow-left"></span>Прокрутить вниз</a>
				</div>
			</div>
			<div class="uk-width-expand@m uk-section">
                <div class="uk-margin-top">          
                  <div class="uk-grid-large" uk-grid uk-scrollspy="cls: uk-animation-slide-bottom-medium; delay: 200; repeat: true">
                        <div class="uk-width-1-2@m">
                          <h1 class="uk-heading-medium uk-margin-remove-top uk-letter-spacing-xl">{{ $company->ru_title }}</h1>
                            <p class="uk-text-lead">{{ $company->category->ru_title }}</p>
                          <a href="sign-up.html" class="uk-button uk-button-large uk-button-success-outline">Связаться</a>
                                    </div>
                        <div class="uk-width-1-2@m uk-text-large uk-flex uk-flex-middle">
                            @if (!empty($company->ru_description))
                                <div>
                                    {!! $company->ru_description !!}
                                </div>
                            @endif
                        </div>
                    </div>
				</div>
				<div class="uk-margin-xlarge-top">
<!--
          <div class="uk-course-pricing" 
            data-uk-scrollspy="cls: uk-animation-slide-bottom-medium; delay: 400; repeat: true">
            <div class="uk-grid-large uk-grid-match" data-uk-grid>
              <div class="uk-width-1-5@l">
                <h3>Choose <mark>pricing</mark> options</h3>
              </div>
              <div class="uk-width-expand@s">
                <div class="uk-card uk-border-secondary-xlarge uk-card-body uk-flex uk-flex-column">
                  <h3 class="uk-h2 uk-text-success uk-margin-remove">$19.99
                    <del class="uk-margin-small-left uk-text-small uk-text-muted">$39.99</del>
                  </h3>
                  <ul class="uk-list uk-list-bullet uk-text-small uk-text-demi-bold uk-margin-auto-bottom">
                    <li>Formulate alternative and big quality professional ideas</li>
                    <li>Readiness and quality evolve installed super base ideas</li>
                  </ul>
                  <a href="sign-up.html" class="uk-button uk-button-large uk-button-success uk-width-1-1 uk-margin-auto-top">Sign up now</a>
                </div>
              </div>
              <div class="uk-width-expand@s">
                <div class="uk-card uk-border-secondary-xlarge uk-card-body">
                  <h3 class="uk-h2 uk-text-success uk-margin-remove">$49.99
                    <del class="uk-margin-small-left uk-text-small uk-text-muted">$99.99</del>
                  </h3>
                  <ul class="uk-list uk-list-bullet uk-text-small uk-text-demi-bold">
                    <li>Meadiness and evolve quality installed space rocket ideas</li>
                    <li>Avolve installed base quality ideas visvis business processes</li>
                    <li>Tonotonectally alternative incubate quality products</li>
                  </ul>
                  <a href="sign-up.html" class="uk-button uk-button-large uk-button-success uk-width-1-1 uk-margin-large-top">Sign up now</a>
                </div>
              </div>
            </div>
          </div>
-->
				</div>
			</div>
			<div class="uk-header-right uk-section uk-visible@m uk-flex uk-flex-right uk-flex-bottom">
				<div>
					<ul class="uk-subnav uk-text-xsmall uk-text-bold">
						<li><a class="uk-link-border" href="#" target="_blank">facebook</a></li>
						<li><a class="uk-link-border" href="#" target="_blank">twitter</a></li>
						<li><a class="uk-link-border" href="#" target="_blank">instagram</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>
<div id="course" class="uk-section">
  <div class="uk-container uk-margin-pricing-offset">
    <div class="uk-grid-large" data-uk-grid>
      <div class="uk-width-expand@m">
        <div class="uk-article">
          <h2>Описание</h2>
            @if (!empty($company->ru_description))
                <div>
                    {!! $company->ru_description !!}
                </div>
            @endif


          <h2 class="uk-margin-large-top">FAQ</h2>
          <ul class="uk-margin-top" data-uk-accordion="multiple: true">
            <li class="uk-open">
              <a class="uk-accordion-title" href="#">What is User Experience Design?<span class="uk-align-right uk-margin-remove-bottom">28:56</span></a>
              <div class="uk-accordion-content">
                <table class="uk-table uk-table-justify uk-table-middle uk-table-divider">
                  <tbody>
                    <tr class="uk-text-primary">
                      <td class="uk-table-expand"><span class="uk-margin-small-right" data-uk-icon="play-circle"></span><a href="#lesson" data-uk-toggle>Introduction: a UXD Parable</a></td>
                      <td><span data-uk-icon="unlock"></span></td>
                      <td class="uk-table-shrink">04:24</td>
                    </tr>
                    <tr class="uk-text-primary">
                      <td><span class="uk-margin-small-right" data-uk-icon="play-circle"></span><a href="#lesson" data-uk-toggle>What UXD Isn't</a></td>
                      <td><span data-uk-icon="unlock"></span></td>
                      <td>04:24</td>
                    </tr>
                    <tr class="uk-text-muted">
                      <td><span class="uk-margin-small-right" data-uk-icon="play-circle"></span>Why Should We Care About UXD?</td>
                      <td><span data-uk-icon="lock"></span></td>
                      <td>04:24</td>
                    </tr>
                    <tr class="uk-text-muted">
                      <td><span class="uk-margin-small-right" data-uk-icon="play-circle"></span>The Elements of User Experience</td>
                      <td><span data-uk-icon="lock"></span></td>
                      <td>04:24</td>
                    </tr>                    
                  </tbody>
                </table>
              </div>
            </li>
            <li>
              <a class="uk-accordion-title" href="#">Understanding the Elements of User Experience<span class="uk-align-right uk-margin-remove-bottom">19:26</span></a>
              <div class="uk-accordion-content">
                <table class="uk-table uk-table-justify uk-table-middle uk-table-divider">
                  <tbody>
                    <tr class="uk-text-muted">
                      <td class="uk-table-expand"><span class="uk-margin-small-right" data-uk-icon="play-circle"></span>The Elements of User Experience</td>
                      <td><span data-uk-icon="lock"></span></td>
                      <td class="uk-table-shrink">04:24</td>
                    </tr>
                    <tr class="uk-text-muted">
                      <td><span class="uk-margin-small-right" data-uk-icon="play-circle"></span>Exploring the Elements of User Experience</td>
                      <td><span data-uk-icon="lock"></span></td>
                      <td>04:24</td>
                    </tr>
                    <tr class="uk-text-muted">
                      <td><span class="uk-margin-small-right" data-uk-icon="play-circle"></span>How the Elements Work Together</td>
                      <td><span data-uk-icon="lock"></span></td>
                      <td>04:24</td>
                    </tr>
                    <tr class="uk-text-muted">
                      <td><span class="uk-margin-small-right" data-uk-icon="play-circle"></span>Identifying Business Goals</td>
                      <td><span data-uk-icon="lock"></span></td>
                      <td>04:24</td>
                    </tr>                    
                  </tbody>
                </table>
              </div>
            </li>
          </ul>

      
        </div>
      </div>
      <div class="uk-width-1-3@m">
        <div>
          <div>
            <h3>Цена, Условия, Контакты</h3>
            <ul class="uk-list uk-margin-small-top">
              <li><span class="uk-margin-small-right" data-uk-icon="clock"></span>
                        @if ($company->hasPhoneNumber())
                            <a class="uk-link-reset" uk-icon="icon: receiver" href="tel:{{ $company->phone_number }}" target="_blank">
                                    {{ $company->phone_number }}
                            </a>
                        @endif
                </li>
              <li><span class="uk-margin-small-right" data-uk-icon="unlock"></span>
               @if ($company->hasUrl())
                    <a class="uk-link-reset" uk-icon="icon: world" href="{{ $company->url }}" target="_blank">
                            {{ parse_url($company->url, PHP_URL_HOST) }}
                    </a>
                @endif
                </li>
              <li><span class="uk-margin-small-right" data-uk-icon="tablet"></span>Access on mobile</li>
              <li><span class="uk-margin-small-right" data-uk-icon="file-text"></span>Certificate of completion</li>
              <li><span class="uk-margin-small-right" data-uk-icon="file-pdf"></span>Worksheet downloads</li>
              <li><span class="uk-margin-small-right" data-uk-icon="question"></span>Questions answered by tutor</li>
              <li><span class="uk-margin-small-right" data-uk-icon="future"></span>Future course updates</li>
            </ul>
          </div>			
          <h3 class="uk-margin-large-top">Tags</h3>
          <div data-uk-margin>
            <a class="uk-display-inline-block" href="#"><span class="uk-label uk-label-light">UX</span></a>
            <a class="uk-display-inline-block" href="#"><span class="uk-label uk-label-light">Design</span></a>
            <a class="uk-display-inline-block" href="#"><span class="uk-label uk-label-light">UI</span></a>
            <a class="uk-display-inline-block" href="#"><span class="uk-label uk-label-light">Experience</span></a>          
          </div>
          <h3 class="uk-margin-large-top">Share Course</h3>
          <div class="uk-margin">
            <div data-uk-grid class="uk-child-width-auto uk-grid-small">
              <div>
                <a href="#" data-uk-icon="icon: facebook" class="uk-icon-button facebook" target="_blank"></a>
              </div>
              <div>
                <a href="#" data-uk-icon="icon: linkedin" class="uk-icon-button linkedin" target="_blank"></a>
              </div>
              <div>
                <a href="#" data-uk-icon="icon: twitter" class="uk-icon-button twitter" target="_blank"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



    @if ($company->hasAdvantagesOrAnySocialLink())
<section class="uk-section-xsmall uk-padding-remove-vertical">
    <div class="payment">
        <div class="uk-container uk-container-xlarge uk-container-center">
            <div class="uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-grid uk-grid-stack " uk-grid="">
                <div>
                    <div class="payment_list">
                        <ul>
                            @foreach ($company->advantagesAsArray() as $advantage)
                                <li><a href="#">{{ $advantage }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="uk-width-expand@m"></div>
                <div >
                    <div class="uk-child-width-auto uk-grid-small uk-flex-right@m uk-flex-center uk-grid uk-flex-middle" uk-grid="">
                        <div>
                            <span>Соц сети</span>
                        </div>
                        @if ($company->hasSocialLink('facebook'))
                            <div>
                                <a class="el-link uk-icon-button uk-icon" href="{{ $company->facebook_link }}" uk-icon="icon: facebook;">
                                    <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="facebook"><path d="M11,10h2.6l0.4-3H11V5.3c0-0.9,0.2-1.5,1.5-1.5H14V1.1c-0.3,0-1-0.1-2.1-0.1C9.6,1,8,2.4,8,5v2H5.5v3H8v8h3V10z"></path></svg>
                                </a>
                            </div>
                        @endif
                        @if ($company->hasSocialLink('instagram'))
                            <div>
                                <a class="el-link uk-icon-button uk-icon" href="{{ $company->instagram_link }}" uk-icon="icon: instagram;">
                                    <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="instagram"><path d="M13.55,1H6.46C3.45,1,1,3.44,1,6.44v7.12c0,3,2.45,5.44,5.46,5.44h7.08c3.02,0,5.46-2.44,5.46-5.44V6.44 C19.01,3.44,16.56,1,13.55,1z M17.5,14c0,1.93-1.57,3.5-3.5,3.5H6c-1.93,0-3.5-1.57-3.5-3.5V6c0-1.93,1.57-3.5,3.5-3.5h8 c1.93,0,3.5,1.57,3.5,3.5V14z"></path><circle cx="14.87" cy="5.26" r="1.09"></circle><path d="M10.03,5.45c-2.55,0-4.63,2.06-4.63,4.6c0,2.55,2.07,4.61,4.63,4.61c2.56,0,4.63-2.061,4.63-4.61 C14.65,7.51,12.58,5.45,10.03,5.45L10.03,5.45L10.03,5.45z M10.08,13c-1.66,0-3-1.34-3-2.99c0-1.65,1.34-2.99,3-2.99s3,1.34,3,2.99 C13.08,11.66,11.74,13,10.08,13L10.08,13L10.08,13z"></path></svg>
                                </a>
                            </div>
                        @endif
                        @if ($company->hasSocialLink('telegram'))
                            <div>
                                <a class="el-link uk-icon-button uk-icon" href="{{ $company->telegram_link }}" uk-icon="icon: twitter;">
                                    <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="twitter"><path d="M19,4.74 C18.339,5.029 17.626,5.229 16.881,5.32 C17.644,4.86 18.227,4.139 18.503,3.28 C17.79,3.7 17.001,4.009 16.159,4.17 C15.485,3.45 14.526,3 13.464,3 C11.423,3 9.771,4.66 9.771,6.7 C9.771,6.99 9.804,7.269 9.868,7.539 C6.795,7.38 4.076,5.919 2.254,3.679 C1.936,4.219 1.754,4.86 1.754,5.539 C1.754,6.82 2.405,7.95 3.397,8.61 C2.79,8.589 2.22,8.429 1.723,8.149 L1.723,8.189 C1.723,9.978 2.997,11.478 4.686,11.82 C4.376,11.899 4.049,11.939 3.713,11.939 C3.475,11.939 3.245,11.919 3.018,11.88 C3.49,13.349 4.852,14.419 6.469,14.449 C5.205,15.429 3.612,16.019 1.882,16.019 C1.583,16.019 1.29,16.009 1,15.969 C2.635,17.019 4.576,17.629 6.662,17.629 C13.454,17.629 17.17,12 17.17,7.129 C17.17,6.969 17.166,6.809 17.157,6.649 C17.879,6.129 18.504,5.478 19,4.74"></path></svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <hr class="new">
    @endif

    <!-- Main Info -->
    <div class="uk-container uk-container-xlarge uk-container-center margin-top text_info">

        <div class="" uk-grid>

            <div class="uk-width-1-3">
                <div>
<!--                @l uk-width-2-5@m uk-width-2-5@s -->
                    @if ($company->hasGeolocation())
                        <div class="img">
                            <iframe src="https://yandex.uz/map-widget/v1/-/CCh~UnA"  frameborder="1" allowfullscreen="true"></iframe>
                        </div>
                    @endif
                    @if ($company->hasAddress())
                    <div class="adress">
                        <img src="{{ asset('assets/img/pin.svg') }}" alt="">
                        <h4>{{ $company->address }}</h4>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Main Info -->
    <!-- Delivery Settings -->
<!-- <div class="uk-container uk-container-expand uk-container-center  margin-top2">
        <div class="unwrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle">
            <div class="sorting uk-grid-small uk-flex-middle">
                <p>Сортировать по типу перевозок:</p>
                <div class="center_item">
                    <img src="images/flats.svg" alt="">
                    <a href="#">
                        <p>Городские</p>
                    </a>
                </div>
                <div class="center_item">
                    <img src="images/planet-earth-1.svg" alt="">
                    <a href="#">
                        <p>Международные </p>
                    </a>
                </div>
                <div class="buttons">
                    <a href="#" class="setting_button right"> <i class="fa fa-bars"></i></a>
                    <a href="#" class="setting_button left"> <i class="fa fa-th-large"></i></a>
                </div>
            </div>
        </div>
</div> -->
<!-- Delivery Settings -->

<!-- Content
<div class="uk-container uk-container-expand uk-container-center  uk-margin-top">
        <ul class="uk-grid uk-grid-medium  uk-child-width-1-2@s uk-child-width-1-4@m uk-child-width-1-4@l" uk-grid data-uk-grid-margin>
            <li class="uk-container-center" >
                <div class="price_card">
                    <div class="price_pic">
                        <div class="inner_logo">
                            <img src="images/photo_2019-08-21 15.44.08.svg" alt="">
                        </div>
                        <div class="price">
                            <p>1 200 000 сум</p>
                            <span>скачать коммерческое</span>
                            <ul>
                                <li><img src="images/planet-earth-1.svg" alt=""></li>
                                <li><img src="images/flats.svg" alt=""></li>
                            </ul>
                        </div>
                    </div>

                    <div class="price_wrapper">
                        <div class="price_tages">
                                <div class="title">
                                    <span>Категория</span>
                                    <h2><a href="page2.html">Наименование Услуги</a> </h2>
                                </div>
                        </div>
                        <div class="hr"></div>
                        <div class="description">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et doloremagnaaliquyam erat, sed diam voluptua. At vero eos et accusam et justo</p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="uk-container-center" >
                <div class="price_card">
                    <div class="price_pic">
                        <div class="inner_logo">
                            <img src="images/photo_2019-08-21 15.44.08.svg" alt="">
                        </div>
                        <div class="price">
                            <p>1 200 000 сум</p>
                            <span>скачать коммерческое</span>
                            <ul>
                                <li><img src="images/planet-earth-1.svg" alt=""></li>
                                <li><img src="images/flats.svg" alt=""></li>
                            </ul>
                        </div>
                    </div>

                    <div class="price_wrapper">
                        <div class="price_tages">
                                <div class="title">
                                    <span>Категория</span>
                                    <h2><a href="page2.html">Наименование Услуги</a> </h2>
                                </div>
                        </div>
                        <div class="hr"></div>
                        <div class="description">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et doloremagnaaliquyam erat, sed diam voluptua. At vero eos et accusam et justo</p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="uk-container-center" >
                <div class="price_card">
                    <div class="price_pic">
                        <div class="inner_logo">
                            <img src="images/photo_2019-08-21 15.44.08.svg" alt="">
                        </div>
                        <div class="price">
                            <p>1 200 000 сум</p>
                            <span>скачать коммерческое</span>
                            <ul>
                                <li><img src="images/planet-earth-1.svg" alt=""></li>
                                <li><img src="images/flats.svg" alt=""></li>
                            </ul>
                        </div>
                    </div>

                    <div class="price_wrapper">
                        <div class="price_tages">
                                <div class="title">
                                    <span>Категория</span>
                                    <h2><a href="page2.html">Наименование Услуги</a> </h2>
                                </div>
                        </div>
                        <div class="hr"></div>
                        <div class="description">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et doloremagnaaliquyam erat, sed diam voluptua. At vero eos et accusam et justo</p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="uk-container-center" >
                <div class="price_card">
                    <div class="price_pic">
                        <div class="inner_logo">
                            <img src="images/photo_2019-08-21 15.44.08.svg" alt="">
                        </div>
                        <div class="price">
                            <p>1 200 000 сум</p>
                            <span>скачать коммерческое</span>
                            <ul>
                                <li><img src="images/planet-earth-1.svg" alt=""></li>
                                <li><img src="images/flats.svg" alt=""></li>
                            </ul>
                        </div>
                    </div>

                    <div class="price_wrapper">
                        <div class="price_tages">
                                <div class="title">
                                    <span>Категория</span>
                                    <h2><a href="page2.html">Наименование Услуги</a> </h2>
                                </div>
                        </div>
                        <div class="hr"></div>
                        <div class="description">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et doloremagnaaliquyam erat, sed diam voluptua. At vero eos et accusam et justo</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
</div>
Content end-->
<section class="uk-section-xsmall uk-padding-remove-vertical">
    <div class="uk-container uk-container-xlarge uk-container-center container uk-margin-top">
        <ul class="sequence">
            <li><a href="{{ route('site.catalog.index') }}">Главная</a></li>
            <li><img src="{{ asset('assets/img/next.svg') }}" alt=""></li>
            @foreach ($company->category->ancestors as $parentCategory)
                <li><a href="{{ route('site.catalog.main', $parentCategory->getAncestorsSlugs()) }}">{{ $parentCategory->getTitle() }}</a></li>
                <li><img src="{{ asset('assets/img/next.svg') }}" alt=""></li>
            @endforeach
            <li><a href="{{ route('site.catalog.main', $company->category->getAncestorsSlugs()) }}">{{ $company->category->getTitle() }}</a></li>
            <li><img src="{{ asset('assets/img/next.svg') }}" alt=""></li>
            <li>{{ $company->getTitle() }}</li>
        </ul>
    </div>
</section>
@endsection
