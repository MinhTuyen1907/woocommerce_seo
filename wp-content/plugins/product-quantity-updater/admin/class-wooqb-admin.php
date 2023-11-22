<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://technifyguru.com/woocommerce-product-quantity-updater/
 * @since      1.0.0
 *
 * @package    Wooqb
 * @subpackage Wooqb/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wooqb
 * @subpackage Wooqb/admin
 * @author     Technify Guru <asifaziz01@gmail.com>
 */
class Wooqb_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wooqb-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wooqb-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function add_plugin_admin_menu() {

		/*
		 * Add a settings page for this plugin to the Settings menu.
		 *
		 * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
		 *
		 *        Administration Menus: http://codex.wordpress.org/Administration_Menus
		 *
		 */
		/*
		add_options_page( '', 'Custom WP', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')	);
		add_menu_page(
			'Woocommerce Product Quantity Button',		// page title
			'Woo Quantity Button',								// menu title
			'manage_options',							// capability
			$this->plugin_name,							// menu slug
			array($this, 'display_plugin_setup_page')  // callback function
		);
		*/
		
		add_submenu_page(
			'woocommerce',
			__('Product Quantity Button Settings', 'product-quantity-updater'),
			__('Quantity Buttons', 'product-quantity-updater'),
			'manage_woocommerce',
			$this->plugin_name,
			array($this, 'display_plugin_setup_page')
		);
	}	

	/**
	* Render the settings page for this plugin.
	*
	* @since    1.0.0
	*/

	public function display_plugin_setup_page() {
		include_once( ( __DIR__ ) . '/partials/wooqb-admin-display.php' );
	}

	
	public function initialize_display_options() {

		// If the theme options don't exist, create them.
		if( false == get_option( 'wooqb_display_options' ) ) {
			add_option( 'wooqb_display_options', ['show_on_product_page'=>1, 'show_on_cart_page'=>1, 'hide_update_cart'=>1] );
		}

		add_settings_section(
			'general_settings_section',			            // ID used to identify this section and with which to register options
			__( 'Visibility Settings', 'product-quantity-updater' ),		        // Title to be displayed on the administration page
			array( $this, 'general_options_callback'),	    // Callback used to render the description of the section
			'wooqb_display_options'		                // Page on which to add this section of options
		);

		// Next, we'll introduce the fields for toggling the visibility of content elements.
		add_settings_field(
			'show_on_product_page',						        // ID used to identify the field throughout the theme
			__( 'Product Details Page', 	'product-quantity-updater' ),					// The label to the left of the option interface element
			array( $this, 'toggle_product_page_callback'),	// The name of the function responsible for rendering the option interface
			'wooqb_display_options',	            // The page on which this option will be displayed
			'general_settings_section',			        // The name of the section to which this field belongs
			array(								        // The array of arguments to pass to the callback. In this case, just a description.
				__( 'Activate this setting to display the quantity buttons on product details page.', 'product-quantity-updater' ),
			)
		);

		add_settings_field(
			'show_on_cart_page',						        // ID used to identify the field throughout the theme
			__( 'Cart Page', 	'product-quantity-updater' ),					// The label to the left of the option interface element
			array( $this, 'toggle_cart_page_callback'),	// The name of the function responsible for rendering the option interface
			'wooqb_display_options',	            // The page on which this option will be displayed
			'general_settings_section',			        // The name of the section to which this field belongs
			array(								        // The array of arguments to pass to the callback. In this case, just a description.
				__( 'Activate this setting to display the quantity buttons on cart page.', 'product-quantity-updater' ),
			)
		);

		add_settings_field(
			'hide_update_cart',						        // ID used to identify the field throughout the theme
			__( 'Hide Update Cart', 	'product-quantity-updater' ),					// The label to the left of the option interface element
			array( $this, 'toggle_cart_button_callback'),	// The name of the function responsible for rendering the option interface
			'wooqb_display_options',	            // The page on which this option will be displayed
			'general_settings_section',			        // The name of the section to which this field belongs
			array(								        // The array of arguments to pass to the callback. In this case, just a description.
				__( 'Activate this setting to hide the "Update Cart" button on cart page.', 'product-quantity-updater' ),
			)
		);
		

		add_settings_section(
			'styling_settings_section',			            // ID used to identify this section and with which to register options
			__( 'Styling', 'product-quantity-updater' ),		        // Title to be displayed on the administration page
			array( $this, 'styling_options_callback'),	    // Callback used to render the description of the section
			'wooqb_display_options'		                // Page on which to add this section of options
		);

		// Next, we'll introduce the fields for toggling the visibility of content elements.
		add_settings_field(
			'css_code',						        // ID used to identify the field throughout the theme
			__( 'CSS', 	'product-quantity-updater' ),					// The label to the left of the option interface element
			array( $this, 'toggle_css_callback'),	// The name of the function responsible for rendering the option interface
			'wooqb_display_options',	            // The page on which this option will be displayed
			'styling_settings_section',			        // The name of the section to which this field belongs
			array(								        // The array of arguments to pass to the callback. In this case, just a description.
				__( 'Write your CSS code for button styling', 'product-quantity-updater' ),
			)
		);

		// Finally, we register the fields with WordPress
		register_setting(
			'wooqb_display_options',
			'wooqb_display_options'
		);
	}
	
	/**
	 * This function provides a simple description for the General Options page.
	 *
	 * It's called from the 'wppb-demo_initialize_theme_options' function by being passed as a parameter
	 * in the add_settings_section function.
	 */
	public function general_options_callback() {
		echo __( 'Select which pages you wish to display the quantity buttons.', 'product-quantity-updater' ) ;
	} // end general_options_callback

	public function styling_options_callback() {
		echo __( 'Write your CSS code for button styles', 'product-quantity-updater' ) ;
	} // end general_options_callback

	
	public function toggle_product_page_callback($args) {

		// First, we read the options collection
		$options = get_option('wooqb_display_options');

		// Next, we update the name attribute to access this element's ID in the context of the display options array
		// We also access the show_header element of the options collection in the call to the checked() helper function
		?>

		<input type="checkbox" id="show_on_product_page" name="wooqb_display_options[show_on_product_page]" value="1" <?php echo checked( 1, isset( $options['show_on_product_page'] ) ? esc_html($options['show_on_product_page']) : 0, false ); ?> />

		<!-- Here, we'll take the first argument of the array and add it to a label next to the checkbox -->
		<label for="show_on_product_page"><?php echo esc_html($args[0]); ?></label>

		<?php

	} // end toggle_header_callback

	public function toggle_cart_page_callback($args) {

		// First, we read the options collection
		$options = get_option('wooqb_display_options');

		// Next, we update the name attribute to access this element's ID in the context of the display options array
		// We also access the show_header element of the options collection in the call to the checked() helper function
		?>

		<input type="checkbox" id="show_on_cart_page" name="wooqb_display_options[show_on_cart_page]" value="1" <?php echo checked( 1, isset( $options['show_on_cart_page'] ) ? esc_html($options['show_on_cart_page']) : 0, false ); ?> />

		<!-- Here, we'll take the first argument of the array and add it to a label next to the checkbox -->
		<label for="show_on_cart_page"><?php echo esc_html($args[0]); ?></label>

		<?php

	} // end toggle_header_callback


	public function toggle_cart_button_callback($args) {

		// First, we read the options collection
		$options = get_option('wooqb_display_options');
		?>

		<input type="checkbox" id="hide_update_cart" name="wooqb_display_options[hide_update_cart]" value="1" <?php echo checked( 1, isset( $options['hide_update_cart'] ) ? esc_html($options['hide_update_cart']) : 0, false ); ?> />

		<!-- Here, we'll take the first argument of the array and add it to a label next to the checkbox -->
		<label for="hide_update_cart"><?php echo esc_html($args[0]); ?></label>

		<?php


	} // end toggle_header_callback


	public function toggle_css_callback () {
		// First, we read the options collection
		$options = get_option('wooqb_display_options');
		?>

		<textarea name="wooqb_display_options[css_code]" width="100%" cols="80" rows="20" placeholder="Write each declaration on a separate line, eg:  
font-family: Sans-serif;
font-size: 20px;
font-weight: 500;
text-transform: uppercase ;"><?php echo isset( $options['css_code'] ) ? esc_html($options['css_code']) : ""; ?></textarea>

		<?php
	}
}
