<?php

/*
Plugin Name: An Luo Custom Post Plugin
Description: Make your own post
Version: 1.0
Author: An Luo
Author URI: http://ann.imagine21concepts.com
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
*/


/*
Adding Dropdown Filters Function
*/
function pippin_add_taxonomy_filters() {
	global $typenow;
 
	// an array of all the taxonomyies you want to display. Use the taxonomy name or slug
	$taxonomies = array('topic', 'audience');
 
	// must set this to the post type you want the filter(s) displayed on
	if( $typenow == 'resource' ){
 
		foreach ($taxonomies as $tax_slug) {
			$tax_obj = get_taxonomy($tax_slug);
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);
			if(count($terms) > 0) {
				echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
				echo "<option value=''>Show All $tax_name</option>";
				foreach ($terms as $term) { 
					echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
				}
				echo "</select>";
			}
		}
	}
}

add_action( 'restrict_manage_posts', 'pippin_add_taxonomy_filters' );




/*
All Custom Post Type UI Post Types Function
*/
function cptui_register_my_cpts() {

	/**
	 * Post Type: Resource.
	 */

	$labels = [
		"name" => __( "Resource", "twentytwenty" ),
		"singular_name" => __( "Resource", "twentytwenty" ),
		"menu_name" => __( "Resource", "twentytwenty" ),
		"all_items" => __( "All Resource", "twentytwenty" ),
		"add_new" => __( "Add new", "twentytwenty" ),
		"add_new_item" => __( "Add new Resource", "twentytwenty" ),
		"edit_item" => __( "Edit Resource", "twentytwenty" ),
		"new_item" => __( "New Resource", "twentytwenty" ),
		"view_item" => __( "View Resource", "twentytwenty" ),
		"view_items" => __( "View Resource", "twentytwenty" ),
		"search_items" => __( "Search", "twentytwenty" ),
		"not_found" => __( "No Resource found", "twentytwenty" ),
		"not_found_in_trash" => __( "No Resource found in trash", "twentytwenty" ),
		"parent" => __( "Parent Resource:", "twentytwenty" ),
		"featured_image" => __( "Featured image for this Resource", "twentytwenty" ),
		"set_featured_image" => __( "Set featured image for this Resource", "twentytwenty" ),
		"remove_featured_image" => __( "Remove featured image for this Resource", "twentytwenty" ),
		"use_featured_image" => __( "Use as featured image for this Resource", "twentytwenty" ),
		"archives" => __( "Resource archives", "twentytwenty" ),
		"insert_into_item" => __( "Insert into Resource", "twentytwenty" ),
		"uploaded_to_this_item" => __( "Upload to this Resource", "twentytwenty" ),
		"filter_items_list" => __( "Filter Resource list", "twentytwenty" ),
		"items_list_navigation" => __( "Resource list navigation", "twentytwenty" ),
		"items_list" => __( "Resource list", "twentytwenty" ),
		"attributes" => __( "Resource attributes", "twentytwenty" ),
		"name_admin_bar" => __( "Resource", "twentytwenty" ),
		"item_published" => __( "Resource published", "twentytwenty" ),
		"item_published_privately" => __( "Resource published privately.", "twentytwenty" ),
		"item_reverted_to_draft" => __( "Resource reverted to draft.", "twentytwenty" ),
		"item_scheduled" => __( "Resource scheduled", "twentytwenty" ),
		"item_updated" => __( "Resource updated.", "twentytwenty" ),
		"parent_item_colon" => __( "Parent Resource:", "twentytwenty" ),
	];

	$args = [
		"label" => __( "Resource", "twentytwenty" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "resource", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 6,
		"menu_icon" => "dashicons-smiley",
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"taxonomies" => [ "topic", "audience" ],
	];

	register_post_type( "resource", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );



/*
Resource Post Type Function
*/
function cptui_register_my_cpts_resource() {

	/**
	 * Post Type: Resource.
	 */

	$labels = [
		"name" => __( "Resource", "twentytwenty" ),
		"singular_name" => __( "Resource", "twentytwenty" ),
		"menu_name" => __( "Resource", "twentytwenty" ),
		"all_items" => __( "All Resource", "twentytwenty" ),
		"add_new" => __( "Add new", "twentytwenty" ),
		"add_new_item" => __( "Add new Resource", "twentytwenty" ),
		"edit_item" => __( "Edit Resource", "twentytwenty" ),
		"new_item" => __( "New Resource", "twentytwenty" ),
		"view_item" => __( "View Resource", "twentytwenty" ),
		"view_items" => __( "View Resource", "twentytwenty" ),
		"search_items" => __( "Search", "twentytwenty" ),
		"not_found" => __( "No Resource found", "twentytwenty" ),
		"not_found_in_trash" => __( "No Resource found in trash", "twentytwenty" ),
		"parent" => __( "Parent Resource:", "twentytwenty" ),
		"featured_image" => __( "Featured image for this Resource", "twentytwenty" ),
		"set_featured_image" => __( "Set featured image for this Resource", "twentytwenty" ),
		"remove_featured_image" => __( "Remove featured image for this Resource", "twentytwenty" ),
		"use_featured_image" => __( "Use as featured image for this Resource", "twentytwenty" ),
		"archives" => __( "Resource archives", "twentytwenty" ),
		"insert_into_item" => __( "Insert into Resource", "twentytwenty" ),
		"uploaded_to_this_item" => __( "Upload to this Resource", "twentytwenty" ),
		"filter_items_list" => __( "Filter Resource list", "twentytwenty" ),
		"items_list_navigation" => __( "Resource list navigation", "twentytwenty" ),
		"items_list" => __( "Resource list", "twentytwenty" ),
		"attributes" => __( "Resource attributes", "twentytwenty" ),
		"name_admin_bar" => __( "Resource", "twentytwenty" ),
		"item_published" => __( "Resource published", "twentytwenty" ),
		"item_published_privately" => __( "Resource published privately.", "twentytwenty" ),
		"item_reverted_to_draft" => __( "Resource reverted to draft.", "twentytwenty" ),
		"item_scheduled" => __( "Resource scheduled", "twentytwenty" ),
		"item_updated" => __( "Resource updated.", "twentytwenty" ),
		"parent_item_colon" => __( "Parent Resource:", "twentytwenty" ),
	];

	$args = [
		"label" => __( "Resource", "twentytwenty" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "resource", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 6,
		"menu_icon" => "dashicons-smiley",
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"taxonomies" => [ "topic", "audience" ],
	];

	register_post_type( "resource", $args );
}

add_action( 'init', 'cptui_register_my_cpts_resource' );


/*
Resource Post Type Function
*/
function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Topics.
	 */

	$labels = [
		"name" => __( "Topics", "twentytwenty" ),
		"singular_name" => __( "Topic", "twentytwenty" ),
	];

	$args = [
		"label" => __( "Topics", "twentytwenty" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'topic', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "topic",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "topic", [ "resource" ], $args );

	/**
	 * Taxonomy: Audiences.
	 */

	$labels = [
		"name" => __( "Audiences", "twentytwenty" ),
		"singular_name" => __( "Audience", "twentytwenty" ),
	];

	$args = [
		"label" => __( "Audiences", "twentytwenty" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'audience', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "audience",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "audience", [ "resource" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );


/*
Topics Taxonomy Function
*/
function cptui_register_my_taxes_topic() {

	/**
	 * Taxonomy: Topics.
	 */

	$labels = [
		"name" => __( "Topics", "twentytwenty" ),
		"singular_name" => __( "Topic", "twentytwenty" ),
	];

	$args = [
		"label" => __( "Topics", "twentytwenty" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'topic', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "topic",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "topic", [ "resource" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_topic' );


/*
Audiences Taxonomy Function
*/
function cptui_register_my_taxes_audience() {

	/**
	 * Taxonomy: Audiences.
	 */

	$labels = [
		"name" => __( "Audiences", "twentytwenty" ),
		"singular_name" => __( "Audience", "twentytwenty" ),
	];

	$args = [
		"label" => __( "Audiences", "twentytwenty" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'audience', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "audience",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "audience", [ "resource" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_audience' );


?>

