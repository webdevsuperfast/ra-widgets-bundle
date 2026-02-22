<?php
/**
 * Headline widget template.
 *
 * @package RA_Widgets_Bundle
 */

$classes = array();
$classes[] = 'headline-widget';
$classes[] = $class;

$attributes = array();
$attributes['class'] = esc_attr( implode( ' ', $classes ) );
?>

<div 
<?php
foreach ( $attributes as $name => $value ) {
	printf( '%s="%s" ', esc_attr( preg_replace( '/[^a-zA-Z0-9_-]/', '', $name ) ), esc_attr( $value ) );
}
?>
	<?php
	$widget_title = isset( $title ) ? $title : '';
	unset( $title );
	if ( $widget_title ) {
		echo wp_kses_post( $args['before_title'] ) . esc_html( apply_filters( 'widget_title', $widget_title ) ) . wp_kses_post( $args['after_title'] );
	}
	?>
	?>
	<?php
	if ( ! empty( $subtitle ) ) {
		echo '<p class="subtitle">' . wp_kses_post( apply_filters( 'rawb_subtitle', $subtitle ) ) . '</p>';
	}
	?>
</div>
