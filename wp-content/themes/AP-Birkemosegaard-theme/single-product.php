<?php
get_header();

// Hent produktobjektet for den aktuelle produktside
defined('ABSPATH') || exit;
$product = wc_get_product(get_the_ID());
?>

<main>
    <!-- Indsæt breadcrumbs template for at vise navigation over produkthierarki -->
    <?php get_template_part('template-parts/product-breadcrumbs'); ?>

    <?php
    // Hvis produktet er i kategorien 'torsdagskassen', bruges en speciel skabelon og resten springes over
    if (has_term('torsdagskassen', 'product_cat', $product->get_id())) {
        wc_get_template_part('template-parts/single-products/torsdagskassen');
        return; // Stop loaderen af resten af standardskabelonen
    }
    ?>

    <section class="product">
        <div class="product-container">
            <div class="product-img">
                <?= $product->get_image(); // Vis produktets billede 
                ?>
            </div>

            <div class="product-info-single">
                <div class="product-info-info-single">
                    <?php
                    // Hent produktets brand (custom taxonomi) og vis det, hvis det findes
                    $brand = get_the_terms(get_the_ID(), 'product_brand');
                    if ($brand) { ?>
                        <p class="preHeader"><?= esc_html($brand[0]->name); ?></p>
                    <?php }; ?>

                    <h1 class="product-h1"><?php the_title(); // Vis produkttitel 
                                            ?></h1>

                    <!-- Indsæt skabelon til visning af øko-mærker -->
                    <?php get_template_part('template-parts/eco-marks'); ?>

                    <p class="detaljer"><?= esc_html(get_field('produkt_maengde')); // Vis mængde (ACF-felt) 
                                        ?></p>
                </div>

                <?php
                // Skift visning afhængigt af produkttype (variabel eller simpelt produkt)
                if ($product->is_type('variable')) {
                    get_template_part('template-parts/add-to-cart-variable');
                } else { ?>
                    <div>
                        <p class="product-price-single"><?= $product->get_price_html(); // Vis pris 
                                                        ?></p>
                        <?php get_template_part('template-parts/add-to-cart-simple'); // Vis tilføj til kurv 
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="product-under">
            <?php
            // Hvis produktet har typen "custom", brug særlig produktbeskrivelse, ellers brug standard
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

            // Hent de kategorier produktet tilhører (ID'er)
            $terms = wp_get_post_terms($current_product_id, 'product_cat', ['fields' => 'ids']);

            if (!empty($terms)) {
                // Opsæt WP_Query for at hente 3 andre produkter fra samme kategori
                $args = [
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'post__not_in' => [$current_product_id], // Ekskluder det aktuelle produkt
                    'tax_query' => [
                        [
                            'taxonomy' => 'product_cat',
                            'field'    => 'term_id',
                            'terms'    => $terms,
                        ],
                    ],
                ];

                $related_query = new WP_Query($args);

                // Loop gennem relaterede produkter og vis dem som produktkort
                while ($related_query->have_posts()) {
                    $related_query->the_post();
                    wc_setup_product_data(get_post());

                    // Sætter en variabel som bruges i kort-template til at ændre layout (fx prisvisning)
                    set_query_var('in_card', true);
                    get_template_part('template-parts/cards/card', 'product');
                }

                // Nulstil global postdata
                wp_reset_postdata();
            }
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>