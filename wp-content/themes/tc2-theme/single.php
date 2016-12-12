<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
$post_id		= 	get_the_id();
$date 			= 	get_the_time('F jS, Y');
$categories 	= 	get_the_category();
$author 		= 	get_the_author();
$tags	 		= 	wp_get_post_tags();
get_header(); ?>
   
    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper generic">
        <div class="mask js-close-nav"></div>
        
        <?php get_template_part('parts/top-head'); ?>
        
        <?php
            if ( have_posts() ) : 
                while ( have_posts() ) : 
                    the_post();
                    
                    if ( has_post_thumbnail() ) {
                        $bg_url = get_the_post_thumbnail_url($post->ID, array(1200, 600));
                    } else {
                        $bg_url = catch_that_image();
                    }
        ?>
        <div class="top-banner top-banner-blog top-banner-overview" <?php if ($bg_url!='') : ?>style="background-image: url(<?php echo $bg_url; ?>);"<?php endif; ?>>
            <h2 class="titles"><?php the_title(); ?></h2>
        </div>
        
        <div class="contents">
            <a name="fold"></a>
            
            <div class="row">
                <div class="col-md-8">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	                    <div class="meta">
                            <p>
                                <?php 
                                    $author_nicename = get_the_author_meta('nicename');
                                    if ($author_nicename!='') : ?>
                                By 
                                <span>
                                    <a href="/blog/author/<?php echo $author_nicename; ?>/"><?php echo $author_nicename; ?></a>
                                    <?php //echo get_the_author_posts_link($post_id); ?>
                                </span> 
                                <?php endif; ?>
                            In <span><?php 
                                $separator = ', ';
                                $output = '';
                                if ( ! empty( $categories ) ) {
                                    foreach( $categories as $category ) {
                                        //$output .= '<a class="category" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"><span class="font-lato">' . esc_html( $category->name ) . '</span></a>' . $separator;
                                        $output .= '<a class="category" href="/blog/category/'.$category->slug.'/" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"><span class="font-lato">' . esc_html( $category->name ) . '</span></a>' . $separator;
                                    }
                                    echo trim( $output, $separator );
                                }
                                ?></span> 
                            </p>
                            <p>Posted <?php echo $date ?></p>
                        </div>
                        
                        <div class="entry-content">
                            
                            <div class="tc-share">
                                <div class="addthis_inline_share_toolbox" 
                                    data-url="https://www.topcoder.com/blog/<?php echo $post->post_name; ?>/" 
                                    data-title="<?php the_title(); ?>"
                                    data-media="<?php echo $bg_url; ?>"
                                    data-image="<?php echo $bg_url; ?>"
                                    ></div>
                            </div>
                           
                            <?php
                                
                                //the_content();
                                
                                // Force remove of blank space and non breaking space within the content
                                $content = get_the_content();
                                $content = preg_replace("/&nbsp;/", "", $content);
                                $content = htmlentities($content, ENT_COMPAT,'utf-8');
                                $content = preg_replace("/&nbsp;/", " ", $content);
                                $content = html_entity_decode($content);
                                
                                echo apply_filters('the_content', $content);
                                
                                /*
                                wp_link_pages( array(
                                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>',
                                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
                                    'separator'   => '<span class="screen-reader-text">, </span>',
                                ) );
                                */
                                
                            ?>
                        </div><!-- .entry-content -->
                        
                        <?php if( get_the_tag_list() ) : ?>
                        <div class="tages">
                            <p>
                                <img class="tag_icon" src="<?php echo get_stylesheet_directory_uri(); ?>/i/tage_icon.png" alt=""> <span>Tags:</span> 
                                <?php //echo get_the_tag_list('', ', ', ''); ?>
                                <?php
                                    $posttags = get_the_tags();
                                    if ( $posttags ) {
                                        foreach( $posttags as $keytag=>$tag ) {
                                            $tags[] = '<a href="/blog/tag/'.$tag->slug.'/">'. $tag->name .'</a>';
                                        }
                                        
                                        echo implode(', ', $tags);
                                    }
                                ?>
                            </p>
                        </div>
                        <?php endif; ?>
                        
                        <div class="entry-footer">
                            <?php
                                edit_post_link(
                                    sprintf(
                                        /* translators: %s: Name of current post */
                                        __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
                                        get_the_title()
                                    ),
                                    '<span class="edit-link">',
                                    '</span>'
                                );
                            ?>
                        </div><!-- .entry-footer -->
                    </article><!-- #post-## -->
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
        
        <?php   
                endwhile;
            endif;
        ?>
        
        
        <div class="introducing_article">
            <div class="container">
                <nav class="navigation post-navigation" role="navigation">
                    <h2 class="screen-reader-text">Post navigation</h2>
                    <div class="nav-links">
                        <?php $prev_post = get_previous_post(); ?>
                        <?php if ( $prev_post ) : ?>
                        <div class="nav-previous">
                            <a href="/blog/<?php echo $prev_post->post_name; ?>/" rel="prev">
                                <span class="meta-nav" aria-hidden="true"></span> 
                                <span class="screen-reader-text">Previous Post</span> 
                                <span class="post-title"><?php echo $prev_post->post_title; ?></span>
                            </a>
                        </div>
                        <?php endif; ?>
                        
                        <?php $next_post = get_next_post(); ?>
                        <?php if ( $next_post ) : ?>
                        <div class="nav-next">
                            <a href="/blog/<?php echo $next_post->post_name; ?>/" rel="next">
                                <span class="meta-nav" aria-hidden="true"></span> 
                                <span class="screen-reader-text">Next Post</span> 
                                <span class="post-title"><?php echo $next_post->post_title; ?></span>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </nav>
            </div>
        </div><!--main content ends here-->
        
        <?php get_template_part('parts/footer'); ?>
    </div>


<?php get_template_part('parts/subscribe-modal'); ?>
<?php get_template_part('parts/modal-exit-intent'); ?>
<?php get_footer(); ?>
