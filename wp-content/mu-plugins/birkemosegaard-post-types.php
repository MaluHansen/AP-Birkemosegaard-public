<?php
// Registrerer en ny post type kaldet "opskrift", som bruges til at oprette opskrifter på hjemmesiden. 
// Den bliver synlig i admin-menuen med eget ikon, har en arkivside og kan bruges med blok-editoren. 
// Derudover tilpasses placeholder teksten i titel feltet, så brugeren guides til at skrive opskriftens navn.
function birkemosegaard_post_types()
{
  register_post_type('opskrift', array(
    'show_in_rest' => true,
    'supports' => array(
      'title',
      'thumbnail',
      'custom-fields'
    ),
    'rewrite' => array(
      'slug' => 'opskrifter'

    ),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Opskrifter',
      'add_new_item' => 'Tilføj ny opskrift',
      'edit_item' => 'Rediger opskrift',
      'all_items' => 'Alle opskrifter',
      'singular_name' => 'Opskrift',
    ),
    'menu_icon' => 'dashicons-food'
  ));

  // Tilpasser placeholder-teksten i titel-feltet for opskrifter
  function birkemosegaard_title_placeholder($title_placeholder, $post)
  {
    if ($post->post_type === 'opskrift') {
      return 'Opskrift navn';
    }
    return $title_placeholder;
  }
  add_filter('enter_title_here', 'birkemosegaard_title_placeholder', 10, 2);
}

// Kører funktionen ved opstart, så post typen registreres korrekt
add_action('init', 'birkemosegaard_post_types');
