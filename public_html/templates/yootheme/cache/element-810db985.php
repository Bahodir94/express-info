<?php // @file /home/s/surovov/vid.uz/public_html/templates/yootheme/vendor/yootheme/builder/elements/social/element.json

return [
  'name' => 'social', 
  'title' => 'Social', 
  'icon' => $this->get('url:images/icon.svg'), 
  'iconSmall' => $this->get('url:images/iconSmall.svg'), 
  'element' => true, 
  'width' => 500, 
  'defaults' => [
    'link_style' => 'button', 
    'gutter' => 'small', 
    'margin' => 'default'
  ], 
  'placeholder' => [
    'props' => [
      'links' => ['https://twitter.com', 'https://facebook.com', 'https://plus.google.com']
    ]
  ], 
  'templates' => [
    'render' => "{$file['dirname']}/templates/template.php", 
    'content' => "{$file['dirname']}/templates/content.php"
  ], 
  'fields' => [
    'links.0' => [
      'label' => 'Links', 
      'attrs' => [
        'placeholder' => 'http://'
      ]
    ], 
    'links.1' => [
      'attrs' => [
        'placeholder' => 'http://'
      ]
    ], 
    'links.2' => [
      'attrs' => [
        'placeholder' => 'http://'
      ]
    ], 
    'links.3' => [
      'attrs' => [
        'placeholder' => 'http://'
      ]
    ], 
    'links.4' => [
      'description' => 'Enter up to 5 links to your social profiles. A corresponding <a href="https://getuikit.com/docs/icon" target="_blank">UIkit brand icon</a> will be displayed automatically, if available. Links to email addresses and phone numbers, like mailto:info@example.com or tel:+491570156, are also supported.', 
      'attrs' => [
        'placeholder' => 'http://'
      ]
    ], 
    'link_target' => [
      'type' => 'checkbox', 
      'text' => 'Open links in a new window.'
    ], 
    'link_style' => [
      'label' => 'Style', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'Button' => 'button', 
        'Link' => 'link', 
        'Link Muted' => 'muted', 
        'Link Text' => 'text', 
        'Link Reset' => 'reset'
      ]
    ], 
    'icon_ratio' => [
      'label' => 'Size', 
      'description' => 'Enter a size ratio, if you want the icon to appear larger than the default font size, for example 1.5 or 2 to double the size.', 
      'attrs' => [
        'placeholder' => '1'
      ], 
      'enable' => 'link_style != \'button\''
    ], 
    'gutter' => [
      'label' => 'Gutter', 
      'description' => 'Set the grid gutter width.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large'
      ]
    ], 
    'text_align' => $this->get('builder:text_align'), 
    'text_align_breakpoint' => $this->get('builder:text_align_breakpoint'), 
    'text_align_fallback' => $this->get('builder:text_align_fallback'), 
    'maxwidth' => $this->get('builder:maxwidth'), 
    'maxwidth_align' => $this->get('builder:maxwidth_align'), 
    'maxwidth_breakpoint' => $this->get('builder:maxwidth_breakpoint'), 
    'margin' => $this->get('builder:margin'), 
    'margin_remove_top' => $this->get('builder:margin_remove_top'), 
    'margin_remove_bottom' => $this->get('builder:margin_remove_bottom'), 
    'animation' => $this->get('builder:animation'), 
    '_parallax_button' => $this->get('builder:_parallax_button'), 
    'visibility' => $this->get('builder:visibility'), 
    'name' => $this->get('builder:name'), 
    'status' => $this->get('builder:status'), 
    'id' => $this->get('builder:id'), 
    'class' => $this->get('builder:cls'), 
    'css' => [
      'label' => 'CSS', 
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-link</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500
      ]
    ]
  ], 
  'fieldset' => [
    'default' => [
      'type' => 'tabs', 
      'fields' => [[
          'title' => 'Content', 
          'fields' => ['links.0', 'links.1', 'links.2', 'links.3', 'links.4', 'link_target']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Social Icons', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['link_style', 'icon_ratio', 'gutter']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['text_align', 'text_align_breakpoint', 'text_align_fallback', 'maxwidth', 'maxwidth_align', 'maxwidth_breakpoint', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'animation', '_parallax_button', 'visibility']
            ]]
        ], $this->get('builder:advanced')]
    ]
  ]
];
