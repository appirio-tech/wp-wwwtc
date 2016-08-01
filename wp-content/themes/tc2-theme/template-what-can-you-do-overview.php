<?php
    /* Template Name: What Can You Do Overview Page Template */

    // get all custom fields
	$fields = get_fields();

    // Dynamic CSS
	wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
	$custom_css = "";
	
        // background for top banner
        if ( $fields['background_image']!='' ) {
            $custom_css .= ".top-banner { background-image: url(".$fields['background_image'].") !important; }";
        }
        if ( $fields['sec2_background_image']!='' ) {
            $custom_css .= ".web-info-area { background-image: url(".$fields['sec2_background_image'].") !important; }";
        }
        if ( $fields['sec4_background_image']!='' ) {
            $custom_css .= ".algorithms-info-area{ background-image: url(".$fields['sec4_background_image'].") !important; }";
        }

    // Render custom css
	wp_add_inline_style( 'section-custom-style', $custom_css );

    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper about-topcoder-page about-topcoder-contact-page">
        
        <?php get_template_part('parts/top-head'); ?>

        <div class="top-banner-overview top-banner-what top-banner">
            <div class="container">
                <div class="valign-middle">
                    <h2 class="titles"><?php echo $fields['title']; ?></h2>
                    <p class="txt"><?php echo $fields['description']; ?></p>
                    <div class="row">
                        <a href="<?php echo $fields['banner_button_url']; ?>" target="<?php echo $fields['banner_button_target_window']; ?>" class="btn-white btn-explore-what-you-can-do"><?php echo $fields['banner_button_label']; ?></a>
                        <a href="#" class="btn-video"  data-toggle="modal" data-target="#modal-video" data-video="<?php echo $fields['banner_video_button_url']; ?>">
                            <span class="icon-video"><i class="icons"></i></span>
                            <span class="font-txt"><?php echo $fields['banner_video_button_label']; ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end .top-banner -->

        <?php get_template_part('parts/nav-what-can-you-do'); ?>
        
        <div class="contents">
            <div class="tab-contents tab-contents-overview">
                
                <?php if ($fields['sec1_title']!=''): ?>
                <div class="mobile-info-area info-area">
                    <div class="match-iphone"><img src="<?php echo $fields['sec1_image']; ?>" alt="" /></div>
                    <div class="mains">
                        <div class="icons mobile-text-icon"><img src="<?php echo $fields['sec1_icon']; ?>" alt="" /></div>
                        <h3 class="titles"><?php echo $fields['sec1_title']; ?></h3>
                        <p class="detail"><?php echo $fields['sec1_description']; ?></p>
                        <a href="<?php echo $fields['sec1_button'][0]['url']; ?>" target="<?php echo $fields['sec1_button'][0]['target_window']; ?>" class="btn-blue"><?php echo $fields['sec1_button'][0]['label']; ?></a>
                        <a href="#" class="btn-black-video btn-video" data-toggle="modal" data-target="#modal-video" data-video="<?php echo $fields['sec1_video_button'][0]['video_id']; ?>">
                            <span class="icon-video"><i class="icons"></i></span>
                            <span class="font-txt"><?php echo $fields['sec1_video_button'][0]['label']; ?></span>
                        </a>
                    </div>
                </div>
                <!-- end .mobile-info-area -->
                <?php endif; ?>
                
                <?php if ($fields['sec2_title']!=''): ?>
                <div class="web-info-area info-area">
                    <div class="match-apple-imac"><img src="<?php echo $fields['sec2_image']; ?>" alt="" /></div>
                    <div class="mains">
                        <div class="icons web-text-icon"><img src="<?php echo $fields['sec2_icon']; ?>" alt="" /></div>
                        <h3 class="titles titles-white"><?php echo $fields['sec2_title']; ?></h3>
                        <p class="detail detail-white"><?php echo $fields['sec2_description']; ?></p>
                        <a href="<?php echo $fields['sec2_button'][0]['url']; ?>" target="<?php echo $fields['sec2_button'][0]['target_window']; ?>" class="btn-blue"><?php echo $fields['sec2_button'][0]['label']; ?></a>
                        <a href="#" class="btn-white-video btn-video" data-toggle="modal" data-target="#modal-video" data-video="<?php echo $fields['sec2_video_buttons'][0]['video_id']; ?>">
                            <span class="icon-video"><i class="icons"></i></span>
                            <span class="font-txt"><?php echo $fields['sec2_video_buttons'][0]['label']; ?></span>
                        </a>
                    </div>
                </div>
                <!-- end .web-info-area -->
                <?php endif; ?>
                
                <?php if ($fields['sec3_title']!=''): ?>
                <div class="innovation-info-area info-area">
                    <div class="match-apple-mac-left-truncation"><img src="<?php echo $fields['sec3_image']; ?>" alt="" /></div>
                    <div class="mains">
                        <div class="icons innovation-text-icon"><img src="<?php echo $fields['sec3_icon']; ?>" alt="" /></div>
                        <h3 class="titles"><?php echo $fields['sec3_title']; ?></h3>
                        <p class="detail"><?php echo $fields['sec3_description']; ?></p>
                        <a href="<?php echo $fields['sec3_button'][0]['url']; ?>" target="<?php echo $fields['sec3_button'][0]['target_window']; ?>" class="btn-blue"><?php echo $fields['sec3_button'][0]['label']; ?></a>
                        <a href="#" class="btn-black-video btn-video" data-toggle="modal" data-target="#modal-video" data-video="<?php echo $fields['sec3_video_buttons'][0]['video_id']; ?>">
                            <span class="icon-video"><i class="icons"></i></span>
                            <span class="font-txt"><?php echo $fields['sec3_video_buttons'][0]['label']; ?></span>
                        </a>
                    </div>
                </div>
                <!-- end .innovation-info-area -->
                <?php endif; ?>
                
                <?php if ($fields['sec4_title']!=''): ?>
                <div class="algorithms-info-area info-area">
                    <div class="match-ipad-iphone"><img src="<?php echo $fields['sec4_image']; ?>" alt="" /></div>
                    <div class="mains">
                        <div class="icons algorithms-text-icon"><img src="<?php echo $fields['sec4_icon']; ?>" alt="" /></div>
                        <h3 class="titles titles-white"><?php echo $fields['sec4_title']; ?></h3>
                        <p class="detail detail-white"><?php echo $fields['sec4_description']; ?></p>
                        <a href="<?php echo $fields['sec4_button'][0]['url']; ?>" target="<?php echo $fields['sec4_button'][0]['target_window']; ?>" class="btn-blue"><?php echo $fields['sec4_button'][0]['label']; ?></a>
                        <a href="#" class="btn-white-video btn-video" data-toggle="modal" data-target="#modal-video" data-video="<?php echo $fields['sec4_video_buttons'][0]['video_id']; ?>">
                            <span class="icon-video"><i class="icons"></i></span>
                            <span class="font-txt"><?php echo $fields['sec4_video_buttons'][0]['label']; ?></span>
                        </a>
                    </div>
                </div>
                <!-- end .algorithms-info-area -->
                <?php endif; ?>

                <div class="contact-module contact-white-module">
                    <section class="section-contact">
                        <div class="container">
                            <div class="valign-middle">
                                <h2 class="titles more-top">Wondering how crowdsourcing can work for you?</h2>
                                <?php echo do_shortcode('[contact-form-7 id="'.$fields['sec5_contact_form']->ID.'" title="'.$fields['sec5_contact_form']->post_title.'"]'); ?>
                                <!-- end .form-contact -->
                            </div>
                        </div>
                    </section>
                    <!-- end .section-contact -->
                </div>
                <!-- end .contact-module -->
            </div>
            <!-- end .tab-contents-overview -->
        </div>
        <!-- end .contents -->
        
        
        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>