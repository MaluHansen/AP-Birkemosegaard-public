<?php get_header(); ?>
<main>
  <div class="archive-hero">
    <h1 class="archive-heading">Opskrifter</h1>

    <!-- <input type="text" id="live-search" placeholder="Søg produkter..." autocomplete="off">
<div id="search-results"></div> -->

  </div>

  <section class="opskrifter">
    <div class="opskrift-grid">
      <?php
        $opskrifter = new WP_Query(array(
        'post_type' => 'opskrift',
        'posts_per_page' => -1
        
      ));
      while ($opskrifter -> have_posts()) {
        $opskrifter -> the_post();
        get_template_part('template-parts/cards/card', 'opskrift');
      }
      wp_reset_postdata();
      ?>
    </div> 
  </section>
    <?php 
      woocommerce_pagination();
      woocommerce_result_count();
    ?> 
</main>
<?php get_footer(); ?>