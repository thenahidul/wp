<?php 
function cptui_register_my_cpts_testimonial() {

	/**
	 * Post Type: Testimonials.
	 */

	$labels = [
		"name" => __( "Testimonials", "custom-post-type-ui" ),
		"singular_name" => __( "Testimonial", "custom-post-type-ui" ),
		"menu_name" => __( "Testimonials", "custom-post-type-ui" ),
		"all_items" => __( "All Testimonials", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Testimonial", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Testimonial", "custom-post-type-ui" ),
		"new_item" => __( "New Testimonial", "custom-post-type-ui" ),
		"view_item" => __( "View Testimonial", "custom-post-type-ui" ),
		"view_items" => __( "View Testimonials", "custom-post-type-ui" ),
		"search_items" => __( "Search Testimonials", "custom-post-type-ui" ),
		"not_found" => __( "No Testimonials found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Testimonials found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent Testimonial:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Testimonial", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Testimonial", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Testimonial", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Testimonial", "custom-post-type-ui" ),
		"archives" => __( "Testimonial archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Testimonial", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Testimonial", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Testimonials list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Testimonials list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Testimonials list", "custom-post-type-ui" ),
		"attributes" => __( "Testimonials attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Testimonial", "custom-post-type-ui" ),
		"item_published" => __( "Testimonial published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Testimonial published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Testimonial reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Testimonial scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Testimonial updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Testimonial:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Testimonials", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "testimonial", "with_front" => false ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "testimonial", $args );
}

add_action( 'init', 'cptui_register_my_cpts_testimonial' );
