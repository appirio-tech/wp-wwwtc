<?php
    /* Template Name: Contact Page Template */

    // get all custom fields
	$fields = get_fields();

    // Dynamic CSS
	wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
	$custom_css = "";
	
        // background for top banner
        if ( $fields['background_image']!='' ) {
            $custom_css .= ".top-banner { background-image: url(".$fields['background_image'].") !important; }";
        }

        // background for contact form section
        if ( $fields['contact_form_background_image']!='' ) {
            $custom_css .= ".section-contact { background-image: url(".$fields['contact_form_background_image'].") !important; }";
        }
        
    // Render custom css
	wp_add_inline_style( 'section-custom-style', $custom_css );

    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper about-topcoder-page about-topcoder-contact-page">
        
        <?php get_template_part('parts/top-head'); ?>

        <div class="top-banner-contact top-banner-about top-banner">
            <div class="container">
                <div class="valign-middle">
                    <h2 class="titles"><?php echo $fields['title']; ?></h2>
                    <p class="txt"><?php echo $fields['subtitle']; ?></p>
                </div>
            </div>
        </div>
        <!-- end .top-banner -->

        <?php get_template_part('parts/nav-about-topcoder'); ?>
        
        
        <div class="contents">
            <div class="tab-contents tab-contents-contact">
                <div class="contact-main">
                    <div class="map-module">
                        <div class="map-area">
                            <div class="cover-white"></div>
                            <img src="<?php echo $fields['content_background']; ?>" alt="map">
                        </div>
                        <!-- end .map-area -->
                        <div class="center-box">
                            <div class="mains">
                                <div class="center-box-left pull-left">
                                    <h2 class="title">Location</h2>
                                    <p class="address">
                                        <?php echo $fields['location_content']; ?>
                                    </p>
                                    <h2 class="title">Numbers</h2>
                                    <ul class="numbers">
                                        <?php foreach( $fields['number_items'] as $k=>$v ) : ?>
                                        <li><?php echo $v['number']; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <!-- end .center-box-left -->
                                
                                <?php $arrSMOptions = get_option('quesks_social_media_options'); ?>
                                <div class="center-box-right pull-left">
                                    <h2 class="title">Social</h2>
                                    <ul class="social-ul clearfix">
                                        <?php if ( in_array('Facebook', $fields['social_media']) ) : ?>
                                        <li>
                                            <a href="<?php echo $arrSMOptions['facebook']; ?>" class="icons icon-fb"></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if ( in_array('Twitter', $fields['social_media']) ) : ?>
                                        <li>
                                            <a href="<?php echo $arrSMOptions['twitter']; ?>" class="icons icon-tt"></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if ( in_array('Blog', $fields['social_media']) ) : ?>
                                        <li>
                                            <a href="<?php echo $arrSMOptions['blog']; ?>" class="icons icon-rss"></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if ( in_array('Instagram', $fields['social_media']) ) : ?>
                                        <li>
                                            <a href="<?php echo $arrSMOptions['instagram']; ?>" class="icons icon-camera"></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if ( in_array('Google+', $fields['social_media']) ) : ?>
                                        <li>
                                            <a href="<?php echo $arrSMOptions['google_plus']; ?>" class="icons icon-gg"></a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <!-- end .center-box-right -->
                            </div>
                        </div>
                        <!-- end .center-box -->
                    </div>
                    <!-- end .map-module -->

                    <div class="contact-module">
                        <section class="section-contact">
                            <div class="container">
                                <div class="valign-middle">
                                    <h2 class="titles"></h2>
                                    <div class="form-contact">
                                        
                                        <?php echo do_shortcode('[contact-form-7 id="'.$fields['contact_form']->ID.'" title="'.$fields['contact_form']->post_title.'"]'); ?>
                                       
                                    </div>
                                    <!-- end .form-contact -->
                                </div>
                            </div>
                        </section>
                        <!-- end .section-contact -->
                    </div>
                    <!-- end .contact-module -->

                </div>
                <!-- end .contact-main -->
            </div>
            <!-- end .tab-contents-contact -->
        </div>
        <!-- end .contents -->
        
        
        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_footer(); ?>