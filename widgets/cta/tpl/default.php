<div class="cta-widget">
	<div class="cta-wrapper">
		<?php if ( $display_image == true ) { ?>
			<div class="cta-image">
				<?php $this->sub_widget( 'RWP_Image_Widget', $args, $instance['image'] ); ?>
			</div>
		<?php } ?>
		<div class="cta-text">
			<?php echo $headline ? '<h4 class="cta-heading">'.$headline.'</h4>' : ''; ?>
			<?php echo $subheadline ? '<p class="cta-subheading">'.$subheadline.'</p>' : ''; ?>
			<?php echo $content ? wpautop( do_shortcode( $content ), false ) : ''; ?>
		</div>
		<?php if ( $display_button == true ) { ?>
			<div class="cta-button">
				<?php $this->sub_widget( 'RWP_Button_Widget', $args, $instance['button'] ); ?>
			</div>
		<?php } ?>
	</div>
</div>