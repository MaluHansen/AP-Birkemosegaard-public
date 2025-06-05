<?php get_header(); ?>
    <main>
    <section class="error-container">
      <h1>404</h1>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/upset.png" alt="Træt agurk">
      <p>Ups! Siden du leder efter findes ikke.</p>
      <a href="<?php echo esc_url(site_url());?>" class="btn-filled">Tilbage til forsiden</a>
    </section>
    </main>
<?php get_footer(); ?>