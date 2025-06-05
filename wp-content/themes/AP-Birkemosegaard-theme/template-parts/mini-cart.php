<div class="cart-modal-content">
    <div class="cart-modal-header">
        <p>kurv</p>
        <span class="material-symbols-rounded icon-nav" id="cart-modal-close">close</span>
    </div>
    <hr class="divider">
    <div class="cart-modal-body">

      <?php if ( WC()->cart->is_empty() ) {?>
        <p>Din kurv er tom.</p>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn-fill-gron">Udforsk vores produkter</a>
      <?php } else{ ?>

      <?php get_template_part('template-parts/cards/product-mini-cart'); ?>
      
    </div>
    <div class="cart-modal-footer">
      <div class="mini-cart-subtotal">
        <p><strong>I alt</strong></p>
        <p class="cart-subtotal"><?php wc_cart_totals_subtotal_html(); ?></p>
      </div>

      <?php if ( WC()->cart->get_total( 'edit' ) < 229 ) { ?>
        <div class="mini-cart-notice">
          Minimum bestilling 229 kr.
        </div>
      <?php }; ?>

      <form class="mini-cart-coupon form-field" method="post">
        <input type="text" name="coupon_code" class="input-text" placeholder="Gavekort eller rabatkode" />
        <button type="submit" name="apply_coupon" class="btn-filled">Tilføj</button>
        <?php do_action( 'woocommerce_after_mini_cart_coupon' ); ?>
      </form>


        <a href="<?php echo esc_url( site_url('/cart') ); ?>" class="btn-filled btn-checkout">Vis kurv</a>

      <?php }; ?>
    </div>
</div>