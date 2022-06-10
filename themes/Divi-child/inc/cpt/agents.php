<?php 
function cptui_register_my_cpts_agent() {

	/**
	 * Post Type: Agents.
	 */

	$labels = [
		"name" => __( "Agents", "custom-post-type-ui" ),
		"singular_name" => __( "Agent", "custom-post-type-ui" ),
		"menu_name" => __( "Agents", "custom-post-type-ui" ),
		"all_items" => __( "All Agents", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Agent", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Agent", "custom-post-type-ui" ),
		"new_item" => __( "New Agent", "custom-post-type-ui" ),
		"view_item" => __( "View Agent", "custom-post-type-ui" ),
		"view_items" => __( "View Agents", "custom-post-type-ui" ),
		"search_items" => __( "Search Agents", "custom-post-type-ui" ),
		"not_found" => __( "No Agents found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Agents found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent Agent:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Agent", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Agent", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Agent", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Agent", "custom-post-type-ui" ),
		"archives" => __( "Agent archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Agent", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Agent", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Agents list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Agents list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Agents list", "custom-post-type-ui" ),
		"attributes" => __( "Agents attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Agent", "custom-post-type-ui" ),
		"item_published" => __( "Agent published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Agent published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Agent reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Agent scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Agent updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Agent:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Agents", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "agent", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title" ],
	];

	register_post_type( "agent", $args );
}

add_action( 'init', 'cptui_register_my_cpts_agent' );
