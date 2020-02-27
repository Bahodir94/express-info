<!-- Header Home -->


<header class="uk-cover-container uk-background-cover uk-background-norepeat uk-background-center-center"
  >
  <video src="" uk-cover></video>
  <div class="uk-overlay uk-position-cover uk-overlay-video"></div>
	<div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container;
	  cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; top: 500">
  <nav class="uk-navbar-container uk-letter-spacing-small uk-text-bold">
	    <div class="uk-container uk-container-large">
	      <div class="uk-position-z-index" uk-navbar>
	        <div class="uk-navbar-left">
	          <a class="uk-navbar-item uk-logo" href="{{ route('site.catalog.index') }}">vid</a>
	        </div>
	        <div class="uk-navbar-right">
                <ul class="uk-navbar-nav uk-visible@m">
                    <!--class="uk-active"-->
                    <li ><a href="{{ route('site.catalog.index') }}">Главная</a></li>
                    @foreach ($needs as $need)
                    @if (!empty($need->url))
                    <li><a href="{{$need->url}}">{{ $need->ru_title }}</a></li>
                    @else
                    <li class="uk-parent">
                        <a>{{ $need->ru_title }}</a>
                        <!--uk-dropdown="delay-show: 250;"-->
                        <div class="uk-background-secondary code-dropdown uk-dropdown uk-overflow-auto uk-dropdown-bottom-center" uk-dropdown="pos: bottom-justify; animation: uk-animation-slide-top-small; duration: 1000">
                            <div class=" uk-grid-collapse uk-grid uk-child-width-1-4 " uk-grid>
                                <!-- class="uk-nav uk-navbar-dropdown-nav"-->
                            @foreach ($need->menuItems as $menu)
                                <div class="padding-15 ">
                                    <ul class="uk-nav">
                                        <div class="dropdown_wrapper uk-margin">
<!--                                            <img src="{{ $menu->getImage() }}" alt="">-->
                                            <a href="{{ route('site.catalog.main', $menu->ru_slug) }}">{{ $menu->ru_title }}</a>
                                        </div>
                                        @foreach ($menu->categories as $category)
                                            <li>
                                                <a style="color:#fff" href="{{ route('site.catalog.main', $category->getAncestorsSlugs()) }}">{!! $category->ru_title !!}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>



	        </div>
	        <div class="uk-navbar-right">
	          <div>
	            <a class="uk-navbar-toggle" uk-icon="icon: search" href="#"></a>
	            <div class="code-drop uk-drop" uk-drop="mode: click; pos:bottom-left; offset: 0">
                    @include('site.layouts.partials.mobile_search')
	            </div>
	          </div>
	          <div class="uk-navbar-item uk-visible@m">
	            <div><a rel="nofollow" class="uk-button uk-button-success-outline" href="#">Добавить компанию</a></div>
	          </div>
	          <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" uk-toggle><span uk-icon="icon: menu" ></span></a>
	        </div>
	      </div>
	    </div>
	  </nav>
	</div>
	<div class="uk-container uk-container-large uk-light" uk-height-viewport="offset-top: true">
		<div uk-grid uk-height-viewport="offset-top: true">
			<div class="uk-header-left uk-section uk-visible@m uk-flex uk-flex-bottom">
				<div class="uk-text-xsmall uk-text-bold">
					<a class="hvr-back" href="#about" uk-scroll="offset: 80"><span class="uk-margin-small-right" uk-icon="icon: arrow-left" ></span>Прокрутить вниз</a>
				</div>
			</div>
			<div class="uk-width-expand@m uk-section uk-flex uk-flex-column">
				<div class="uk-margin-auto-top uk-margin-auto-bottom">
					<h1 class="uk-heading-easy uk-margin-remove-top uk-letter-spacing-xl" uk-scrollspy="cls: uk-animation-slide-bottom-medium; repeat: true">
                        <mark>Площадка</mark> где вы сможете найти <mark>толковых людей,</mark> готовых помочь <mark>вашему бизнесу.</mark></h1>
                    @include('site.components.search')
				</div>
				<div class="uk-margin-auto-top"
					uk-scrollspy="cls: uk-animation-slide-bottom-medium; delay: 400; repeat: true">
					<div class="uk-child-width-1-2@s uk-grid-large uk-margin-medium-top" uk-grid>

						<div>
							<h4 class="uk-margin-remove">Все в одном сайте</h4>
							<p class="uk-margin-xsmall-top uk-text-small uk-text-muted uk-text-bold">Найди компанию или фрилансера в сфере интернет и наружной рекламы, разработки сайтов и мобильных приложений, юридической помощи и бухгалтерии и многом другом</p>
						</div>
						<div>
							<h4 class="uk-margin-remove">
                                Большой выбор</h4>
							<p class="uk-margin-xsmall-top uk-text-small uk-text-muted uk-text-bold">Выберите более чем из 500 компаний и фрилансеров. Отфильтруй по цене и найди самое выгодное предложение</p>
						</div>
					</div>
				</div>
			</div>
			<div class="uk-header-right uk-section uk-visible@m uk-flex uk-flex-right uk-flex-bottom">
				<div>
					<ul class="uk-subnav uk-text-xsmall uk-text-bold">
						<li><a rel="nofollow" class="uk-link-border" href="#" target="_blank">facebook</a></li>
						<li><a rel="nofollow" class="uk-link-border" href="#" target="_blank">twitter</a></li>
						<li><a rel="nofollow" class="uk-link-border" href="#" target="_blank">instagram</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>


