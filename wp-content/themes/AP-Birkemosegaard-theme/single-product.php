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

                <div class="oko-icons">
                    <img src="./assets/styles/ecology_eu.svg" alt="">
                    <img src="./assets/styles/ecology_dk.svg" alt="">
                    <img src="./assets/styles/demeter.svg" alt="">
                </div>
                <p class="detaljer">800 g</p>
                <p class="product-price"><?php echo $product->get_price_html(); ?></p>
                <div class="product-variants">
                    <p>Variant: <b>800g</b></p>
                    <div class="variant-btns">
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="quantity-btn">

                </div>
                <button class="btn-filled add-to-cart">Tilføj til kurv</button>

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
