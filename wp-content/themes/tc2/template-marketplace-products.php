<?php
    /* Template Name: Marketplace: The Products */

    // get all custom fields
	$fields = get_fields();

    // Dynamic CSS
	wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
	$custom_css = "";
	
        // background for top banner
        if ( $fields['top_banner'][0]['background_image']!='' ) {
            $custom_css .= ".top-banner-the-products { background-image: url(".$fields['top_banner'][0]['background_image'].") !important; }";
        }

        if ( $fields['contact_form'][0]['background_image']!='' ) {
            $custom_css .= ".contact-module.contact-black-module .section-contact { background-image: url(".$fields['contact_form'][0]['background_image'].") !important; }";
        }

    // Render custom css
	wp_add_inline_style( 'section-custom-style', $custom_css );

    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>

    <div class="wrapper marketplace-page marketplace-the-products-page">

        <?php get_template_part('parts/top-head'); ?>

        <div class="top-banner-the-products top-banner-marketplace top-banner">
            <div class="container">
                <div class="valign-middle">
                    <h2 class="titles"><?php echo $fields['top_banner'][0]['title']; ?></h2>
                    <p class="txt">
                        <?php echo $fields['top_banner'][0]['subtitle']; ?>
                    </p>
                    <a href="<?php echo $fields['top_banner'][0]['button'][0]['url']; ?>" class="btn-blue btn-explore-our-offerings"><?php echo $fields['top_banner'][0]['button'][0]['label']; ?></a>
                </div>
            </div>
        </div>
        <!-- end .top-banner -->

        <?php get_template_part('parts/nav-marketplace'); ?>

        <div class="contents">
            <div class="tab-contents tab-contents-the-products">

                <div class="products-module ribbon black-ribbon">
                    <div class="head-panel">
                        <h2 class="titles"><?php echo $fields['products'][0]['title']; ?></h2>
                        <p class="txt">
                            <?php echo $fields['products'][0]['description']; ?>
                        </p>
                        <a href="<?php echo $fields['products'][0]['button'][0]['url']; ?>" class="btn-blue btn-explore-our-offerings"><?php echo $fields['products'][0]['button'][0]['label']; ?></a>
                    </div>
                    <!-- end .head-panel -->
                    
                    <div class="data-panel">
                        <div class="retrieve-row">
                            <span class="left-txt">Browse our products</span>
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
            <!-- end .tab-contents-the-products -->
        </div>
        <!-- end .contents -->

        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>