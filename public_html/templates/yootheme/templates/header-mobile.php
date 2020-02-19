<?php

$config = $theme->get('logo', []);
$mobile = $theme->get('mobile', []);
$attrs_navbar = [
    'class' => 'uk-navbar-container',
    'uk-navbar' => true,
];
$attrs_sticky = [];
$attrs_image = [];
$attrs_menu = [];

// Sticky
if ($sticky = $mobile['sticky']) {
    $attrs_sticky = array_filter([
        'uk-sticky' => true,
        'show-on-up' => $sticky == 2,
        'animation' => $sticky == 2 ? 'uk-animation-slide-top' : '',
        'cls-active' => 'uk-navbar-sticky',
        'sel-target' => '.uk-navbar-container',
    ]);
}

// Logo Text
$logo = $config['text'];
$logo = JText::_($logo);

// Image Fallback
if ($config['image_mobile']) {
    $config['image'] = $config['image_mobile'];
    $config['image_width'] = $config['image_mobile_width'];
    $config['image_height'] = $config['image_mobile_height'];
}

// Image
if ($config['image']) {

    $attrs_image['alt'] = $config['text'];
    $attrs_image['uk-gif'] = $this->isImage($config['image']) == 'gif';

    if ($this->isImage($config['image']) == 'svg') {
        $logo = $this->image($config['image'], array_merge($attrs_image, ['width' => $config['image_width'], 'height' => $config['image_height']]));
    } else {
        $logo = $this->image([$config['image'], 'thumbnail' => [$config['image_width'], $config['image_height']], 'srcset' => true], $attrs_image);
    }

}

if (!$logo) {
    unset($mobile['logo']);
}

if (!$this->countModules('mobile')) {
    unset($mobile['toggle']);
}

$mobile['search'] = false; // TODO

// Mobile Position
if ($this->countModules('mobile')) {

    $attrs_menu['class'][] = $mobile['animation'] == 'offcanvas' ? 'uk-offcanvas-bar' : '';
    $attrs_menu['class'][] = $mobile['animation'] == 'modal' ? 'uk-modal-dialog uk-modal-body' : '';
    $attrs_menu['class'][] = $mobile['animation'] == 'dropdown' ? 'uk-background-default uk-padding' : '';
    $attrs_menu['class'][] = $mobile['menu_center'] ? 'uk-text-center' : '';
    $attrs_menu['class'][] = $mobile['animation'] != 'dropdown' && $mobile['menu_center_vertical'] ? 'uk-flex' : '';

    $mobile->set('offcanvas.overlay', true);

} else {
    $mobile['animation'] = false;
}

?>

<?php if ($sticky) : ?>
<div <?= $this->attrs($attrs_sticky) ?>>
<?php endif ?>

    <nav uk-sticky <?= $this->attrs($attrs_navbar) ?>>

        <?php if ($mobile['logo'] == 'left' || $mobile['toggle'] == 'left' || $mobile['search'] == 'left') : ?>
        <div class="uk-navbar-left">

            <?php if ($mobile['logo'] == 'left') : ?>
            <a class="uk-navbar-item uk-logo<?= $mobile['logo_padding_remove'] ? ' uk-padding-remove-left' : '' ?>" href="<?= $theme->get('site_url') ?>">
                <?= $logo ?>
            </a>
            <?php endif ?>

            <?php if ($mobile['toggle'] == 'left') : ?>
            <a class="uk-navbar-toggle" href="#tm-mobile" uk-toggle<?= ($mobile['animation'] == 'dropdown') ? '="animation: true"' : '' ?>>
                <div uk-navbar-toggle-icon></div>
                <?php if ($mobile['toggle_text']) : ?>
                    <span class="uk-margin-small-left"><?= JText::_('TPL_YOOTHEME_MENU') ?></span>
                <?php endif ?>
            </a>
            <?php endif ?>

            <?php if ($mobile['search'] == 'left') : ?>
            <a class="uk-navbar-item"><?= JText::_('TPL_YOOTHEME_SEARCH') ?></a>
            <?php endif ?>

        </div>
        <?php endif ?>

        <?php if ($mobile['logo'] == 'center') : ?>
        <div class="uk-navbar-center">
            <a class="uk-navbar-item uk-logo" href="<?= $theme->get('site_url') ?>">
                <?= $logo ?>
            </a>
        </div>
        <div class="uk-navbar-right">
            <div class="uk-navbar-item" id="module-tm-1" style="display: inherit;">
    <div class="custom">
        <ul class="uk-grid-small uk-flex-inline uk-flex-middle uk-flex-nowrap uk-grid" uk-grid=""> 
            <li class="uk-first-column"> 
                <a href="tel:+998974248899" class="uk-icon-button uk-icon" >
                    <svg width="15" height="15" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="receiver"><path fill="none" stroke="#000" stroke-width="1.01" d="M6.189,13.611C8.134,15.525 11.097,18.239 13.867,18.257C16.47,18.275 18.2,16.241 18.2,16.241L14.509,12.551L11.539,13.639L6.189,8.29L7.313,5.355L3.76,1.8C3.76,1.8 1.732,3.537 1.7,6.092C1.667,8.809 4.347,11.738 6.189,13.611"></path></svg>
                </a> 
            </li> 
            <li>
                <a href="https://t.me/vovorus" class="uk-icon-button uk-icon"> 
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.004 512.004" style="enable-background:new 0 0 512.004 512.004;" xml:space="preserve" width="12" height="12">
                        <path fill="#4a494c" d="M508.194,20.517c-4.43-4.96-11.42-6.29-17.21-3.76l-482,211c-5.34,2.34-8.85,7.57-8.98,13.41  c-0.13,5.83,3.14,11.21,8.38,13.79l115.09,56.6l28.68,172.06c0.93,6.53,6.06,11.78,12.74,12.73c4.8,0.69,9.57-1,12.87-4.4  l90.86-90.86l129.66,92.62c4.16,2.96,9.52,3.61,14.24,1.74c4.73-1.87,8.19-6.02,9.19-11.01l90-451  C512.604,28.967,511.454,24.177,508.194,20.517z M135.354,283.967l-84.75-41.68l334.82-146.57L135.354,283.967z M182.294,328.557  l-13.95,69.75l-15.05-90.3l183.97-138.49l-150.88,151.39C184.264,323.027,182.854,325.787,182.294,328.557z M191.424,435.857  l15.74-78.67l36.71,26.22L191.424,435.857z M396.834,455.797l-176.73-126.23l252.47-253.31L396.834,455.797z"></path>
                    </svg>
                </a>
            </li>
        </ul> 
    </div> 
</div>
        </div>
        <?php endif ?>

        <?php if ($mobile['logo'] == 'right' || $mobile['toggle'] == 'right' || $mobile['search'] == 'right') : ?>
        <div class="uk-navbar-right">

            <?php if ($mobile['search'] == 'right') : ?>
            <a class="uk-navbar-item"><?= JText::_('TPL_YOOTHEME_SEARCH') ?></a>
            <?php endif ?>

            <?php if ($mobile['toggle'] == 'right') : ?>
            <a class="uk-navbar-toggle" href="#tm-mobile" uk-toggle<?= $mobile['animation'] == 'dropdown' ? '="animation: true"' : '' ?>>
                <?php if ($mobile['toggle_text']) : ?>
                    <span class="uk-margin-small-right"><?= JText::_('TPL_YOOTHEME_MENU') ?></span>
                <?php endif ?>
                <div uk-navbar-toggle-icon></div>
            </a>
            <?php endif ?>

            <?php if ($mobile['logo'] == 'right') : ?>
            <a class="uk-navbar-item uk-logo<?= $mobile['logo_padding_remove'] ? ' uk-padding-remove-right' : '' ?>" href="<?= $theme->get('site_url') ?>">
                <?= $logo ?>
            </a>
            <?php endif ?>

        </div>
        <?php endif ?>

    </nav>

    <?php if ($mobile['animation'] == 'dropdown') : ?>

        <?php if ($mobile['dropdown'] == 'slide') : ?>
        <div class="uk-position-relative tm-header-mobile-slide">
        <?php endif ?>

        <div id="tm-mobile" class="<?= $mobile['dropdown'] == 'slide' ? 'uk-position-top' : '' ?>" hidden>
            <div<?= $this->attrs($attrs_menu) ?>>

                <jdoc:include type="modules" name="mobile" style="grid-stack" />

            </div>
        </div>

        <?php if ($mobile['dropdown'] == 'slide') : ?>
        </div>
        <?php endif ?>

    <?php endif ?>

<?php if ($sticky) : ?>
</div>
<?php endif ?>

<?php if ($mobile['animation'] == 'offcanvas') : ?>
<div id="tm-mobile" uk-offcanvas<?= $this->attrs($mobile['offcanvas'] ?: []) ?>>
    <div<?= $this->attrs($attrs_menu) ?>>

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <?php if ($mobile['menu_center_vertical']) : ?>
        <div class="uk-margin-auto-vertical uk-width-1-1">
            <?php endif ?>

            <jdoc:include type="modules" name="mobile" style="grid-stack" />

            <?php if ($mobile['menu_center_vertical']) : ?>
        </div>
        <?php endif ?>

    </div>
</div>
<?php endif ?>

<?php if ($mobile['animation'] == 'modal') : ?>
<div id="tm-mobile" class="uk-modal-full" uk-modal>
    <div<?= $this->attrs($attrs_menu, ['class' => 'uk-height-viewport']) ?>>

        <button class="uk-modal-close-full" type="button" uk-close></button>

        <?php if ($mobile['menu_center_vertical']) : ?>
        <div class="uk-margin-auto-vertical uk-width-1-1">
            <?php endif ?>

            <jdoc:include type="modules" name="mobile" style="grid-stack" />

            <?php if ($mobile['menu_center_vertical']) : ?>
        </div>
        <?php endif ?>

    </div>
</div>
<?php endif ?>
