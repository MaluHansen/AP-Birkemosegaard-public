<?php
$product = wc_get_product(get_the_ID());
$bundle_ids = get_post_meta($product->get_id(), '_custom_bundle_products', true);
?>

<div class="product-detail-tabs">
    <div class="tabs">
        <button class="tab-btn active-tab" data-tab="1">Om produktet</button>
        <!-- <button class="tab-btn" data-tab="2">Næringsindhold</button>
        <button class="tab-btn" data-tab="3">Ingredienser</button> -->
    </div>
    <div class="tab-content active-tab" data-content="1">
        <?php if (!empty($bundle_ids) && is_array($bundle_ids)){ ?>
        <div class="product-bundle-list">
            <h4 class="product-h1">Denne kasse indeholder:</h4>
            <ul>
                <?php foreach ($bundle_ids as $id){
                    $bundle_product = wc_get_product($id);
                    if ($bundle_product){ ?>
                        <li><?= esc_html($bundle_product->get_name()); ?></li>
                    <?php };
                }; ?>
            </ul>
        </div>
        <?php }; ?>
    </div>
    <!-- <div class="tab-content" data-content="2">content 2</div>
    <div class="tab-content" data-content="3">content 3</div> -->
</div>