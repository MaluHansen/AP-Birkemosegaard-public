<?php
 
function birkemosegaard_post_types() {
  // Opskrifter post type
  register_post_type('opskrift', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor'),
    'rewrite' => array('slug' => 'opskrifter'),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Opskrifter',
      'add_new_item' => 'Tilføj ny opskrift',
      'edit_item' => 'Rediger opskrift',
      'all_items' => 'Alle opskrifter',
      'singular_name' => 'Opskrift'
    ),
    'menu_icon' => 'dashicons-food'
  ));
  
}
 
add_action('init', 'birkemosegaard_post_types');