<?php $product = wc_get_product( get_the_ID() );?>
<div class="produktCard">
  <div class="image-wrapper-forside">
    <span class="badge">Nyhed</span>
    <a href="/#" class="zoom-billede">
      <?php echo $product->get_image(); ?>
    </a>
    <button class="wishlist" aria-pressed="false" > <img src="./assets/icons/Hvidhjerte.png" alt=""></button>
  </div>
  <h3 class="product-h1"><?php echo $product->get_name(); ?></h3>
<p class="detaljer"><?php echo esc_html( get_field('produkt_maengde') ); ?></p>
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
  <p class="product-price"><?php echo $product->get_price_html(); ?></p>
  <div class="center-btn-forside">
  <button class="btn-filled-forside ">Tilføj til kurv</button>
  </div>
</div>