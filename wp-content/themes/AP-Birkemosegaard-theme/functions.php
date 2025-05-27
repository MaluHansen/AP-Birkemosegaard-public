<?php
function birkemosegaard_files(){
    add_theme_support('title-tag');
    // Main stylesheet
    wp_enqueue_style('theme_main_styles', get_theme_file_uri('/assets/style/main-css.css'));

    // Primær font - Lato
    wp_enqueue_style('main-font', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');

    // Sekundær font - EB Garamond
    wp_enqueue_style('accent-font', 'https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap');
}
add_action('wp_enqueue_scripts', 'birkemosegaard_files');

function theme_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'theme_features');