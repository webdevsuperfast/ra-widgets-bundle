<?php
/**
 * CTA widget template.
 *
 * @package RA_Widgets_Bundle
 */

?>
<div class="cta-widget">
	<div class="cta-wrapper">
		<?php if ( ! empty( $display_image ) ) { ?>
			<div class="cta-image">
				<?php $this->sub_widget( 'RAWB_Image_Widget', $args, $instance['image'] ); ?>
			</div>
		<?php } ?>
		<div class="cta-text">
			<?php
			$widget_title = isset( $title ) ? $title : '';
			unset( $title );

			if ( $widget_title ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( apply_filters( 'widget_title', $widget_title ) ) . wp_kses_post( $args['after_title'] );
			}
			?>
			
			<?php
			if ( ! empty( $subtitle ) ) {
				echo '<p class="subtitle">' . wp_kses_post( $subtitle ) . '</p>';
			}
			?>

			<?php if ( ! empty( $display_content ) ) { ?>
				<?php echo wp_kses_post( $content ); ?>
			<?php } ?>
		</div>
		<?php if ( ! empty( $display_button ) ) { ?>
			<div class="cta-button">
				<?php $this->sub_widget( 'RAWB_Button_Widget', $args, $instance['button'] ); ?>
			</div>
		<?php } ?>
	</div>
</div>
