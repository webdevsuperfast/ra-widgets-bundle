<?php
/**
 * Testimonial widget template.
 *
 * @package RA_Widgets_Bundle
 */

$widget_title = isset( $title ) ? $title : '';
unset( $title );

if ( $widget_title ) {
	echo wp_kses_post( $args['before_title'] ) . esc_html( apply_filters( 'widget_title', $widget_title ) ) . wp_kses_post( $args['after_title'] );
}

$widget_id = isset( $args['widget_id'] ) ? $args['widget_id'] : '';
$widget_id = preg_replace( '/[^0-9]/', '', $widget_id );

$attributes = array();

$classes = array();
$classes[] = 'rawb-testimonial';
$classes[] = 'owl-carousel';
$classes[] = 'owl-theme';

if ( ! empty( $class ) ) {
	$classes[] = $class;
}

$attributes = array(
	'class' => esc_attr( implode( ' ', $classes ) ),
	'id' => 'testimonial-' . (int) $widget_id,
	'data-instance' => (int) $widget_id,
);

$post_args = array(
	'post_type' => 'testimonial',
	'posts_per_page' => isset( $numpost ) ? $numpost : 5,
	'order' => isset( $order ) ? $order : 'DESC',
	'orderby' => isset( $orderby ) ? $orderby : 'date',
);

$vars = array(
	'id' => 'testimonial-' . (int) $widget_id,
	'items' => isset( $slides ) ? (int) $slides : 1,
	'margin' => isset( $margin ) ? (int) $margin : 0,
	'duration' => isset( $duration ) ? (int) $duration : 250,
	'speed' => isset( $speed ) ? (int) $speed : 250,
	'autoplay' => ( ! empty( $autoplay ) ) ? 'true' : 'false',
	'navigation' => ( ! empty( $navigation ) ) ? 'true' : 'false',
	'pagination' => ( ! empty( $pagination ) ) ? 'true' : 'false',
	'autowidth' => ( ! empty( $autowidth ) ) ? 'true' : 'false',
	'lazyload' => ( ! empty( $lazyload ) ) ? 'true' : 'false',
	'center' => ( ! empty( $center ) ) ? 'true' : 'false',
	'mergefit' => ( ! empty( $mergefit ) ) ? 'true' : 'false',
	'loop' => ( ! empty( $loop ) ) ? 'true' : 'false',
	'slidesMobile' => isset( $slides_mobile ) ? (int) $slides_mobile : 1,
	'slidesTablet' => isset( $slides_tablet ) ? (int) $slides_tablet : 1,
);

$loop = new WP_Query( $post_args );
?>

<?php if ( $loop->have_posts() ) : ?>
	<?php
	wp_enqueue_script( 'rawb-owl-carousel-js' );
	wp_enqueue_script( 'rawb-widgets-js' );
	wp_localize_script( 'rawb-widgets-js', 'testimonial' . (int) $widget_id, $vars );
	?>

	<div 
	<?php
	foreach ( $attributes as $name => $value ) {
		printf( '%s="%s" ', esc_attr( preg_replace( '/[^a-zA-Z0-9_-]/', '', $name ) ), esc_attr( $value ) );
	}
	?>
	>
	<?php
	while ( $loop->have_posts() ) :
		$loop->the_post();
		?>
		<div class="testimonial-wrapper">
			<div class="testimonial-copy">
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="testimonial-image">
						<?php if ( ! empty( $lazyload ) ) { ?>
							<?php
							echo get_the_post_thumbnail(
								get_the_ID(),
								$size,
								array(
									'class' => 'owl-lazy',
									'data-src' => get_the_post_thumbnail_url( get_the_ID(), $size ),
								)
							);
							?>
						<?php } else { ?>
							<?php echo get_the_post_thumbnail( get_the_ID(), $size ); ?>
						<?php } ?>
					</div>
				<?php } ?>
				<div class="testimonial-content">
					<div class="content-wrap">
						<?php echo wp_kses_post( wpautop( get_the_content(), false ) ); ?>
						<?php echo '<h4>' . esc_html( apply_filters( 'rawb_testimonial_title', get_the_title(), get_the_ID() ) ) . '</h4>'; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<?php echo esc_html__( 'No testimonials found.', 'ra-widgets-bundle' ); ?>

	</div>
	<?php endif; ?>
