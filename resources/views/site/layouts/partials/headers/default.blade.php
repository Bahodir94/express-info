<header class="header-site" id="header">
    <div class="container-fluid">
        <div class="header-wrap">
            <div class="header-left">
                <div class="header-main-toggle">
                    <button class="btn-toggle" type="button" data-toggle="offcanvas"><i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="header-logo"><a class="qdesk-logo" href="{{ route('site.catalog.index') }}" title="VID"><img class="qdesk-logo-white"
                                                                                         src="{{ asset('front/images/VID.png') }}"
                                                                                         alt="VID"><img
                            class="qdesk-logo-black" src="{{ asset('front/images/VID-black.png') }}" alt="VID"></a>
                </div>
                <div class="navigation" id="navigation">
                    <ul class="main-menu">
                        <li class="active"><a href="/">Главная</a></li>
                        <li class="header-menu-item"><a href="#">Конкурсы <i
                                class="fas fa-caret-down"></i></a>
                            <ul class="sub-menu">
                                @foreach($needs as $need)
                                    <li class="menu-item dropdown-submenu">
                                        <a class="d-flex justify-content-between align-items-center">{{ $need->ru_title }}
                                            <i class="fas fa-caret-right ml-2 mr-3"></i></a>
                                        <ul class="sub-menu">
                                            @foreach($need->menuItems as $item)
                                                <li class="menu-item dropdown-submenu">
                                                    <a href="{{ route('site.tenders.category', $item->ru_slug) }}" class="d-flex justify-content-between align-items-center">{{ $item->ru_title }}
                                                        <i class="fas fa-caret-right ml-2 mr-3"></i></a>
                                                    <ul class="sub-menu">
                                                        @foreach($item->categories as $category)
                                                            <li>
                                                                <a href="{{ route('site.tenders.category', $category->ru_slug) }}">{{ $category->getTitle() }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="header-menu-item"><a href="#">Исполнители <i
                                    class="fas fa-caret-down"></i></a>
                            <ul class="sub-menu">
                                @foreach($needs as $need)
                                    <li class="menu-item dropdown-submenu">
                                        <a class="d-flex justify-content-between align-items-center">{{ $need->ru_title }}
                                            <i class="fas fa-caret-right ml-2 mr-3"></i></a>
                                        <ul class="sub-menu">
                                            @foreach($need->menuItems as $item)
                                                <li class="menu-item dropdown-submenu">
                                                    <a href="{{ route('site.catalog.main', $item->ru_slug) }}" class="d-flex justify-content-between align-items-center">{{ $item->ru_title }}
                                                        <i class="fas fa-caret-right ml-2 mr-3"></i></a>
                                                    <ul class="sub-menu">
                                                        @foreach($item->categories as $category)
                                                            <li>
                                                                <a href="{{ route('site.catalog.main', $category->ru_slug) }}">{{ $category->getTitle() }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="header-right">
                <ul>

                    @guest
                        <li><a href="{{ route('site.tenders.common.create') }}"><i class="fas fa-plus-circle"></i> Добавить заказ</a></li>
                        <li><a href="{{ route('login') }}"><i class="fas fa-sign-out-alt"></i> Вход</a><span> / </span><a
                                href="{{ route('register') }}">Регистрация</a></li>
                    @else
                        @if (auth()->user()->hasRole('customer'))
                            <li><a href="{{ route('site.tenders.common.create') }}"><i class="fas fa-plus-circle"></i>
                                    Добавить заказ</a></li>@endif
                        <li>
                            <a href="#" id="navBarDropdown" class="nav-link dropdown-toggle" role="button"
                               data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">@if (Auth::user()->name) {{ Auth::user()->name }} @else {{ Auth::user()->email }} @endif
                                <span class="caret"></span></a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                <a href="{{ route('site.account.index') }}" class="dropdown-item"><i
                                        class="fas fa-user"></i> Личный кабинет</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Выйти
                                </a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</header>

<div class="menu-mobile-wrap">
  <div class="menu-mobile-content">
    <div class="menu-mobile-profile">
      <div class="line">
        <button class="button btn-menu-close" type="button"></button>
      </div>
      <ul class="user-profile">

          @guest
              <li><a href="{{ route('login') }}"><i class="fas fa-sign-out-alt"></i>Войти</a></li>
              <li><a href="{{ route('register') }}"><i class="fas fa-registered"></i>Зарегистрироваться</a></li>
          @else
              @if (auth()->user()->hasRole('customer'))
                  <li><a href="{{ route('site.tenders.common.create') }}"><i class="fas fa-plus-circle"></i>
                          Добавить заказ</a></li>@endif
              <li>
                  <a href="#" id="navBarDropdown" class="nav-link dropdown-toggle" role="button"
                     data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">@if (Auth::user()->name) {{ Auth::user()->name }} @else {{ Auth::user()->email }} @endif
                      <span class="caret"></span></a>
                  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                      <a href="{{ route('site.account.index') }}" class="dropdown-item"><i
                              class="fas fa-user"></i> Личный кабинет</a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                          <i class="fas fa-sign-out-alt"></i> Выйти
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
      </ul>
    </div>
    <div class="menu-mobile">
      <ul class="main-menu-mobile">

          <li><a data-toggle="collapse" href="#sub-1" aria-expanded="false" aria-controls="sub-1">Конкурсы</a>
            <div class="collapse" id="sub-1">
              @foreach($needs as $need)
              <ul class="main-menu-mobile">

                <li>

                  <li><a data-toggle="collapse" href="#a{{ $need->id }}" aria-expanded="false" aria-controls="a{{ $need->id }}">{{ $need->ru_title }}</a>
                    <div class="collapse" id="a{{ $need->id }}">
                      <ul class="main-menu-mobile">
                        @foreach($need->menuItems as $item)
                        <li><div class="row"><div class="col-10"><a class="style_a" href="{{ route('site.tenders.category', $item->ru_slug) }}">{{ $item->ru_title }}</a></div><div class="col-2"><a class="text-left" data-toggle="collapse" href="#b{{ $item->id }}" aria-expanded="false" aria-controls="b{{ $item->id }}" style="color:#383838;"><i class="fas fa-chevron-right" style="transform: rotate(90deg);"></i></a></div></div>
                          <div class="collapse" id="b{{ $item->id }}">
                            <ul class="sub-menu-mobile">
                              @foreach($item->categories as $category)
                              <li>
                                  <a style="color: #63ba16; font-weight: 600;" href="{{ route('site.tenders.category', $category->ru_slug) }}">{{ $category->getTitle() }}</a>
                              </li>
                              @endforeach
                            </ul>
                          </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                </li>
              </li>


              </ul>
              @endforeach
            </div>
          </li>

          <li><a data-toggle="collapse" href="#sub-2" aria-expanded="false" aria-controls="sub-2">Исполнители</a>
            <div class="collapse" id="sub-2">
              @foreach($needs as $need)
              <ul class="main-menu-mobile">

                <li>

                  <li><a data-toggle="collapse" href="#d{{ $need->id }}" aria-expanded="false" aria-controls="d{{ $need->id }}">{{ $need->ru_title }}</a>
                    <div class="collapse" id="d{{ $need->id }}">
                      <ul class="main-menu-mobile">
                        @foreach($need->menuItems as $item)
                        <li><div class="row"><div class="col-10"><a class="style_a" href="{{ route('site.catalog.main', $item->ru_slug) }}">{{ $item->ru_title }}</a></div><div class="col-2"><a class="text-left" data-toggle="collapse" href="#c{{ $item->id }}" aria-expanded="false" aria-controls="c{{ $item->id }}" style="color:#383838;"><i class="fas fa-chevron-right" style="transform: rotate(90deg);"></i></a></div></div>
                          <div class="collapse" id="c{{ $item->id }}">
                            <ul class="sub-menu-mobile">
                              @foreach($item->categories as $category)
                              <li>
                                <a style="color: #63ba16; font-weight: 600;" href="{{ route('site.catalog.main', $category->ru_slug) }}">{{ $category->getTitle() }}</a>
                              </li>
                              @endforeach
                            </ul>
                          </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                </li>
              </li>


              </ul>
              @endforeach
            </div>
          </li>

    </div>
  </div>
</div>
