<?php
/*
Widget Name: RA Side Image
Description: A simple widget based of Bourbon Refills Side Image.
Author: Rotsen Mark Acob
Author URI: http://rotsenacob.com
*/

class RA_Side_Image extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'rawb-side-image',
			__( 'RA Side Image', 'ra-widgets-bundle' ),
			array(
				'description' => __( 'A simple widget based of Bourbon Refills Side Image', 'ra-widgets-bundle' ),
				'help' => ''
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
			'image' => array(
				'type' => 'media',
				'label' => __('Choose an image', 'ra-widgets-bundle'),
				'choose' => __('Choose image', 'ra-widgets-bundle'),
				'update' => __('Set image', 'ra-widgets-bundle'),
				'library' => 'image'
			),
			'image_position' => array(
				'type' => 'select',
				'label' => __( 'Image position', 'ra-widgets-bundle' ),
				'options' => array(
					'left-image' => __( 'Left', 'ra-widgets-bundle' ),
					'right-image' => __( 'Right', 'ra-widgets-bundle' )
				),
				'default' => 'left-image'
			),
			'editor' => array(
				'type' => 'widget',
				'label' => __( 'Editor', 'ra-widgets-bundle' ),
				'class' => 'SiteOrigin_Widget_Editor_Widget',
				'hide' => false
			),
			'button' => array(
            	'type' => 'widget',
            	'label' => __( 'Button', 'ra-widgets-bundle' ),
            	'class' => 'RA_Button_Widget',
            	'hide' => false
            ),
            'settings' => array(
            	'type' => 'section',
            	'label' => __( 'Settings', 'ra-widgets-bundle' ),
            	'fields' => array(
            		'display_image' => array(
            			'type' => 'checkbox',
            			'label' => __( 'Display Image', 'ra-widgets-bundle' ),
            			'default' => true
            		),
            		'display_content' => array(
            			'type' => 'checkbox',
            			'label' => __( 'Display Content', 'ra-widgets-bundle' ),
            			'default' => true
            		),
            		'display_button' => array(
            			'type' => 'checkbox',
            			'label' => __( 'Display Button', 'ra-widgets-bundle' ),
            			'default' => true
            		)
            	)
            ),
			'template' => array(
				'type' => 'select',
				'label' => __( 'Template', 'ra-widgets-bundle' ),
				'options' => array(
					'default' => __( 'Default', 'ra-widgets-bundle' ),
					'img' => __( 'Image in img tag', 'ra-widgets-bundle' )
				),
				'default' => 'default'
			)
		);
	}

	function get_template_name( $instance ) {
		switch ( $instance['template'] ) {
            case 'default':
            default:
                return 'default';
                break;
			case 'img':
				return 'image';
				break;
        }
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'image' => $instance['image'],
			'size' => 'full',
			'template' => $instance['template'],
			'display_image' => $instance['settings']['display_image'],
			'display_content' => $instance['settings']['display_content'],
            'display_button' => $instance['settings']['display_button'],
			'image_position' => $instance['image_position']
		);
	}

	function modify_child_widget_form( $child_widget_form, $child_widget ) {
        if ( get_class( $child_widget ) == 'RA_Button_Widget' ) {
            unset( $child_widget_form['template'] );
        }
        
		return $child_widget_form;
	}
}

siteorigin_widget_register( 'rawb-side-image', __FILE__, 'RA_Side_Image' );
