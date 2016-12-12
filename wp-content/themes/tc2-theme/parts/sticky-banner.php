<?php

/* THIS IS NOT IN USE. ACTUAL CODE IS IN HEADER.PHP */

// WP_Query arguments
$args = array (
	'post_type'              => array( 'sticky_banner' ),
	'post_status'            => array( 'publish' ),
	'posts_per_page'         => '1',
	'orderby'                => 'rand',
    'order'                  => 'ASC'
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
        $sticky_fields = get_fields();
?>
<div class="sticky-banner">
    <?php the_title(); ?>
    <a href="<?php echo $sticky_fields['sticky_button_url']; ?>" target="<?php echo $sticky_fields['sticky_button_target_window'][0]; ?>" class="sticky-btn"><?php echo $sticky_fields['sticky_button_label']; ?></a>
    <a href="javascript:;" class="sticky-close">&times;</a>
</div>
<?php
    
    endwhile;
endif;

// Restore original Post Data
wp_reset_postdata();

?>