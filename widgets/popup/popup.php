<?php
/*
Widget Name: RA Popup
Description: A simple popup content builder widget.
Author: Rotsen Mark Acob
Author URI: http://rotsenacob.com
*/

class RA_Popup_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rawb-popup',
            __( 'RA Popup', 'ra-widgets-bundle' ),
            array(
                'description' => __( 'A simple popup content builder to be used together with the RA Button Widget', 'ra-widgets-bundle' ),
                'help' => ''
            ),
            array(),
            false,
            plugin_dir_path( __FILE__ ) . 'widgets'
        );
    }

	function get_widget_form() {
		return array(
			'title' => array(
				'type' => 'text',
				'label' => __('Title', 'ra-widgets-bundle'),
				'default' => ''
			),
			'id' => array(
				'type' => 'text',
				'label' => __( 'ID', 'ra-widgets-bundle' ),
			),
            'class' => array(
                'type' => 'text',
                'label' => __( 'Class', 'ra-widgets-bundle' )
            ),
            'image' => array(
                'type' => 'widget',
                'label' => __( 'Image', 'ra-widgets-bundle' ),
                'class' => 'RA_Image_Widget'
            ),
            'content' => array(
                'type' => 'widget',
                'label' => __( 'Content', 'ra-widgets-bundle' ),
                'class' => 'SiteOrigin_Widget_Editor_Widget'
            ),
            'design' => array(
                'type' => 'section',
                'label' => __( 'Design', 'ra-widgets-bundle' ),
                'fields' => array(
                    'width' => array(
                        'type' => 'number',
                        'label' => __( 'Popup Width', 'ra-widgets-bundle' ),
                        'default' => 740
                    ),
                    'background' => array(
                        'type' => 'color',
                        'label' => __( 'Background', 'ra-widgets-bundle' ),
                        'default' => '#fff'
                    )
                )
            ),
            'settings' => array(
            	'type' => 'section',
            	'label' => __( 'Settings', 'ra-widgets-bundle' ),
            	'fields' => array(
                    'display_title' => array(
                        'type' => 'checkbox',
                        'label' => __( 'Display Title', 'ra-widgets-bundle' ),
                        'default' => true
                    ),
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
            	)
            ),
			'template' => array(
				'type' => 'select',
				'label' => __( 'Choose template', 'ra-widgets-bundle' ),
				'options' => array(
					'default' => __( 'Default', 'ra-widgets-bundle' )
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
        }
    }

	function get_template_variables( $instance, $args ) {
		return array(
    		'title' => $instance['title'],
            'id' => $instance['id'],
    		'class' => $instance['class'],
            'image' => $instance['image'],
            'content' => $instance['content'],
    		'template' => $instance['template'],
            'width' => $instance['design']['width'] . 'px',
            'background' => $instance['design']['background'],
            'display_title' => $instance['settings']['display_title'],
            'display_image' => $instance['settings']['display_image'],
            'display_content' => $instance['settings']['display_content']
    	);
	}

    function modify_child_widget_form( $child_widget_form, $child_widget ) {
        if ( get_class( $child_widget ) == 'RA_Image_Widget' ) {
            unset( $child_widget_form['settings']['fields']['alignment'] );
            unset( $child_widget_form['title'] );
            unset( $child_widget_form['content'] );
            unset( $child_widget_form['template'] );
        }

        if ( get_class( $child_widget ) == 'SiteOrigin_Widget_Editor_Widget' ) {
            unset( $child_widget_form['title'] );
        }
        
		return $child_widget_form;
	}
}

siteorigin_widget_register( 'rawb-popup', __FILE__, 'RA_Popup_Widget' );
