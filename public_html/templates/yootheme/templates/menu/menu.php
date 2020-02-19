<?php

// Menu ID
if ($id = $params->get('tag_id')) {
    $attrs['id'] = $id;
}

// determine layout
// strpos() on $position to also find the virtual position 'navbar-split'
if (strpos($position, 'navbar') === 0) {

    $layout = $theme->get('header.layout');

    if (preg_match('/^(offcanvas|modal)/', $layout)) {

        $type = 'nav';
        $attrs['class'][] = "uk-nav uk-nav-{$theme->get('navbar.toggle_menu_style')}";
        $attrs['class'][] = $theme->get('navbar.toggle_menu_center') ? 'uk-nav-center' : '';

    } else {

        $type = 'navbar';
        $attrs['class'][] = 'uk-navbar-nav';

    }

    if ($layout == 'stacked-center-split' && $params->get('split')) {

        $length = ceil(count($items) / 2);

        if ($position == 'navbar-split') {
            $items = array_slice($items, 0, $length);
        } else {
            $items = array_slice($items, $length);
        }
    }

} else if ($position == 'header') {

    $layout = $theme->get('header.layout');

    if (preg_match('/^(stacked)/', $layout)) {

        $type = 'subnav';
        $attrs['class'][] = 'uk-subnav';

    } else {

        $type = 'navbar';
        $attrs['class'][] = 'uk-navbar-nav';

    }

} else if ($params->get('menu_style') == 'subnav' || in_array($position, ['toolbar-left', 'toolbar-right'])) {

    $type = 'subnav';
    $attrs['class'][] = 'uk-subnav';

} else {

    $type = 'nav';
    $attrs['class'][] = 'uk-nav';

    if ($position == 'mobile') {

        $attrs['class'][] = "uk-nav-{$theme->get('mobile.menu_style')}";
        $attrs['class'][] = $theme->get('mobile.menu_center') ? 'uk-nav-center' : '';


    } else if (!array_filter($items, function ($item) { return $item->type !== 'header' && (isset($item->children, $item->url) && $item->url != '#'); })) {

        $params->set('accordion', true);
        $attrs['class'][] = 'uk-nav-default uk-nav-parent-icon uk-nav-accordion';
        $attrs['uk-nav'] = true;

    } else {

        $attrs['class'][] = 'uk-nav-default';

    }

}

?>

<ul<?= $this->attrs($attrs) ?>>
    <?= $this->render("menu/{$type}", ['items' => $items, 'level' => 1]) ?>
</ul>
<div class="uk-navbar-item" >
    <div class="custom">
        <ul class="uk-grid-small uk-flex-inline uk-flex-middle uk-flex-nowrap uk-grid" uk-grid=""> 
            <li class="uk-first-column"> 
                <a href="tel:+998974248899" class="uk-icon-button uk-icon" >
                    <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="receiver"><path fill="none" stroke="#000" stroke-width="1.01" d="M6.189,13.611C8.134,15.525 11.097,18.239 13.867,18.257C16.47,18.275 18.2,16.241 18.2,16.241L14.509,12.551L11.539,13.639L6.189,8.29L7.313,5.355L3.76,1.8C3.76,1.8 1.732,3.537 1.7,6.092C1.667,8.809 4.347,11.738 6.189,13.611"></path></svg>
                </a> 
            </li> 
            <li>
                <a href="https://t.me/vovorus" class="uk-icon-button uk-icon"> 
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.004 512.004" style="enable-background:new 0 0 512.004 512.004;" xml:space="preserve" width="17" height="17">
                        <path fill="#4a494c" d="M508.194,20.517c-4.43-4.96-11.42-6.29-17.21-3.76l-482,211c-5.34,2.34-8.85,7.57-8.98,13.41  c-0.13,5.83,3.14,11.21,8.38,13.79l115.09,56.6l28.68,172.06c0.93,6.53,6.06,11.78,12.74,12.73c4.8,0.69,9.57-1,12.87-4.4  l90.86-90.86l129.66,92.62c4.16,2.96,9.52,3.61,14.24,1.74c4.73-1.87,8.19-6.02,9.19-11.01l90-451  C512.604,28.967,511.454,24.177,508.194,20.517z M135.354,283.967l-84.75-41.68l334.82-146.57L135.354,283.967z M182.294,328.557  l-13.95,69.75l-15.05-90.3l183.97-138.49l-150.88,151.39C184.264,323.027,182.854,325.787,182.294,328.557z M191.424,435.857  l15.74-78.67l36.71,26.22L191.424,435.857z M396.834,455.797l-176.73-126.23l252.47-253.31L396.834,455.797z"></path>
                    </svg>
                </a>
            </li>
        </ul> 
    </div> 
</div>