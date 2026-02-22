<?php
/**
 * Widget Name: RA Headline
 * Description: Simple headline widget
 * Author: Rotsen Mark Acob
 *
 * @package RA_Widgets_Bundle
 */

/**
 * Class RAWB_Headline_Widget
 *
 * @package RA_Widgets_Bundle
 */
class RAWB_Headline_Widget extends SiteOrigin_Widget {
	/**
	 * RAWB_Headline_Widget constructor.
	 */
	public function __construct() {
		parent::__construct(
			'rawb-headline',
			__( 'RA Headline', 'ra-widgets-bundle' ),
			array(
				'description' => __( 'Simple headline widget', 'ra-widgets-bundle' ),
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __( 'Title', 'ra-widgets-bundle' ),
				),
				'subtitle' => array(
					'type' => 'text',
					'label' => __( 'Subtitle', 'ra-widgets-bundle' ),
				),
				'tag' => array(
					'type' => 'select',
					'label' => __( 'Tag', 'ra-widgets-bundle' ),
					'options' => array(
						'h1' => 'H1',
						'h2' => 'H2',
						'h3' => 'H3',
						'h4' => 'H4',
						'h5' => 'H5',
						'h6' => 'H6',
					),
					'default' => 'h2',
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
			'title' => isset( $instance['title'] ) ? $instance['title'] : '',
			'subtitle' => isset( $instance['subtitle'] ) ? $instance['subtitle'] : '',
			'tag' => isset( $instance['tag'] ) ? $instance['tag'] : 'h2',
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

siteorigin_widget_register( 'rawb-headline', __FILE__, 'RAWB_Headline_Widget' );
