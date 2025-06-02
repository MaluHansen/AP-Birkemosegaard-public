<?php $product = wc_get_product( get_the_ID() );?>

<div class="card">
  
  <a class="card-wrapper" href="<?php the_permalink(); ?>">
    
    <div class="card-img">
      <?php     
      // Hent WC_DateTime-objekt for produktets oprettelsesdato
      $created_date = $product->get_date_created(); 
          // Hvis produktet er oprettet inden for den sidste uge vis badge
        if ($created_date->getTimestamp() >= strtotime( '-1 week' ) ) {
        echo '<span class="badge">Nyhed</span>'; 
        }?>

      <?php echo $product->get_image(); ?>
    </div>
    
    <div class="card-content">
      <div class="card-content-wrapper">
          <h3 class="card-heading"><?php echo $product->get_name(); ?></h3>
          <span class="material-symbols-rounded heart-icon">favorite</span>
      </div>

    <div class="oko-icons-card">
      <?php get_template_part('template-parts/eco-marks'); ?>
    </div>
    
    <p class="detaljer-card"><?php echo esc_html( get_field('produkt_maengde') ); ?></p>
    <p class="product-price-card"><?php echo $product->get_price_html(); ?></p>
    </div>
  </a>
  <div class="card-btn-wrapper">
    <!-- Hvis er produkt er af typen variabel vises "en knap", der linker til produktsiden -->
    <?php if ( $product->is_type('variable')){ ?>
    <a class="btn-filled btn-card" href="<?php the_permalink(); ?>"> Vælg variant</a>
    <!-- Andre produktyper kan tilføjes til kurv direkte fra produktarkivet -->
    <?php } else {
    get_template_part('template-parts/add-to-cart-simple');
    } ?>  
  </div>

</div>



