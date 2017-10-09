<?php
$imagesource = wp_get_attachment_image_src( $image, $size );
$url = esc_url( $imagesource[0] );
$classes = array();
$classes[] = 'side-image';
$classes[] = $image_position;
$classes[] = 'side-image-' . $template;
?>
<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<?php if ( $display_image == true ) { ?>
	<div class="image-wrapper">
        <img src="<?php echo $url; ?>" alt="" />
	</div>
	<?php } ?>
	<div class="content-wrapper">
		<?php if ( $display_content == true ) { ?>
			<?php $this->sub_widget('SiteOrigin_Widget_Editor_Widget', $args, $instance['editor']) ?>
		<?php } ?>
		<?php if ( $display_button == true ) { ?>
			<div class="side-image-button">
				<?php $this->sub_widget( 'RA_Button_Widget', $args, $instance['button'] ); ?>
			</div>
		<?php } ?>
	</div>
</div>
