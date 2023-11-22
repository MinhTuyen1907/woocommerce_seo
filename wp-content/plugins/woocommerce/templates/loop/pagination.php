<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}
?>
<nav class="woocommerce-pagination">
	<?php
	echo paginate_links(
		apply_filters(
			'woocommerce_pagination_args',
			array( // WPCS: XSS ok.
				'base'      => $base,
				'format'    => $format,
				'add_args'  => false,
				'current'   => max( 1, $current ),
				'total'     => $total,
				'prev_text' => is_rtl() ? '&rarr;' : '<svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M5.35367 0.646447C5.54893 0.841709 5.54893 1.15829 5.35367 1.35355L1.82507 4.88215C1.77836 4.92885 1.74052 4.96673 1.70831 5C1.74052 5.03327 1.77836 5.07115 1.82507 5.11785L5.35367 8.64645C5.54893 8.84171 5.54893 9.15829 5.35367 9.35355C5.1584 9.54882 4.84182 9.54882 4.64656 9.35355L1.11796 5.82496C1.11258 5.81957 1.10716 5.81416 1.10172 5.80873C1.00499 5.71207 0.900396 5.60756 0.824006 5.50744C0.734517 5.39015 0.638184 5.22231 0.638184 5C0.638184 4.77769 0.734517 4.60985 0.824006 4.49256C0.900396 4.39244 1.00499 4.28793 1.10172 4.19127C1.10716 4.18584 1.11258 4.18043 1.11796 4.17504L4.64656 0.646447C4.84182 0.451184 5.1584 0.451184 5.35367 0.646447Z" fill="#1A1A1A"/>
			  </svg>',
				'next_text' => is_rtl() ? '&larr;' : '<svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M0.646447 0.646447C0.841709 0.451184 1.15829 0.451184 1.35355 0.646447L4.88215 4.17504C4.88753 4.18043 4.89295 4.18584 4.89839 4.19128C4.99512 4.28793 5.09972 4.39244 5.17611 4.49256C5.2656 4.60985 5.36193 4.77769 5.36193 5C5.36193 5.22231 5.2656 5.39015 5.17611 5.50744C5.09972 5.60756 4.99512 5.71207 4.89839 5.80872C4.89295 5.81416 4.88753 5.81957 4.88215 5.82496L1.35355 9.35355C1.15829 9.54882 0.841709 9.54882 0.646447 9.35355C0.451184 9.15829 0.451184 8.84171 0.646447 8.64645L4.17504 5.11785C4.22175 5.07115 4.25959 5.03327 4.29181 5C4.25959 4.96673 4.22175 4.92885 4.17504 4.88215L0.646447 1.35355C0.451184 1.15829 0.451184 0.841709 0.646447 0.646447Z" fill="#1A1A1A"/>
			  </svg>',
				'type'      => 'list',
				'end_size'  => 3,
				'mid_size'  => 3,
			)
		)
	);
	?>
</nav>
