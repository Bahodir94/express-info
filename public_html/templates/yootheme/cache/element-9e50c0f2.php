<?php // @file /home/s/surovov/vid.uz/public_html/templates/yootheme/vendor/yootheme/builder/elements/alert/element.json

return [
  'name' => 'alert', 
  'title' => 'Alert', 
  'icon' => $this->get('url:images/icon.svg'), 
  'iconSmall' => $this->get('url:images/iconSmall.svg'), 
  'element' => true, 
  'width' => 500, 
  'placeholder' => [
    'props' => [
      'title' => '', 
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
    ]
  ], 
  'templates' => [
    'render' => "{$file['dirname']}/templates/template.php", 
    'content' => "{$file['dirname']}/templates/content.php"
  ], 
  'fields' => [
    'title' => [
      'label' => 'Title'
    ], 
    'content' => [
      'label' => 'Content', 
      'type' => 'editor'
    ], 
    'alert_style' => [
      'label' => 'Style', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'Default' => '', 
        'Primary' => 'primary', 
        'Success' => 'success', 
        'Warning' => 'warning', 
        'Danger' => 'danger'
      ]
    ], 
    'alert_size' => [
      'type' => 'checkbox', 
      'text' => 'Larger padding'
    ], 
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
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-title</code>, <code>.el-content</code>', 
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
          'fields' => ['title', 'content']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Alert', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['alert_style', 'alert_size']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['maxwidth', 'maxwidth_align', 'maxwidth_breakpoint', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'animation', '_parallax_button', 'visibility']
            ]]
        ], $this->get('builder:advanced')]
    ]
  ]
];
