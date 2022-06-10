<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package sentweb
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sentweb_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'sentweb_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function sentweb_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'sentweb_pingback_header' );


// add image size - blog post
add_image_size( 'blog-page-post', 300 );

// read more function 
function sent_read_more( $s=0, $c=15 ) {
	$con = get_the_content();
	$con = explode( " ", $con );
	$con = array_slice( $con, $s, $c );
	$con = implode( " ", $con );
	return '<p>'.$con.'</p>';
}

// featured image src
function get_sent_featured_image_src($size = 'blog-page-post') {
	$id = get_post_thumbnail_id();
	$src = wp_get_attachment_image_src( $id, $size );
	return $src[0];
}

// featured image alt tag
function get_sent_featured_image_alt() {
	$id = get_post_thumbnail_id();
	$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
	if(!$alt) {
		return $alt = get_the_title();
	} else {
		return $alt;
	}
}

// post meta
function get_sent_post_meta() {
	ob_start();
 ?>
	<ul class="entry-meta clearfix">
		<li><i class="icon-calendar3"></i> 
			<?php the_time( 'jS F Y' ); ?>
		</li>
		<li><i class="icon-user"></i> 
			<?php the_author_posts_link(); ?>
		</li>
		<!-- <li><i class="icon-folder-open"></i>  -->
			<?php // the_category( ',&nbsp;'); ?>
		<!-- </li> -->
		<!-- <li><i class="icon-comments"></i>
			<?php // comments_popup_link('No comments yet', '1', '%', 'comment-custom-class', 'Comment off'); ?>
		</li> -->
		<?php 
			$format = '';
			switch ( get_post_format( $format ) ) {
				case 'image':
					$icon = '<i class="icon-camera-retro"></i>';
					break;

				case 'video':
					$icon = '<i class="icon-film"></i>';
					break;

				case 'gallery':
					$icon = '<i class="icon-picture"></i>';
					break;

				case 'audio':
					$icon = '<i class="icon-music"></i>';
					break;

				case 'quote':
					$icon = '<span class="dashicons dashicons-format-quote"></span>';
					break;

				default:
					$icon = '<span class="dashicons dashicons-admin-post"></span>';
					break;
			}
		 ?>
		<!-- <li><a href="<?php // the_permalink(); ?>"><?php // echo $icon; ?></a></li> -->
	</ul>

<?php return ob_get_clean(); }


/**
 * Re-arranging the author, url and email comment fields
 */
function wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );