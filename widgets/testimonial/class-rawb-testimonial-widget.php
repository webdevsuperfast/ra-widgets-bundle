<?php
/**
 * Widget Name: RA Testimonial
 * Description: Testimonial widget
 * Author: Rotsen Mark Acob
 *
 * @package RA_Widgets_Bundle
 */

/**
 * Class RAWB_Testimonial_Widget
 *
 * @package RA_Widgets_Bundle
 */
class RAWB_Testimonial_Widget extends SiteOrigin_Widget {
	/**
	 * RAWB_Testimonial_Widget constructor.
	 */
	public function __construct() {
		parent::__construct(
			'rawb-testimonial',
			__( 'RA Testimonial', 'ra-widgets-bundle' ),
			array(
				'description' => __( 'Testimonial widget', 'ra-widgets-bundle' ),
			),
			array(),
			array(
				'author' => array(
					'type' => 'text',
					'label' => __( 'Author', 'ra-widgets-bundle' ),
				),
				'quote' => array(
					'type' => 'textarea',
					'label' => __( 'Quote', 'ra-widgets-bundle' ),
				),
				'avatar' => array(
					'type' => 'media',
					'label' => __( 'Avatar', 'ra-widgets-bundle' ),
					'library' => 'image',
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
		return array(
			'author' => isset( $instance['author'] ) ? $instance['author'] : '',
			'quote' => isset( $instance['quote'] ) ? $instance['quote'] : '',
			'avatar' => isset( $instance['avatar'] ) ? wp_get_attachment_image( $instance['avatar'], 'thumbnail' ) : '',
		);
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

siteorigin_widget_register( 'rawb-testimonial', __FILE__, 'RAWB_Testimonial_Widget' );
