<?php
// Add theme CSS files
function load_site_styles() {
	global $wp_styles;
	wp_enqueue_style('bootstrap', '/wp-content/themes/tc2-theme' . '/bower_components/bootstrap/dist/css/bootstrap.min.css', false, false, 'all');
    wp_enqueue_style('bootstrap-theme', '/wp-content/themes/tc2-theme' . '/bower_components/bootstrap/dist/css/bootstrap-theme.min.css', false, false, 'all');
	//wp_enqueue_style('font', '/wp-content/themes/tc2-theme' . '/css/font.css', false, false, 'all');
    wp_enqueue_style('screen', '/wp-content/themes/tc2-theme' . '/css/screen.css', false, false, 'all');
    wp_enqueue_style('tablet', '/wp-content/themes/tc2-theme' . '/css/tablet.css', false, false, 'all');
    wp_enqueue_style('mobile', '/wp-content/themes/tc2-theme' . '/css/mobile.css', false, false, 'all');
}

// Add theme JS files
function load_site_scripts() {
	//wp_enqueue_script('jquery', '/wp-content/themes/tc2-theme' . '/bower_components/jquery/dist/jquery.min.js', array('jquery'), false, true);
    wp_enqueue_script('bootstrap', '/wp-content/themes/tc2-theme' . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('jquery-touchswipe', '/wp-content/themes/tc2-theme' . '/bower_components/jquery-touchswipe/jquery.touchSwipe.min.js', array('jquery'), false, true);
	wp_enqueue_script('script', '/wp-content/themes/tc2-theme' . '/js/script.js', array('jquery'), false, true);	
}

add_action('wp_head','load_script', 0);
function load_script() {
    global $post;
    $is_blog = false;

    if ((is_single() && get_post_type()=='post') ||
         is_home() || 
         is_tag() || 
         is_author() || 
         is_archive() || 
         is_search() ) {
        $is_blog = true;
    }
    
    if ( !$is_blog && (is_page( 'customer' ) || is_page( 'community' )) ) {
        $blog_page = get_page_by_path('blog');
        if ( $blog_page->ID== $post->post_parent ) {
            $is_blog = true;
        }
    }
    
    if( !is_admin() && !$is_blog ) {
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