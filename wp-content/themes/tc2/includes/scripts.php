<?php
// Add theme CSS files
function load_site_styles() {
	global $wp_styles;
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bower_components/bootstrap/dist/css/bootstrap.min.css', false, false, 'all');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/bower_components/bootstrap/dist/css/bootstrap-theme.min.css', false, false, 'all');
	wp_enqueue_style('font', get_template_directory_uri() . '/css/font.css', false, false, 'all');
    wp_enqueue_style('screen', get_template_directory_uri() . '/css/screen.css', false, false, 'all');
    wp_enqueue_style('tablet', get_template_directory_uri() . '/css/tablet.css', false, false, 'all');
    wp_enqueue_style('mobile', get_template_directory_uri() . '/css/mobile.css', false, false, 'all');
}

// Add theme JS files
function load_site_scripts() {
	//wp_enqueue_script('jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', array('jquery'), false, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('jquery-touchswipe', get_template_directory_uri() . '/bower_components/jquery-touchswipe/jquery.touchSwipe.min.js', array('jquery'), false, true);
	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), false, true);	
}

if(!is_admin()) {
	if (function_exists('load_site_styles')) {
		add_action('wp_enqueue_scripts', 'load_site_styles');
	}
	if (function_exists('load_site_scripts')) {
		add_action('wp_enqueue_scripts', 'load_site_scripts');
	}
}