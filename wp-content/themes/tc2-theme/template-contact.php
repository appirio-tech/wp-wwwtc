<?php
    /* Template Name: Contact Page Template */

    // get all custom fields
	$fields = get_fields();
    
    // Dynamic CSS
	$custom_css = "";
	
        // background for contact form section
        if ( $fields['contact_form_background_image']!='' ) {
            $custom_css .= ".section-contact { background-image: url(".$fields['contact_form_background_image'].") !important; }";
        }
        
    // Render custom css
    if ($custom_css!='') {
        wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
        wp_add_inline_style( 'section-custom-style', $custom_css );
    }

    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper about-topcoder-page about-topcoder-contact-page">
    <div class="mask js-close-nav"></div>
        
        <?php get_template_part('parts/top-head'); ?>
        
        <?php include(locate_template('parts/hero-carousel.php')); ?>
        
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
                                            <a href="<?php echo $arrSMOptions['facebook']; ?>" target="_blank" class="icons icon-fb"></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if ( in_array('Twitter', $fields['social_media']) ) : ?>
                                        <li>
                                            <a href="<?php echo $arrSMOptions['twitter']; ?>" target="_blank" class="icons icon-tt"></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if ( in_array('Blog', $fields['social_media']) ) : ?>
                                        <li>
                                            <a href="<?php echo $arrSMOptions['blog']; ?>" target="_blank" class="icons icon-rss"></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if ( in_array('Instagram', $fields['social_media']) ) : ?>
                                        <li>
                                            <a href="<?php echo $arrSMOptions['instagram']; ?>" target="_blank" class="icons icon-camera"></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if ( in_array('Google+', $fields['social_media']) ) : ?>
                                        <li>
                                            <a href="<?php echo $arrSMOptions['google_plus']; ?>" target="_blank" class="icons icon-gg"></a>
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
                            <section class="section section-contact widget">
                <div class="container">
                    <div class="valign-middle">
                        <h2 class="titles">Need to chat?</h2>
                        <center><a href="http://crowdsourcing.topcoder.com/chat" target="_blank"  class="btn-blue btn-get-started-with-crowdsourcing">Let’s Connect</a></center>
                    </div>
                </div>
            </section>
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