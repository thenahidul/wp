<?php 

function cptui_register_my_cpts_property() {

	/**
	 * Post Type: Properties.
	 */

	$labels = [
		"name" => __( "Properties", "custom-post-type-ui" ),
		"singular_name" => __( "Property", "custom-post-type-ui" ),
		"menu_name" => __( "Properties", "custom-post-type-ui" ),
		"all_items" => __( "All Properties", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Property", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Property", "custom-post-type-ui" ),
		"new_item" => __( "New Property", "custom-post-type-ui" ),
		"view_item" => __( "View Property", "custom-post-type-ui" ),
		"view_items" => __( "View Properties", "custom-post-type-ui" ),
		"search_items" => __( "Search Properties", "custom-post-type-ui" ),
		"not_found" => __( "No Properties found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Properties found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent Property:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Property", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Property", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Property", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Property", "custom-post-type-ui" ),
		"archives" => __( "Property archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Property", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Property", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Properties list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Properties list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Properties list", "custom-post-type-ui" ),
		"attributes" => __( "Properties attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Property", "custom-post-type-ui" ),
		"item_published" => __( "Property published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Property published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Property reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Property scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Property updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Property:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Properties", "custom-post-type-ui" ),
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
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "property", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "custom-fields", "comments" ],
		"taxonomies" => [ "types" ],
	];

	register_post_type( "property", $args );
}

add_action( 'init', 'cptui_register_my_cpts_property' );



function cptui_register_my_taxes_types() {

	/**
	 * Taxonomy: Types.
	 */

	$labels = [
		"name" => __( "Types", "custom-post-type-ui" ),
		"singular_name" => __( "Type", "custom-post-type-ui" ),
		"menu_name" => __( "Types", "custom-post-type-ui" ),
		"all_items" => __( "All Types", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Type", "custom-post-type-ui" ),
		"view_item" => __( "View Type", "custom-post-type-ui" ),
		"update_item" => __( "Update Type name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Type", "custom-post-type-ui" ),
		"new_item_name" => __( "New Type name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Type", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Type:", "custom-post-type-ui" ),
		"search_items" => __( "Search Types", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Types", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Types with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Types", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Types", "custom-post-type-ui" ),
		"not_found" => __( "No Types found", "custom-post-type-ui" ),
		"no_terms" => __( "No Types", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Types list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Types list", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Types", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'types', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "types",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "types", [ "property" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_types' );



function cptui_register_my_taxes_status() {

	/**
	 * Taxonomy: Statuses.
	 */

	$labels = [
		"name" => __( "Statuses", "custom-post-type-ui" ),
		"singular_name" => __( "Status", "custom-post-type-ui" ),
		"menu_name" => __( "Statuses", "custom-post-type-ui" ),
		"all_items" => __( "All Statuses", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Status", "custom-post-type-ui" ),
		"view_item" => __( "View Status", "custom-post-type-ui" ),
		"update_item" => __( "Update Status name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Status", "custom-post-type-ui" ),
		"new_item_name" => __( "New Status name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Status", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Status:", "custom-post-type-ui" ),
		"search_items" => __( "Search Statuses", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Statuses", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Statuses with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Statuses", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Statuses", "custom-post-type-ui" ),
		"not_found" => __( "No Statuses found", "custom-post-type-ui" ),
		"no_terms" => __( "No Statuses", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Statuses list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Statuses list", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Statuses", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'properties', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "status",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "status", [ "property" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_status' );
