<?php
/**
 * RA Widgets Bundle
 *
 * @package RA_Widgets_Bundle
 * @author Rotsen Mark Acob
 * @copyright Copyright (c) 2026 Rotsen Mark Acob
 * @license GPL-2.0-or-later
 *
 * Plugin Name: RA Widgets Bundle
 * Plugin URI: https://github.com/webdevsuperfast/ra-widgets-bundle
 * Description: A collection of widgets for WordPress built using the SiteOrigin Widgets API.
 * Version:    1.0.3
 * Author:     Rotsen Mark Acob
 * Author URI: https://webdevsuperfast.github.io
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: ra-widgets-bundle
 * Domain Path: /languages
 */

/**
 * RA Widgets Bundle
 *
 * Main plugin bootstrap for RA Widgets Bundle.
 *
 * @package RA_Widgets_Bundle
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main plugin class.
 */
class RAWB_Widgets_Bundle {
	/**
	 * RAWB_Widgets_Bundle constructor.
	 */
	public function __construct() {
		// Enqueue Scripts.
		add_action( 'wp_enqueue_scripts', array( $this, 'rawb_enqueue_scripts' ) );

		// Add widgets folder to SiteOrigin Widgets.
		add_filter( 'siteorigin_widgets_widget_folders', array( $this, 'rawb_widget_folders' ) );

		// Require misc helpers.
		require_once plugin_dir_path( __FILE__ ) . 'lib/misc.php';
	}

	/**
	 * Register/enqueue frontend assets.
	 */
	public function rawb_enqueue_scripts() {
		if ( ! is_admin() ) {
			// Widget CSS.
			wp_register_style( 'rawb-css', plugin_dir_url( __FILE__ ) . 'public/css/widget.css' );
			wp_enqueue_style( 'rawb-css' );

			// Owl Carousel JS.
			wp_register_script( 'rawb-owl-carousel-js', plugin_dir_url( __FILE__ ) . 'public/js/owl.carousel.min.js', array( 'jquery' ), null, true );

			// Widget JS.
			wp_register_script( 'rawb-widgets-js', plugin_dir_url( __FILE__ ) . 'public/js/widget.min.js', array( 'jquery' ), null, true );
		}
	}

	/**
	 * Add widget folder to SiteOrigin registered folders.
	 *
	 * @param array $folders Existing folders.
	 * @return array
	 */
	public function rawb_widget_folders( $folders ) {
		$folders[] = plugin_dir_path( __FILE__ ) . 'widgets/';

		return $folders;
	}
}

new RAWB_Widgets_Bundle();
