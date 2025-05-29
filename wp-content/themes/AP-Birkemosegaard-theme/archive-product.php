<?php get_header(); ?>
<main>
<section class="produkterForside">
  <div class="spaceBetweenforside">
    <h2>Se vores nyeste produkter</h2>
    <a href="#" class="visAlle">Se flere produkter ></a>
  </div>
  <div class="produktGrid-forside">
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