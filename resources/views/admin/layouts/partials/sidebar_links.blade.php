<ul class="nav-main">
    <li>
        <a class="active" href="#">
            <i class="si si-cup"></i>
            <span class="sidebar-mini-hide">Главная</span>
        </a>
    </li>
    <li>
        <a class="active" href="#" target="_blank">
            <i class="si si-map"></i>
            <span class="sidebar-mini-hide">На сайт</span>
        </a>
    </li>
    <li class="nav-main-heading">
        <span class="sidebar-mini-visible">HD</span>
        <span class="sidebar-mini-hidden">Heading</span>
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
                <a href="{{ route('admin.cgucategories.index') }}">
                    Цгу фотки или видео
                </a>
            </li>
            <li>
                <a href="{{ route('admin.cgusites.index') }}">
                    Цгу сайты
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
                <a href="{{ route('admin.handbookcategories.index') }}">Категории</a>
            </li>
            <li>
                <a href="{{ route('admin.handbooks.index') }}">Компании</a>
            </li>
        </ul>
    </li>
</ul>
