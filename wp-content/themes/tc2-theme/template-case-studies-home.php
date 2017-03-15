<?php
    /* Template Name: Case Studies Home */
    
    // get all custom fields
	$fields = get_fields();
    
    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper case-study-content">
        <div class="mask js-close-nav"></div>
        
        <?php get_template_part('parts/top-head'); ?>
        
        <?php include(locate_template('parts/hero-carousel.php')); ?>
        
        
        <div class="contents">
            <div class="container">
               
                <div class="current-category"><a href="javascript:;">All Case Studies</a></div>
                
                <div class="categories">
                    <ul>
                        <li class="active"><a href="javascript:;" data-catfilter="all">All Case Studies</a></li>
                        <?php
                            // get all custom taxonomy
                            $casecat = get_terms( array(
                                'taxonomy'      => 'case_study_category',
                                //'hide_empty'    => false,
                                'orderby'       => 'id',
                                'order'         => 'ASC'
                            ) );
                            
                            if ( $casecat ) :
                                foreach( $casecat as $k=>$v ) :
                        ?>
                        <li><a href="javascript:;" data-catfilter="<?php echo $v->slug; ?>"><?php echo $v->name; ?></a></li>
                        <?php
                                endforeach;
                            endif;
                        ?>
                    </ul>
                </div><!-- / .categories -->
                
                
                <div class="case-studies-post">
                    <ul>
                        <li class="grid-sizer"></li>
                        <?php
                            if ( isset($fields['ads']) && count($fields['ads'])>0 ) : 
                                foreach( $fields['ads'] as $k_ads=>$ad ) :
                                    $img_desktop = wp_get_attachment_image_src($ad['desktop_image'], 'full');
                                    $img_tablet  = wp_get_attachment_image_src($ad['tablet_image'], 'full');
                                    $img_mobile  = wp_get_attachment_image_src($ad['mobile_image'], 'full');
                                    $term        = get_term_by('id', $ad['category'], 'case_study_category');
                        ?>
                        <li class="ad <?php echo $term->slug; ?>">
                            <img src="<?php echo $img_desktop[0]; ?>" class="ad-desktop" alt="">
                            <img src="<?php echo $img_tablet[0]; ?>" class="ad-tablet" alt="">
                            <img src="<?php echo $img_mobile[0]; ?>" class="ad-mobile" alt="">
                            <div class="ad-content">
                                <h2><?php echo $ad['cta_title']; ?></h2>
                                <p><?php echo $ad['cta_sub_title']; ?></p>
                                <div class="button">
                                    <a href="<?php echo $ad['button'][0]['url']; ?>"><?php echo $ad['button'][0]['label']; ?></a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; endif; ?>
                        
                    <?php
                            
                        // WP_Query arguments
                        $args = array(
                            'post_type'              => array( 'case_studies' ),
                            'post_status'            => array( 'publish' ),
                            'posts_per_page'         => '1',
                        );
                        
                        // The Query
                        $query = new WP_Query( $args );
                        
                        // The Loop
                        if ( $query->have_posts() ) :
                            $ctr = 0;
                            while ( $query->have_posts() ) : 
                                $query->the_post(); 
                                $terms = get_the_terms( $post->ID , 'case_study_category' );
                                $ctr++;
                                
                            ?>
                            <li class="<?php echo $terms[0]->slug; ?> visible">
                                <a href="https://www.topcoder.com/about-topcoder/case-studies/<?php echo $post->post_name; ?>/">
                                    <span class="case-img">
                                        <?php
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail('full');
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
                    ?>
                    
                    </ul>
                </div><!-- / .case-studies-post -->
                
                <input type="hidden" id="case-page" value="1">
                
            </div>
        </div>
        
        <?php get_template_part('parts/footer'); ?>
    </div>
    <!-- end .wrapper -->
    

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>