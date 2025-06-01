<?php 
get_header(); 
$product = wc_get_product(get_the_ID());
?>

<main>
    <!-- Indsæt breadcrumbs template -->
    <?php get_template_part('template-parts/product-breadcrumbs'); ?>
    <section class="product">
        <div class="product-container">
            <div class="product-img">
                <?= $product->get_image(); ?>
            </div>

            <div class="product-info">
                <div class="product-info-info">
                    <?php
                    // Hvis en produkt har et brand tilknyttet, echo det på siden
                    $brand = get_the_terms(get_the_ID(), 'product_brand');
                    if ($brand){ ?>
                        <p class="preHeader"><?= esc_html($brand[0]->name); ?></p>
                    <?php }; ?>

                    <h1 class="product-h1"><?php the_title(); ?></h1>

                    <!-- Indsæt økomærker template -->
                    <?php get_template_part('template-parts/eco-marks'); ?>

                    <p class="detaljer"><?= esc_html(get_field('produkt_maengde')); ?></p>
                </div>
            
                <?php    
                if ($product->is_type('variable')){
                    get_template_part('template-parts/add-to-cart-variable');
                } else { ?>
                    <div>
                        <p class="product-price"><?= $product->get_price_html(); ?></p>
                        <?php get_template_part('template-parts/add-to-cart-simple'); ?>
                    </div>
                    
               <?php } ?>
            </div>
        </div>
        <div class="product-under">
            <?php // Hvis et produkt er af typen custom indsæt template
                if ($product->get_type() == 'custom') {
                    get_template_part('template-parts/single-products/custom-product');
                }; ?>
        </div>
    </section>

    <section class="related-products">
        <h2>Vi tror du vil syntes om</h2>
    </section>
</main>

<?php get_footer(); ?>
