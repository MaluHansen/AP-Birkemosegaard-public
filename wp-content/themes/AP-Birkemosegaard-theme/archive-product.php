<?php get_header(); ?>
<main>


    

    <?php while ( have_posts() ) : the_post(); global $product; ?>
        <div class="shop-produkt-card">
            <a href="<?php the_permalink(); ?>">
                <?php echo woocommerce_get_product_thumbnail(); ?>
            </a>
        </div>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>