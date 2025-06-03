<?php

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) return;

echo '<nav class="custom-pagination">';
    echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
        'format'       => '',
        'current'      => max( 1, get_query_var( 'paged' ) ),
        'total'        => $wp_query->max_num_pages,
        'prev_text'    => '<span class="material-symbols-rounded">chevron_left</span> Forrige',
        'next_text'    => 'Næste <span class="material-symbols-rounded">chevron_right</span>',
        'type'         => 'list',
        'end_size'     => 1,
        'mid_size'     => 2,
    ) ) );
echo '</nav>';
