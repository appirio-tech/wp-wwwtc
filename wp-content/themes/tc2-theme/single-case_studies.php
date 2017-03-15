<?php
    // get all custom fields
	$fields = get_fields();
    
    get_header();
    
    $terms = get_the_terms( $post->ID , 'case_study_category' );
?>

    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper case-study-content case-<?php echo $terms[0]->slug; ?>">
        <div class="mask js-close-nav"></div>
        
        <?php get_template_part('parts/top-head'); ?>
        
        <?php include(locate_template('parts/hero-carousel.php')); ?>
        
        <div class="contents">
            <div class="container">
                
                <div class="categories">
                    <ul>
                        <li class="back-to-case">
                            <a href="https://www.topcoder.com/about-topcoder/case-studies/" data-catfilter="back">
                                <span class="icon-back"></span>
                                Back to Customer Stories
                            </a>
                        </li>
                    </ul>
                </div><!-- / .categories -->
                
                
                <?php if ($fields['teaser_text']!='') : ?>
                <div class="case-study-teaser">
                    <?php echo apply_filters('the_content', $fields['teaser_text']); ?>
                </div><!-- / .case-study-teaser -->
                <?php endif; ?>
                
                <div class="row">
                    <div class="<?php echo ( isset($fields['metrics']) && count($fields['metrics'])>0 ) ? 'col-md-8' : 'col-md-12'; ?>">
                        <?php if ($fields['quote']!='') : ?>
                        <div class="case-study-quote">
                            <?php echo apply_filters('the_content', $fields['quote']); ?>
                        </div><!-- / .case-study-quote -->
                        <?php endif; ?>
                        
                        <?php if ($fields['top_text_copy']!='') : ?>
                        <div class="case-study-top-text">
                            <?php if ($fields['top_text_title']!='') : ?><h2><?php echo $fields['top_text_title']; ?></h2><?php endif; ?>
                            <?php echo apply_filters('the_content', $fields['top_text_copy']); ?>
                        </div><!-- / .case-study-top-text -->
                        <?php endif; ?>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <?php if ($fields['left_text_copy']!='') : ?>
                                <div class="case-study-left-text">
                                    <?php if ($fields['left_text_title']!='') : ?><h2><?php echo $fields['left_text_title']; ?></h2><?php endif; ?>
                                    <?php echo apply_filters('the_content', $fields['left_text_copy']); ?>
                                </div><!-- / .case-study-left-text -->
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6">
                                <?php if ($fields['right_text_copy']!='') : ?>
                                <div class="case-study-right-text">
                                    <?php if ($fields['right_text_title']!='') : ?><h2><?php echo $fields['right_text_title']; ?></h2><?php endif; ?>
                                    <?php echo apply_filters('the_content', $fields['right_text_copy']); ?>
                                </div><!-- / .case-study-right-text -->
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </div>
                    
                    <?php if ( isset($fields['metrics']) ) : ?>
                    <div class="col-md-4">
                        <div class="case-studies-metrics">
                            <ul>
                                <?php foreach( $fields['metrics'] as $k=>$v ) : ?>
                                <li>
                                    <div class="key"><?php echo $v['key']; ?></div>
                                    <div class="value" id="case-value-<?php echo $k; ?>"
                                       data-value="<?php echo $v['value']; ?>"
                                       data-prefix="<?php echo $v['prefix_value']; ?>"
                                       data-suffix="<?php echo $v['suffix_value']; ?>">
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div><!-- / .case-studies-metrics -->
                    </div>
                    <?php endif; ?>
                </div>
                
                <?php if ( isset($fields['images']) ) : ?>
                <div class="case-studies-images">
                    <div id="carousel-case-studies" class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner" role="listbox">
                            <?php 
                                foreach( $fields['images'] as $k=>$v ) : 
                                    $image = wp_get_attachment_image_src($v['image'], 'full');
                                    if ( $image ) :
                            ?>
                            <div class="item <?php echo $k==0 ? 'active':''; ?>">
                                <img src="<?php echo $image[0]; ?>" alt="">
                            </div>
                            <?php 
                                    endif;
                                endforeach; 
                            ?>
                        </div>
                        
                        <?php if ( count($fields['images'])>1 ) : ?>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-case-studies" role="button" data-slide="prev">
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-case-studies" role="button" data-slide="next">
                            <span class="sr-only">Next</span>
                        </a>
                        <?php endif; ?>
                        
                    </div>
                </div><!-- / .case-studies-images -->
                <?php endif; ?>
            </div>
        </div>
        
        <div class="introducing_article">
            <div class="container">
                <nav class="navigation post-navigation" role="navigation">
                    <div class="nav-links">
                        <?php $prev_post = get_previous_post(); ?>
                        <?php if ( $prev_post ) : ?>
                        <div class="nav-previous">
                            <a href="https://www.topcoder.com/about-topcoder/case-studies/<?php echo $prev_post->post_name; ?>/" rel="prev">
                                <span class="meta-nav" aria-hidden="true"></span> 
                                <span class="screen-reader-text">Previous Post</span> 
                                <span class="post-title"><?php echo $prev_post->post_title; ?></span>
                            </a>
                        </div>
                        <?php endif; ?>
                        
                        <?php $next_post = get_next_post(); ?>
                        <?php if ( $next_post ) : ?>
                        <div class="nav-next">
                            <a href="https://www.topcoder.com/about-topcoder/case-studies/<?php echo $next_post->post_name; ?>/" rel="next">
                                <span class="meta-nav" aria-hidden="true"></span> 
                                <span class="screen-reader-text">Next Post</span> 
                                <span class="post-title"><?php echo $next_post->post_title; ?></span>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </nav>
            </div>
        </div>
        <?php get_template_part('parts/footer'); ?>
    </div>
    <!-- end .wrapper -->

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>