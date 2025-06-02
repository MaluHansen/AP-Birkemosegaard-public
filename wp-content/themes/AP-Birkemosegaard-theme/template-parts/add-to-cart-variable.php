<?php
$product = wc_get_product(get_the_ID());
$available_variations = $product->get_available_variations();
?>
<div class="selected-price">
    <p class="vaegt-pris"><?= wc_price($product->get_price()); ?></p>
</div>
<div class="variant-btns">
    <p class="vaegt-label">Variant: <span class="selected-vaegt"></span></p>
    <?php foreach ($available_variations as $variation){
        $variation_id = $variation['variation_id'];
        $variation_obj = wc_get_product($variation_id);
        $vaegt = $variation_obj->get_attribute('pa_vaegt');
        $pris = wc_price($variation_obj->get_price());
        $image_url = wp_get_attachment_image_url($variation_obj->get_image_id());
        ?>
        <button class="variation-button"
                style="background-image: url('<?= esc_url($image_url); ?>');"
                data-variation-id="<?= esc_attr($variation_id); ?>"
                data-vaegt="<?= esc_attr($vaegt); ?>"
                data-price="<?= esc_attr($pris); ?>">
        </button>
    <?php }; ?>

    <div class="variant-error-message">
        <span class="material-symbols-rounded error-icon">error</span>
        <p>Vælg venligst en variant</p>
    </div>
</div>

<form class="custom-cart-form variable" method="post" enctype="multipart/form-data">
    <?php get_template_part('template-parts/qty-btn'); ?>
    <input type="hidden" name="add-to-cart" value="<?= esc_attr($product->get_id()); ?>">
    <input type="hidden" name="variation_id" class="variation_id" value="">
    <input type="hidden" name="variation[pa_vaegt]" class="selected_vaegt_input" value="">
    <button class="btn-filled custom-add-to-cart" data-product-id="<?= esc_attr($product->get_id()); ?>">
        <span class="material-symbols-rounded btn-img-icon">add_shopping_cart</span> Tilføj til kurv
    </button>
</form>
