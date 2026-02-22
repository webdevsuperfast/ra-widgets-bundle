<?php
/**
 * Widget Name: RA Image
 * Description: Simple image widget
 * Author: Rotsen Mark Acob
 *
 * @package RA_Widgets_Bundle
 */

/**
 * Class RAWB_Image_Widget
 *
 * SiteOrigin widget for images.
 */
class RAWB_Image_Widget extends SiteOrigin_Widget {
	/**
	 * RAWB_Image_Widget constructor.
	 */
	public function __construct() {
		parent::__construct(
			'rawb-image',
			__( 'RA Image', 'ra-widgets-bundle' ),
			array(
				'description' => __( 'Simple image widget', 'ra-widgets-bundle' ),
			),
			array(),
			array(
				'image' => array(
					'type' => 'media',
					'label' => __( 'Image', 'ra-widgets-bundle' ),
					'library' => 'image',
				),
				'link' => array(
					'type' => 'link',
					'label' => __( 'Link', 'ra-widgets-bundle' ),
				),
				'caption' => array(
					'type' => 'text',
					'label' => __( 'Caption', 'ra-widgets-bundle' ),
				),
				'size' => array(
					'type' => 'select',
					'label' => __( 'Size', 'ra-widgets-bundle' ),
					'options' => rawb_thumb_sizes(),
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

		if ( ! empty( $instance['image'] ) ) {
			$variables['image'] = wp_get_attachment_image( $instance['image'], $instance['size'] );
		}

		$variables['link'] = $instance['link'];
		$variables['caption'] = isset( $instance['caption'] ) ? $instance['caption'] : '';

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

siteorigin_widget_register( 'rawb-image', __FILE__, 'RAWB_Image_Widget' );
