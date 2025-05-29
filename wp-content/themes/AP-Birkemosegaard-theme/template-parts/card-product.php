<?php $product = wc_get_product( get_the_ID() );?>

<div class="card">
  <a class="card-wrapper" href="<?php the_permalink(); ?>">
    <?php echo $product->get_image(); ?>
    <div class="card-content">
    <h3 class="card-heading"><?php echo $product->get_name(); ?></h3>
    
    <?php $eco_marks = get_the_terms( get_the_ID(), 'oko-maerke' );
    if ( $eco_marks && ! is_wp_error( $eco_marks ) ) : ?>
        <div class="oko-icons-card">
        <?php foreach ( $eco_marks as $mark ) {
            $icon = get_field('eco_icon', 'oko-maerke_' . $mark->term_id);
            if ( $icon ) {
                echo '<img src="' . esc_url($icon['url']) . '" alt="' . esc_attr($mark->name) . '">';
            } else {
                echo '<span>' . esc_html($mark->name) . '</span>';
            }
        }
        echo '</div>';
    endif; ?>
    <p class="detaljer"><?php echo esc_html( get_field('produkt_maengde') ); ?></p>
    <p class="product-price"><?php echo $product->get_price_html(); ?></p>
    </div>
  </a>




<!-- Hvis er produkt er af typen variabel vises "en knap", der linker til produktsiden -->
<?php if ( $product->is_type( 'variable' ) ) : ?>
<a class="btn-filled btn-card" href="<?php the_permalink(); ?>"> Vælg variant</a>
<!-- Andre produktyper kan tilføjes til kurv direkte fra produktarkivet -->
<?php else : ?>
    <a href="?add-to-cart=<?php echo esc_attr( $product->get_id() ); ?>"
       data-quantity="1"
       class="btn-filled btn-card ajax_add_to_cart add_to_cart_button"
       data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"
       data-product_sku="<?php echo esc_attr( $product->get_sku() ); ?>"
       aria-label="<?php echo esc_attr( $product->add_to_cart_description() ); ?>"
       rel="nofollow">
       Tilføj til kurv
    </a>

<?php endif; ?>
</div>



