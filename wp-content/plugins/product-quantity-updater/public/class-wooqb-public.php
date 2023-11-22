<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://technifyguru.com/woocommerce-product-quantity-updater/
 * @since      1.0.0
 *
 * @package    Wooqb
 * @subpackage Wooqb/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wooqb
 * @subpackage Wooqb/public
 * @author     Technify Guru <asifaziz01@gmail.com>
 */
class Wooqb_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wooqb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wooqb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wooqb-public.css', array(), $this->version, 'all' );
		$options = get_option ('wooqb_display_options');
		if ((is_product () || is_cart ()) && isset($options['css_code'])) {
			?>
			<style>
				div.quantity button.qty-updater.plus, div.quantity button.qty-updater.minus  {
					<?php echo $options['css_code']; ?>
				}
			</style>
			<?php
		}

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wooqb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wooqb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wooqb-public.js', array( 'jquery' ), $this->version, false );		

	}

	/* Show Minus Button */
	function wooqb_display_quantity_minus() {
		$options = get_option ('wooqb_display_options');
		if ( (is_product () && isset($options['show_on_product_page']) && $options['show_on_product_page'] == 1) || 
			 (is_cart() && isset($options['show_on_cart_page']) && $options['show_on_cart_page'] == 1) ) {
			 ?>
				<button type="button" class="qty-updater minus" >-</button>
			 <?php			
		}
	}
	
	/* Show Plus Button */
	function wooqb_display_quantity_plus() {
		$options = get_option ('wooqb_display_options');
		if ( (is_product () && isset($options['show_on_product_page']) && $options['show_on_product_page'] == 1) || 
			 (is_cart() && isset($options['show_on_cart_page']) && $options['show_on_cart_page'] == 1) ) {
			 ?>
				<button type="button" class="qty-updater plus" >+</button>
			 <?php
		}
	}

	/* Add CSS to hide Update Cart button */
	function wooqb_hide_update_cart_button() {
		$options = get_option ('wooqb_display_options');
		if ( is_cart() && isset($options['hide_update_cart']) && $options['hide_update_cart'] == 1 ) {
			?>
			<style id="hide-update-cart-allscreens">
				button[name=update_cart] {
					display: none !important;
				}
			</style>
			<?php
		}
	}
	
	
	/* Add scripts to add functionality to the buttons */
	function wooqb_add_cart_quantity_plus_minus() {
		$options = get_option ('wooqb_display_options');
		// Only run this on single product page
		if ( (is_product () && isset($options['show_on_product_page']) && $options['show_on_product_page'] == 1) ) {
			wc_enqueue_js ('
			  // Quantity updater on product single page
			  $("form.cart").on("click", "button.plus, button.minus", function () {
				// Get current quantity values
				var qty = $(this).parent().find(".qty");
				var val = parseFloat(qty.val());
				var max = parseFloat(qty.attr("max"));
				var min = parseFloat(qty.attr("min"));
				var step = parseFloat(qty.attr("step"));

				// Change the value if plus or minus
				if ($(this).is(".plus")) {
				  if (max && max <= val) {
					qty.val(max);
				  } else {
					qty.val(val + step);
				  }
				} else {
				  if (min && min >= val) {
					qty.val(min);
				  } else if (val > 1) {
					qty.val(val - step);
				  }
				}
			  });

			  // Add to cart functionality on single product page
			  $("form.cart").on("submit", function (e) {
				e.preventDefault();

				var form = $(this);
				form.block({
				  message: null,
				  overlayCSS: { background: "#fff", opacity: 0.6 },
				});

				var formData = new FormData(form[0]);
				formData.append("add-to-cart", form.find("[name=add-to-cart]").val());

				// Ajax action.
				$.ajax({
				  url: wc_add_to_cart_params.wc_ajax_url
					.toString()
					.replace("%%endpoint%%", "mspa_add_to_cart"),
				  data: formData,
				  type: "POST",
				  processData: false,
				  contentType: false,
				  complete: function (response) {
					response = response.responseJSON;
					//$ (".cart-items-count").text (str);

					if (!response) {
					  return;
					}

					if (response.error && response.product_url) {
					  window.location = response.product_url;
					  return;
					}

					// Redirect to cart option
					if (wc_add_to_cart_params.cart_redirect_after_add === "yes") {
					  window.location = wc_add_to_cart_params.cart_url;
					  return;
					}

					var $thisbutton = form.find(".single_add_to_cart_button"); //
					$thisbutton.html(
					  "Added to cart &nbsp;<i class=\"text-white fas fa-check\"></i>"
					);

					//	var $thisbutton = null; // uncomment this if you dont want the View cart button

					// Trigger event so themes can refresh other areas.
					$(document.body).trigger("added_to_cart", [
					  response.fragments,
					  response.cart_hash,
					  $thisbutton,
					]);

					// Remove existing notices
					$(
					  ".woocommerce-error, .woocommerce-message, .woocommerce-info"
					).remove();

					// Add new notices
					form.closest(".product").before(response.fragments.notices_html);

					// Refresh cart item count
					$(".cart-items-count").text(response.fragments.cart_items_count);

					// Refresh mini cart content
					const fragments_array = Object.values(response.fragments);
					$("#mini-cart-content").html(fragments_array[0]);

					form.unblock();
				  },
				});
			  });
			');

		}

		// Only run this on cart page
		if ( (is_cart() && isset($options['show_on_cart_page']) && $options['show_on_cart_page'] == 1) ) {		
			wc_enqueue_js ('
			  // Quantity updater on Cart page - This will change the quantity and update the cart through ajax
			  $(document).on("click", "button.plus, button.minus", function () {
				  var timeout;
				// Get current quantity values
				var qty = $(this).parent().find(".qty");
				var val = parseFloat(qty.val());
				var max = parseFloat(qty.attr("max"));
				var min = parseFloat(qty.attr("min"));
				var step = parseFloat(qty.attr("step"));

				// Change the value if plus or minus
				if ($(this).is(".plus")) {
				  if (max && max <= val) {
					qty.val(max);
				  } else {
					qty.val(val + step);
				  }
				} else {
				  if (min && min >= val) {
					qty.val(min);
				  } else if (val > 1) {
					qty.val(val - step);
				  }
				}

				if (timeout !== undefined) {
				  clearTimeout(timeout);
				}

				timeout = setTimeout(function () {
				  $("[name=update_cart]").prop("disabled", false);
				  $("[name=update_cart]").prop("aria-disabled", false);
				  $("[name=update_cart]").trigger("click");
				}, 500); // 1 second delay, half a second (500) seems comfortable too
			  });
			');
		}

	}


	// Update quantity function. called through ajax on cart and mini-cart pages
	function wooqb_update_quantity() {

		// Set item key as the hash found in input.qty's name
		$cart_item_key = sanitize_text_field($_POST['hash']);

		// Get the array of values owned by the product we're updating
		$product_values = WC()->cart->get_cart_item( $cart_item_key );

		// Get the quantity of the item in the cart
		$product_quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var(sanitize_text_field($_POST['quantity']), FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );

		// Update cart validation
		$passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $product_values, $product_quantity );

		if ( is_page( 'cart' ) || is_cart() ) {
		  $redirect = wc_get_cart_url();
		} else {
		  $redirect = '';
		}

		// Update the quantity of the item in the cart
		if ( $passed_validation ) {
			WC()->cart->set_quantity( $cart_item_key, $product_quantity, true );
			wp_send_json([
			  'count' => WC()->cart->get_cart_contents_count(),
			  'subtotal' => '<strong>Subtotal</strong>' . WC()->cart->get_cart_subtotal(),
			  'redirect' => $redirect,
			]);
		}
	}

}
