<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	<label class="lb">Số Lượng</label>
	<div  class="quality_price">
	<?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	woocommerce_quantity_input(
		array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		)
	);

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	echo $product->get_price_html();
	?>
	</div>
	<div class="heart_cart_order">
<button class="heart" type="submit">
<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
  <g clip-path="url(#clip0_2297_665)">
    <path d="M12.5 23.1648C12.1583 23.1648 11.8289 23.041 11.5722 22.8162C10.6026 21.9684 9.66789 21.1717 8.84318 20.4689L8.83897 20.4653C6.42107 18.4048 4.33312 16.6254 2.88037 14.8725C1.25641 12.9129 0.5 11.0549 0.5 9.02521C0.5 7.05316 1.17621 5.23383 2.40393 3.9021C3.6463 2.55463 5.351 1.8125 7.20458 1.8125C8.58995 1.8125 9.85869 2.25049 10.9754 3.1142C11.539 3.55017 12.0499 4.08374 12.5 4.70612C12.9502 4.08374 13.4609 3.55017 14.0247 3.1142C15.1415 2.25049 16.4102 1.8125 17.7956 1.8125C19.649 1.8125 21.3538 2.55463 22.5962 3.9021C23.8239 5.23383 24.5 7.05316 24.5 9.02521C24.5 11.0549 23.7437 12.9129 22.1198 14.8723C20.667 16.6254 18.5793 18.4046 16.1617 20.4649C15.3355 21.1688 14.3993 21.9667 13.4276 22.8165C13.1711 23.041 12.8415 23.1648 12.5 23.1648ZM7.20458 3.21838C5.74834 3.21838 4.41058 3.79956 3.43737 4.85498C2.4497 5.92633 1.9057 7.40729 1.9057 9.02521C1.9057 10.7323 2.54016 12.259 3.9627 13.9755C5.33764 15.6346 7.38274 17.3774 9.75065 19.3954L9.75505 19.399C10.5829 20.1046 11.5213 20.9044 12.498 21.7584C13.4805 20.9027 14.4204 20.1016 15.2499 19.395C17.6176 17.377 19.6625 15.6346 21.0374 13.9755C22.4598 12.259 23.0943 10.7323 23.0943 9.02521C23.0943 7.40729 22.5503 5.92633 21.5626 4.85498C20.5896 3.79956 19.2516 3.21838 17.7956 3.21838C16.7288 3.21838 15.7494 3.5575 14.8846 4.2262C14.1139 4.82239 13.577 5.57605 13.2622 6.10339C13.1004 6.37457 12.8155 6.53644 12.5 6.53644C12.1845 6.53644 11.8996 6.37457 11.7377 6.10339C11.4231 5.57605 10.8863 4.82239 10.1154 4.2262C9.25059 3.5575 8.27116 3.21838 7.20458 3.21838Z" fill="#2A353D"/>
  </g>
  <defs>
    <clipPath id="clip0_2297_665">
      <rect width="24" height="24" fill="white" transform="translate(0.5 0.5)"/>
    </clipPath>
  </defs>
</svg>
</button>
</svg>
	<button type="submit" class="single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">
	<svg xmlns="http://www.w3.org/2000/svg" width="21" height="23" viewBox="0 0 21 23" fill="none">
		<path fill-rule="evenodd" clip-rule="evenodd" d="M7.66757 6.75H12.8324C14.0179 6.74998 14.978 6.74997 15.7456 6.84645C16.5454 6.94698 17.2261 7.16108 17.8059 7.65272C18.3847 8.14351 18.7107 8.78179 18.9479 9.55779C19.1761 10.3045 19.3446 11.2603 19.5532 12.4435L19.9373 14.6219C20.2272 16.2659 20.4587 17.5788 20.4949 18.6175C20.5323 19.6884 20.3698 20.6068 19.7427 21.3654C19.114 22.1259 18.2451 22.4515 17.1927 22.6033C16.1747 22.75 14.8561 22.75 13.2089 22.75H7.29111C5.64387 22.75 4.32529 22.75 3.3073 22.6033C2.25487 22.4515 1.38596 22.1259 0.757271 21.3654C0.130155 20.6068 -0.032297 19.6884 0.00503343 18.6175C0.0412433 17.5788 0.272762 16.2658 0.562656 14.6219L0.946743 12.4435C1.15536 11.2603 1.32386 10.3045 1.5521 9.55779C1.78928 8.78179 2.11527 8.14351 2.69408 7.65272C3.27391 7.16108 3.95461 6.94698 4.75436 6.84645C5.52197 6.74997 6.48203 6.74998 7.66757 6.75ZM4.94143 8.33474C4.29967 8.41541 3.9391 8.56369 3.66418 8.7968C3.38824 9.03078 3.17894 9.36694 2.98659 9.99624C2.78839 10.6447 2.6346 11.5094 2.41547 12.7521L2.05023 14.8235C1.74761 16.5398 1.53623 17.7488 1.50412 18.6698C1.47271 19.5709 1.62077 20.0557 1.91336 20.4096C2.20438 20.7616 2.64484 20.9922 3.52136 21.1186C4.41978 21.2482 5.62976 21.25 7.35209 21.25H13.1479C14.8702 21.25 16.0802 21.2482 16.9786 21.1186C17.8551 20.9922 18.2956 20.7616 18.5866 20.4096C18.8792 20.0557 19.0273 19.5709 18.9959 18.6698C18.9637 17.7488 18.7524 16.5398 18.4497 14.8235L18.0845 12.7521C17.8654 11.5094 17.7116 10.6447 17.5134 9.99624C17.321 9.36694 17.1117 9.03078 16.8358 8.7968C16.5609 8.56369 16.2003 8.41541 15.5585 8.33474C14.8954 8.25138 14.0298 8.25 12.7826 8.25H7.71733C6.47016 8.25 5.60461 8.25138 4.94143 8.33474Z" fill="#33B44A"/>
		<path fill-rule="evenodd" clip-rule="evenodd" d="M10.2503 2.25C8.37948 2.25 6.82093 3.68407 6.66557 5.54847L6.49775 7.56228L5.00293 7.43772L5.17075 5.4239C5.3909 2.78206 7.59934 0.75 10.2503 0.75C12.9013 0.75 15.1098 2.78206 15.3299 5.4239L15.4977 7.43772L14.0029 7.56228L13.8351 5.54847C13.6797 3.68407 12.1212 2.25 10.2503 2.25Z" fill="#33B44A"/>
		<path d="M10.25 11.9526L10.25 17.547" stroke="#5CC36E" stroke-width="1.5" stroke-linecap="round"/>
		<path d="M13.0479 14.75L7.45349 14.75" stroke="#5CC36E" stroke-width="1.5" stroke-linecap="round"/>
		</svg>
	<?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

	<button type="submit" class="woocommerce_checkout_place_order button <?php echo esc_url( wc_get_checkout_url()); ?>">

	Mua Ngay
	
	</button>
	
	</div>
	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
