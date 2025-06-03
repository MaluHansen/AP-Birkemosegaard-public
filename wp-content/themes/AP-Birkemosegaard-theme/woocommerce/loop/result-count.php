<?php

global $wp_query;

$paged    = max( 1, get_query_var( 'paged' ) );
$per_page = wc_get_loop_prop( 'per_page' );
$total    = $wp_query->found_posts;

$first = ( $per_page * $paged ) - $per_page + 1;
$last  = min( $total, $per_page * $paged );

if ( 1 === $total ) {
	echo '<p class="custom-result-count">Viser ét produkt</p>';
} elseif ( $total <= $per_page || -1 === $per_page ) {
	echo '<p class="custom-result-count">Viser alle ' . $total . ' produkter</p>';
} else {
	echo '<p class="custom-result-count">Viser ' . $first . '–' . $last . ' af ' . $total . ' produkter</p>';
}
