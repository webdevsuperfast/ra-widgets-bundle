<?php
/*
Widget Name: RA Lists
Description: A simple list widget.
Author: Rotsen Mark Acob
Author URI: http://rotsenacob.com
*/

class List_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rawb-lists',
            __( 'RA Lists', 'ra-widgets-bundle' ),
            array(
                'description' => __( 'A simple list widget', 'ra-widgets-bundle' ),
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
			'class' => array(
				'type' => 'text',
				'label' => __( 'Class', 'ra-widgets-bundle' ),
			),
			'lists' => array(
				'type' => 'repeater',
				'label' => __('Add List', 'ra-widgets-bundle'),
				'item_name' => __('List', 'ra-widgets-bundle'),
				'item_label' => array(
					'selector' => "[id*='title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'title' => array(
						'type' => 'text',
						'label' => __( 'List Title', 'ra-widgets-bundle' ),
						'default' => ''
					),
					'content' => array(
						'type' => 'tinymce',
						'label' => __('List Content', 'ra-widgets-bundle'),
						'default' => '',
						'rows' => 10,
						'default_editor' => 'html',
						'button_filters' => array(
							'mce_buttons' => array( $this, 'filter_mce_buttons' ),
							'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
							'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
							'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
							'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
						),
					)
				)
			),
			'icon' => array(
				'type' => 'section',
				'label' => __( 'Icon Settings', 'gss' ),
				'hide' => true,
				'fields' => array(
                    'image' => array(
                        'type' => 'media',
                        'label' => __('Choose an image', 'ra-widgets-bundle'),
                        'choose' => __('Choose image', 'ra-widgets-bundle'),
                        'update' => __('Set image', 'ra-widgets-bundle'),
                        'library' => 'image'
                    ),
                    'size' => array(
        				'type' => 'number',
        				'label' => __( 'Icon size', 'ra-widgets-bundle' ),
        				'default' => '16'
        			)
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

    function get_style_name( $instance ) {
        return false;
    }

	function get_template_variables( $instance, $args ) {
		return array(
    		'title' => $instance['title'],
    		'class' => $instance['class'],
    		'icon_image' => $instance['icon']['image'],
            'icon_size' => $instance['icon']['size'],
            'template' => $instance['template']
    	);
	}
}

siteorigin_widget_register( 'rawb-lists', __FILE__, 'List_Widget' );
