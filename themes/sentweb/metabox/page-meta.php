<?php 

// SUBTITLE METABOX
function sent_page_meta_boxes() {
	$post_type = array( 'post', 'page', 'sent-industries', 'sent-news' );
	add_meta_box( 'page-title', 'Subtitle', 'sent_meta_subtitle_callback', $post_type );
}

function sent_meta_subtitle_callback( $post ) {

	wp_nonce_field( 'sent_page_sava_subtitle_data', 'sent_page_subtitle_meta_box_nonce' );

	$value = get_post_meta( $post->ID, '_page_subtitle_value_key', true );

	echo '<label for="sent_page_subtitle_field"></label><br>';
	echo '<input type="text" name="sent_page_subtitle_field" id="sent_page_subtitle_field" value="'.esc_attr( $value ).'" class="widefat">';	
}


function sent_page_sava_subtitle_data( $post_id ) {

	if( ! isset( $_POST['sent_page_subtitle_meta_box_nonce'] ) ) {
		return;
	}
	if( ! wp_verify_nonce( $_POST['sent_page_subtitle_meta_box_nonce'], 'sent_page_sava_subtitle_data' ) ) {
		return;
	}

	// optional - if don't want autosave for metabox
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if( ! isset( $_POST['sent_page_subtitle_field'] ) ) {
		return;
	}

	$text_data = sanitize_text_field( $_POST['sent_page_subtitle_field'] );

	update_post_meta( $post_id, '_page_subtitle_value_key', $text_data );

}
add_action( 'add_meta_boxes', 'sent_page_meta_boxes' );
add_action( 'save_post', 'sent_page_sava_subtitle_data' );