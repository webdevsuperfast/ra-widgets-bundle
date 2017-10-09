<?php
/*
Plugin Name: RA Widgets Bundle
Plugin URI: https://github.com/webdevsuperfast/ra-widgets-bundle
Description: A collection of widgets for WordPress built using the SiteOrigin Widgets API.
Version: 	1.0
Author: 	Rotsen Mark Acob
Author URI: https://rotsenacob.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: ra-widgets-bundle
Domain Path: /languages
*/

defined( 'ABSPATH' ) or die( esc_html_e( 'With great power comes great responsibility.', 'ra-widgets-bundle' ) );

class RA_Widgets_Bundle {
	public function __construct() {
		// Enqueue Scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'rawb_enqueue_scripts' ) );

		// Add widgets folder to SiteOrigin Widgets
		add_filter( 'siteorigin_widgets_widget_folders', array( $this, 'rawb_widget_folders' ) );

		// Enqueue Scripts related to RA Features Widget
		add_action( 'siteorigin_widgets_enqueue_admin_scripts_rawb-features', array( $this, 'rawb_features_admin_scripts' ), 10, 2 );

		add_action( 'siteorigin_panel_enqueue_admin_scripts', array( $this, 'rawb_features_admin_scripts' ) );
	}

	public function rawb_enqueue_scripts() {
		if ( ! is_admin() ) {
			// Widget CSS
			wp_register_style( 'rawb-css', plugin_dir_url( __FILE__ ) . 'assets/css/widget.css' );
			wp_enqueue_style( 'rawb-css' );

			// Owl Carousel JS
			wp_register_script( 'rawb-owl-carousel-js', plugin_dir_url( __FILE__ ) . 'assets/js/owl.carousel.min.js', array( 'jquery' ), null, true );

			// Magnific Popup JS
			wp_register_script( 'rawb-magnific-popup-js', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), null, true );

			// Widget JS
			wp_register_script( 'rawb-widgets-js', plugin_dir_url( __FILE__ ) . 'assets/js/widget.min.js', array( 'jquery' ), null, true );
		}
	}

	public function rawb_features_admin_scripts() {
		wp_register_script( 'rawb-features-js', plugin_dir_url( __FILE__ ) . 'assets/js/features.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'rawb-features-js' );
	}

	public function rawb_widget_folders( $folders ) {
		$folders[] = plugin_dir_path( __FILE__ ) . 'widgets/';

		return $folders;
	}
}

new RA_Widgets_Bundle();
