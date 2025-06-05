<?php
// Henter det aktuelle produkt baseret på sidens id
$product = wc_get_product(get_the_ID());

// Henter listen af bundle-produkt-ID’er fra post meta (valgt i admin)
$bundle_ids = get_post_meta($product->get_id(), '_custom_bundle_products', true);
?>

<div class="product-detail-tabs">
    <div class="tabs">

        <button class="tab-btn active-tab" data-tab="1">Om produktet</button>
    </div>

    <div class="tab-content active-tab" data-content="1">
        <?php 
        // Hvis der findes bundle-produkter, og det er et array
        if (!empty($bundle_ids) && is_array($bundle_ids)) { ?>
        
        <div class="product-bundle-list">
            <h4 class="product-h1">Denne kasse indeholder:</h4>
            <ul>
                <?php 
                // Gennemgår hvert produkt-ID i bundlen
                foreach ($bundle_ids as $id) {
                    // Henter det enkelte produkt ud fra ID
                    $bundle_product = wc_get_product($id);
                    
                    // Viser de valgte produkter på grænsefladen
                    if ($bundle_product) { ?>
                        <li><?= esc_html($bundle_product->get_name()); ?></li>
                    <?php }
                } ?>
            </ul>
        </div>

        <?php } ?>
    </div>
</div>
