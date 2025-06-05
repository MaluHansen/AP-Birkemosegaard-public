<?php
function birkemosegaard_files()
{

  // Primær font - Lato
  wp_enqueue_style('main-font', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');

  // Sekundær font - EB Garamond
  wp_enqueue_style('accent-font', 'https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap');

  // Ikoner - Google material icons
  wp_enqueue_style('icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200');

  // Ikoner - Font Awesome icons
  wp_enqueue_style('fa-icons', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css");

  // Swiper scripts fra swiper.js Kilde: https://swiperjs.com/
  wp_enqueue_style('swiperJs-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
  wp_enqueue_script('swiperJs-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js');

  // Map fra leaflet Kilde: https://leafletjs.com/
  wp_enqueue_script('map', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js');
  wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css');

  // Css og js filer registreres i et array for ikke at skulle queue hver fil enkeltvis
  $css_files = array(
    'general-css',
    'header',
    'footer',
    'pages/single-product',
    'pages/single-opskrift',
    'cards',
    'pages/archive',
    'cart',
    'pages/index',
    'media-queries',
    'pages/om-gaarden',
    'pages/handelsbetingelser',
    'pages/kontakt',
    'pages/levering',
    'pages/restaurant',
    'pages/b2b',
    'pages/404',
    'pages/profil'
  );
  foreach ($css_files as $cssFileName) {
    $cssFilePath = get_theme_file_uri() . '/assets/css/' . $cssFileName . '.css';

    wp_enqueue_style($cssFileName, $cssFilePath);
  };

  $js_files = array(
    'cart-modal',
    'login-popup',
    'password-visibility',
    'product-tabs',
    'variable-product',
    'add-to-cart',
    'archive',
    'heart-icon',
    'parts',
    'search',
    'levering',
    'fly-to-cart',
    'profil'
  );
  foreach ($js_files as $jsFileName) {
    $jsFilePath = get_theme_file_uri() . '/assets/js/' . $jsFileName . '.js';

    wp_enqueue_script($jsFileName, $jsFilePath, array(), null, true);
  };
}
add_action('wp_enqueue_scripts', 'birkemosegaard_files');


// Tilføjer understøttelse af forskellige tema funktioner
function theme_features()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'theme_features');



function mit_tema_woocommerce_support()
{
  // Sikrer at WooCommerce's egne scripts til kurv og variationer indlæses
  if (class_exists('WooCommerce')) {
    wp_enqueue_script('wc-add-to-cart');
    wp_enqueue_script('wc-cart-fragments');
    wp_enqueue_script('woocommerce');
    wp_enqueue_script('wc-add-to-cart-variation');
  }
}
add_action('wp_enqueue_scripts', 'mit_tema_woocommerce_support');

// Tilpasser opdatering af kurvikon (antal produkter) via AJAX
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
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


// Sætter antal produkter der vises på shoppens arkivside
add_filter('loop_shop_per_page', function () {
  return 20; // Antal viste produkter
});

// Viser nyeste produkter først som standard i sorterings-dropdown
add_filter('woocommerce_default_catalog_orderby', 'custom_default_catalog_orderby');
function custom_default_catalog_orderby($default)
{
  return 'date'; // 'date' viser nyeste produkter først
}

// Overskriver standard sorteringsmuligheder i WooCommerce
add_filter('woocommerce_catalog_orderby', 'custom_catalog_orderby');
function custom_catalog_orderby($sortby)
{
  $sortby = array(
    'date' => 'Nyeste først',
    'popularity' => 'Mest populære',
    'price'      => 'Pris: Lav til høj',
    'price-desc' => 'Pris: Høj til lav',
  );
  return $sortby;
}



// Tilføjer dynamisk filtrering til WooCommerce produkter baseret på brugerens filtervalg i URL'en (GET-parametre)
add_action('woocommerce_product_query', function ($query) {
  // Henter eksisterende tax_query fra forespørgslen, eller opretter en tom array hvis den ikke findes
  $tax_query = $query->get('tax_query') ?: [];

  // Hvis brugeren har valgt en eller flere produktkategorier (fcat), tilføjes et filter for det
  if (!empty($_GET['fcat']) && is_array($_GET['fcat'])) {
    $tax_query[] = [
      'taxonomy' => 'product_cat', // Filtrerer på WooCommerce's produktkategorier
      'field'    => 'slug',        // Matcher på slug (det som checkboxen sender)
      'terms'    => array_map('sanitize_text_field', $_GET['fcat']), // Renser input
      'operator' => 'IN',          // Viser produkter som matcher en eller flere af de valgte kategorier
    ];
  }

  // Samme logik for brand-filteret (custom taxonomy: product_brand)
  if (!empty($_GET['fbrand']) && is_array($_GET['fbrand'])) {
    $tax_query[] = [
      'taxonomy' => 'product_brand',
      'field'    => 'slug',
      'terms'    => array_map('sanitize_text_field', $_GET['fbrand']),
      'operator' => 'IN',
    ];
  }

  // Samme logik for øko-mærke-filteret (custom taxonomy: oko-maerke)
  if (!empty($_GET['foko']) && is_array($_GET['foko'])) {
    $tax_query[] = [
      'taxonomy' => 'oko-maerke',
      'field'    => 'slug',
      'terms'    => array_map('sanitize_text_field', $_GET['foko']),
      'operator' => 'IN',
    ];
  }

  // Hvis der er blevet opbygget et eller flere filtre, tilføjes de til forespørgslen
  if (!empty($tax_query)) {
    $query->set('tax_query', $tax_query);
  }
});

// AJAX live søgefunktion til produktnavne
add_action('wp_ajax_live_search', 'custom_live_search');
add_action('wp_ajax_nopriv_live_search', 'custom_live_search');

function custom_live_search()
{
  $query = sanitize_text_field($_GET['query'] ?? '');

  $args = [
    'post_type' => ['product'],
    's' => $query,
    'posts_per_page' => 5,
  ];

  $search = new WP_Query($args);

  $results = [];

  if ($search->have_posts()) {
    while ($search->have_posts()) {
      $search->the_post();
      $results[] = [
        'title' => get_the_title(),
        'link' => get_permalink(),
      ];
    }
  }

  wp_reset_postdata();
  wp_send_json($results); // Sender data tilbage som JSON til JavaScript
}
