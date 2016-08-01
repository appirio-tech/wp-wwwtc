<?php

// Register Product Showcase Post Type
function product_showcase_post_type() {

	$labels = array(
		'name'                  => 'Product Showcase',
		'singular_name'         => 'Product Showcase',
		'menu_name'             => 'Product Showcase',
		'name_admin_bar'        => 'Product Showcase',
		'archives'              => 'Product Showcase Archives',
		'parent_item_colon'     => 'Parent Product Showcase:',
		'all_items'             => 'All Product Showcase',
		'add_new_item'          => 'Add New Product Showcase',
		'add_new'               => 'Add Product Showcase',
		'new_item'              => 'New Product Showcase',
		'edit_item'             => 'Edit Product Showcase',
		'update_item'           => 'Update Product Showcase',
		'view_item'             => 'View Product Showcase',
		'search_items'          => 'Search Product Showcase',
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
		'label'                 => 'Product Showcase',
		'description'           => 'Product Showcase',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-media-code',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'product_showcase', $args );

}
add_action( 'init', 'product_showcase_post_type', 0 );


// Register Custom Taxonomy
function product_showcase_taxonomy() {

	$labels = array(
		'name'                       => 'Product Showcase Categories',
		'singular_name'              => 'Product Showcase Category',
		'menu_name'                  => 'Product Showcase Category',
		'all_items'                  => 'All Product Showcase Category',
		'parent_item'                => 'Parent Product Showcase Category',
		'parent_item_colon'          => 'Parent Product Showcase Category:',
		'new_item_name'              => 'New Product Showcase Category',
		'add_new_item'               => 'Add New Product Showcase Category',
		'edit_item'                  => 'Edit Product Showcase Category',
		'update_item'                => 'Update Product Showcase Category',
		'view_item'                  => 'ViewProduct Showcase Category',
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
	register_taxonomy( 'product_showcase_category', array( 'product_showcase' ), $args );

}
add_action( 'init', 'product_showcase_taxonomy', 0 );