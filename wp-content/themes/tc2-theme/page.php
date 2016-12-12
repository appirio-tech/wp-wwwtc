<?php 
    // get all custom fields
	$fields = get_fields();
    
    get_header(); 
?>

    <?php get_template_part('parts/right-aside'); ?>

    <div class="wrapper about-topcoder-page">
    <div class="mask js-close-nav"></div>
        
        <?php get_template_part('parts/top-head'); ?>
        
        <?php include(locate_template('parts/hero-carousel.php')); ?>

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