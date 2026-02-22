<?php
/**
 * Button widget template.
 *
 * @package RA_Widgets_Bundle
 */

$classes = array();
$classes[] = 'btn';
$classes[] = 'btn-' . $design;
$classes[] = 'icon-' . $icon_position;

$classes[] = $class ? $class : '';

$widget_id = $args['widget_id'];
$widget_id = preg_replace( '/[^0-9]/', '', $widget_id );

$attributes = array();

$attributes['class'] = esc_attr( implode( ' ', $classes ) );
$attributes['target'] = esc_attr( $target );
$attributes['href'] = ( function_exists( 'sow_esc_url' ) ? sow_esc_url( $url ) : esc_url( $url ) );
$attributes['id'] = 'btn-' . (int) $widget_id;
$attributes['data-instance'] = (int) $widget_id;

if ( is_array( $attrs ) && ! is_wp_error( $attrs ) ) {
	foreach ( $attrs as $attr ) {
		$att = isset( $attr['attribute'] ) ? preg_replace( '/[^a-zA-Z0-9_-]/', '', $attr['attribute'] ) : '';
		$val = isset( $attr['value'] ) ? $attr['value'] : '';

		if ( $att ) {
			$attributes[ $att ] = esc_attr( $val );
		}
	}
}
?>

<a 
<?php
foreach ( $attributes as $name => $value ) {
	printf( '%s="%s" ', esc_attr( preg_replace( '/[^a-zA-Z0-9_-]/', '', $name ) ), esc_attr( $value ) );
}
?>
>
	<span class="button-wrap">
			<?php
			$widget_title = isset( $title ) ? $title : '';
			unset( $title );

			if ( ! empty( $icon ) ) {
				$icon_styles = array();
				if ( ! empty( $icon_size ) ) {
					$icon_styles[] = 'font-size:' . intval( $icon_size ) . 'px';
				}
				if ( ! empty( $icon_color ) ) {
					$icon_styles[] = 'color:' . esc_attr( $icon_color );
				}

				$icon = siteorigin_widget_get_icon( $icon, $icon_styles );
				$icon = wp_kses_post( $icon );
			} else {
				$icon = '';
			}
			?>
			<?php
			switch ( $icon_position ) {
				case 'right':
					echo esc_html( $widget_title ) . wp_kses_post( $icon );
					break;
				case 'center':
					echo wp_kses_post( $icon ) . esc_html( $widget_title );
					break;
				case 'left':
				default:
					echo wp_kses_post( $icon ) . esc_html( $widget_title );
					break;
			}
			?>
	</span>
</a>
