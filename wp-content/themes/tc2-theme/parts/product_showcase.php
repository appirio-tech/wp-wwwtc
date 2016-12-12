<?php

// WP_Query arguments
$args = array (
	'post_type'         => array( 'product_showcase' ),
	'post_status'       => array( 'publish' ),
    'posts_per_page'    => -1,
	'order'             => 'ASC',
	'orderby'           => 'menu_order'
);

if ( $showcase_type!='' ) {
    $args['tax_query'] = array(
		array(
			'taxonomy' => 'product_showcase_category',
			'field'    => 'term_id',
			'terms'    => $showcase_type,
			'operator' => 'IN',
		)
    );
}

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) : 

    $slide_mode = 'light';
    if ( isset($query->posts[0]) ) {
        $first_post_mode = get_field('background_mode', $query->posts[0]->ID); 
        $slide_mode = ($first_post_mode=='Dark Mode') ? 'dark' : 'light';
    }
    
?>
<div class="carousel-info">
    <div id="carousel-app" class="carousel slide js-slider" data-ride="carousel" data-interval="false">
        <div class="carousel-slide">
            <a href="#carousel-app" class="btn-icon-arrow-left" role="button" data-slide="prev">
                <span class="icons <?php echo $slide_mode=='light' ? '' : 'white-arrow-left'; ?>" aria-hidden="true"></span>
            </a>
            <a href="#carousel-app" class="btn-icon-arrow-right" role="button" data-slide="next">
                <span class="icons <?php echo $slide_mode=='light' ? '' : 'white-arrow-right'; ?>" aria-hidden="true"></span>
            </a>
            
            <ol class="carousel-indicators indicators <?php echo $slide_mode=='light' ? 'dark-dot' : ''; ?>">
                <?php for($i=0; $i<$query->found_posts; $i++) : ?>
                <li class="<?php echo $i==0 ? 'active' : ''; ?>" data-target="#carousel-app" data-slide-to="<?php echo $i; ?>"></li>
                <?php endfor; ?>
            </ol>
            <!-- end .indicators -->
            <div class="carousel-inner" role="listbox">
               
                <?php
                    $showcase_ctr = 0;
                    while ( $query->have_posts() ) : 
                        $query->the_post(); 
                        $showcase_fields = get_fields(); 
                        $showcase_ctr++; ?>
                <div class="item <?php echo $showcase_ctr==1 ? 'active' : ''; ?> example-img<?php echo $showcase_ctr; ?> <?php echo $showcase_fields['background_mode']=='Dark Mode' ? 'dark-mode' : 'light-mode'; ?>" 
                     style="background-image:url(<?php echo $showcase_fields['product_shocase_background_image']; ?>);">
                    <div class="item-info">
                        <div class="container">
                            <div class="valign-middle">
                                <div class="boxs right">
                                    <h2 class="titles <?php echo $title_class; ?>"><?php the_title(); ?></h2>
                                    <div class="txt <?php echo $txt_class; ?>"><?php the_content(); ?></div>
                                    <a href="<?php echo $showcase_fields['product_showcase_view_button'][0]['url']; ?>" target="<?php echo $showcase_fields['product_showcase_view_button'][0]['target_window']; ?>" class="btn-blue btn-view"><?php echo $showcase_fields['product_showcase_view_button'][0]['label']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end .item -->
                <?php endwhile; ?>

            </div>
            <!-- end .carousel-inner -->
        </div>
        <!-- end .carousel-inner -->
    </div>
    <!-- end #carousel-app -->
</div>
<!-- end .carousel-info -->

<?php 
endif; 

// Restore original Post Data
wp_reset_postdata();
