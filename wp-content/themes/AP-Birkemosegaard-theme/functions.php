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
        'archive',
        'cart',
        'test',
        'index'
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
        'update-quantity',
        'test',
        'archive'
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

add_filter('woocommerce_add_to_cart_fragments', function($fragments) {
    ob_start();
    ?>
    <span class="cart-count cart-contents">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
    <?php
    $fragments['.cart-contents'] = ob_get_clean();
    unset($fragments['a.added_to_cart']);
    unset($fragments['div.woocommerce-message']);
    return $fragments;
});



add_filter('loop_shop_per_page', function(){
    return -1; // Ændr dette tal til det ønskede antal
});

add_filter('woocommerce_catalog_orderby', 'custom_catalog_orderby');
function custom_catalog_orderby($sortby) {
    // Fjern uønskede og tilføj egne muligheder
    $sortby = array(
        'menu_order' => 'Sorter efter',
        'popularity' => 'Mest populære',
        'date'       => 'Nyeste',
        'price'      => 'Pris: Lav til høj',
        'price-desc' => 'Pris: Høj til lav',
    );
    return $sortby;
}


add_action('woocommerce_product_query', function($query) {
  $tax_query = $query->get('tax_query') ?: [];

  // Kategori
  if (!empty($_GET['fcat']) && is_array($_GET['fcat'])) {
    $tax_query[] = [
      'taxonomy' => 'product_cat',
      'field'    => 'slug',
      'terms'    => array_map('sanitize_text_field', $_GET['fcat']),
      'operator' => 'IN',
    ];
  }

  // Brand
  if (!empty($_GET['fbrand']) && is_array($_GET['fbrand'])) {
    $tax_query[] = [
      'taxonomy' => 'product_brand',
      'field'    => 'slug',
      'terms'    => array_map('sanitize_text_field', $_GET['fbrand']),
      'operator' => 'IN',
    ];
  }

  // Øko-mærke
  if (!empty($_GET['foko']) && is_array($_GET['foko'])) {
    $tax_query[] = [
      'taxonomy' => 'oko-maerke',
      'field'    => 'slug',
      'terms'    => array_map('sanitize_text_field', $_GET['foko']),
      'operator' => 'IN',
    ];
  }

  if (!empty($tax_query)) {
    $query->set('tax_query', $tax_query);
  }
});

