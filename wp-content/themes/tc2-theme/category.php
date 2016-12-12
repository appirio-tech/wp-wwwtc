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
                            the_post_thumbnail();
                        } else {
                            echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/blog/images/default-thumb.jpg" />';
                        }
                    ?>
                </div>
            <?php endwhile; 
                
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( '&laquo;', 'topcoder' ),
                    'next_text'          => __( '&raquo;', 'topcoder' ),
                    'before_page_number' => '',
                ) );
                
                endif; 
            ?>
        </div>
        
        <?php get_template_part('parts/footer'); ?>
	</div><!-- .content-area -->

<?php get_template_part('parts/subscribe-modal'); ?>
<?php get_footer(); ?>
