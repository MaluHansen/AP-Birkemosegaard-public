<ul class="mini-cart-items">
<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
    $product_id = $cart_item['product_id'];

    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ){
    $product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';
    ?>
    <li class="mini-cart-item">
        <div class="mini-cart-thumb">
        <?php echo $_product->get_image(); ?>
        </div>
        <div class="mini-cart-details">
        <p class="mini-cart-title"><?php echo $_product->get_name(); ?></p>
        <p class="mini-cart-price"><?php echo WC()->cart->get_product_price( $_product ); ?></p>
        <p class="mini-cart-variation">Antal: <?php echo $cart_item['quantity']; echo wc_get_formatted_cart_item_data( $cart_item ); ?></p>

        </div>
        <div class="mini-cart-remove">
        <?php
            echo apply_filters( 'woocommerce_cart_item_remove_link',
            sprintf(
                '<a href="%s" class="remove" aria-label="%s">Fjern fra kurv</a>',
                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                __( 'Fjern dette produkt', 'woocommerce' )
            ),
            $cart_item_key );
        ?>
        </div>
    </li>
    <?php }; ?>
<?php }; ?>
</ul>