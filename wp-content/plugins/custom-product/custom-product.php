<?php
/*
Plugin Name: Custom Product Type
*/
 
// --------------------------
// 1. Registrer ny produkttype i dropdown
add_filter( 'product_type_selector', function( $types ) {
    $types['custom'] = 'Custom product';
    return $types;
});

// --------------------------
// 2. Opret produktklasse for typen
add_action( 'init', function() {
    class WC_Product_Custom extends WC_Product {
        public function get_type() {
            return 'custom';
        }
    }
});

// --------------------------
// 3. Fortæl WooCommerce hvilken klasse der skal bruges
add_filter( 'woocommerce_product_class', function( $classname, $product_type ) {
    if ( $product_type === 'custom' ) {
        return 'WC_Product_Custom';
    }
    return $classname;
}, 10, 2);

// --------------------------
add_action( 'woocommerce_product_data_panels', 'custom_product_type_show_price' );
  
function custom_product_type_show_price() {
   wc_enqueue_js( "     
      $(document.body).on('woocommerce-product-type-change',function(event,type){
         if (type=='custom') {
            $('.general_tab').show();
            $('.pricing').show();         
         }
      });      
   " );
   global $product_object;
   if ( $product_object && 'custom' === $product_object->get_type() ) {
      wc_enqueue_js( "
         $('.general_tab').show();
         $('.pricing').show();         
      " );
   }
}
 
// Hide Other Product Data Tabs
add_filter( 'woocommerce_product_data_tabs', function( $tabs ) {
   $tabs['inventory']['class'][] = 'hide_if_custom';
   $tabs['shipping']['class'][] = 'hide_if_custom';
   $tabs['linked_product']['class'][] = 'hide_if_custom';
   $tabs['attribute']['class'][] = 'hide_if_custom';
   $tabs['advanced']['class'][] = 'hide_if_custom';
   return $tabs;
}, 9999 );
// --------------------------
// 5. Tilføj bundle-felt til admin
add_action( 'woocommerce_product_options_general_product_data', function() {
    global $post;

    echo '<div class="options_group show_if_custom">';

    $products = wc_get_products([
        'status' => 'publish',
        'limit' => -1,
        'type' => 'simple',
    ]);

$selected = get_post_meta( $post->ID, '_custom_bundle_products', true ) ?: [];

    echo '<span class="description">Vælg hvilke produkter der er en del af bundlen.</span>';


    echo '<ul id="_custom_bundle_products">';
    foreach ( $products as $product ) {
        $id = $product->get_id();
        $name = $product->get_name();
        $is_selected = in_array( $id, $selected ) ? 'checked' : '';
        ?>
        <li>
            <input type="checkbox" name="_custom_bundle_products[]" value="<?php echo esc_attr( $id ); ?>" <?php echo $is_selected; ?>>
            <?php echo esc_html( $name ); ?>
        </li>
        <?php
    }
    echo '</ul>';

    echo '</div>';
});

add_action( 'woocommerce_process_product_meta', function( $post_id ) {
    if ( isset( $_POST['_custom_bundle_products'] ) ) {
        $ids = array_map( 'intval', (array) $_POST['_custom_bundle_products'] );
        update_post_meta( $post_id, '_custom_bundle_products', $ids );
    } else {
        delete_post_meta( $post_id, '_custom_bundle_products' );
    }
});
