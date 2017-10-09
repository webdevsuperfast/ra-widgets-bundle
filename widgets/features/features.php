<?php
/*
Widget Name: RA Features
Description: A simple features widget.
Author: Rotsen Mark Acob
Author URI: http://rotsenacob.com
*/

class RA_Features_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'rawb-features',
			__( 'RA Features', 'ra-widgets-bundle' ),
			array(
				'description' => __( 'A simple features widget.', 'ra-widgets-bundle' )
			),
			array(),
			false,
			plugin_dir_path( __FILE__ ) . 'widgets'
		);
	}

	function initialize() {

	}

	function get_widget_form() {
		return array(
			'title' => array(
				'type' => 'text',
				'label' => __( 'Title', 'ra-widgets-bundle' )
			),
			'features' => array(
				'type' => 'repeater',
				'label' => __('Add Features', 'ra-widgets-bundle'),
				'item_name' => __('Feature', 'ra-widgets-bundle'),
				'item_label' => array(
					'selector' => "[id*='headline']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'icon_image' => array(
						'type' => 'select',
						'label' => __( 'Icon or Image?', 'ra-widgets-bundle' ),
						'options' => array(
							'icon' => __( 'Icon', 'ra-widgets-bundle' ),
							'image' => __( 'Image', 'ra-widgets-bundle' )
						),
						'default' => 'icon'
					),
					'icon' => array(
						'type' => 'icon',
						'label' => __( 'Icon', 'ra-widgets-bundle' )
					),
					'icon_size' => array(
        				'type' => 'number',
        				'label' => __( 'Icon size', 'ra-widgets-bundle' ),
        				'default' => '16'
        			),
					'icon_color' => array(
						'type' => 'color',
						'label' => __( 'Color', 'ra-widgets-bundle' ),
						'default' => '#fff'
					),
					'image' => array(
						'type' => 'media',
						'label' => __('Choose an image', 'ra-widgets-bundle'),
						'choose' => __('Choose image', 'ra-widgets-bundle'),
						'update' => __('Set image', 'ra-widgets-bundle'),
						'library' => 'image'
					),
					'headline' => array(
						'type' => 'text',
						'label' => __( 'Headline', 'ra-widgets-bundle' ),
					),
					'subheadline' => array(
						'type' => 'textarea',
						'label' => __( 'Subheadline', 'ra-widgets-bundle' )
					),
					'button_text' => array(
						'type' => 'text',
						'label' => __( 'Button Text', 'ra-widgets-bundle' ),
						'default' => 'Learn More'
					),
					'button_link' => array(
						'type' => 'link',
						'label' => __( 'Button Link', 'ra-widgets-bundle' )
					)
				)
			),
			'design' => array(
				'type' => 'select',
				'label' => __( 'Design', 'ra-widgets-bundle' ),
				'options' => array(
					'default' => __( 'Default', 'ra-widgets-bundle' ),
				),
				'default' => 'default'
			),
			'column' => array(
				'type' => 'slider',
				'label' => __( 'Columns', 'ra-widgets-bundle' ),
				'default' => 3,
				'min' => 1,
				'max' => 12,
				'integer' => true
			)
		);
	}

	function get_template_name( $instance ) {
		switch ( $instance['design'] ) {
            case 'default':
            default:
                return 'default';
                break;
        }
	}

	function get_less_variables( $instance ) {
		return array(
			'column' => $instance['column']
		);
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'title' => $instance['title'],
			'features' => $instance['features'],
			'design' => $instance['design'],
			'column' => $instance['column']
		);
	}
}

siteorigin_widget_register( 'rawb-features', __FILE__, 'RA_Features_Widget' );
