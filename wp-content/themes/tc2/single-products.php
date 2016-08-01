<?php
    
    // get all custom fields
	$fields = get_fields();

    // Dynamic CSS
	wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
	$custom_css = "";
	
        // background for top banner
        if ( $fields['product_top_background_image']!='' ) {
            $custom_css .= ".banner-visual-design-bg { background-image: url(".$fields['product_top_background_image'].") !important;
                                                       background-repeat: no-repeat; }";
        }

    // Render custom css
	wp_add_inline_style( 'section-custom-style', $custom_css );

    get_header();
?>
    
    <?php get_template_part('parts/right-aside'); ?>

    <div class="wrapper app-visual-design-page">
       
        <?php get_template_part('parts/top-head'); ?>

        <div class="banner-visual-design-bg"></div>
        
        <div class="top-banner-app-visual-design top-banner">
            <div class="box-area">
                <div class="boxs">
                    <span class="relative">
                        <a href="<?php echo get_permalink( get_page_by_path( 'what-can-you-do' ) ) ?>" class="btn-icon-back"><i class="icons"></i>BACK</a>
                    </span>
                    <h2 class="titles"><?php echo $post->post_title; ?></h2>
                    <p class="txt"><?php echo $fields['product_sub_title']; ?></p>
                    <div class="row">
                        <a href="<?php echo $fields['product_get_started_button'][0]['label']; ?>" class="btn-blue btn-get-started"><?php echo $fields['product_get_started_button'][0]['label']; ?></a>
                        <a href="#" class="btn-video" data-toggle="modal" data-target="#modal-video" data-video="<?php echo $fields['product_video_button'][0]['video_id']; ?>">
                            <span class="icon-video"><i class="icons"></i></span>
                            <span class="font-txt"><?php echo $fields['product_video_button'][0]['label']; ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end .top-banner -->
        
        <div class="contents contents-gray">
            <div class="app-visual-design-contents">
                <div class="match-iphone-ipad"><img src="<?php echo $fields['top_section_image']; ?>" alt="" /></div>
                <div class="login-logo-group">
                    <ul>
                        <li>
                            <a href="javascript:;" class="icons icon-fb"></a>
                        </li>
                        <li>
                            <a href="javascript:;" class="icons icon-tt"></a>
                        </li>
                        <li>
                            <a href="javascript:;" class="icons icon-in"></a>
                        </li>
                    </ul>
                </div>
                <!-- end .login-logo-group -->
                
                
                <div class="app-visual-main">
                    <a href="<?php echo $fields['product_video_button'][0]['url']; ?>" class="link-icon-download">
                        <i class="icons icon-download"></i>
                        <span class="blue-txt">Download the one pager</span>
                    </a>
                    <div class="txt-area">
                        <p class="bigger-txt"><?php echo $fields['product_lead_text']; ?></p>
                        <div class="normal-txt"><?php echo apply_filters('the_content', $fields['product_details_content']); ?></div>
                    </div>
                    <div class="gray-box-module clearfix">
                        <div class="gray-box pull-left">
                            <h2 class="title sub-title">What’s Included</h2>
                            <?php if ( count($fields['product_whats_included'])>0 ) : ?>
                            <ul class="txt-list">
                                <?php foreach( $fields['product_whats_included'] as $k=>$v ) : ?>
                                <li>
                                    <i class="black-point"></i> <?php echo $v['option']; ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                        <!-- end .gray-box -->
                        <div class="gray-box pull-right">
                            <h2 class="title sub-title">What you recieve</h2>
                            <?php if ( count($fields['product_what_you_recieve'])>0 ) : ?>
                            <ul class="txt-list">
                                <?php foreach( $fields['product_what_you_recieve'] as $k=>$v ) : ?>
                                <li>
                                    <i class="black-point"></i> <?php echo $v['option']; ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                        <!-- end .gray-box -->
                    </div>
                    
                    
                    <!-- end .gray-box-module -->
                    <div class="video-txt-module clearfix">
                        <div class="vedio-img pull-left">
                            <a href="#" class="boxs" data-toggle="modal" data-target="#modal-video" data-video="<?php echo $fields['products_how_it_works'][0]['video_button'][0]['youtube_id']; ?>">
                                <span class="round-play"><i class="icons"></i></span>
                                <img src="<?php echo $fields['products_how_it_works'][0]['image']; ?>" alt="video" />
                            </a>
                        </div>
                        <!-- end .vedio-img -->
                        <div class="txt-area">
                            <h2 class="title"><?php echo $fields['products_how_it_works'][0]['title']; ?></h2>
                            <div class="normal-text mb40"><?php echo apply_filters('the_content', $fields['products_how_it_works'][0]['content']); ?></div>
                            
                            <a href="#" class="watch-link" data-toggle="modal" data-target="#modal-video" data-video="<?php echo $fields['products_how_it_works'][0]['video_button'][0]['youtube_id']; ?>">
                                <i class="icons icon-play"></i>
                                <span class="txt"><?php echo $fields['products_how_it_works'][0]['video_button'][0]['label']; ?></span>
                            </a>
                        </div>
                        <!-- end .txt-area -->
                    </div>
                    <!-- end .video-txt -->
                    
                    
                    <div class="timeline-module">
                        <h2 class="title"><?php echo $fields['products_timeline'][0]['title']; ?></h2>
                        <img src="<?php echo $fields['products_timeline'][0]['image']; ?>" alt="timeline">
                    </div>
                    <!-- end .timeline-module -->
                    
                    
                    <div class="advantage-list-module">
                        <h2 class="title"><?php echo $fields['product_why_use_crowdsourcing'][0]['title']; ?></h2>
                        <?php if ( count($fields['product_why_use_crowdsourcing'][0]['options'])>0 ) : ?>
                        <ul class="txt-list">
                            <?php foreach( $fields['product_why_use_crowdsourcing'][0]['options'] as $k=>$v ) : ?>
                            <li>
                                <i class="black-point"></i> <?php echo $v['option']; ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <!-- end .advantage-list-module -->
                    
                    
                    <div class="friend-link-module">
                        <h2 class="mobile-title"><?php echo $fields['product_partners'][0]['title']; ?></h2>
                        <?php if ( count($fields['product_partners'][0]['client'])>0 ) : ?>
                        <ul class="friend-link-list clearfix">
                            <?php foreach( $fields['product_partners'][0]['client'] as $k=>$v ) : $client_fields = get_fields($v->ID); ?>
                            <li><a href="<?php echo $client_fields['logo_link']!='' ? $client_fields['logo_link'] : 'javascript:;'; ?>"><img src="<?php echo $client_fields['logo']; ?>" alt="<?php echo $v->post_title; ?>" /></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <!-- end .friend-link-module -->
                    
                </div>
                <!-- end .app-visual-main -->

                <div class="location-carousel">
                    <div class="carousel-module">
                        <div class="head-box">
                            <a href="<?php echo $fields['product_showcase'][0]['view_all_link'][0]['url']; ?>" class="link-blue"><?php echo $fields['product_showcase'][0]['view_all_link'][0]['label']; ?></a>
                            <h2 class="titles"><?php echo $fields['product_showcase'][0]['title']; ?></h2>
                            <h3 class="sub-titles"><?php echo $fields['product_showcase'][0]['subtitle']; ?></h3>
                        </div>
                        <!-- end .head-box -->
                        <?php
                            $title_class    = '';
                            $txt_class      = '';
                            $showcase_type  = $fields['product_showcase'][0]['category'];    
                            include(locate_template('parts/product_showcase.php')); 
                        ?>
                    </div>
                    <!-- end .carousel-module -->
                </div>
                <!-- end .location-carousel -->

            </div>
            <!-- end .app-visual-design-contents -->
            

            <div class="contact-module contact-black-module visual-design-contact-module">
                <section class="section-contact">
                    <div class="container">
                        <div class="valign-middle">
                            <h2 class="titles"><?php echo $fields['product_contact_form'][0]['title']; ?></h2>
                            <?php echo do_shortcode('[contact-form-7 id="'.$fields['product_contact_form'][0]['form']->ID.'" title="'.$fields['product_contact_form'][0]['form']->post_title.'"]'); ?>
                        </div>
                    </div>
                </section>
                <!-- end .section-contact -->
            </div>
            <!-- end .contact-module -->
            
            
        </div>

        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->
    

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>