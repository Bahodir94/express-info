<ul class="nav-main">
    <li>
        <a class="active" href="{{ route('admin.index') }}">
            <i class="si si-cup"></i>
            <span class="sidebar-mini-hide">Главная</span>
        </a>
    </li>
    <li>
        <a class="active" href="/" target="_blank">
            <i class="si si-map"></i>
            <span class="sidebar-mini-hide">На сайт</span>
        </a>
    </li>
    <li class="nav-main-heading">
        <span class="sidebar-mini-visible">Р</span>
        <span class="sidebar-mini-hidden">Разделы</span>
    </li>

    <li>
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-puzzle"></i>
            <span class="sidebar-mini-hide">Блог</span>
        </a>
        <ul>
            <li>
                <a href="{{ route('admin.blogcategories.index') }}">
                    Категории
                </a>
            </li>
{{--           По записям блога - все пока на стадии разраб...--}}
            <li>
                <a href="{{ route('admin.blogposts.index') }}">
                    Записи
                </a>
            </li>
        </ul>
    </li>


    <li>
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-puzzle"></i>
            <span class="sidebar-mini-hide">Цгу</span>
        </a>
        <ul>
            <li>
                <a href="{{ route('admin.cgucategories.index') }}">
                    Категории
                </a>
            </li>
            <li>
                <a href="{{ route('admin.cgucatalogs.index') }}">
                    Файлы
                </a>
            </li>
            <li>
                <a href="{{ route('admin.cgusites.index') }}">
                    Сайты
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#" class="nav-submenu" data-toggle="nav-submenu">
            <i class="si si-list"></i>
            <span class="sidebar-mini-hide">Справочник</span>
        </a>
        <ul>
            <li>
                <a href="{{ route('admin.needs.index') }}">Главное меню</a>
            </li>
            <li>
                <a href="{{ route('admin.handbookcategories.index') }}">Категории</a>
            </li>
            <li>
                <a href="{{ route('admin.companies.index') }}">Компании</a>
            </li>
            <li>
                <a href="{{ route('admin.services.index') }}">Услуги</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="{{ route('admin.faq.index') }}">
            <i class="si si-question"></i>
            <span class="sidebar-mini-hide">FAQ</span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.users.index') }}">
            <i class="si si-user"></i>
            <span class="sidebar-mini-hide">Пользователи</span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.banners.index') }}">
            <i class="fa fa-newspaper-o"></i>
            <span class="sidebar-mini-hide">Баннеры</span>
        </a>
    </li>
</ul>
