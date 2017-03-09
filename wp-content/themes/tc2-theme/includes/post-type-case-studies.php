<?php

// Register Custom Post Type
function case_studies_post_type() {

	$labels = array(
		'name'                  => _x( 'Case Studies', 'Post Type General Name', 'tc' ),
		'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'tc' ),
		'menu_name'             => __( 'Case Studies', 'tc' ),
		'name_admin_bar'        => __( 'Case Studies', 'tc' ),
		'archives'              => __( 'Case Study Archives', 'tc' ),
		'attributes'            => __( 'Case Study Attributes', 'tc' ),
		'parent_item_colon'     => __( 'Parent Case Study:', 'tc' ),
		'all_items'             => __( 'All Case Studies', 'tc' ),
		'add_new_item'          => __( 'Add New Case Study', 'tc' ),
		'add_new'               => __( 'Add New', 'tc' ),
		'new_item'              => __( 'New Case Study', 'tc' ),
		'edit_item'             => __( 'Edit Case Study', 'tc' ),
		'update_item'           => __( 'Update Case Study', 'tc' ),
		'view_item'             => __( 'View Case Study', 'tc' ),
		'view_items'            => __( 'View Case Studie', 'tc' ),
		'search_items'          => __( 'Search Case Studies', 'tc' ),
		'not_found'             => __( 'Not found', 'tc' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'tc' ),
		'featured_image'        => __( 'Featured Image', 'tc' ),
		'set_featured_image'    => __( 'Set featured image', 'tc' ),
		'remove_featured_image' => __( 'Remove featured image', 'tc' ),
		'use_featured_image'    => __( 'Use as featured image', 'tc' ),
		'insert_into_item'      => __( 'Insert into item', 'tc' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'tc' ),
		'items_list'            => __( 'Items list', 'tc' ),
		'items_list_navigation' => __( 'Items list navigation', 'tc' ),
		'filter_items_list'     => __( 'Filter items list', 'tc' ),
	);
	$rewrite = array(
		'slug'                  => 'about-topcoder/case-studies',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Case Study', 'tc' ),
		'description'           => __( 'Case Studies', 'tc' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'case_studies', $args );
    //flush_rewrite_rules();

}
add_action( 'init', 'case_studies_post_type', 0 );


// Register Custom Taxonomy
function case_study_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Case Study Categories', 'Taxonomy General Name', 'tc' ),
		'singular_name'              => _x( 'Case Study Category', 'Taxonomy Singular Name', 'tc' ),
		'menu_name'                  => __( 'Case Study Category', 'tc' ),
		'all_items'                  => __( 'All Items', 'tc' ),
		'parent_item'                => __( 'Parent Item', 'tc' ),
		'parent_item_colon'          => __( 'Parent Item:', 'tc' ),
		'new_item_name'              => __( 'New Item Name', 'tc' ),
		'add_new_item'               => __( 'Add New Item', 'tc' ),
		'edit_item'                  => __( 'Edit Item', 'tc' ),
		'update_item'                => __( 'Update Item', 'tc' ),
		'view_item'                  => __( 'View Item', 'tc' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'tc' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'tc' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'tc' ),
		'popular_items'              => __( 'Popular Items', 'tc' ),
		'search_items'               => __( 'Search Items', 'tc' ),
		'not_found'                  => __( 'Not Found', 'tc' ),
		'no_terms'                   => __( 'No items', 'tc' ),
		'items_list'                 => __( 'Items list', 'tc' ),
		'items_list_navigation'      => __( 'Items list navigation', 'tc' ),
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
	register_taxonomy( 'case_study_category', array( 'case_studies' ), $args );

}
add_action( 'init', 'case_study_custom_taxonomy', 0 );