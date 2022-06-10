<?php 

flush_rewrite_rules();

/**
 * Custom Post types
 */
// SLIDER
function sentweb_post_type_slider() {
	$labels = array(
		'name'                  => _x( 'Sliders', 'Sliders', 'sentweb' ),
		'singular_name'         => _x( 'Slider', 'Slider', 'sentweb' ),
		'menu_name'             => __( 'Sliders', 'sentweb' ),
		'all_items'             => __( 'All Sliders', 'sentweb' ),
		'add_new_item'          => __( 'Add New Slide', 'sentweb' ),
		'add_new'               => __( 'Add New ', 'sentweb' ),
		'new_item'              => __( 'New Item', 'sentweb' ),
		'edit_item'             => __( 'Edit Slide', 'sentweb' ),
		'update_item'           => __( 'Update Slide', 'sentweb' ),
		'view_item'             => __( 'View Slide', 'sentweb' ),
		'view_items'            => __( 'View Slide', 'sentweb' ),
	);
	$args = array(
		'label'                 => __( 'Slider', 'sentweb' ),
		'description'           => __( 'Sent Slider', 'sentweb' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields'),
		'public'                => true,
		'show_ui'               => true,
		'menu_position'         => 10,
		'show_in_admin_bar'     => true,
		'has_archive'           => false,		
		'capability_type'       => 'page',
		'menu_icon'				=> 'dashicons-welcome-view-site',
		'rewrite'				=> array( 'slug' => 'slider' )
	);
	register_post_type( 'sent_sliders', $args );
}
add_action( 'init', 'sentweb_post_type_slider', 0 );


/**
 * Custom Post types
 */
//  Testimonials
function sentweb_post_type_testimonials() {
	$labels = array(
		'name'                  => _x( 'Testimonials', 'Testimonials', 'sentweb' ),
		'singular_name'         => _x( 'Testimonial', 'Testimonial', 'sentweb' ),
		'menu_name'             => __( 'Testimonials', 'sentweb' ),
		'all_items'             => __( 'All Testimonials', 'sentweb' ),
		'add_new_item'          => __( 'Add New Testimonial', 'sentweb' ),
		'add_new'               => __( 'Add New ', 'sentweb' ),
		'new_item'              => __( 'New Item', 'sentweb' ),
		'edit_item'             => __( 'Edit Testimonial', 'sentweb' ),
		'update_item'           => __( 'Update Testimonial', 'sentweb' ),
		'view_item'             => __( 'View Testimonial', 'sentweb' ),
		'view_items'            => __( 'View Testimonial', 'sentweb' ),
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'sentweb' ),
		'description'           => __( 'Sent Testimonial', 'sentweb' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'public'                => true,
		'show_ui'               => true,
		'menu_position'         => 11,
		'show_in_admin_bar'     => true,
		'has_archive'           => false,		
		'capability_type'       => 'page',
		'menu_icon'				=> 'dashicons-groups',
		'rewrite'				=> array( 'slug' => 'testimnials' )
	);
	register_post_type( 'sent_testimonials', $args );
}
add_action( 'init', 'sentweb_post_type_testimonials', 0 );


/**
 * Custom Post types
 */
// NEWS
function sentweb_post_type_news() {
	$labels = array(
		'name'                  => _x( 'News', 'News', 'sentweb' ),
		'singular_name'         => _x( 'News', 'News', 'sentweb' ),
		'menu_name'             => __( 'News', 'sentweb' ),
		'all_items'             => __( 'All News', 'sentweb' ),
		'add_new_item'          => __( 'Add New News', 'sentweb' ),
		'add_new'               => __( 'Add New ', 'sentweb' ),
		'new_item'              => __( 'New Item', 'sentweb' ),
		'edit_item'             => __( 'Edit News', 'sentweb' ),
		'update_item'           => __( 'Update News', 'sentweb' ),
		'view_item'             => __( 'View News', 'sentweb' ),
		'view_items'            => __( 'View News', 'sentweb' ),
	);
	$args = array(
		'label'                 => __( 'News', 'sentweb' ),
		'description'           => __( 'Sent News', 'sentweb' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'public'                => true,
		'show_ui'               => true,
		'menu_position'         => 12,
		'show_in_admin_bar'     => true,
		'has_archive'           => false,		
		'capability_type'       => 'page',
		'menu_icon'				=> 'dashicons-megaphone',
		'rewrite'				=> array( 'slug' => 'news' )
	);
	register_post_type( 'sent-news', $args );
}
//add_action( 'init', 'sentweb_post_type_news', 0 );


/**
 * Custom Post types
 */
// INDUSTRIES
function sentweb_post_type_industries() {
	$labels = array(
		'name'                  => _x( 'Industries', 'Industries', 'sentweb' ),
		'singular_name'         => _x( 'Industry', 'Industry', 'sentweb' ),
		'menu_name'             => __( 'Industries', 'sentweb' ),
		'all_items'             => __( 'All Industries', 'sentweb' ),
		'add_new_item'          => __( 'Add New Industry', 'sentweb' ),
		'add_new'               => __( 'Add New ', 'sentweb' ),
		'new_item'              => __( 'New Item', 'sentweb' ),
		'edit_item'             => __( 'Edit Industry', 'sentweb' ),
		'update_item'           => __( 'Update Industry', 'sentweb' ),
		'view_item'             => __( 'View Industry', 'sentweb' ),
		'view_items'            => __( 'View Industry', 'sentweb' ),
	);
	$args = array(
		'label'                 => __( 'Industry', 'sentweb' ),
		'description'           => __( 'Sent Industry', 'sentweb' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'public'                => true,
		'show_ui'               => true,
		'menu_position'         => 13,
		'show_in_admin_bar'     => true,
		'has_archive'           => false,		
		'capability_type'       => 'page',
		'menu_icon'				=> 'dashicons-building',
		'rewrite'				=> array( 'slug' => 'industries' )
	);
	register_post_type( 'sent-industries', $args );
}
add_action( 'init', 'sentweb_post_type_industries', 0 );