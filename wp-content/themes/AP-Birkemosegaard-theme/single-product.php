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

                <p class="product-price"><?php echo $product->get_price_html(); ?></p>

                <?php  if ($product->is_type('variable')){ ?>
                    <div class="product-variants">
                        <p>Variant: <b>800g</b></p>
                        <div class="variant-btns">
                            <div></div>
                            <div></div>
                        </div>
                    </div>
               <?php } ?>
                
<!-- Tilføj til kurv-formular -->
<form class="custom-cart-form cart" method="post" enctype="multipart/form-data">
    
    <!-- Wrapper omkring quantity og knapper -->
    <div class="quantity-wrapper">
        
        <!-- Minus-knap (styres med JS) -->
        <button type="button" class="qty-btn minus">−</button>
        
        <!-- Synlig mængde (kun visning, ikke indsendt til WooCommerce) -->
        <span class="qty-display">1</span>
        
        <!-- Skjult input der sender mængde til WooCommerce -->
        <input type="hidden" name="quantity" value="1">
        <!-- ⚠️ VIGTIGT: 'name="quantity"' SKAL være præcis dette navn -->

        <!-- Plus-knap (styres med JS) -->
        <button type="button" class="qty-btn plus">+</button>
    </div>

    <!-- Selve "Tilføj til kurv"-knappen -->
    <button type="submit" 
            name="add-to-cart" 
            value="<?php echo esc_attr( $product->get_id() ); ?>" 
            class="custom-add-to-cart-button">
        Tilføj til kurv
    </button>
    <!-- ⚠️ VIGTIGT: 'name="add-to-cart"' SKAL hedde det her for WooCommerce -->

</form>




               

            </div>
        </div>
        
        <!-- <div class="product-detail-tabs">
            <div class="tabs">
                <button class="tab-btn active-tab" data-tab="1">Om produktet</button>
                <button class="tab-btn" data-tab="2">Næringsindhold</button>
                <button class="tab-btn" data-tab="3">Ingredienser</button>
            </div>
                <div class="tab-content active-tab" data-content="1">content 1</div>
                <div class="tab-content" data-content="2">content 2</div>
                <div class="tab-content" data-content="3">content 3</div>
            
        </div> -->
        <!-- <hr> -->
    </section>
    <section class="related-products">
        <h2>Vi tror du vil syntes om</h2>
    </section>
</main>
<?php get_footer(); ?>
