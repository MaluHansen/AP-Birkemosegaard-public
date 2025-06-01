<div class="mini-cart-wrapper">

  <?php if ( WC()->cart->is_empty() ) : ?>
    <p>Din kurv er tom.</p>
    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn-fill-gron">Udforsk vores produkter</a>

  <?php else : ?>
    <div class="mini-cart-items">
      <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
        $_product = $cart_item['data'];
        $product_id = $cart_item['product_id'];
        $quantity = $cart_item['quantity'];
        $product_price = WC()->cart->get_product_price( $_product );
        $product_image = $_product->get_image( 'thumbnail' );
        $product_name  = $_product->get_name();
        $product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';
      ?>
      <div class="mini-cart-item">
        <div class="item-image"><?php echo $product_image; ?></div>
        <div class="item-details">
          <p class="item-name"><?php echo esc_html( $product_name ); ?></p>
          <p class="item-price"><?php echo $product_price; ?></p>
          <p>x <?php echo $quantity; ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="mini-cart-footer">
      <p><strong>Total:</strong> <?php echo WC()->cart->get_cart_total(); ?></p>
      <a href="<?php echo wc_get_checkout_url(); ?>" class="checkout-btn">Fortsæt til bestilling</a>
    </div>
  <?php endif; ?>
</div>
