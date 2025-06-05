<?php
/*
Plugin Name: Custom Product Type
*/

// Tilføjer en ny produkttype til WooCommerce produktvælgeren i adminpanelet
add_filter( 'product_type_selector', function( $types ) {
    $types['custom'] = 'Custom product'; // Tilføjer 'custom' som en ny type
    return $types;
});

// Registrerer en ny produktklasse til den brugerdefinerede produkttype
add_action( 'init', function() {
    class WC_Product_Custom extends WC_Product {
        // Definerer produktets type som 'custom'
        public function get_type() {
            return 'custom';
        }
    }
});

// Fortæller WooCommerce, hvilken PHP-klasse der skal bruges for produkttypen 'custom'
add_filter( 'woocommerce_product_class', function( $classname, $product_type ) {
    if ( $product_type === 'custom' ) {
        return 'WC_Product_Custom';
    }
    return $classname;
}, 10, 2);

// Viser faner og felter i admin-panelet for produkttypen 'custom'
add_action( 'woocommerce_product_data_panels', 'custom_product_type_show_price' );
function custom_product_type_show_price() {
    // Når produkttypen ændres via dropdown i admin, vis fanen "General" og "Pricing" hvis det er 'custom'
    wc_enqueue_js( "     
        $(document.body).on('woocommerce-product-type-change',function(event,type){
            if (type=='custom') {
                $('.general_tab').show();
                $('.pricing').show();         
            }
        });      
    " );

    // Sikrer at fanerne er synlige ved indlæsning
    global $product_object;
    if ( $product_object && 'custom' === $product_object->get_type() ) {
        wc_enqueue_js( "
            $('.general_tab').show();
            $('.pricing').show();         
        " );
    }
}

// Skjuler WooCommerce-standardfaner for den brugerdefinerede produkttype
add_filter( 'woocommerce_product_data_tabs', function( $tabs ) {
    $tabs['inventory']['class'][] = 'hide_if_custom'; 
    $tabs['shipping']['class'][] = 'hide_if_custom';        
    $tabs['linked_product']['class'][] = 'hide_if_custom';   
    $tabs['attribute']['class'][] = 'hide_if_custom';       
    $tabs['advanced']['class'][] = 'hide_if_custom';         
    return $tabs;
}, 9999 );

// Tilføjer mulighed i admin til at vælge simple produkter, som skal indgå i en bundle
add_action( 'woocommerce_product_options_general_product_data', function() {
    global $post;

    echo '<div class="options_group show_if_custom">'; // Kun synlig hvis produkttypen er 'custom'

    // Henter alle simple produkter
    $products = wc_get_products([
        'status' => 'publish',
        'limit' => -1,
        'type' => 'simple',
    ]);

    // Henter tidligere gemt valg fra metadata
    $selected = get_post_meta( $post->ID, '_custom_bundle_products', true ) ?: [];

    echo '<span class="description">Vælg hvilke produkter der er en del af bundlen.</span>';

    // Genererer tjekbokse for hvert simpelt produkt
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

// Gemmer de valgte bundle-produkter som post meta når produktet gemmes
add_action( 'woocommerce_process_product_meta', function( $post_id ) {
    if ( isset( $_POST['_custom_bundle_products'] ) ) {
        $ids = array_map( 'intval', (array) $_POST['_custom_bundle_products'] ); // Sikrer, at værdierne er integers
        update_post_meta( $post_id, '_custom_bundle_products', $ids ); // Gemmer data
    } else {
        delete_post_meta( $post_id, '_custom_bundle_products' ); // Fjerner tidligere data, hvis ingen er valgt
    }
});
