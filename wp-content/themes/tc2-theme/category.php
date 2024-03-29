<?php get_header(); ?>
    
    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper generic">
        <div class="mask js-close-nav"></div>
        
        <?php get_template_part('parts/top-head'); ?>
        
        <div class="top-banner top-banner-blog" ></div>
        
        <div class="contents">
            <a name="fold"></a>
            
            <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="blog-list-item">
                    <div class="blog-list-item-content">
                        <h2 class="text-center"><?php the_title(); ?></h2>
                        <div class="blog-list-item-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="/blog/<?php echo $post->post_name; ?>/" class="btn-blue">Read the full story</a>
                    </div>
                    <?php 
                        if ( has_post_thumbnail() ) {
                            $bg_url = get_the_post_thumbnail_url($post->ID, 'large');
                        } else {
                            $bg_url = catch_that_image();
                        }
                    ?>
                    <?php if ( $bg_url ) : ?>
                    <img src="<?php echo $bg_url; ?>" alt="">
                    <?php endif; ?>
                </div>
            <?php endwhile; 
                
                global $wp;
                $current_url = home_url(add_query_arg(array(),$wp->request));
                $current_url = str_replace('wwwtc.wpengine.com', 'www.topcoder.com', $current_url);
                $new_base    = explode('/page/', $current_url);
                
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( '&laquo;', 'topcoder' ),
                    'next_text'          => __( '&raquo;', 'topcoder' ),
                    'before_page_number' => '',
                    'base'               => $new_base[0] . '/page/%#%/'
                ) );
                
                endif; 
            ?>
        </div>
        
        <?php get_template_part('parts/footer'); ?>
	</div><!-- .content-area -->

<?php get_template_part('parts/subscribe-modal'); ?>
<?php get_footer(); ?>
