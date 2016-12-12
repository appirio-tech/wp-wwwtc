<?php

/* excerpt */
function new_excerpt_more($more) {
	$post_id	= get_the_ID();
	$permalink 	= get_permalink( $post_id );
	$title 		= get_the_title($post_id);
	return 	'...';
}
add_filter ( 'excerpt_more', 'new_excerpt_more' );

function custom_excerpt_length($length) {
	return 21;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );