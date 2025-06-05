<?php 
get_header(); 
$product = wc_get_product(get_the_ID());
?>

<main>
    <!-- Indsæt breadcrumbs template -->
    <?php get_template_part('template-parts/product-breadcrumbs'); ?>
    <?php // Tjek om produktet er i kategorien 'torsdagskassen'
    if ( has_term( 'torsdagskassen', 'product_cat', $product->get_id() ) ) {
        // Indlæs en speciel template for denne kategori
        wc_get_template_part( 'template-parts/single-products/torsdagskassen' );
        return; // Stop her, så standard ikke loader
    }?>

    <section class="product">
        <div class="product-container">
            <div class="product-img">
                <?= $product->get_image(); ?>
            </div>

            <div class="product-info-single">
                <div class="product-info-info-single">
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
                        <p class="product-price-single"><?= $product->get_price_html(); ?></p>
                        <?php get_template_part('template-parts/add-to-cart-simple'); ?>
                    </div>
                    
               <?php } ?>
            </div>
        </div>
        <div class="product-under">
            <?php // Hvis et produkt er af typen custom indsæt template
                if ($product->get_type() == 'custom') {
                    get_template_part('template-parts/single-products/custom-product');
                } else {
                    get_template_part('template-parts/single-products/product-description');
                };
            ?>

        </div>
    </section>
    <hr class="divider"> 
    <section class="related-products">
        <h2>Vi tror du vil syntes om</h2>
        <div class="related-product">
        <?php
        $current_product_id = $product->get_id();

        // Hent kategori-id'er for det aktuelle produkt
        $terms = wp_get_post_terms($current_product_id, 'product_cat', ['fields' => 'ids']);

        if (!empty($terms)) {
            $args = [
                'post_type' => 'product',
                'posts_per_page' => 3,
                'post__not_in' => [$current_product_id], // Udeluk aktuelt produkt
                'tax_query' => [
                    [
                        'taxonomy' => 'product_cat',
                        'field'    => 'term_id',
                        'terms'    => $terms,
                    ],
                ],
            ];

            $related_query = new WP_Query($args);

        
                while ($related_query->have_posts()) {
                    $related_query->the_post();
                    wc_setup_product_data(get_post());

                    set_query_var('in_card', true);
                    get_template_part('template-parts/cards/card', 'product');
                }

                wp_reset_postdata();
        
        }
        ?>
                
                </div>
    </section>
</main>

<?php get_footer(); ?>
