<?php

// Register Custom Post Type
function sticky_banner_custom_post_type() {

	$labels = array(
		'name'                  => 'Sticky Banners',
		'singular_name'         => 'Sticky Banner',
		'menu_name'             => 'Sticky Banner',
		'name_admin_bar'        => 'Sticky Banner',
		'archives'              => 'Sticky Banner Archives',
		'parent_item_colon'     => 'Parent Sticky Banner:',
		'all_items'             => 'All Sticky Banner',
		'add_new_item'          => 'Add New Sticky Banner',
		'add_new'               => 'Add New',
		'new_item'              => 'New Sticky Banner',
		'edit_item'             => 'Edit Sticky Banner',
		'update_item'           => 'Update Sticky Banner',
		'view_item'             => 'View Sticky Banner',
		'search_items'          => 'Search Sticky Banner',
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
		'label'                 => 'Sticky Banner',
		'description'           => 'Sticky Banner',
		'labels'                => $labels,
		'supports'              => array( 'title', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-format-status',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'sticky_banner', $args );

}
add_action( 'init', 'sticky_banner_custom_post_type', 0 );