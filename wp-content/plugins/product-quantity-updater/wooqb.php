<?php

/**
 * 
 * @link              https://technifyguru.com/woocommerce-product-quantity-updater/
 * @since             1.0.0
 * @package           Wooqb
 *
 * @wordpress-plugin
 * Plugin Name:       Product Quantity Updater
 * Plugin URI:        https://technifyguru.com/woocommerce-product-quantity-updater/
 * Description:       This plugin adds quantity increment and decrement buttons for product quantity on product details and cart pages.
 * Version:           1.0.3
 * Author:            Technify Guru
 * Author URI:        https://technifyguru.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wooqb
 * Domain Path:       /languages/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WOOQB_VERSION', '1.0.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wooqb-activator.php
 */
function activate_wooqb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wooqb-activator.php';
	Wooqb_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wooqb-deactivator.php
 */
function deactivate_wooqb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wooqb-deactivator.php';
	Wooqb_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wooqb' );
register_deactivation_hook( __FILE__, 'deactivate_wooqb' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wooqb.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wooqb() {

	$plugin = new Wooqb();
	$plugin->run();

}
run_wooqb();

