<?php
/*
Widget Name: RA Post Carousel
Description: A simple post carousel widget.
Author: Rotsen Mark Acob
Author URI: http://rotsenacob.com
*/

class RA_Post_Carousel_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rawb-post-carousel',
            __( 'RA Post Carousel', 'ra-widgets-bundle' ),
            array(
                'description' => __( 'A simple post carousel widget', 'ra-widgets-bundle' ),
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
			'title' => array(
				'type' => 'text',
				'label' => __('Title', 'ra-widgets-bundle'),
				'default' => ''
			),
			'class' => array(
				'type' => 'text',
				'label' => __( 'Class', 'ra-widgets-bundle' )
			),
			'post' => array(
				'type' => 'posts',
				'label' => __( 'Post Query', 'ra-widgets-bundle' )
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

    function get_template_variables( $instance, $args ) {
    	return array(
    		'title' => $instance['title'],
    		'class' => $instance['class'],
			'post' => $instance['post'],
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
			'slides_tablet' => $instance['responsive']['tablet']
    	);
    }
}

siteorigin_widget_register( 'rawb-post-carousel', __FILE__, 'RA_Post_Carousel_Widget' );
