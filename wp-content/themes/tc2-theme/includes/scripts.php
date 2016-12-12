<?php
// Add theme CSS files
function load_site_styles() {
	global $wp_styles;
    $v = '20161201';
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bower_components/bootstrap/dist/css/bootstrap.min.css', false, false, 'all');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/bower_components/bootstrap/dist/css/bootstrap-theme.min.css', false, false, 'all');
    wp_enqueue_style('coverflow', get_template_directory_uri() . '/bower_components/coverflow/dist/coverflow.css', false, false, 'all');
	//wp_enqueue_style('font', get_template_directory_uri() . '/css/font.css', false, false, 'all');
    wp_enqueue_style('screen', get_template_directory_uri() . '/css/screen.css?v='.$v, false, false, 'all');
    wp_enqueue_style('tablet', get_template_directory_uri() . '/css/tablet.css?v='.$v, false, false, 'all');
    wp_enqueue_style('mobile', get_template_directory_uri() . '/css/mobile.css?v='.$v, false, false, 'all');
}

// Add theme JS files
function load_site_scripts() {
     $v = '20161201';
	//wp_enqueue_script('jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', array('jquery'), false, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('jquery-touchswipe', get_template_directory_uri() . '/bower_components/jquery-touchswipe/jquery.touchSwipe.min.js', array('jquery'), false, true);
    wp_enqueue_script('coverflow', get_template_directory_uri() . '/bower_components/coverflow/dist/coverflow.min.js', array('jquery'), false, true);
    wp_enqueue_script('ouibounce', get_template_directory_uri() . '/bower_components/ouibounce/build/ouibounce.min.js', array('jquery'), false, true);
	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js?v='.$v, array('jquery'), false, true);	
}

add_action('wp_head','load_script', 0);
function load_script() {
    
    if( !is_admin() ) {
        if (function_exists('load_site_styles')) {
            add_action('wp_enqueue_scripts', 'load_site_styles');
        }
        if (function_exists('load_site_scripts')) {
            add_action('wp_enqueue_scripts', 'load_site_scripts');
        }
    }
}

// Custom Logo Link
add_filter( 'get_custom_logo', 'quesks_logo_link' );
function quesks_logo_link() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            '/home',
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo',
            ) )
        );
    return $html;   
}