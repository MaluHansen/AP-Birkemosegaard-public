<?php 
get_header(); 
$product = wc_get_product( get_the_ID() );
$category = get_the_terms( $product->get_id(), 'product_cat' )[0];
$parentCat = get_term( $category->parent, 'product_cat' );
?>
<main>
    <ul class="breadcrumbs-product">
        <li>
            <a href="<?php echo get_permalink( wc_get_page_id('shop') ); ?>">Produkter</a>
            <span class="material-symbols-rounded">keyboard_arrow_right</span>
        </li>
        <li>
            <a href="<?php echo esc_url( get_term_link($parentCat) ); ?>">
                <?php echo esc_html( $parentCat->name ); ?>
            </a>
            <span class="material-symbols-rounded">keyboard_arrow_right</span>
        </li>
        <li><?php the_title(); ?></li>
    </ul>

    <section class="product">
        <div class="product-container">
            <div class="product-img">
                <?php echo $product->get_image(); ?>
            </div>
            <div class="product-info">
                <?php $brand = get_the_terms( get_the_ID(), 'product_brand' );
                if($brand) {?>
                <p class="preHeader"><?php echo esc_html( $brand[0]->name ); ?></p>
                <?php } ?>

                <h1 class="product-h1"><?php the_title(); ?></h1>

                <?php
                $eco_marks = get_the_terms( get_the_ID(), 'oko-maerke' );

                if ( $eco_marks && ! is_wp_error( $eco_marks ) ) : ?>
                    <div class="oko-icons">
                    <?php foreach ( $eco_marks as $mark ) {
                        $icon = get_field('eco_icon', 'oko-maerke_' . $mark->term_id);
                        if ( $icon ) {
                            echo '<img src="' . esc_url($icon['url']) . '" alt="' . esc_attr($mark->name) . '">';
                        } else {
                            echo '<span>' . esc_html($mark->name) . '</span>';
                        }
                    }
                    echo '</div>';
                endif;
                ?>
               
                <p class="detaljer"><?php echo esc_html( get_field('produkt_maengde') ); ?></p>

                <?php if ( ! $product->is_type('variable')) { ?>
                <p class="product-price"><?php echo $product->get_price_html(); ?></p>
                    <div class="qty-btn-wrapper">
                        <button type="button" class="qty-btn minus">−</button>
                        <span class="qty-display">1</span>
                        <input type="hidden" name="quantity" value="1">
                        <button type="button" class="qty-btn plus">+</button>
                    </div>
                    <a href="?add-to-cart=<?php echo esc_attr( $product->get_id() ); ?>"
                        data-quantity="1"
                        class="btn-filled ajax_add_to_cart add_to_cart_button"
                        data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"
                        data-product_sku="<?php echo esc_attr( $product->get_sku() ); ?>"
                        aria-label="<?php echo esc_attr( $product->add_to_cart_description() ); ?>"
                        rel="nofollow">
                        Tilføj til kurv
                    </a>
               <?php }; ?>

                <?php if ($product->is_type('variable')) {
                    $available_variations = $product->get_available_variations();
                    ?>
                    <div class="selected-price">
                        <p class="vaegt-pris"><?php echo wc_price($product->get_price()); ?></p>
                    </div>

                    <p class="vaegt-label">Variant: <span class="selected-vaegt"></span></p>

                    <div class="variant-btns">
                        <?php foreach ($available_variations as $variation) {
                            $variation_id = $variation['variation_id'];
                            $variation_obj = wc_get_product($variation_id);
                            $vaegt = $variation_obj->get_attribute('pa_vaegt');
                            $pris = wc_price($variation_obj->get_price());
                            $image_url = wp_get_attachment_image_url($variation_obj->get_image_id());
                            ?>
                            <button class="variation-button"
                                    style="background-image: url('<?php echo esc_url($image_url); ?>');"
                                    data-variation-id="<?php echo esc_attr($variation_id); ?>"
                                    data-vaegt="<?php echo esc_attr($vaegt); ?>"
                                    data-price="<?php echo esc_attr($pris); ?>">
                            </button>
                        <?php } ?>
                    </div>
                    <form class="cart custom-cart-form" method="post" enctype="multipart/form-data">
                    <div class="qty-btn-wrapper">
                        <button type="button" class="qty-btn minus">−</button>
                        <span class="qty-display">1</span>
                        <input type="hidden" name="quantity" value="1">
                        <button type="button" class="qty-btn plus">+</button>
                    </div>

                    <input type="hidden" name="add-to-cart" value="<?php echo ($product->get_id()); ?>">
                    <input type="hidden" name="variation_id" class="variation_id" value="">
                    <input type="hidden" name="variation[pa_vaegt]" class="selected_vaegt_input" value="">

                    <button type="submit" class="cart-btn btn-filled">Tilføj variant til kurv</button>
                </form>
                <?php } ?>



               

               

            </div>
        </div>

    </section>
    <section class="related-products">
        <h2>Vi tror du vil syntes om</h2>
    </section>

    
</main>
<?php get_footer(); ?>
