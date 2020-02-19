<?php // @file /home/s/surovov/vid.uz/public_html/templates/yootheme/vendor/yootheme/builder/elements/divider/element.json

return [
  'name' => 'divider', 
  'title' => 'Divider', 
  'icon' => $this->get('url:images/icon.svg'), 
  'iconSmall' => $this->get('url:images/iconSmall.svg'), 
  'element' => true, 
  'width' => 500, 
  'defaults' => [
    'divider_element' => 'hr'
  ], 
  'templates' => [
    'render' => "{$file['dirname']}/templates/template.php", 
    'content' => "{$file['dirname']}/templates/content.php"
  ], 
  'fields' => [
    'divider_style' => [
      'label' => 'Style', 
      'description' => 'Choose a divider style.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'Default' => '', 
        'Icon' => 'icon', 
        'Small' => 'small', 
        'Vertical' => 'vertical'
      ]
    ], 
    'divider_element' => [
      'label' => 'HTML Element', 
      'description' => 'Choose the divider element to fit your semantic structure. Use the hr element for a thematic break and the div element for decorative reasons.', 
      'type' => 'select', 
      'options' => [
        'Hr' => 'hr', 
        'Div' => 'div'
      ]
    ], 
    'divider_align' => [
      'label' => 'Alignment', 
      'description' => 'Center, left and right alignment may depend on a breakpoint and require a fallback.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'Inherit' => '', 
        'Left' => 'left', 
        'Center' => 'center', 
        'Right' => 'right'
      ], 
      'enable' => 'divider_style == \'small\''
    ], 
    'divider_align_breakpoint' => [
      'label' => 'Alignment Breakpoint', 
      'description' => 'Define the device width from which the alignment will apply.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'divider_style == \'small\' && divider_align'
    ], 
    'divider_align_fallback' => [
      'label' => 'Alignment Fallback', 
      'description' => 'Define an alignment fallback for device widths below the breakpoint.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'Inherit' => '', 
        'Left' => 'left', 
        'Center' => 'center', 
        'Right' => 'right'
      ], 
      'enable' => 'divider_style == \'small\' && divider_align && divider_align_breakpoint'
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
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>', 
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
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Divider', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['divider_style', 'divider_element', 'divider_align', 'divider_align_breakpoint', 'divider_align_fallback']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['maxwidth', 'maxwidth_align', 'maxwidth_breakpoint', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'animation', '_parallax_button', 'visibility']
            ]]
        ], $this->get('builder:advanced')]
    ]
  ]
];
