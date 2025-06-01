<?php
$product = wc_get_product(get_the_ID());
?>
<div class="custom-cart-form-div" data-product-id="<?= esc_attr($product->get_id()); ?>">
    <? 
    if(is_single()){ ?>
      <form class="custom-cart-form" method="post" enctype="multipart/form-data">
          <div class="qty-btn-wrapper">
              <button type="button" class="qty-btn minus">−</button>
              <span class="qty-display">1</span>
              <input type="hidden" name="quantity" value="1">
              <button type="button" class="qty-btn plus">+</button>
          </div>
          <input type="hidden" name="add-to-cart" value="<?= esc_attr($product->get_id()); ?>">
          <button class="btn-filled custom-add-to-cart" data-product-id="<?= esc_attr( $product->get_id() ); ?>"> 
            <span class="material-symbols-rounded btn-img-icon">add_shopping_cart</span> Tilføj til kurv
          </button>
      </form>
   <? } else { ?>
    <button class="btn-filled custom-add-to-cart" data-product-id="<?= esc_attr( $product->get_id() ); ?>"> 
      <span class="material-symbols-rounded btn-img-icon">add_shopping_cart</span> Tilføj til kurv
    </button>
    <? } ?>
</div>
