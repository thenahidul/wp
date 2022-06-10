<?php 

// Copyright
if(!function_exists('sent_copyright_shortcode')) :
	function sent_copyright_shortcode() {
		return '&copy; ' . get_the_time('Y');
	}
endif;
add_shortcode( 'sent_copyright', 'sent_copyright_shortcode' );