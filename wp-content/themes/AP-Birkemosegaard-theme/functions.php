<?php
function birkemosegaard_files(){
    
    // Primær font - Lato
    wp_enqueue_style('main-font', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');

    // Sekundær font - EB Garamond
    wp_enqueue_style('accent-font', 'https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap');

    // Ikoner - Google material icons
    wp_enqueue_style('icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200');

    // Css og js filer registreres i et array for ikke at skulle queue hver fil enkeltvis
    $css_files = array(
        'general-css',
        'header',
        'footer'
    );
    foreach ($css_files as $cssFileName){
        $cssFilePath = get_theme_file_uri() . '/assets/css/' . $cssFileName . '.css';

        wp_enqueue_style($cssFileName, $cssFilePath);
    };

    $js_files = array(
        'cart-modal',
        'login-popup',
        'password-visibility'
    );
    foreach ($js_files as $jsFileName){
        $jsFilePath = get_theme_file_uri() . '/assets/js/' . $jsFileName . '.js';

        wp_enqueue_script($jsFileName, $jsFilePath, array(), null, true);
    };
}
add_action('wp_enqueue_scripts', 'birkemosegaard_files');

function theme_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'theme_features');






