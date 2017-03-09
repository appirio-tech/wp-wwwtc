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



// Case Study Lazy Load
function case_lazy_load(){
    if ( isset($_POST['page']) ) {
        // WP_Query arguments
        $args = array(
            'post_type'         => array( 'case_studies' ),
            'post_status'       => array( 'publish' ),
            'posts_per_page'    => '12',
            'paged'             => $_POST['page'] + 1
        );
        
        // The Query
        $query = new WP_Query( $args );
        
        // The Loop
        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : 
                $query->the_post(); 
                $terms = get_the_terms( $post->ID , 'case_study_category' );
        ?>
            <li class="<?php echo $terms[0]->slug; ?>">
                <a href="<?php the_permalink(); ?>">
                    <span class="case-img">
                        <?php
                            if ( has_post_thumbnail() ) {
                                //the_post_thumbnail('full');
                                $src = get_the_post_thumbnail_url( $post->ID, 'full' );
                                $src = str_replace('wp-content/uploads//nas/content/live/wwwtc//', '', $src);
                                echo '<img src="'.$src.'" alt="">';
                                
                                //https://wwwtc.wpengine.com/wp-content/uploads//nas/content/live/wwwtc//wp-content/media/2017/03/seen-thumb-1.jpg
                            }
                        ?>
                    </span>
                    <span class="case-title"><?php echo $i . get_field('title'); ?></span>
                    <span class="case-subtitle"><?php echo get_field('subtitle'); ?></span>
                    <span class="case-term"><?php echo $terms[0]->name; ?></span>
                    <span class="case-details">View Details</span>
                </a>
            </li>
        <?php 
            endwhile; 
        endif;
        // Restore original Post Data
        wp_reset_postdata();
        die();
    }
}
add_action('wp_ajax_case_lazy_load', 'case_lazy_load');
add_action('wp_ajax_nopriv_case_lazy_load', 'case_lazy_load');