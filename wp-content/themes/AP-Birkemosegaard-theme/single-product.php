<?php 
get_header(); 

$product = wc_get_product(get_the_ID());
$category = get_the_terms($product->get_id(), 'product_cat')[0] ?? null;
$parentCat = $category ? get_term($category->parent, 'product_cat') : null;
?>

<main>
    <ul class="breadcrumbs-product">
        <li>
            <a href="<?= get_permalink(wc_get_page_id('shop')); ?>">Produkter</a>
            <span class="material-symbols-rounded">keyboard_arrow_right</span>
        </li>
        <?php if ($parentCat): ?>
            <li>
                <a href="<?= esc_url(get_term_link($parentCat)); ?>">
                    <?= esc_html($parentCat->name); ?>
                </a>
                <span class="material-symbols-rounded">keyboard_arrow_right</span>
            </li>
        <?php endif; ?>
        <li><?php the_title(); ?></li>
    </ul>

    <section class="product">
        <div class="product-container">
            <div class="product-img">
                <?= $product->get_image(); ?>
            </div>

            <div class="product-info">
                <?php 
                $brand = get_the_terms(get_the_ID(), 'product_brand');
                if ($brand): ?>
                    <p class="preHeader"><?= esc_html($brand[0]->name); ?></p>
                <?php endif; ?>

                <h1 class="product-h1"><?php the_title(); ?></h1>

                <?php get_template_part('template-parts/eco-marks'); ?>

                <p class="detaljer"><?= esc_html(get_field('produkt_maengde')); ?></p>

                <?php
                // Custom bundle
                if ($product->get_type() === 'custom') {
                    $bundle_ids = get_post_meta($product->get_id(), '_custom_bundle_products', true);
                    if (!empty($bundle_ids) && is_array($bundle_ids)): ?>
                        <div class="product-bundle-list">
                            <h3>Indeholder:</h3>
                            <ul>
                                <?php foreach ($bundle_ids as $id):
                                    $bundle_product = wc_get_product($id);
                                    if ($bundle_product): ?>
                                        <li><?= esc_html($bundle_product->get_name()); ?></li>
                                    <?php endif;
                                endforeach; ?>
                            </ul>
                        </div>
                    <?php endif;
                }
                ?>

                <?php if ($product->is_type('variable')){ ?>
                    <?php get_template_part('template-parts/add-to-cart-variable'); ?>
                <?php } else { ?>
                    <p class="product-price"><?= $product->get_price_html(); ?></p>
                    <?php get_template_part('template-parts/add-to-cart-simple'); } ?>
            </div>
        </div>
    </section>

    <section class="related-products">
        <h2>Vi tror du vil syntes om</h2>
    </section>
</main>

<?php get_footer(); ?>
