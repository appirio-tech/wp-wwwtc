<?php
    /* Template Name: Company Page Template */

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

        <?php get_template_part('parts/nav-about-topcoder'); ?>

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
                    
                    <?php if ( count($fields['bullet_points'])>0 ): ?>
                    <!-- start of custom section -->
                    <div class="section clearfix part-two">
                        <div class="left-box">
                            <div class="match-apple-mac pull-left"><img src="<?php echo $fields['company_study_image']; ?>" alt="" /></div>
                        </div>
                        <!-- end .pull-left -->
                        <div class="infos-list">
                            <?php foreach( $fields['bullet_points'] as $k=>$v ) : ?>
                            <div class="txt">
                                <h2 class="title-sub"><?php echo $v['title']; ?></h2>
                                <p class="infos-list-txt"><?php echo $v['description']; ?></p>
                                <br />
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- end .infos-list -->
                    </div>
                    <!-- end .section -->
                    <?php endif; ?>
                    
                    <?php if ($fields['company_study_description']!=''): ?>
                    <div class="section part-three">
                        <div class="txt-right">
                            <div class="left-box">
                                <div class="lefts">
                                    <div class="blue-line"></div>
                                    <div class="blue-txt-left"><?php echo $fields['company_study_image_caption']; ?></div>
                                </div>
                            </div>
                            <p class="infos">
                                <?php echo $fields['company_study_description']; ?>
                            </p>
                            <a href="<?php echo $fields['company_study_button_url']; ?>" target="<?php echo $fields['company_study_button_target_window']; ?>" class="btn-blue width165"><?php echo $fields['company_study_button_label']; ?></a>
                        </div>
                    </div>
                    <!-- end of custom section -->
                    <?php endif; ?>
                    
                </div>
            </div>
            <!-- end .tab-contents-company -->
        </div>
        <!-- end .contents -->

        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_footer(); ?>