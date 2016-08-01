<?php
    /* Template Name: Marketplace: The Community */

    // get all custom fields
	$fields = get_fields();

    // Dynamic CSS
	wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
	$custom_css = "";
	
        // background for top banner
        if ( $fields['background_image']!='' ) {
            $custom_css .= ".top-banner { background-image: url(".$fields['background_image'].") !important; }";
        }

        if ( $fields['contact_form'][0]['background_image']!='' ) {
            $custom_css .= ".contact-module.contact-black-module .section-contact { background-image: url(".$fields['contact_form'][0]['background_image'].") !important; }";
        }

    // Render custom css
	wp_add_inline_style( 'section-custom-style', $custom_css );

    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>

    <div class="wrapper marketplace-page marketplace-the-community-page">

        <?php get_template_part('parts/top-head'); ?>

        <div class="top-banner-the-community top-banner-marketplace top-banner">
            <div class="container">
                <div class="valign-middle">
                    <h2 class="titles"><?php echo $fields['title']; ?></h2>
                    <p class="txt"><?php echo $fields['subtitle']; ?></p>
                </div>
            </div>
        </div>
        <!-- end .top-banner -->

        <?php get_template_part('parts/nav-marketplace'); ?>

        <div class="contents">
            <div class="tab-contents tab-contents-the-community">
                <div class="contact-main">
                    <div class="section part-one pr15">
                        <h2 class="title"><?php echo $fields['teaser_text']; ?></h2>
                        <div class="infos">
                            <?php echo apply_filters('the_content', $post->post_content); ?>
                        </div>
                    </div>
                    <!-- end .section -->
                    <div class="section clearfix part-two">
                        <div class="left-box">
                            <div class="match-apple-mac-big pull-left"><img src="<?php echo $fields['bullet_points'][0]['image']; ?>" alt="" /></div>
                        </div>
                        <!-- end .pull-left -->
                        
                        <?php if ( count($fields['bullet_points'][0]['items'])>0 ) : ?>
                        <div class="infos-list">
                           
                            <?php foreach( $fields['bullet_points'][0]['items'] as $k=>$v ) : ?>
                            <div class="txt">
                                <div class="icons2 icon72x72"><img src="<?php echo $v['icon']; ?>" alt="" /></div>
                                <h2 class="title-sub"><?php echo $v['title']; ?></h2>
                                <p class="infos-list-txt">
                                    <?php echo $v['description']; ?>
                                </p>
                            </div>
                            <?php endforeach; ?>
                            <!-- end .txt -->
                            
                        </div>
                        <!-- end .infos-list -->
                        <?php endif; ?>
                        
                        
                    </div>
                    <!-- end .section -->
                </div>
                <!-- end .contact-main -->

                <div class="live-challenges-module">
                    <div class="head-panel">
                        <h2 class="titles"><?php echo $fields['live_challenges'][0]['title']; ?></h2>
                        <p class="txt">
                            <?php echo $fields['live_challenges'][0]['description']; ?>
                        </p>
                        <a href="<?php echo $fields['live_challenges'][0]['view_all_button'][0]['url']; ?>" class="btn-blue btn-view-all-challenges"><?php echo $fields['live_challenges'][0]['view_all_button'][0]['label']; ?></a>
                    </div>
                    <!-- end .head-panel -->
                    
                    <?php if ( count($fields['live_challenges'][0]['challenges'])>0 ) : ?>
                    <div class="data-panel">
                        <div class="data-panel-group">
                            <div class="inner clearfix">
                               
                                <?php foreach( $fields['live_challenges'][0]['challenges'] as $k=>$v ) : ?>
                                <div class="panel-item get-challenge" data-challenge="<?php echo $v['challenge_id']; ?>">
                                    <div class="pannel-contents">
                                        <div class="data-panel-head clearfix">
                                            <i class="title-line"></i>
                                            <h5 class="titles blod-txt">
                                                <a href="javascript:;" class="challenge-title text-uppercase" target="_blank"></a>
                                            </h5>
                                            
                                            <h5 class="sub-titlses blod-txt challenge-type text-uppercase"></h5>
                                            <div class="clearfix"></div>
                                            
                                            <span class="icon-txt">
                                                <i class="icons2 icon-peoples"></i>
                                                <span class="blod-txt gray-txt challenge-registrants"></span>
                                            </span>
                                            
                                            <span class="icon-txt">
                                                <i class="icons2 icon-code"></i>
                                                <span class="blod-txt gray-txt challenge-submissions"></span>
                                            </span>
                                            
                                            <a href="#" class="icon-txt challenge-forum" target="_blank">
                                                <i class="icons2 icon-dialogue"></i>
                                                <span class="blod-txt gray-txt">POSTS</span>
                                            </a>
                                        </div>
                                        <!-- end .data-panel-head -->
                                        
                                        <div class="data-panel-body">
                                            <h2 class="title challenge-phase text-uppercase"></h2>
                                            <div class="calendar">
                                                <div class="calendar-title blod-txt">ENDS IN</div>
                                                <div class="calendar-num">
                                                    <i class="icons2 icons-semicircle"></i>
                                                    <i class="icons2 icons-semicircle left57"></i>
                                                    <h2 class="num blod-txt challenge-ends-in"></h2>
                                                    <h5 class="txt blod-txt challenge-ends-in-unit"></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end .data-panel-body -->
                                        
                                        <div class="data-panel-footer">
                                            <span class="blod-txt gray-txt">Role:</span>
                                            <span class="blod-txt">Observer</span>
                                        </div>
                                        <!-- end .data-panel-footer -->
                                    </div>
                                </div>
                                <!-- end .panel-item -->
                                <?php endforeach; ?>
                                
                            </div>
                        </div>
                        <!-- end data-panel-group -->
                    </div>
                    <!-- end .data-panel -->
                    <?php endif; ?>
                    
                </div>
                <!-- end .live-challenges-module -->

                <div class="contact-module contact-black-module">
                    <section class="section-contact bottom-spacing">
                        <div class="container">
                            <div class="valign-middle">
                                
                                <h2 class="titles"><?php echo $fields['contact_form'][0]['title']; ?></h2>
                                <h3 class="sub-titles"><?php echo $fields['contact_form'][0]['subtitle']; ?></h3>
                                <?php echo do_shortcode('[contact-form-7 id="'.$fields['contact_form'][0]['form']->ID.'" title="'.$fields['contact_form'][0]['form']->post_title.'"]'); ?>
                                
                            </div>
                        </div>
                    </section>
                    <!-- end .section-contact -->
                </div>
                <!-- end .contact-module -->

            </div>
            <!-- end .tab-contents-the-community -->
        </div>
        <!-- end .contents -->

        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>