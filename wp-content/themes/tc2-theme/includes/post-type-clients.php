<?php

// Register Clients Custom Post Type
function clients_post_type() {

	$labels = array(
		'name'                  => 'Clients',
		'singular_name'         => 'Client',
		'menu_name'             => 'Clients',
		'name_admin_bar'        => 'Clients',
		'archives'              => 'Clients Archives',
		'parent_item_colon'     => 'Parent Client:',
		'all_items'             => 'All Clients',
		'add_new_item'          => 'Add New Client',
		'add_new'               => 'Add New Client',
		'new_item'              => 'New Client',
		'edit_item'             => 'Edit Client',
		'update_item'           => 'Update Client',
		'view_item'             => 'View Client',
		'search_items'          => 'Search Clients',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Client',
		'description'           => 'Client Logos',
		'labels'                => $labels,
		'supports'              => array( 'title', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'clients', $args );

}
add_action( 'init', 'clients_post_type', 0 );

// Register Custom Taxonomy
function client_category_taxonomy() {

	$labels = array(
		'name'                       => 'Client Categories',
		'singular_name'              => 'Client Category',
		'menu_name'                  => 'Client Category',
		'all_items'                  => 'All Client Category',
		'parent_item'                => 'Parent Client Category',
		'parent_item_colon'          => 'Parent Client Category:',
		'new_item_name'              => 'New Client Category',
		'add_new_item'               => 'Add New Client Category',
		'edit_item'                  => 'Edit Client Category',
		'update_item'                => 'Update Client Category',
		'view_item'                  => 'ViewClient Category',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Items',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No items',
		'items_list'                 => 'Items list',
		'items_list_navigation'      => 'Items list navigation',
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
	register_taxonomy( 'client_category', array( 'clients' ), $args );

}
add_action( 'init', 'client_category_taxonomy', 0 );