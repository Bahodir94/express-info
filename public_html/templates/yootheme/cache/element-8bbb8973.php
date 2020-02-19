<?php // @file /home/s/surovov/vid.uz/public_html/templates/yootheme/vendor/yootheme/builder/elements/popover_item/element.json

return [
  'name' => 'popover_item', 
  'title' => 'Item', 
  'width' => 500, 
  'placeholder' => [
    'props' => [
      'title' => 'Title', 
      'meta' => '', 
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 
      'image' => ''
    ]
  ], 
  'templates' => [
    'render' => "{$file['dirname']}/templates/template.php", 
    'content' => "{$file['dirname']}/templates/content.php"
  ], 
  'fields' => [
    'position_x' => [
      'label' => 'Left', 
      'type' => 'range', 
      'attrs' => [
        'min' => 0, 
        'max' => 100, 
        'step' => 1
      ]
    ], 
    'position_y' => [
      'label' => 'Top', 
      'type' => 'range', 
      'attrs' => [
        'min' => 0, 
        'max' => 100, 
        'step' => 1
      ]
    ], 
    'title' => [
      'label' => 'Title'
    ], 
    'meta' => [
      'label' => 'Meta'
    ], 
    'content' => [
      'label' => 'Content', 
      'type' => 'editor'
    ], 
    'image' => $this->get('builder:image'), 
    'image_alt' => [
      'label' => 'Image Alt', 
      'enable' => 'image'
    ], 
    'link' => $this->get('builder:link'), 
    'drop_position' => [
      'label' => 'Position', 
      'description' => 'Select a different position for this item.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'Default' => '', 
        'Top' => 'top-center', 
        'Bottom' => 'bottom-center', 
        'Left' => 'left-center', 
        'Right' => 'right-center'
      ]
    ]
  ], 
  'fieldset' => [
    'default' => [
      'fields' => [[
          'description' => 'Enter the horizontal and vertical position of the marker in percent.', 
          'name' => '_position', 
          'type' => 'grid', 
          'width' => '1-2', 
          'fields' => ['position_x', 'position_y']
        ], 'title', 'meta', 'content', 'image', 'image_alt', 'link', 'drop_position']
    ]
  ]
];
