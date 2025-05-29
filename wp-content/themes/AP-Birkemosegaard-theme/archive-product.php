<?php get_header(); ?>
<main>
<section class="products">
  <div class="product-grid">
    <?php 
    // WP_Query for produkter
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    $loop = new WP_Query($args);

    while ($loop->have_posts()) : $loop->the_post();
        get_template_part('template-parts/card', 'product');
    endwhile;

    wp_reset_postdata(); // VIGTIGT: Nulstil efter custom loop
    ?>
  </div>
</section>
</main>
<?php get_footer(); ?>