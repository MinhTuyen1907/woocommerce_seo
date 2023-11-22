<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {

	echo $wrap_before;

	foreach ( $breadcrumb as $key => $crumb ) {

		echo $before;
		if($key==0) echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
			<path d="M18.7536 10.1959C18.2839 9.72625 10.8395 2.28179 10.4952 1.93746C10.2219 1.66408 9.77875 1.66408 9.5055 1.93746C9.12891 2.31405 1.70892 9.7339 1.24703 10.1959C0.973646 10.4692 0.973646 10.9123 1.24703 11.1857C1.52028 11.459 1.96344 11.459 2.23669 11.1857L2.41836 11.0041V18.9492C2.41836 19.3358 2.7318 19.6491 3.11823 19.6491H16.8824C17.2689 19.6491 17.5823 19.3358 17.5823 18.9492V11.0041L17.7638 11.1857C18.0372 11.459 18.4804 11.459 18.7536 11.1857C19.027 10.9123 19.027 10.4692 18.7536 10.1959ZM12.0533 18.2493H7.94747V14.1435H12.0533V18.2493ZM16.1826 18.2493H13.4531V13.4436C13.4531 13.0571 13.1398 12.7438 12.7532 12.7438H7.2476C6.86103 12.7438 6.54773 13.0571 6.54773 13.4436V18.2493H3.81823V9.60432L10.0003 3.42209L16.1826 9.60432V18.2493Z" fill="#767676"/>
			</svg> ';
		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			echo '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
		} else {
			echo esc_html( $crumb[0] );
		}

		echo $after;

		if ( sizeof( $breadcrumb ) !== $key + 1 ) {
			echo $delimiter;
		}
	}

	echo $wrap_after;

}
