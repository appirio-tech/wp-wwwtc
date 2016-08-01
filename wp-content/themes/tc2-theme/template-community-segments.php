<?php
    /* Template Name: Community Segment Page Template */

    // get all custom fields
	$fields = get_fields();

    // Dynamic CSS
	wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
	$custom_css = "";
	
        // background for top banner
        if ( $fields['background_image']!='' ) {
            $custom_css .= ".top-banner { background-image: url(".$fields['background_image'].") !important; background-position: bottom;}";
        }

        if ( $fields['sec2_background_image']!='' ) {
            $custom_css .= ".products-module.blue-ribbon { background-image: url(".$fields['sec2_background_image'].") !important; }";
        }

    // Render custom css
	wp_add_inline_style( 'section-custom-style', $custom_css );

    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper about-topcoder-page about-topcoder-contact-page">
        
        <div class="top-banner-about top-banner">
            <div class="container">
                <div class="valign-middle">
                    <h2 class="titles"><?php echo $fields['title']; ?></h2>
                    <p class="txt"><?php echo $fields['subtitle']; ?></p>
                </div>
            </div>
        </div>
        <!-- end .top-banner -->

        <?php get_template_part('parts/nav-what-can-you-do'); ?>
        
        <div class="contents top-border">
            <div class="tab-contents tab-contents-company">
                <div class="company-main">
                    <div class="section part-one">
                        <h2 class="title"><?php echo $fields['teaser_text']; ?></h2>
                        <div class="infos">
                            <?php 
                                while ( have_posts() ) {
                                    the_post();
                                    the_content(); 
                                }
                            ?>
                        </div>
                    </div>
                    <!-- end .section -->
                </div>
            
                <?php if ($fields['sec4_title']!=''): ?>
                <div class="carousel-module">
                    <div class="head-box">
                        <a href="<?php echo $fields['sec4_view_all'][0]['url']; ?>" target="<?php echo $fields['sec4_view_all'][0]['target_window']; ?>" class="link-blue"><?php echo $fields['sec4_view_all'][0]['label']; ?></a>
                        <h2 class="titles"><?php echo $fields['sec4_title']; ?></h2>
                        <h3 class="sub-titles"><?php echo $fields['sec4_description']; ?></h3>
                    </div>
                    <!-- end .head-box -->
                    
                    <?php 
                        $title_class    = '';
                        $txt_class      = '';
                        $showcase_type  = $fields['product_showcase_category'];
                        include(locate_template('parts/community_showcase.php')); 
                    ?>
                    
                </div>
                <!-- end .carousel-module -->
                <?php endif; ?>
                
                <div class="contact-module contact-black-module web-applications-contact-module">
                    <section class="section-contact bottom-spacing">
                        <div class="container">
                            <div class="valign-middle">
                                <h2 class="titles">Ignite your innovation through crowdsourcing.</h2>
                                <h3 class="sub-titles"></h3>
                                
                                                                
                                <a href="#" class="btn-blue btn-crowdsourcing-today">Let's talk crowdsourcing today!</a>
                            </div>
                        </div>
                    </section>
                    <!-- end .section-contact -->
                </div>
            </div>

            <!-- end .tab-contents-company -->
        </div>
        <!-- end .contents -->
        
        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>