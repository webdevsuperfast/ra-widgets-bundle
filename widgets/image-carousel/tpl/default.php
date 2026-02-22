<?php
/**
 * Image carousel widget template.
 *
 * @package RA_Widgets_Bundle
 */

$widget_title = isset( $instance['title'] ) ? $instance['title'] : '';
unset( $title );

if ( $widget_title ) {
	echo wp_kses_post( $args['before_title'] ) . esc_html( apply_filters( 'widget_title', $widget_title ) ) . wp_kses_post( $args['after_title'] );
}

$widget_id = isset( $args['widget_id'] ) ? $args['widget_id'] : '';
$widget_id = preg_replace( '/[^0-9]/', '', $widget_id );

echo '<div class="image-carousel-widget">';
	$images = isset( $instance['images'] ) ? $instance['images'] : array();
	$options = isset( $instance['slideshow'] ) ? $instance['slideshow'] : array();
	$imageattr = isset( $instance['settings'] ) ? $instance['settings'] : array();

	$classes = array();

	$classes[] = 'rawb-image-carousel';
	$classes[] = 'owl-carousel';
	$classes[] = 'owl-theme';
if ( ! empty( $options['class'] ) ) {
	$classes[] = ' ' . $options['class'];
}

	$attr = array(
		'id' => 'image-carousel-' . (int) $widget_id,
		'class' => esc_attr( implode( ' ', $classes ) ),
		'data-instance' => (int) $widget_id,
	);

	$attributes = array();

	$attributes['items'] = isset( $slides ) ? (int) $slides : 1;

	$attributes['navigation'] = ( ! empty( $options['navigation'] ) ) ? 'true' : 'false';
	$attributes['pagination'] = ( ! empty( $options['pagination'] ) ) ? 'true' : 'false';
	$attributes['autoplay'] = ( ! empty( $options['autoplay'] ) ) ? 'true' : 'false';
	$attributes['smartspeed'] = ! empty( $options['duration'] ) ? (int) $options['duration'] : 250;
	$attributes['fluidspeed'] = ! empty( $options['speed'] ) ? (int) $options['speed'] : 250;
	$attributes['lazyload'] = ( ! empty( $options['lazyload'] ) ) ? 'true' : 'false';
	$attributes['autowidth'] = ( ! empty( $options['autowidth'] ) ) ? 'true' : 'false';
	$attributes['mergefit'] = ( ! empty( $options['mergefit'] ) ) ? 'true' : 'false';
	$attributes['center'] = ( ! empty( $options['center'] ) ) ? 'true' : 'false';
	$attributes['margin'] = isset( $options['margin'] ) ? $options['margin'] : '';
	$attributes['id'] = 'image-carousel-' . (int) $widget_id;
	$attributes['slidesmobile'] = ! empty( $slides_mobile ) ? (int) $slides_mobile : (int) $slides;
	$attributes['slidestablet'] = ! empty( $slides_tablet ) ? (int) $slides_tablet : (int) $slides;
	$attributes['loop'] = ( ! empty( $options['loop'] ) ) ? 'true' : 'false';

	wp_enqueue_script( 'rawb-owl-carousel-js' );
	wp_enqueue_script( 'rawb-widgets-js' );
	wp_localize_script( 'rawb-widgets-js', 'imagecarousel' . (int) $widget_id, $attributes );

	if ( is_array( $images ) && ! is_wp_error( $images ) ) { ?>
		<div 
		<?php
		foreach ( $attr as $name => $value ) {
			echo esc_attr( preg_replace( '/[^a-zA-Z0-9_-]/', '', $name ) ) . '="' . esc_attr( $value ) . '" ';
		}
		?>
			>
			<?php
			foreach ( $images as $image ) {
				$image_link = isset( $image['link'] ) ? ( function_exists( 'sow_esc_url' ) ? sow_esc_url( $image['link'] ) : esc_url( $image['link'] ) ) : '';
				$alt = isset( $image['alt'] ) ? esc_attr( $image['alt'] ) : '';
				$imagesource = wp_get_attachment_image_src( $image['image'], 'full' );
				$url = isset( $imagesource[0] ) ? $imagesource[0] : '';

				echo '<div>';
				if ( ! empty( $image_link ) ) {
					echo '<a href="' . esc_url( $image_link ) . '">';
				}
				if ( ! empty( $options['lazyload'] ) ) {
					echo wp_get_attachment_image(
						$image['image'],
						$imageattr['size'],
						null,
						array(
							'class' => 'owl-lazy',
							'data-src' => wp_get_attachment_image_url( $image['image'], $imageattr['size'] ),
						)
					);
				} else {
					echo wp_get_attachment_image( $image['image'], $imageattr['size'] );
				}
				if ( ! empty( $image_link ) ) {
					echo '</a>';
				}
				echo '</div>';
			}
			?>
		</div>
		<?php
	}
	echo '</div>';
