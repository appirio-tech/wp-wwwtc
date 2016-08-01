<?php
    /* Template Name: Generic Page Template */

    // get all custom fields
	$fields = get_fields();

    // Dynamic CSS
	wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
	$custom_css = "";
	
        // background for top banner
        if ( $fields['top_banner'][0]['background_image']!='' ) {
            $custom_css .= ".top-banner { background-image: url(".$fields['top_banner'][0]['background_image'].") !important; }";
        }

        if ( count($fields['sections'])>0 ) {
            foreach( $fields['sections'] as $k=>$v ) {
                $custom_css .= "#generic-section-" . $k . " { ";
                
                // background color / image
                if ( isset($v['background']) && $v['background']!='None' ) {
                    if ( $v['background']=='Image' && $v['background_image']!='' ) {
                        $custom_css .= "background-image: url(".$v['background_image'].");";
                    } else if ( $v['background']=='Color' && $v['background_color']!='' ) {
                        $custom_css .= "background: ".$v['background_color'].";";
                    } 
                }
                
                $custom_css .= " }";
                
                
                // text color
                if ( isset($v['text_color']) && $v['text_color']!='' ) {
                    $custom_css .= "#generic-section-" . $k . " * { color: ".$v['text_color'] . ";}";
                }
            }
        }

    // Render custom css
	wp_add_inline_style( 'section-custom-style', $custom_css );

    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper generic">
        
        <?php get_template_part('parts/top-head'); ?>
        
        
        <!-- START OF TOP BANNER -->
        <?php $top_banner = $fields['top_banner'][0]; ?>
        <div class="top-banner top-banner-overview">
            <div class="container">
               <div class="valign-middle">
                    <h2 class="titles"><?php echo $top_banner['title']; ?></h2>
                    <p class="txt"><?php echo $top_banner['sub_title']; ?></p>
                    <div class="row">
                       
                        <?php if ( $top_banner['button'][0]['label']!='' ) : ?>
                        <a href="<?php echo $top_banner['button'][0]['url']; ?>" target="<?php echo $top_banner['button'][0]['target_window']; ?>" class="btn-white"><?php echo $top_banner['button'][0]['label']; ?></a>
                        <?php endif; ?>
                        
                        <?php if ( $top_banner['video_button'][0]['label']!='' ) : ?>
                        <a href="#" class="btn-video"  data-toggle="modal" data-target="#modal-video" data-video="<?php echo $top_banner['video_button'][0]['youtube_id']; ?>">
                            <span class="icon-video"><i class="icons"></i></span>
                            <span class="font-txt"><?php echo $top_banner['video_button'][0]['label']; ?></span>
                        </a>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF TOP BANNER -->
        
        
        <?php if ( $fields['middle_page_navigation']>0 ) : ?>
        <!-- START OF MIDDLE PAGE NAVIGATION -->
        <nav class="nav-tab nav-tab-generic">
           <?php
                $nav = array(
                    'container' 	=> false,
                    'items_wrap' 	=> '<ul>%3$s</ul>',
                    'menu'     		=> $fields['middle_page_navigation'],
                    'walker'        => new Tour_Nav_Walker());							  
                wp_nav_menu($nav);									
            ?>
        </nav>
        <div class="nav-placeholder tab-generic hide"></div>
        <!-- END OF MIDDLE PAGE NAVIGATION -->
        <?php endif; ?>
        
        
        <?php if ( count($fields['sections'])>0 ) : ?>
        <div class="contents">
           <a name="fold"></a> 
            <!-- START OF SECTIONS -->
            <?php 
                foreach( $fields['sections'] as $generic_section_key=>$generic_section_val ) {
                    switch ( $generic_section_val['section_type'] ) {
                        case 'Left-Text / Right-Image':
                            include(locate_template('parts/generic-left-text-right-image.php'));
                            break;
                        case 'Left-Image / Right-Text':
                            include(locate_template('parts/generic-left-image-right-text.php'));
                            break;
                        case 'Clients':
                            include(locate_template('parts/generic-clients.php'));
                            break;
                        case 'Products':
                            include(locate_template('parts/generic-products.php'));
                            break;
                        case 'Product Showcase Carousel':
                            include(locate_template('parts/generic-product-showcase-carousel.php'));
                            break;
                        case 'Contact Form':
                            include(locate_template('parts/generic-contact-form.php'));
                            break;
                        case 'Testimonials':
                            include(locate_template('parts/generic-testimonials.php'));
                            break;
                        default: // plain
                            include(locate_template('parts/generic-plain.php'));
                    }
                } 
            ?>
            <!-- END OF SECTIONS -->
            
        </div>
        <!-- end .contents -->
        <?php endif; ?>
        
        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>