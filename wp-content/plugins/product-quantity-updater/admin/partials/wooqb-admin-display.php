<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://technifyguru.com/woocommerce-product-quantity-updater/
 * @since      1.0.0
 *
 * @package    Wooqb
 * @subpackage Wooqb/admin/partials
 */
?>

<div class="wrap">
	
	<h2><?php echo esc_html(get_admin_page_title(), 'product-quantity-updater'); ?></h2>

	<?php settings_errors(); ?>

	<?php 
	if( isset( $_GET[ 'tab' ] ) ) {
		$tab = sanitize_url ($_GET[ 'tab' ]);
		$tab_parts = parse_url ($tab);
		$active_tab = $tab_parts['host'];
	} else {
		$active_tab = 'display_options';
	} // end if/else ?>

	<h2 class="nav-tab-wrapper">
		<!--
		<a href="?page=wooqb&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html( 'Display Options', 'product-quantity-updater' ); ?></a>
		<a href="?page=wooqb&tab=styling_options" class="nav-tab <?php echo $active_tab == 'styling_options' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html( 'Styling ', 'product-quantity-updater' ); ?></a>
		<a href="?page=wooqb&tab=input_examples" class="nav-tab <?php echo $active_tab == 'input_examples' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html( 'Input Examples', 'product-quantity-updater' ); ?></a>
		-->
	</h2>

	<form method="post" action="options.php">
		<?php

		if( $active_tab == 'display_options' ) {

			settings_fields( 'wooqb_display_options' );
			do_settings_sections( 'wooqb_display_options' );
		/*
		} elseif( $active_tab == 'styling_options' ) {
			
			settings_fields( 'styling_settings_section' );
			do_settings_sections( 'styling_settings_section' );
			
		} else {

			settings_fields( 'wppb_demo_input_examples' );
			do_settings_sections( 'wppb_demo_input_examples' );
		*/
		} // end if/else

		submit_button();

		?>
	</form>

</div><!-- /.wrap -->
