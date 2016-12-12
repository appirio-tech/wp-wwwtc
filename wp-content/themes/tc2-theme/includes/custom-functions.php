<?php
// Check if color is light
function is_quesks_light( $hex ) {
	
    $hex = str_replace('#', '', $hex);

    //break up the color in its RGB components
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    //do simple weighted avarage
    if($r + $g + $b > 250){ //bright color
        $return = true;
    }else{ //dark color
        $return = false;
    }
    
    return $return;

}

/* Hide WP version strings from scripts and styles
 * @return {string} $src
 * @filter script_loader_src
 * @filter style_loader_src
 */
function tc_remove_version( $src ) {
     global $wp_version;
     parse_str(parse_url($src, PHP_URL_QUERY), $query);
     if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
          $src = remove_query_arg('ver', $src);
     }
     return $src;
}
add_filter( 'script_loader_src', 'tc_remove_version' );
add_filter( 'style_loader_src', 'tc_remove_version' );

/* Hide WP version strings from generator meta tag */
function wpmudev_remove_version() {
return '';
}
add_filter('the_generator', 'wpmudev_remove_version');

// Get the first image in a post
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];
    
    if(empty($first_img)) { //Defines a default image
        $first_img = "";
    }
    return $first_img;
}