<?php get_header(); ?>
    
    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper generic">
        <div class="mask js-close-nav"></div>
        
        <?php get_template_part('parts/top-head'); ?>
        
        <div class="top-banner top-banner-blog" ></div>
        
        
        <div class="contents">
            <a name="fold"></a>
            
            <h2 class="titles">Search Results: <?php echo get_search_query(); ?></h2>
            
            <?php
                
                if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="item">
                    <div class="item-content">
                        <h2 class="item-title"><a href="/blog/<?php echo $post->post_name; ?>/"><?php the_title(); ?></a></h2>
                        <div class="item-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="item-meta">
                            <p>
                                <?php 
                                    $author_nicename = get_the_author_meta('nicename');
                                    if ($author_nicename!='') : ?>
                                By 
                                <span>
                                    <a href="/blog/author/<?php echo $author_nicename; ?>/"><?php echo $author_nicename; ?></a>
                                </span> 
                                <?php endif; ?>
                                
                                In 
                                <span>
                                    <?php 
                                        $separator      = ', ';
                                        $output         = '';
                                        $categories 	= 	get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            foreach( $categories as $category ) {
                                                //$output .= '<a class="category" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"><span class="font-lato">' . esc_html( $category->name ) . '</span></a>' . $separator;
                                                $output .= '<a class="category" href="/blog/category/'.$category->slug.'/" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"><span class="font-lato">' . esc_html( $category->name ) . '</span></a>' . $separator;
                                            }
                                            echo trim( $output, $separator );
                                        }
                                    ?>
                                </span> 
                            </p>
                            <p>
                                Posted <?php echo get_the_time('F jS, Y'); ?>
                            </p>
                        </div>
                    </div>
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
