<?php // @file /home/s/surovov/vid.uz/public_html/templates/yootheme/vendor/yootheme/builder/elements/map_marker/element.json

return [
  'name' => 'map_marker', 
  'title' => 'Marker', 
  'width' => 500, 
  'templates' => [
    'render' => "{$file['dirname']}/templates/template.php", 
    'content' => "{$file['dirname']}/templates/content.php"
  ], 
  'fields' => [
    'location' => [
      'label' => 'Location', 
      'type' => 'location'
    ], 
    'title' => [
      'label' => 'Title', 
      'description' => ''
    ], 
    'content' => [
      'label' => 'Content', 
      'description' => 'Click the marker to open the popup content.', 
      'type' => 'editor'
    ], 
    'hide' => [
      'label' => 'Settings', 
      'type' => 'checkbox', 
      'text' => 'Hide marker'
    ], 
    'show_popup' => [
      'type' => 'checkbox', 
      'text' => 'Show popup on load'
    ]
  ], 
  'fieldset' => [
    'default' => [
      'fields' => ['location', 'title', 'content', 'hide', 'show_popup']
    ]
  ]
];
