<?php 
    // get all custom fields
	$fields = get_fields();

    // Dynamic CSS
	wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
	$custom_css = "";
	
        // background for top banner
        if ( $fields['background_image']!='' ) {
            $custom_css .= ".top-banner { background-image: url(".$fields['background_image'].") !important; }";
        }
        
    // Render custom css
	wp_add_inline_style( 'section-custom-style', $custom_css );

    get_header(); 
?>

    <?php get_template_part('parts/right-aside'); ?>

    <div class="wrapper about-topcoder-page">
        
        <?php get_template_part('parts/top-head'); ?>

        <div class="top-banner-about top-banner">
            <div class="container">
                <div class="valign-middle">
                    <h2 class="titles"><?php echo $fields['title']; ?></h2>
                    <p class="txt"><?php echo $fields['subtitle']; ?></p>
                </div>
            </div>
        </div>
        <!-- end .top-banner -->

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
            </div>
            <!-- end .tab-contents-company -->
        </div>
        <!-- end .contents -->

        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_footer(); ?>