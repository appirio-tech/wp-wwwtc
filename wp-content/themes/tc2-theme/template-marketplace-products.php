<?php
    /* Template Name: Marketplace: The Products */

    // get all custom fields
	$fields = get_fields();
        
    // Dynamic CSS
	$custom_css = "";
	
        if ( $fields['contact_form'][0]['background_image']!='' ) {
            $custom_css .= ".contact-module.contact-black-module .section-contact { background-image: url(".$fields['contact_form'][0]['background_image'].") !important; }";
        }

        if ( $fields['products'][0]['background_image']!='' ) {
            $custom_css .= ".tab-contents-the-products .products-module.ribbon { 
                                background-image: url(".$fields['products'][0]['background_image'].") !important; 
                                background-position: 0 520px !important;
                            }";
        }

    // Render custom css
    if ($custom_css!='') {
        wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
        wp_add_inline_style( 'section-custom-style', $custom_css );
    }

    get_header();
?>
    <?php get_template_part('parts/right-aside'); ?>

    <div class="wrapper marketplace-page marketplace-the-products-page">
    <div class="mask js-close-nav"></div>

        <?php get_template_part('parts/top-head'); ?>
        
        <?php include(locate_template('parts/hero-carousel.php')); ?>
        
        <?php get_template_part('parts/nav-marketplace'); ?>

        <div class="contents">
            <div class="tab-contents tab-contents-the-products">

                <?php if ($fields['products'][0]['title']!=''): ?>
                <div class="products-module ribbon black-ribbon">
                    <div class="head-panel">
                        <h2 class="titles"><?php echo $fields['products'][0]['title']; ?></h2>
                        <p class="txt">
                            <?php echo $fields['products'][0]['description']; ?>
                        </p>
                        
                    </div>
                    <!-- end .head-panel -->
                    
                    <div class="data-panel">
                        <div class="retrieve-row">
                            <span class="left-txt">Browse by offering category</span>
                            <?php 
                                $product_terms = get_terms( 'product_category' );
                                if ( $product_terms ) :
                            ?>
                            <div class="dropdown" id="productSelectCat">
                                <a id="dLabel" class="dropdown-current" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="txt selected-option">All</span>
                                    <i class="icons2 icon-down-arrow"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li><a href="javascript:;" data-cat="0">All</a></li>
                                    <?php foreach( $product_terms as $k=>$v ) : ?>
                                    <li>
                                        <a href="javascript:;" data-cat="<?php echo $v->term_id; ?>"><?php echo $v->name; ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <!-- end .dropdown -->
                            <?php endif; ?>
                        </div>
                        <!-- end .retrieve-row -->
                        
                        <div id="productToggleCat">
                        <?php 
                            $objProductCat = ''; 
                            include(locate_template('parts/products.php'));
                        ?>
                        </div>
                        
                    </div>
                    <!-- end .data-panel -->
                </div>
                <!-- end .products-module -->
                <?php endif; ?>

                <?php if ($fields['contact_form'][0]['title']!=''): ?>
                <div class="contact-module contact-black-module">
                    <section class="section-contact bottom-spacing">
                        <div class="container">
                            <div class="valign-middle">
                                <h2 class="titles"><BR><BR><BR>Piqued by crowdsourcing?</h2>
                        <center><a href="http://crowdsourcing.topcoder.com/piqued_by_crowdsourcing" target="_blank" class="btn-blue btn-get-started-with-crowdsourcing">Contact Us</a></center>
                            </div>
                        </div>
                    </section>
                    <!-- end .section-contact -->
                </div>
                <!-- end .contact-module -->
                <?php endif; ?>

            </div>
            <!-- end .tab-contents-the-products -->
        </div>
        <!-- end .contents -->

        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>