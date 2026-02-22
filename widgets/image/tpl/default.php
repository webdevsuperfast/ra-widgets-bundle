<?php
/**
 * Image widget template.
 *
 * @package RA_Widgets_Bundle
 */

$widget_title = isset( $title ) ? $title : '';
unset( $title );

if ( $widget_title ) {
	echo wp_kses_post( $args['before_title'] ) . esc_html( apply_filters( 'widget_title', $widget_title ) ) . wp_kses_post( $args['after_title'] );
}

$classes = array();
$classes[] = $class;
$classes[] = 'img-responsive';
$classes[] = $alignment;

$attributes = array();

 $attributes['class'] = esc_attr( implode( ' ', $classes ) );
 $attributes['alt'] = esc_attr( $alt );
if ( ! empty( $id ) ) {
	$attributes['id'] = esc_attr( $id );
}

// Link Target.
$link_target = ( ! empty( $target ) ) ? '_blank' : '_self';
?>
<div class="image-widget">
	<?php echo wp_kses_post( ( ! empty( $autop ) ) ? wpautop( $before, false ) : $before ); ?>
	<?php
	if ( ! empty( $url ) ) :
		$link_url = ( function_exists( 'sow_esc_url' ) ? sow_esc_url( $url ) : esc_url( $url ) );
		printf( '<a href="%1$s" target="%2$s" title="%3$s">', esc_url( $link_url ), esc_attr( $link_target ), esc_attr( $widget_title ) );
	endif;
	?>
		<?php echo wp_get_attachment_image( $image, $size, null, $attributes ); ?>
	<?php
	if ( ! empty( $url ) ) {
		echo '</a>';
	}
	?>
	<?php echo wp_kses_post( ( ! empty( $autop ) ) ? wpautop( $after, false ) : $after ); ?>
</div>
