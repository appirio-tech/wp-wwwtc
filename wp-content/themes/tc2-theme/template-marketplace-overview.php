<?php
    /* Template Name: Marketplace: Overview */

    // get all custom fields
	$fields = get_fields();

    // Dynamic CSS
	wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
	$custom_css = "";
	
        // background for top banner
        if ( $fields['top_banner'][0]['background_image']!='' ) {
            $custom_css .= ".top-banner-marketplace-overview { background-image: url(".$fields['top_banner'][0]['background_image'].") !important; }";
        }

        if ( $fields['new_way'][0]['background_image']!='' ) {
            $custom_css .= ".tab-contents-overview .way-info-area { background-image: url(".$fields['new_way'][0]['background_image'].") !important; }";
        }

        if ( $fields['connect_process'][0]['background_image']!='' ) {
            $custom_css .= ".tab-contents-overview .guided-info-area { background-image: url(".$fields['connect_process'][0]['background_image'].") !important; }";
        }

        if ( $fields['connect_collaboration'][0]['background_image']!='' ) {
            $custom_css .= ".tab-contents-overview .design-info-area { background-image: url(".$fields['connect_collaboration'][0]['background_image'].") !important; }";
        }


    // Render custom css
	wp_add_inline_style( 'section-custom-style', $custom_css );

    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>

    <div class="wrapper marketplace-page marketplace-overview-page">

        <?php get_template_part('parts/top-head'); ?>

        <div class="top-banner-marketplace-overview top-banner-marketplace top-banner">
            <div class="container">
                <div class="valign-middle">
                    <div class="info-area">
                        <div class="match-apple-imac"><img src="<?php echo $fields['top_banner'][0]['image']; ?>" alt="" /></div>
                        <div class="mains">
                            <h3 class="titles titles-white"><?php echo $fields['top_banner'][0]['title']; ?></h3>
                            <p class="detail detail-white"><?php echo $fields['top_banner'][0]['description']; ?></p>
                            <a href="<?php echo $fields['top_banner'][0]['get_started_button'][0]['url']; ?>" target="<?php echo $fields['top_banner'][0]['get_started_button'][0]['target_window']; ?>" class="btn-blue"><?php echo $fields['top_banner'][0]['get_started_button'][0]['label']; ?></a>
                            <a href="#" class="btn-white-video btn-video" data-toggle="modal" data-target="#modal-video" data-video="<?php echo $fields['top_banner'][0]['video_button'][0]['youtube_id']; ?>">
                                <span class="icon-video"><i class="icons"></i></span>
                                <span class="font-txt"><?php echo $fields['top_banner'][0]['video_button'][0]['label']; ?></span>
                            </a>
                        </div>
                    </div>
                    <!-- end .info-area -->
                </div>
            </div>
        </div>
        <!-- end .top-banner -->


        <?php get_template_part('parts/nav-marketplace'); ?>


        <div class="contents">
            <div class="tab-contents tab-contents-overview">

                <?php if ($fields['intro'][0]['title']!=''): ?>
                <div class="connect-info-area info-area">
                    <div class="match-web-page"><img src="<?php echo $fields['intro'][0]['image']; ?>" alt="" /></div>
                    <div class="mains">
                        <h3 class="titles"><?php echo $fields['intro'][0]['title']; ?></h3>
                        <p class="detail font-dark-blue">
                            <?php echo $fields['intro'][0]['lead_text']; ?>
                        </p>
                        <p class="detail font20">
                            <?php echo $fields['intro'][0]['description']; ?>
                        </p>
                        <a href="<?php echo $fields['intro'][0]['what_can_you_do_button'][0]['url']; ?>" target="<?php echo $fields['intro'][0]['what_can_you_do_button'][0]['target_window']; ?>" class="btn-blue btn-width208"><?php echo $fields['intro'][0]['what_can_you_do_button'][0]['label']; ?></a>
                    </div>
                </div>
                <!-- end .connect-info-area -->
                <?php endif; ?>

                <?php if ($fields['new_way'][0]['title']!=''): ?>
                <div class="way-info-area info-area">
                    <div class="match-apple-imac"><img src="<?php echo $fields['new_way'][0]['image']; ?>" alt="" /></div>
                    <div class="mains">
                        <h3 class="titles titles-white"><?php echo $fields['new_way'][0]['title']; ?></h3>
                        <p class="detail detail-white">
                            <?php echo $fields['new_way'][0]['description']; ?>
                        </p>
                        <a href="/marketplace/the-products/?tour=the-products" class="btn-blue btn-width231">What can you do? </a>
                    </div>
                </div>
                <!-- end .way-info-area -->
                <?php endif; ?>

                
               <div class="connect-info-area info-area">
                    <div class="match-web-page"><img src="<?php echo $fields['intro'][0]['image']; ?>" alt="" /></div>
                    <div class="mains">
                        <h3 class="titles">Start Crowdsourcing in Minutes</h3>
                        <p class="detail font-dark-blue">
                            Topcoder Connect captures your requirements with just a few easy steps—and ensures the Topcoder Community has all the details necessary to make your project a success. No crowdsourcing experience necessary.
                        </p>
                        <p class="detail font20">
                            Follow the prompts in the interactive guide or upload your specifications and your project is ready for kick off.
                        </p>
                        <a href="https://connect.topcoder.com/" class="btn-blue btn-width208">Start a Project</a>
                    </div>
                </div>
                <!-- end .smart-watches-info-area -->

                <?php if ($fields['connect_process'][0]['title']!=''): ?>
                <div class="guided-info-area info-area">
                    <div class="match-web-page"><img src="<?php echo $fields['connect_process'][0]['image']; ?>" alt="" /></div>
                    <div class="mains">
                        <h3 class="titles"><?php echo $fields['connect_process'][0]['title']; ?></h3>
                        <p class="detail">
                            <?php echo $fields['connect_process'][0]['description']; ?>
                        </p>
                        
                       
                        </a>
                    </div>
                </div>
                <!-- end .guided-info-area -->
                <?php endif; ?>

                <?php if ($fields['project_management'][0]['title']!=''): ?>
                <div class="project-info-area info-area">
                    <div class="match-apple-mac"><img src="<?php echo $fields['project_management'][0]['image']; ?>" alt="" /></div>
                    <div class="mains">
                        <h3 class="titles"><?php echo $fields['project_management'][0]['title']; ?></h3>
                        <p class="detail">
                            <?php echo $fields['project_management'][0]['description']; ?>
                        </p>
                    </div>
                </div>
                <!-- end .project-info-area -->
                <?php endif; ?>

                <?php if ($fields['connect_collaboration'][0]['title']!=''): ?>
                <div class="design-info-area info-area">
                    <div class="match-web-page"><img src="<?php echo $fields['connect_collaboration'][0]['image']; ?>" alt="" /></div>
                    <div class="mains">
                        <h3 class="titles"><?php echo $fields['connect_collaboration'][0]['title']; ?></h3>
                        <p class="detail">
                            <?php echo $fields['connect_collaboration'][0]['description']; ?>
                        </p>
                        
                        <a href="#" class="btn-black-video btn-video" data-toggle="modal" data-target="#modal-video" data-video="<?php echo $fields['connect_collaboration'][0]['video_button'][0]['youtube_id']; ?>">
                            <span class="icon-video"><i class="icons"></i></span>
                            <span class="font-txt"><?php echo $fields['connect_collaboration'][0]['video_button'][0]['label']; ?></span>
                        </a>
                    </div>
                </div>
                <!-- end .design-info-area -->
                <?php endif; ?>

                <?php if ($fields['connected'][0]['title']!=''): ?>
                <div class="clients-info-area info-area">
                    <div class="match-clients"><img src="<?php echo $fields['connected'][0]['image']; ?>" alt="" /></div>
                    <div class="mains">
                        <h3 class="titles"><?php echo $fields['connected'][0]['title']; ?></h3>
                        <p class="detail">
                            <?php echo $fields['connected'][0]['description']; ?>
                        </p>
                    </div>
                </div>
                <!-- end .clients-info-area -->
                <?php endif; ?>
                
                
                <div class="quotes-module">
                    <section class="section section-quotes">
                        <?php get_template_part('parts/testimonials'); ?>
                    </section>
                    <!-- end .section-quotes -->
                </div>
                <!-- end .quotes-module -->
                

                <?php if ($fields['contact_form'][0]['title']!=''): ?>
                <div class="contact-module contact-white-module">
                    <section class="section-contact">
                        <div class="container">
                            <div class="valign-middle">
                                <h2 class="titles"><BR><BR><BR>Want to use crowdsourcing to get more done?</h2>
                        <center><a href="http://crowdsourcing.topcoder.com/connect" target="_blank" class="btn-blue btn-get-started-with-crowdsourcing">Demo Topcoder Connect Today</a></center
                            </div>
                        </div>
                    </section>
                    <!-- end .section-contact -->
                </div>
                <!-- end .contact-module -->
                <?php endif; ?>

            </div>
            <!-- end .tab-contents-overview -->
        </div>
        <!-- end .contents -->

        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>