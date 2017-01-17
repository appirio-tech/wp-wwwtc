<?php 
    /**
     * Template Name: Frontpage Template: TC2.0 
     */

	// get all custom fields
    $fields = get_fields();

	// Dynamic CSS
    wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
    $custom_css = "";

        // background for section 1
    if ( $fields['sec1_background_image']!='' ) {
        $custom_css .= ".section-top-banner { background-image: url(".$fields['sec1_background_image'].") !important; }";
    }

        // background for section 3
    if ( $fields['sec3_background_image']!='' ) {
        $custom_css .= ".section-community { background-image: url(".$fields['sec3_background_image'].") !important; }";
    }

        // background for section 5
    if ( $fields['sec5_background_image']!='' ) {
        $custom_css .= ".section-marketplace { background-image: url(".$fields['sec5_background_image'].") !important; }";
    }

        // background for section 9
    if ( $fields['sec9_background_image']!='' ) {
        $custom_css .= ".section-contact { background-image: url(".$fields['sec9_background_image'].") !important; }";
    }



    // Render custom css
    wp_add_inline_style( 'section-custom-style', $custom_css );

    get_header(); 

    $section_ctr = 0;
    ?>
    
    
    <?php get_template_part('parts/right-aside'); ?>
    
    
    <div class="wrapper landing-page">
    <div class="mask js-close-nav"></div>
            <section id="home-section-1" class="section section-top-banner section-full-height">

                <?php get_template_part('parts/top-head'); ?>
                
                <?php if ($fields['sec1_title']!=''): $section_ctr++; ?>
                    <div class="container">
                        <div class="valign-middle">
                            <div class="top-banner has-header ">
                                <h2 class="titles"><?php echo $fields['sec1_title']; ?></h2>
                                <div class="row">
                                    <a href="<?php echo $fields['sec1_button_url']; ?>" target="<?php echo $fields['sec1_button_target_window']; ?>" class="btn-white btn-what-can-you-get-done"><?php echo $fields['sec1_button_label']; ?></a>
                                </div>
                            </div>
                            <!-- end .top-banner -->
                        </div>
                    </div>
                <?php endif; ?>
            </section>
            <!-- end .section-top-banner -->

            <?php if ($fields['sec2_title']!=''): $section_ctr++; ?>
            <section id="home-section-2" class="section section-crowdsourcing">
                <div class="container">
                    <div class="valign-middle ">
                        <h2 class="titles"><?php echo $fields['sec2_title']; ?></h2>
                        <div class="row hidden-xs">
                            <?php if ( $fields['sec2_three_columns'] ) : foreach( $fields['sec2_three_columns'] as $k=>$v ) : ?>
                                <div class="col col-talent col-xs-4">
                                    <div class="boxs">
                                        <div class="icons no-bg"><img src="<?php echo $v['icon']; ?>" alt="" /></div>
                                        <h3 class="col-titles"><?php echo $v['title']; ?></h3>
                                        <p class="txt"><?php echo $v['description']; ?></p>
                                    </div>
                                </div>
                                <!-- end .col-talent -->
                            <?php endforeach; endif; ?>
                        </div>
                        <!-- end .row -->
                        
                        <div id="clientSlider" class="visible-xs carousel default-carousel client-carousel slide js-slider" data-ride="carousel" data-interval=false>
                            <ol class="carousel-indicators">
                                <?php if ( $fields['sec2_three_columns'] ) : foreach( $fields['sec2_three_columns'] as $k=>$v ) : ?>
                                <li data-target="#clientSlider" data-slide-to="<?php echo $k; ?>" class="<?php if($k===0){ echo 'active';} ?>"></li>
                                <?php endforeach; endif; ?>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                    <?php if ( $fields['sec2_three_columns'] ) : foreach( $fields['sec2_three_columns'] as $k=>$v ) : ?>
                                    <div class="item col col-talent  <?php if($k===0){ echo 'active';} ?>">
                                        <div class="boxs fluid">
                                            <div class="icons no-bg"><img src="<?php echo $v['icon']; ?>" alt="" />
                                            </div>
                                            <h3 class="col-titles"><?php echo $v['title']; ?></h3>
                                            <p class="txt"><?php echo $v['description']; ?></p>
                                        </div>
                                    </div>
                                    <!-- end .col-talent -->
                                <?php endforeach; endif; ?>
                            </div>
                        </div>
                        <!-- /.default-carousel -->
                        
                        <?php if (  $fields['sec2_bottom_title']!='' ): ?>
                        <div class="row row-bottom">
                            <h2 class="titles-blue"><?php echo $fields['sec2_bottom_title']; ?></h2>
                            <p class="txt"><?php echo $fields['sec2_bottom_subtitle']; ?></p>
                            <a href="<?php echo $fields['sec2_bottom_button_url']; ?>" target="<?php echo $fields['sec2_bottom_button_target_window'][0]; ?>" class="btn-blue btn-get-the-study"><?php echo $fields['sec2_bottom_button_label']; ?></a>
                        </div>
                        <!-- end .row -->
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <!-- end .section-crowdsourcing -->
            <?php endif; ?>
            
            <?php if ($fields['sec3_title']!=''): $section_ctr++; ?>
            <section id="home-section-3" class="section section-community">
                <div class="container">
                    <div class="valign-middle">
                        <?php if ( $fields['sec3_floating_image']!='' ) : ?>
                            <div class="match-ipad-rotate"><img src="<?php echo $fields['sec3_floating_image']; ?>" alt="" class="img-responsive" /></div>
                        <?php endif; ?>
                        <div class="info-main">
                            <h3 class="titles"><?php echo $fields['sec3_title']; ?></h3>
                            <p class="txt"><?php echo $fields['sec3_description']; ?></p>
                            <a href="<?php echo $fields['sec3_button_url']; ?>" target="<?php echo $fields['sec3_button_target_window']; ?>" class="btn-blue btn-meet-our-community"><?php echo $fields['sec3_button_label']; ?></a>
                        </div>
                        <!-- end .info-main -->
                    </div>
                </div>
            </section>
            <!-- end .section-community -->
            <?php endif; ?>
            
            <?php if ($fields['sec4_title']!=''): $section_ctr++; ?>
            <section id="home-section-4" class="section section-get-done">
                <div class="container">
                    <div class="valign-middle">
                        <h2 class="titles"><?php echo $fields['sec4_title']; ?></h2>
                        <div class="row-area">
                            <?php if ( $fields['sec4_floating_image']!='' ) : ?>
                            <div class="left-box">
                                <div class="match-apple-imac"><img src="<?php echo $fields['sec4_floating_image']; ?>" alt="" class="img-responsive" /></div>
                            </div>
                            <?php endif; ?>
                            <div class="info-main">
                                <p class="txt"><?php echo $fields['sec4_description']; ?></p>
                                <a href="<?php echo $fields['sec4_button_url']; ?>" target="<?php echo $fields['sec4_button_target_window']; ?>" class="btn-blue btn-explore-our-offerings"><?php echo $fields['sec4_button_label']; ?></a>
                            </div>
                            <!-- end .info-main -->
                        </div>
                        <!-- end .row-area -->
                    </div>
                </div>
            </section>
            <!-- end .section-get-done -->
            <?php endif; ?>
            
            <?php if ($fields['sec5_title']!=''): $section_ctr++; ?>
                <section id="home-section-5" class="section section-marketplace">
                    <div class="container">
                        <div class="valign-middle">
                            <div class="info-main">
                                <h3 class="titles"><?php echo $fields['sec5_title']; ?></h3>
                                <p class="txt"><?php echo $fields['sec5_description']; ?></p>
                                <a href="<?php echo $fields['sec5_button_url']; ?>" target="<?php echo $fields['sec5_button_target_window']; ?>" class="btn-blue btn-explore-the-marketplace"><?php echo $fields['sec5_button_label']; ?></a>
                            </div>
                            <!-- end .info-main -->
                        </div>
                    </div>
                </section>
                <!-- end .section-marketplace -->
            <?php endif; ?>

            <?php if ($fields['sec6_title']!=''): $section_ctr++; ?>
            <section id="home-section-6" class="section section-our-products">
                <div class="container">
                    <div class="valign-middle">
                        <h2 class="titles"><?php echo $fields['sec6_title']; ?></h2>
                        
                        <div class="row row-products hidden-xs">
                            <?php if ( $fields['sec6_products'] ) : foreach( $fields['sec6_products'] as $k=>$v ) : ?>
                                <div class="col col-xs-4">
                                 <div class="boxs">
                                    <div class="icons no-bg"><img src="<?php echo $v['icon']; ?>" alt="" height="125px" style="padding-bottom: 20px;"/></div>
                                </div>
                                <div class="boxs">
                                    <h3 class="col-titles"><?php echo $v['title']; ?></h3>
                                    <div class="txt"><?php echo $v['description']; ?></div>
                                </div>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>
                    
                    <div id="offeringSlider" class="visible-xs carousel default-carousel offering-carousel slide js-slider" data-ride="carousel" data-interval=false>
                             <ol class="carousel-indicators">
                              <?php if ( $fields['sec6_products'] ) : foreach( $fields['sec6_products'] as $k=>$v ) : ?>
                                <li data-target="#offeringSlider" data-slide-to="<?php echo $k; ?>" class="<?php if($k===0){ echo 'active';} ?>"></li>
                                <?php endforeach; endif; ?>
                            </ol>
                        <div class="carousel-inner" role="listbox">

                            <?php if ( $fields['sec6_products'] ) : foreach( $fields['sec6_products'] as $k=>$v ) : ?>
                                <div class="item col col-talent  <?php if($k===0){ echo 'active';} ?>">
                                 <div class="boxs">
                                    <div class="icons no-bg"><img src="<?php echo $v['icon']; ?>" alt=""/></div>
                                </div>
                                <div class="boxs">

                                    <h3 class="col-titles"><?php echo $v['title']; ?></h3>
                                    <p class="txt"><?php echo $v['description']; ?></p>

                                </div>
                            </div>
                            <?php endforeach; endif; ?>

                        </div>
                    </div>
                    <!-- /.default-carousel -->

                    <div class="row row-center">
                        <a href="http://crowdsourcing.topcoder.com/piqued_by_crowdsourcing" target="_blank" class="btn-blue btn-explore-products"><?php echo $fields['sec6_button_label']; ?></a>
                    </div>
                    <!-- end .row -->
                </div>
            </div>
        </section>
        <!-- end .section-our-products -->
        <?php endif; ?>

<section id="home-section-7" class="section section-quotes">
    <?php 
    $section_ctr++;
    $testimonial_category  = $fields['testimonial_category'];
    include(locate_template('parts/testimonials.php')); 
                    //get_template_part('parts/testimonials'); 
    ?> 
</section>
<!-- end .section-quotes -->

<?php if ($fields['sec8_title']!=''): $section_ctr++; ?>
    <section id="home-section-8" class="section section-clients">
        <div class="container">
            <div class="valign-middle">
                <h2 class="titles"><?php echo $fields['sec8_title']; ?></h2>
                <?php 
                $product_type = $fields['sec8_client_product_type'];    
                            include(locate_template('parts/clients.php')); // needed instead of get_template_part so we can pass variable
                            ?>
                            <div class="row row-bottom">
                                <a href="<?php echo $fields['sec8_button_url']; ?>" target="<?php echo $fields['sec8_button_target_window']; ?>" class="btn-blue btn-view-our-partners"><?php echo $fields['sec8_button_label']; ?></a>
                            </div>
                            <!-- end .row-bottom -->
                        </div>
                    </div>
                </section>
                <!-- end .section-clients -->
            <?php endif; ?>

            <?php $section_ctr++; ?>
            <section id="home-section-9" class="section section-contact">
                <div class="container">
                    <div class="valign-middle">
                       <div class="con-wrap">
                        <h2 class="titles">Interested in using Crowdsourcing?</h2>
                        <center><a href="http://crowdsourcing.topcoder.com/tc-want-to-talk" class="btn-blue btn-get-started-with-crowdsourcing">Let’s Connect</a></center>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end .section-contact -->

            <?php $section_ctr++; ?>
            <section class="section section-footer">
                <div class="container">
                    <div class="valign-middle">

                        <?php get_template_part('parts/footer'); ?>                        

                    </div>
                </div>
            </section>
            <!-- end .section-footer -->
    </div>
    <!-- end .wrapper -->
    
    <?php get_footer(); ?>