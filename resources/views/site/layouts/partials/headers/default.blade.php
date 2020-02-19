<!-- Header Menu -->
	<div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent ; top: 500">
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
                        <a href="{{ route('site.catalog.main', $need->ru_slug) }}">{{ $need->ru_title }}</a>
                        <!--uk-dropdown="delay-show: 250;"-->
                        <div class="code-dropdown uk-dropdown uk-overflow-auto uk-dropdown-bottom-center" uk-dropdown="pos: bottom-justify; animation: uk-animation-slide-top-small; duration: 1000">
                            <div class=" uk-grid-collapse uk-grid uk-child-width-1-4 " uk-grid>
                                <!-- class="uk-nav uk-navbar-dropdown-nav"-->
                            @foreach ($need->menuItems as $menu)
                                <div class="padding-15 ">
                                    <ul class="uk-nav">
                                        <div class="dropdown_wrapper uk-margin" >
<!--                                            <img src="{{ $menu->getImage() }}" alt="">-->
                                            <a href="{{ route('site.catalog.main', $menu->ru_slug) }}">{{ $menu->ru_title }}</a>
                                        </div>
                                        @foreach ($menu->categories as $category)
                                            <li>
                                                <a href="{{ route('site.catalog.main', $category->getAncestorsSlugs()) }}">{!! $category->ru_title !!}</a>
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
	            <div class="code-drop uk-drop" uk-drop="mode: click; pos: bottom-left; offset: 0">
                    @include('site.layouts.partials.mobile_search')
	            </div>
	          </div>
	          <div class="uk-navbar-item uk-visible@m">
	            <div><a rel="nofollow" target="_blank" class="uk-button uk-button-success-outline" href="#">Добавить компанию</a></div>
	          </div>          
	          <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" uk-toggle><span uk-icon="icon: menu" ></span></a>
	        </div>
	      </div>
	    </div>
	  </nav>
	</div>
