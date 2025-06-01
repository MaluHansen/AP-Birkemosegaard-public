<div class="mini-cart-wrapper">

  <?php if ( WC()->cart->is_empty() ) {?>
    <p>Din kurv er tom.</p>
    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn-fill-gron">Udforsk vores produkter</a>
  <?php } else{ ?>

<ul class="mini-cart-items">
  <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
    $product_id = $cart_item['product_id'];

    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
      $product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';
      ?>
      <li class="mini-cart-item">
        <div class="mini-cart-thumb">
          <?php echo $_product->get_image(); ?>
        </div>
        <div class="mini-cart-details">
          <p class="mini-cart-title"><?php echo $_product->get_name(); ?></p>
          <p class="mini-cart-weight"><?php echo $_product->get_attribute('pa_vaegt'); ?></p>
          <p class="mini-cart-price"><?php echo WC()->cart->get_product_price( $_product ); ?></p>

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
    <?php endif; ?>
  <?php endforeach; ?>
</ul>

<div class="mini-cart-subtotal">
  <p><strong>I alt</strong></p>
  <p class="cart-subtotal"><?php wc_cart_totals_subtotal_html(); ?></p>
</div>

<?php if ( WC()->cart->get_total( 'edit' ) < 229 ) : ?>
  <div class="mini-cart-notice">
    Minimum bestilling 229 kr.
  </div>
<?php endif; ?>

<form class="mini-cart-coupon" method="post">
  <input type="text" name="coupon_code" class="input-text" placeholder="Gavekort eller rabatkode" />
  <button type="submit" name="apply_coupon">Tilføj</button>
  <?php do_action( 'woocommerce_after_mini_cart_coupon' ); ?>
</form>

<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn-checkout">Fortsæt til bestilling</a>
<?php }; ?>
</div>
