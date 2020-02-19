<?php // @file /home/s/surovov/vid.uz/public_html/templates/yootheme/vendor/yootheme/builder/elements/gallery_item/element.json

return [
  '@import' => "{$file['dirname']}/element.php", 
  'name' => 'gallery_item', 
  'title' => 'Item', 
  'width' => 500, 
  'placeholder' => [
    'props' => [
      'title' => 'Title', 
      'meta' => '', 
      'content' => '', 
      'image' => '', 
      'hover_image' => ''
    ]
  ], 
  'templates' => [
    'render' => "{$file['dirname']}/templates/template.php", 
    'content' => "{$file['dirname']}/templates/content.php"
  ], 
  'fields' => [
    'image' => $this->get('builder:image'), 
    'image_alt' => [
      'label' => 'Image Alt', 
      'enable' => 'image'
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
    'link' => $this->get('builder:link'), 
    'hover_image' => [
      'label' => 'Hover Image', 
      'description' => 'Select an optional image that appears on hover.', 
      'type' => 'image'
    ], 
    'text_color' => [
      'label' => 'Text Color', 
      'description' => 'Set light or dark color mode for text, buttons and controls.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'Default' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ]
    ], 
    'text_color_hover' => [
      'type' => 'checkbox', 
      'text' => 'Inverse the text color on hover'
    ], 
    'tags' => [
      'label' => 'Tags', 
      'description' => 'Enter a comma-separated list of tags, for example, <code>blue, white, black</code>.'
    ]
  ], 
  'fieldset' => [
    'default' => [
      'fields' => ['image', 'image_alt', 'title', 'meta', 'content', 'link', 'hover_image', 'text_color', 'text_color_hover', 'tags']
    ]
  ]
];
