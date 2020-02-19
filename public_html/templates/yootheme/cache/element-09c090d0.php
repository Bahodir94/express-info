<?php // @file /home/s/surovov/vid.uz/public_html/templates/yootheme/vendor/yootheme/builder-joomla/elements/joomla_position/element.json

return [
  '@import' => "{$file['dirname']}/element.php", 
  'name' => 'joomla_position', 
  'title' => 'J! Position', 
  'icon' => $this->get('url:images/icon.svg'), 
  'iconSmall' => $this->get('url:images/iconSmall.svg'), 
  'element' => true, 
  'defaults' => [
    'layout' => 'stack', 
    'breakpoint' => 'm'
  ], 
  'templates' => [
    'render' => "{$file['dirname']}/templates/template.php"
  ], 
  'fields' => [
    'content' => [
      'type' => 'select-position', 
      'label' => 'Position', 
      'description' => 'Select a Joomla module position that will render all published modules. It\'s recommended to use the builder-1 to -6 positions, which are not rendered elsewhere by the theme.', 
      'default' => ''
    ], 
    'layout' => [
      'type' => 'select', 
      'label' => 'Layout', 
      'description' => 'Select whether the modules should be aligned side by side or stacked above each other.', 
      'default' => 'sidebar', 
      'options' => [
        'Stacked' => 'stack', 
        'Grid' => 'grid'
      ]
    ], 
    'grid_gutter' => [
      'type' => 'select', 
      'label' => 'Gutter', 
      'description' => 'Set the grid gutter width and display dividers between grid cells.', 
      'default' => '', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large', 
        'Collapse' => 'collapse'
      ]
    ], 
    'grid_divider' => [
      'type' => 'checkbox', 
      'text' => 'Show dividers'
    ], 
    'breakpoint' => [
      'type' => 'select', 
      'label' => 'Breakpoint', 
      'description' => 'Set the breakpoint from which grid cells will stack.', 
      'options' => [
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ]
    ], 
    'vertical_align' => [
      'type' => 'checkbox', 
      'label' => 'Vertical Alignment', 
      'description' => 'Vertically center grid cells.', 
      'text' => 'Center'
    ], 
    'match' => [
      'type' => 'checkbox', 
      'label' => 'Panels', 
      'description' => 'Stretch the panel to match the height of the grid cell.', 
      'text' => 'Match height', 
      'show' => '!vertical_align'
    ], 
    'text_align' => $this->get('builder:text_align_justify'), 
    'text_align_breakpoint' => $this->get('builder:text_align_breakpoint'), 
    'text_align_fallback' => $this->get('builder:text_align_justify_fallback'), 
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
          'title' => 'Content', 
          'fields' => ['content']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'type' => 'group', 
              'label' => 'Grid', 
              'divider' => true, 
              'fields' => ['layout', 'grid_gutter', 'grid_divider', 'breakpoint', 'vertical_align', 'match']
            ], [
              'type' => 'group', 
              'label' => 'General', 
              'fields' => ['text_align', 'text_align_breakpoint', 'text_align_fallback', 'maxwidth', 'maxwidth_align', 'maxwidth_breakpoint', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'animation', '_parallax_button', 'visibility']
            ]]
        ], [
          'title' => 'Advanced', 
          'fields' => ['name', 'status', 'id', 'class', 'css']
        ]]
    ]
  ]
];
