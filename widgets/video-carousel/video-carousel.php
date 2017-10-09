<?php
/*
Widget Name: RA Video Carousel
Description: A simple video carousel widget.
Author: Rotsen Mark Acob
Author URI: http://rotsenacob.com
*/

class Video_Carousel_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rawb-video-carousel',
            __( 'RA Video Carousel', 'ra-widgets-bundle' ),
            array(
                'description' => __( 'A simple video carousel widget', 'ra-widgets-bundle' ),
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
			'videos' => array(
				'type' => 'repeater',
				'label' => __('Add Videos', 'ra-widgets-bundle'),
				'item_name' => __('Video', 'ra-widgets-bundle'),
				'item_label' => array(
					'selector' => "[id*='video']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'video' => array(
						'type' => 'link',
                        'label' => __( 'Video Link', 'ra-widgets-bundle' )
					)
				)
			),
			'settings' => array(
				'type' => 'section',
				'label' => __( 'Video Settings', 'ra-widgets-bundle' ),
				'hide' => true,
				'fields' => array(
					'videox' => array(
						'type' => 'number',
						'label' => __( 'Video Width', 'ra-widgets-bundle' ),
						'default' => '860'
					),
					'videoy' => array(
						'type' => 'number',
						'label' => __( 'Video Height', 'ra-widgets-bundle' ),
						'default' => '480'
					),
				)
			),
			'slideshow' => array(
				'type' => 'section',
				'label' => __( 'Slideshow Settings', 'ra-widgets-bundle' ),
				'hide' => true,
				'fields' => array(
					'slides' => array(
						'type' => 'number',
						'default' => 1,
						'label' => __( 'Slides', 'gss' )
					),
					'margin' => array(
						'type' => 'number',
						'default' => 0,
						'label' => __( 'Slide margin', 'gss' ),
					),
					'duration' => array(
						'type' => 'number',
						'default' => 250,
						'label' => __( 'Duration', 'gss' ),
					),
					'speed' => array(
						'type' => 'number',
						'default' => 250,
						'label' => __( 'Speed', 'gss' ),
					),
					'autoplay' => array(
						'type' => 'checkbox',
						'default' => false,
						'label' => __( 'Enable autoplay?', 'gss' ),
					),
					'navigation' => array(
						'type' => 'checkbox',
						'default' => true,
						'label' => __( 'Display navigation?', 'gss' ),
					),
					'pagination' => array(
						'type' => 'checkbox',
						'default' => false,
						'label' => __( 'Display pagination?', 'gss' ),
					),
					'autoheight' => array(
						'type' => 'checkbox',
						'default' => false,
						'label' => __( 'Enable autoheight?', 'gss' ),
					),
					'autowidth' => array(
						'type' => 'checkbox',
						'default' => false,
						'label' => __( 'Enable autowidth?', 'gss' ),
					),
					'center' => array(
						'type' => 'checkbox',
						'default' => false,
						'label' => __( 'Center item', 'gss' ),
					),
					'mergefit' => array(
						'type' => 'checkbox',
						'default' => false,
						'label' => __( 'Fit merged items?', 'gss' ),
					),
					'loop' => array(
						'type' => 'checkbox',
						'default' => true,
						'label' => __( 'Loop items?', 'gss' )
					)
				)
			),
			'responsive' => array(
				'type' => 'section',
				'label' => __( 'Responsive Settings', 'ra-widgets-bundle' ),
				'hide' => true,
				'fields' => array(
					'mobile' => array(
						'type' => 'number',
						'label' => __( 'Slides for mobile', 'ra-widgets-bundle' ),
						'default' => 1
					),
					'tablet' => array(
						'type' => 'number',
						'label' => __( 'Slides for tablets', 'ra-widgets-bundle' ),
						'default' => 1
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

    function get_style_name( $instance ) {
        return false;
    }

	function get_template_variables( $instance, $args ) {
		return array(
    		'title' => $instance['title'],
    		'class' => $instance['class'],
    		'template' => $instance['template'],
			'slides' => $instance['slideshow']['slides'],
			'margin' => $instance['slideshow']['margin'],
			'duration' => $instance['slideshow']['duration'],
			'speed' => $instance['slideshow']['speed'],
			'autoplay' => $instance['slideshow']['autoplay'],
			'navigation' => $instance['slideshow']['navigation'],
			'pagination' => $instance['slideshow']['pagination'],
			'autowidth' => $instance['slideshow']['autowidth'],
			'autoheight' => $instance['slideshow']['autoheight'],
			'center' => $instance['slideshow']['center'],
			'mergefit' => $instance['slideshow']['mergefit'],
			'loop' => $instance['slideshow']['loop'],
			'slides_mobile' => $instance['responsive']['mobile'],
			'slides_tablet' => $instance['responsive']['tablet'],
			'videox' => $instance['settings']['videox'],
			'videoy' => $instance['settings']['videoy']
    	);
	}
}

siteorigin_widget_register( 'rawb-video-carousel', __FILE__, 'Video_Carousel_Widget' );
