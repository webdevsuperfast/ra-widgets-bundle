<?php
if ( $title ) {
	echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
}

$classes = array();
$classes[] = $class;
$classes[] = 'img-responsive';
$classes[] = $alignment;

$attributes = array();

$attributes['class'] = esc_attr( implode( ' ', $classes ) );
$attributes['alt'] = $alt;
if ( $id ) {
	$attributes['id'] = $id;
}

// Link Target
if ( $target == true ) :
	$target = '_blank';
else :
	$target = '_self';
endif;
?>
<div class="image-widget">
	<?php echo $autop == true ? wpautop( $before, false ) : $before; ?>
	<?php echo $url ? '<a target="'.$target.'" href="'.sow_esc_url( $url ).'" title="'.$title.'">' : ''; ?>
		<?php echo wp_get_attachment_image( $image, $size, null, $attributes ); ?>
	<?php echo $url ? '</a>' : ''; ?>
	<?php echo $autop == true ? wpautop( $after, false ) : $after; ?>
</div>
