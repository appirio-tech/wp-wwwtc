<?php
    /* Template Name: Algorithm & Analytics Page Template */
    
    // get all custom fields
	$fields = get_fields();
        
    // Dynamic CSS
	$custom_css = "";
    
        if ( $fields['sec2_background_image']!='' ) {
            $custom_css .= ".products-module.blue-ribbon { background-image: url(".$fields['sec2_background_image'].") !important; }";
        }

    // Render custom css
    if ($custom_css!='') {
        wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
        wp_add_inline_style( 'section-custom-style', $custom_css );
    }

    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper what-can-you-do-page">
    <div class="mask js-close-nav"></div>
        
        <?php get_template_part('parts/top-head'); ?>
        
        <?php include(locate_template('parts/hero-carousel.php')); ?>
        
        <?php get_template_part('parts/nav-what-can-you-do'); ?>
        
        
        <div class="contents">
            <div class="tab-contents tab-contents-algorithms-analytics">
                
                <?php if ($fields['sec1_title']!=''): ?>
                <div class="application-info-detail info-area">
                    <div class="match-iphone">
                        <img src="<?php echo $fields['sec1_image']; ?>" alt="" />
                    </div>
                    <div class="mains">
                        <h3 class="titles"><?php echo $fields['sec1_title']; ?></h3>
                        <p class="txt-p large-txt-p"><?php echo $fields['sec1_lead_text']; ?></p>
                        <div class="txt-p">
                            <?php echo apply_filters('the_content', $fields['sec1_content']); ?>
                        </div>
                       
                    </div>
                    <!-- end .mains -->
                </div>
                <!-- end .mobile-info-detail -->
                <?php endif; ?>
                
                <?php if ($fields['sec2_title']!=''): ?>
                <div class="products-module ribbon orange-ribbon">
                    <div class="head-panel">
                        <h2 class="titles"><?php echo $fields['sec2_title']; ?></h2>
                        <p class="txt"><?php echo $fields['sec2_description']; ?></p>
                    </div>
                    <!-- end .head-panel -->
                    
                    <div class="data-panel">
                    <?php 
                        $objProductCat = $fields['sec2_product_category']; 
                        include(locate_template('parts/products.php'));
                    ?>
                    </div>
                    <!-- end .data-panel -->
                    
                </div>
                <!-- end .products-module -->
                <?php endif; ?>

                <?php if ($fields['sec3_title']!=''): ?>
                <div class="clients-module">
                    <section class="section section-clients">
                        <div class="container">
                            <div class="valign-middle">
                                <h2 class="titles"><?php echo $fields['sec3_title']; ?></h2>
                                <?php 
                                    $product_type = $fields['sec3_client_product_type'];    
                                    include(locate_template('parts/clients.php')); 
                                ?>
                            </div>
                        </div>
                    </section>
                    <!-- end .section-clients -->
                </div>
                <!-- end .clients-module -->
                <?php endif; ?>
                
                <?php if ($fields['sec4_title']!=''): ?>
                <div class="carousel-module">
                    <div class="head-box">
                        <a href="<?php echo $fields['sec4_view_all'][0]['url']; ?>" target="<?php echo $fields['sec4_view_all'][0]['target_window']; ?>" class="link-blue"><?php echo $fields['sec4_view_all'][0]['label']; ?></a>
                        <h2 class="titles"><?php echo $fields['sec4_title']; ?></h2>
                        <h3 class="sub-titles"><?php echo $fields['sec4_description']; ?></h3>
                    </div>
                    <!-- end .head-box -->
                    
                    <?php
                        $title_class    = 'titles-white-color';
                        $txt_class      = 'white-txt';
                        $showcase_type  = $fields['product_showcase_category'];    
                        include(locate_template('parts/product_showcase.php')); 
                    ?>
                </div>
                <!-- end .carousel-module -->
                <?php endif; ?>

                <?php if ($fields['sec5_title']!=''): ?>
                <div class="contact-module contact-black-module algorithms-analytics-contact-module">
                    <section class="section-contact bottom-spacing">
                        <div class="container">
                            <div class="valign-middle">
                                <h2 class="titles"><?php echo $fields['sec5_title']; ?></h2>
                                <h3 class="sub-titles"><?php echo $fields['sec5_description']; ?></h3>
                                
                                <?php if ( $fields['sec5_contact_form']->ID>0 ) : ?>
                                <?php echo do_shortcode('[contact-form-7 id="'.$fields['sec5_contact_form']->ID.'" title="'.$fields['sec5_contact_form']->post_title.'"]'); ?>
                                <?php endif; ?>
                                
                                <?php if ( $fields['sec5_button'][0]['label']!='' ) : ?>
                                <a href="<?php echo $fields['sec5_button'][0]['url']; ?>" target="<?php echo $generic_section_val['target_window'][0]; ?>" class="btn-blue btn-crowdsourcing-today"><?php echo $fields['sec5_button'][0]['label']; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                    <!-- end .section-contact -->
                </div>
                <!-- end .contact-module -->
                <?php endif; ?>
                
            </div>
            <!-- end .tab-contents-web-applications -->
        </div>
        <!-- end .contents -->
        
        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>