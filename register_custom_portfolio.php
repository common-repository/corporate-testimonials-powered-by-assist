<?php

function capwp_register_custom_portfolio() {

	$labels = array(
		'name'                => _x('CAPWP_Portfolio', 'Post Type General Name', 'capwp_corporate_assist'),
		'singular_name'       => _x('CAPWP_Portfolio', 'Post Type Singular Name', 'capwp_corporate_assist'),
		'menu_name'           => __('Portfolio', 'capwp_corporate_assist'),
		'parent_item_colon'   => __('Parent Item:', 'capwp_corporate_assist'),
		'all_items'           => __('All Items', 'capwp_corporate_assist'),
		'view_item'           => __('View Item', 'capwp_corporate_assist'),
		'add_new_item'        => __('Add New Item', 'capwp_corporate_assist'),
		'add_new'             => __('Add New', 'capwp_corporate_assist'),
		'edit_item'           => __('Edit Item', 'capwp_corporate_assist'),
		'update_item'         => __('Update Item', 'capwp_corporate_assist'),
		'search_items'        => __('Search Item', 'capwp_corporate_assist'),
		'not_found'           => __('Not found', 'capwp_corporate_assist'),
		'not_found_in_trash'  => __('Not found in Trash', 'capwp_corporate_assist'),
	);
	$args = array(
		'label'               => __('capwp_portfolio', 'capwp_corporate_assist'),
		'description'         => __('Post Type Description', 'capwp_corporate_assist'),
		'labels'              => $labels,
		'supports'            => array('title', 'editor', 'thumbnail'),
		'taxonomies'          => array('port_tags'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type('capwp_portfolio', $args);
}

add_action('init', 'capwp_register_custom_portfolio', 0);

function capwp_register_custom_category() {

	$labels = array(
		'name'                       => _x('Project Categories', 'Taxonomy General Name', 'capwp_corporate_assist'),
		'singular_name'              => _x('Project Category', 'Taxonomy Singular Name', 'capwp_corporate_assist'),
		'menu_name'                  => __('Category', 'capwp_corporate_assist'),
		'all_items'                  => __('All Items', 'capwp_corporate_assist'),
		'parent_item'                => __('Parent Item', 'capwp_corporate_assist'),
		'parent_item_colon'          => __('Parent Item:', 'capwp_corporate_assist'),
		'new_item_name'              => __('New Item Category', 'capwp_corporate_assist'),
		'add_new_item'               => __('Add New Item', 'capwp_corporate_assist'),
		'edit_item'                  => __('Edit Item', 'capwp_corporate_assist'),
		'update_item'                => __('Update Item', 'capwp_corporate_assist'),
		'separate_items_with_commas' => __('Separate items with commas', 'capwp_corporate_assist'),
		'search_items'               => __('Search Items', 'capwp_corporate_assist'),
		'add_or_remove_items'        => __('Add or remove items', 'capwp_corporate_assist'),
		'choose_from_most_used'      => __('Choose from the most used items', 'capwp_corporate_assist'),
		'not_found'                  => __('Not Found', 'capwp_corporate_assist'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy('capwp_register_custom_category', array( 'capwp_portfolio'), $args);
}
add_action( 'init', 'capwp_register_custom_category', 0 );
