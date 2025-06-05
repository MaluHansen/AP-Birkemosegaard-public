<?php
$product = wc_get_product(get_the_ID());
?>
<div class="custom-cart-form-div" data-product-id="<?= esc_attr($product->get_id()); ?>">
    <? 
    if(is_single()){ ?>
<form class="custom-cart-form" method="post" enctype="multipart/form-data">
    <?php $in_card = get_query_var('in_card', false); ?>
        <?php if (!$in_card): ?>
        <?php get_template_part('template-parts/qty-btn'); ?>
    <?php endif; ?>
    <input type="hidden" name="add-to-cart" value="<?= esc_attr($product->get_id()); ?>">

    <button class="btn-filled custom-add-to-cart" data-product-id="<?= esc_attr($product->get_id()); ?>">
        <span class="material-symbols-rounded btn-img-icon">add_shopping_cart</span> Tilføj til kurv
    </button>
</form>
   <? } else { ?>

    <button class="btn-filled custom-add-to-cart btn-card" data-product-id="<?= esc_attr( $product->get_id() ); ?>"> 
      <span class="material-symbols-rounded btn-img-icon">add_shopping_cart</span> Tilføj til kurv
    </button>
    <? } ?>
</div>
