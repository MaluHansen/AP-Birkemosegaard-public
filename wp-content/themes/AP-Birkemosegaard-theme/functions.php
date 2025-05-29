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
        'footer',
        'single-product',
        'cards',
        'archive'
    );
    foreach ($css_files as $cssFileName){
        $cssFilePath = get_theme_file_uri() . '/assets/css/' . $cssFileName . '.css';

        wp_enqueue_style($cssFileName, $cssFilePath);
    };

    $js_files = array(
        'cart-modal',
        'login-popup',
        'password-visibility',
        'product-tabs',
        'variable-product',
        'update-quantity'
    );
    foreach ($js_files as $jsFileName){
        $jsFilePath = get_theme_file_uri() . '/assets/js/' . $jsFileName . '.js';

        wp_enqueue_script($jsFileName, $jsFilePath, array(), null, true);
    };

}
add_action('wp_enqueue_scripts', 'birkemosegaard_files');
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


function theme_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    
}
add_action('after_setup_theme', 'theme_features');


add_theme_support('woocommerce');
function mit_tema_woocommerce_support() {
    // WooCommerce scripts
    if (class_exists('WooCommerce')) {
        wp_enqueue_script('wc-add-to-cart');
        wp_enqueue_script('wc-cart-fragments');
        wp_enqueue_script('woocommerce');
        wp_enqueue_script('wc-add-to-cart-variation');
    }
}
add_action('wp_enqueue_scripts', 'mit_tema_woocommerce_support');

add_filter('woocommerce_add_to_cart_fragments', 'opdater_kurv_ikon');

function opdater_kurv_ikon($fragments) {
    ob_start(); ?>
    <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="Se kurv">
        <?php echo WC()->cart->get_cart_contents_count(); ?> varer - <?php echo WC()->cart->get_cart_total(); ?>
    </a>
    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}


