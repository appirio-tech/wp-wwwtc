<?php
    /* Template Name: Marketplace: The Community */
    
    // get all custom fields
	$fields = get_fields();
        
    // Dynamic CSS
	$custom_css = "";
	
        if ( $fields['contact_form'][0]['background_image']!='' ) {
            $custom_css .= ".contact-module.contact-black-module .section-contact { background-image: url(".$fields['contact_form'][0]['background_image'].") !important; }";
        }

    // Render custom css
    if ($custom_css!='') {
        wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
        wp_add_inline_style( 'section-custom-style', $custom_css );
    }

    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>

    <div class="wrapper marketplace-page marketplace-the-community-page">
    <div class="mask js-close-nav"></div>

        <?php get_template_part('parts/top-head'); ?>
        
        <?php include(locate_template('parts/hero-carousel.php')); ?>
        
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
                        <div class="infos-list hidden-xs">
                           
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
                        
                        <?php if ( count($fields['bullet_points'][0]['items'])>0 ) : ?>
                        <div id="infoBulletPointsSlider" class="infos-list visible-xs carousel info-list-carousel default-carousel slide js-slider" data-ride="carousel" data-interval=false>
                           
                            <ol class="carousel-indicators">
                              <?php if ( $fields['bullet_points'][0]['items'] ) : foreach( $fields['bullet_points'][0]['items'] as $k=>$v ) : ?>
                                <li data-target="#infoBulletPointsSlider" data-slide-to="<?php echo $k; ?>" class="<?php if($k===0){ echo 'active';} ?>"></li>
                                <?php endforeach; endif; ?>
                            </ol>

                            <div class="carousel-inner" role="listbox">
                            <?php if ( $fields['bullet_points'][0]['items'] ) : foreach( $fields['bullet_points'][0]['items'] as $k=>$v ) : ?>
                                <div class="item col <?php if($k===0){ echo 'active';} ?>">
                                    <div class="txt">
                                        <div class="icons2 icon72x72"><img src="<?php echo $v['icon']; ?>" alt="" /></div>
                                        <h2 class="title-sub"><?php echo $v['title']; ?></h2>
                                        <p class="infos-list-txt">
                                            <?php echo $v['description']; ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; endif; ?>
                            </div>
                            
                        </div>
                        <!-- end .infos-list -->
                        <?php endif; ?>
                        
                    </div>
                    <!-- end .section -->
                </div>
                <!-- end .contact-main -->

                <div class="live-challenges-module">
                    <?php if ($fields['live_challenges'][0]['title']!=''): ?>
                    <div class="head-panel">
                        <h2 class="titles"><?php echo $fields['live_challenges'][0]['title']; ?></h2>
                        <p class="txt">
                            <?php echo $fields['live_challenges'][0]['description']; ?>
                        </p>
                        <a target="<?php echo $fields['live_challenges'][0]['view_all_button'][0]['target_window']; ?>" href="<?php echo $fields['live_challenges'][0]['view_all_button'][0]['url']; ?>" class="btn-blue btn-view-all-challenges"><?php echo $fields['live_challenges'][0]['view_all_button'][0]['label']; ?></a>
                    </div>
                    <!-- end .head-panel -->
                    <?php endif; ?>
                    
                    <?php if ( count($fields['live_challenges'][0]['challenges'])>0 ) : ?>
                    <div class="data-panel hidden-xs">
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
                    
                    <?php if ( count($fields['live_challenges'][0]['challenges'])>0 ) : ?>
                    <div class="data-panel visible-xs">
                        <div class="data-panel-group">
                            <div id="infoChallengesSlider" class="inner clearfix carousel info-list-carousel default-carousel slide js-slider" data-ride="carousel" data-interval=false>

                                <ol class="carousel-indicators">
                                  <?php if ( $fields['live_challenges'][0]['challenges'] ) : foreach( $fields['live_challenges'][0]['challenges'] as $k=>$v ) : ?>
                                    <li data-target="#infoChallengesSlider" data-slide-to="<?php echo $k; ?>" class="<?php if($k===0){ echo 'active';} ?>"></li>
                                    <?php endforeach; endif; ?>
                                </ol>

                                <div class="carousel-inner" role="listbox">
                                <?php if ( $fields['live_challenges'][0]['challenges'] ) : foreach( $fields['live_challenges'][0]['challenges'] as $k=>$v ) : ?>
                                    <div class="item col <?php if($k===0){ echo 'active';} ?>">
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
                                    </div>
                                <?php endforeach; endif; ?>
                                </div>
                                
                            </div>
                        </div>
                        <!-- end data-panel-group -->
                    </div>
                    <!-- end .data-panel -->
                    <?php endif; ?>
                    
                </div>
                <!-- end .live-challenges-module -->

                <?php if ($fields['contact_form'][0]['title']!=''): ?>
                <div class="contact-module contact-black-module">
                    <section class="section-contact bottom-spacing">
                        <div class="container">
                            <div class="valign-middle">
                                
                                 <h2 class="titles"><BR><BR><BR>Want to work on amazing projects?</h2>
                        <center><a href="https://www.topcoder.com/register/" target="_blank" class="btn-blue btn-get-started-with-crowdsourcing">Join Topcoder</a></center>
                                
                            </div>
                        </div>
                    </section>
                    <!-- end .section-contact -->
                </div>
                <!-- end .contact-module -->
                <?php endif; ?>

            </div>
            <!-- end .tab-contents-the-community -->
        </div>
        <!-- end .contents -->

        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>