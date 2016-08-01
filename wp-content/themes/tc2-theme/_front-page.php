<?php 

	// get all custom fields
	$fields = get_fields();
	
	// Dynamic CSS
	wp_enqueue_style('section-custom-style', '/wp-content/tc2-theme' . '/css/screen.css' );
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

?>
   
    <?php get_template_part('parts/right-aside'); ?>

    <div class="wrapper landing-page">
        <div class="main-container">
            <section class="section section-top-banner widget active">
                
                <?php get_template_part('parts/top-head'); ?>
                
                <div class="container">
                    <div class="valign-middle">
                        <div class="top-banner">
                            <h2 class="titles"><?php echo $fields['sec1_title']; ?></h2>
                            <div class="row">
                                <a href="<?php echo $fields['sec1_button_url']; ?>" class="btn-white btn-what-can-you-get-done"><?php echo $fields['sec1_button_label']; ?></a>
                            </div>
                        </div>
                        <!-- end .top-banner -->
                    </div>
                </div>
            </section>
            <!-- end .section-top-banner -->

            <section class="section section-crowdsourcing widget">
                <div class="container">
                    <div class="valign-middle">
                        <h2 class="titles"><?php echo $fields['sec2_title']; ?></h2>
                        <div class="row">
                            
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
                        <div class="row row-bottom">
                            <h2 class="titles-blue"><?php echo $fields['sec2_bottom_title']; ?></h2>
                            <p class="txt"><?php echo $fields['sec2_bottom_subtitle']; ?></p>
                            <a href="<?php echo $fields['sec2_bottom_button_url']; ?>" class="btn-blue btn-get-the-study"><?php echo $fields['sec2_bottom_button_label']; ?></a>
                        </div>
                        <!-- end .row -->
                    </div>
                </div>
            </section>
            <!-- end .section-crowdsourcing -->

            <section class="section section-community widget">
                <div class="container">
                    <div class="valign-middle">
                        <?php if ( $fields['sec3_floating_image']!='' ) : ?>
                        <div class="match-ipad-rotate"><img src="<?php echo $fields['sec3_floating_image']; ?>" alt="" class="img-responsive" /></div>
                        <?php endif; ?>
                        <div class="info-main">
                            <h3 class="titles"><?php echo $fields['sec3_title']; ?></h3>
                            <p class="txt"><?php echo $fields['sec3_description']; ?></p>
                            <a href="<?php echo $fields['sec3_button_url']; ?>" class="btn-blue btn-meet-our-community"><?php echo $fields['sec3_button_label']; ?></a>
                        </div>
                        <!-- end .info-main -->
                    </div>
                </div>
            </section>
            <!-- end .section-community -->

            <section class="section section-get-done widget">
                <div class="container">
                    <div class="valign-middle">
                        <h2 class="titles"><?php echo $fields['sec4_title']; ?></h2>
                        <div class="row-area">
                            <div class="left-box">
                                <?php if ( $fields['sec4_floating_image']!='' ) : ?>
                                <div class="match-apple-imac"><img src="<?php echo $fields['sec4_floating_image']; ?>" alt="" class="img-responsive" /></div>
                                <?php endif; ?>
                            </div>
                            <div class="info-main">
                                <p class="txt"><?php echo $fields['sec4_description']; ?></p>
                                <a href="<?php echo $fields['sec4_button_url']; ?>" class="btn-blue btn-explore-our-offerings"><?php echo $fields['sec4_button_label']; ?></a>
                            </div>
                            <!-- end .info-main -->
                        </div>
                        <!-- end .row-area -->
                    </div>
                </div>
            </section>
            <!-- end .section-get-done -->

            <section class="section section-marketplace widget">
                <div class="container">
                    <div class="valign-middle">
                        <div class="info-main">
                            <h3 class="titles"><?php echo $fields['sec5_title']; ?></h3>
                            <p class="txt"><?php echo $fields['sec5_description']; ?></p>
                            <a href="<?php echo $fields['sec5_button_url']; ?>" class="btn-blue btn-explore-the-marketplace"><?php echo $fields['sec5_button_label']; ?></a>
                        </div>
                        <!-- end .info-main -->
                    </div>
                </div>
            </section>
            <!-- end .section-marketplace -->

            <section class="section section-our-products widget">
                <div class="container">
                    <div class="valign-middle">
                        <h2 class="titles"><?php echo $fields['sec6_title']; ?></h2>
                        
                        <div class="row">
                            
                            <?php if ( $fields['sec6_products'] ) : foreach( $fields['sec6_products'] as $k=>$v ) : ?>
                            <div class="col col-xs-4">
                                <div class="boxs">
                                    <div class="icons no-bg"><img src="<?php echo $v['icon']; ?>" alt="" /></div>
                                    <h3 class="col-titles"><?php echo $v['title']; ?></h3>
                                    <p class="txt"><?php echo $v['description']; ?></p>
                                </div>
                            </div>
                            <?php if ($k==2) : ?></div><div class="row"><?php endif; ?>
                            <?php endforeach; endif; ?>
                        </div>
                           
                        <div class="row row-center">
                            <a href="<?php echo $fields['sec6_button_label']; ?>" class="btn-blue btn-explore-products"><?php echo $fields['sec6_button_label']; ?></a>
                        </div>
                        <!-- end .row -->
                    </div>
                </div>
            </section>
            <!-- end .section-our-products -->

            <section class="section section-quotes widget">
                <?php get_template_part('parts/testimonials'); ?> 
            </section>
            <!-- end .section-quotes -->

            <section class="section section-clients widget">
                <div class="container">
                    <div class="valign-middle">
                        <h2 class="titles"><?php echo $fields['sec8_title']; ?></h2>
                        <?php 
                            $product_type = $fields['sec8_client_product_type'];    
                            include(locate_template('parts/clients.php')); // needed instead of get_template_part so we can pass variable
                        ?>
                        <div class="row row-bottom">
                            <a href="<?php echo $fields['sec8_button_url']; ?>" class="btn-blue btn-view-our-partners"><?php echo $fields['sec8_button_label']; ?></a>
                        </div>
                        <!-- end .row-bottom -->
                    </div>
                </div>
            </section>
            <!-- end .section-clients -->

            <section class="section section-contact widget">
                <div class="container">
                    <div class="valign-middle">
                        <h2 class="titles"><?php echo $fields['sec9_title']; ?></h2>
                        <?php echo do_shortcode('[contact-form-7 id="'.$fields['sec9_contact_form']->ID.'" title="'.$fields['sec9_contact_form']->post_title.'"]'); ?>
                    </div>
                </div>
            </section>
            <!-- end .section-contact -->

            <section class="section section-footer widget">
                <div class="container">
                    <div class="valign-middle">
                        
                        <?php get_template_part('parts/footer'); ?>                        

                    </div>
                </div>
            </section>
            <!-- end .section-footer -->
        </div>
        <!-- end .main-container -->
    </div>
    <!-- end .wrapper -->

<?php get_footer(); ?>