<?php
/**
 * Misc helper functions.
 *
 * @package RA_Widgets_Bundle
 */

/**
 * Get an array of registered image sizes.
 *
 * @return array
 */
function rawb_thumb_sizes() {
	global $_wp_additional_image_sizes;

	$sizes = array(
		'full' => __( 'Full', 'ra-widgets-bundle' ),
	);

	$get_intermediate_image_sizes = get_intermediate_image_sizes();

	foreach ( $get_intermediate_image_sizes as $_size ) {
		if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {
			$sizes[ $_size ] = ucwords( $_size ); // strtouppercase.
		}
	}

	return $sizes;
}
