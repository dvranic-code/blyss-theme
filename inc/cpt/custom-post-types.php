<?php

// Services
function blyss_register_cpt_services() {

	/**
	 * Post Type: Services.
	 */

	$labels = array(
		"name" => __( "Services", "blyss" ),
		"singular_name" => __( "Service", "blyss" ),
		"menu_name" => __( "Services", "blyss" ),
		"all_items" => __( "All services", "blyss" ),
		"add_new" => __( "Add new service", "blyss" ),
	);

	$args = array(
		"label" => __( "Services", "blyss" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "blyss_services", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		'menu_icon' => 'dashicons-share'
	);

	register_post_type( "blyss_services", $args );
}
add_action( 'init', 'blyss_register_cpt_services' );


// Trailers
function blyss_register_cpt_trailers() {

	$labels = [
		'name'              => __('Trailers', 'blyss'),
		'singular_name'     => __('Trailer', 'blyss'),
		'menu_name'         => __('Trailers', 'blyss'),
		'name_admin_bar'    => __('Trailer', 'blyss'),
		'add_new'           => __('Add New', 'blyss'),
		'add_new_item'      => __('Add New Trailer', 'blyss'),
		'new_item'          => __('New Trailer', 'blyss'),
		'edit_item'         => __( 'Edit Trailer', 'blyss' ),
		'view_item'         => __( 'View Trailer', 'blyss' ),
		'all_items'         => __( 'All Trailers', 'blyss' ),
		'search_items'      => __( 'Search Trailers', 'blyss' ),
		'not_found'         => __( 'No trailers found.', 'blyss' ),
		'not_found_in_trash'=> __( 'No trailers found in Trash.', 'blyss' ),
		'featured_image'    => __( 'Trailer Cover Image', 'blyss' ),
		'set_featured_image' => __('Set Trailer Cover Image', 'blyss')

	];

	$args = [
		'labels'                => $labels,
		'public'                => true,
		'rewrite'               => array( 'slug' => 'trailer' ),
		'has_archive'           => true,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		"publicly_queryable"    => true,
		"show_in_menu"          => true,
		'menu_icon'             => 'dashicons-cart',
		'taxonomies' => array('category', 'post_tag') // this is IMPORTANT
	];

	register_post_type('trailers', $args);

}
add_action('init', 'blyss_register_cpt_trailers');


// Trailers
function blyss_register_cpt_parts() {

	$labels = [
		'name'              => __('Parts', 'blyss'),
		'singular_name'     => __('Part', 'blyss'),
		'menu_name'         => __('Parts', 'blyss'),
		'name_admin_bar'    => __('Part', 'blyss'),
		'add_new'           => __('Add New', 'blyss'),
		'add_new_item'      => __('Add New Part', 'blyss'),
		'new_item'          => __('New Part', 'blyss'),
		'edit_item'         => __( 'Edit Part', 'blyss' ),
		'view_item'         => __( 'View Part', 'blyss' ),
		'all_items'         => __( 'All Parts', 'blyss' ),
		'search_items'      => __( 'Search Parts', 'blyss' ),
		'not_found'         => __( 'No parts found.', 'blyss' ),
		'not_found_in_trash'=> __( 'No parts found in Trash.', 'blyss' ),
		'featured_image'    => __( 'Part Image', 'blyss' ),
		'set_featured_image' => __('Set Part Image', 'blyss' )

	];

	$args = [
		'labels'                => $labels,
		'public'                => true,
		'rewrite'               => array( 'slug' => 'part' ),
		'has_archive'           => true,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		"publicly_queryable"    => true,
		"show_in_menu"          => true,
		'menu_icon'             => 'dashicons-cart',
		'taxonomies' => array('category', 'post_tag') // this is IMPORTANT
	];

	register_post_type('parts', $args);

}
add_action('init', 'blyss_register_cpt_parts');

