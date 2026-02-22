<?php
/**
 * Widget Name: RA Image Carousel
 * Description: Image carousel widget
 * Author: Rotsen Mark Acob
 *
 * @package RA_Widgets_Bundle
 */

/**
 * Class RAWB_Image_Carousel_Widget
 *
 * @package RA_Widgets_Bundle
 */
class RAWB_Image_Carousel_Widget extends SiteOrigin_Widget {
	/**
	 * RAWB_Image_Carousel_Widget constructor.
	 */
	public function __construct() {
		parent::__construct(
			'rawb-image-carousel',
			__( 'RA Image Carousel', 'ra-widgets-bundle' ),
			array(
				'description' => __( 'Image carousel widget', 'ra-widgets-bundle' ),
			),
			array(),
			array(
				'images' => array(
					'type' => 'repeater',
					'label' => __( 'Images', 'ra-widgets-bundle' ),
					'fields' => array(
						'image' => array(
							'type' => 'media',
							'library' => 'image',
							'label' => __( 'Image', 'ra-widgets-bundle' ),
						),
						'caption' => array(
							'type' => 'text',
							'label' => __( 'Caption', 'ra-widgets-bundle' ),
						),
					),
				),
				'autoplay' => array(
					'type' => 'checkbox',
					'label' => __( 'Autoplay', 'ra-widgets-bundle' ),
					'default' => true,
				),
				'speed' => array(
					'type' => 'number',
					'label' => __( 'Autoplay speed', 'ra-widgets-bundle' ),
					'default' => 3000,
				),
			),
			plugin_dir_path( __FILE__ ) . 'widgets/'
		);
	}

	/**
	 * Get template variables.
	 *
	 * @param array $instance Widget instance.
	 * @param array $args Widget args.
	 * @return array
	 */
	public function get_template_variables( $instance, $args ) {
		$variables = array();
		$variables['images'] = isset( $instance['images'] ) ? $instance['images'] : array();
		$variables['autoplay'] = isset( $instance['autoplay'] ) ? (bool) $instance['autoplay'] : true;
		$variables['speed'] = isset( $instance['speed'] ) ? (int) $instance['speed'] : 3000;

		return $variables;
	}

	/**
	 * Get template name.
	 *
	 * @param array $instance Widget instance.
	 * @return string
	 */
	public function get_template_name( $instance ) {
		return 'default';
	}

	/**
	 * Get style name.
	 *
	 * @param array $instance Widget instance.
	 * @return string
	 */
	public function get_style_name( $instance ) {
		return '';
	}
}

siteorigin_widget_register( 'rawb-image-carousel', __FILE__, 'RAWB_Image_Carousel_Widget' );
