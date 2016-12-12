<?php
    /* Template Name: Generic Page Template */
    
    // get all custom fields
	$fields = get_fields();
    
    // Dynamic CSS
	$custom_css = "";

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
    if ( $custom_css!='' ) {
        wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
        wp_add_inline_style( 'section-custom-style', $custom_css );
    }
    
    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper generic">
        <div class="mask js-close-nav"></div>
        
        <?php get_template_part('parts/top-head'); ?>
        
        <?php include(locate_template('parts/hero-carousel.php')); ?>
        
        
        <?php if ( $fields['middle_page_navigation']>0 ) : ?>
        <!-- START OF MIDDLE PAGE NAVIGATION -->
        <nav class="nav-tab js-nav-tab js-affix nav-tab-generic">
            <a class="nav-current visible-xs"> <?php echo get_the_title() ?></a>
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

           <!-- Mobile Sliders -->
            <?php 
                // We enable sliders in case of "marketplace - overview" page.
                $post_id = get_the_ID();
                $post = get_post($post_id);
                $slug = $post->post_name;

                if($slug === 'marketplace') :
            ?>
                <div id="marketingSlider" class="visible-xs carousel multi-item-carousel default-carousel slide js-slider" data-ride="carousel" data-interval=false>
                    <ol class="carousel-indicators">
                        <?php 
                            if ( $fields['sections'] ) : 
                                foreach( $fields['sections'] as $k=>$v ) :
                                    if ($v['section_type'] === 'Left-Text / Right-Image' ||
                                        $v['section_type'] === 'Left-Image / Right-Text'):
                        ?>
                            <li data-target="#marketingSlider" data-slide-to="<?php echo $k; ?>" class="<?php if($k===0){ echo 'active';} ?>"></li>
                        <?php 
                                    endif;
                                endforeach;
                            endif;
                        ?>
                    </ol>
                    <div class="carousel-inner inner" role="listbox">
                        <?php 
                            if ( $fields['sections'] ) : 
                                for($i = 0; $i < count($fields['sections']); $i++) : 
                                    $generic_section_key = $i;
                                    $generic_section_val = $fields['sections'][$i];
                                    if ($generic_section_val['section_type'] === 'Left-Text / Right-Image' ||
                                        $generic_section_val['section_type'] === 'Left-Image / Right-Text') :
                        ?>
                            <?php
                                switch ( $generic_section_val['section_type']) {
                                    case 'Left-Text / Right-Image':
                                        include(locate_template('parts/generic-left-text-right-image.php'));
                                        break;
                                    case 'Left-Image / Right-Text':
                                        include(locate_template('parts/generic-left-image-right-text.php'));
                                        break;
                                    default: // plain
                                        include(locate_template('parts/generic-plain.php'));
                                }
                            ?>
                        <?php 
                                    endif;
                                endfor; 
                            endif; 
                        ?>
                    </div>
                </div>
            <?php 
                endif;
            ?>
            
            <!-- START OF SECTIONS -->
            <?php 
                $post_id = get_the_ID();
                $post = get_post($post_id);
                $slug = $post->post_name;
                if($slug === 'what-can-you-do') :
            ?>
                <div id="contentSlider" class="enable-xs carousel default-carousel content-carousel slide js-slider" data-ride="carousel" data-interval=false>
                     <ol class="carousel-indicators visible-xs chk-active">
                        <?php foreach( $fields['sections'] as $k=>$v ) : ?>
                        <?php if($v['section_type'] !== 'Contact Form') : ?>
                            <li data-target="#contentSlider" data-slide-to="<?php echo $k; ?>" class="<?php if($k===0){ echo 'active';} ?>"></li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
            <?php else: ?>
                <div class="wrap" data-ride="carousel" data-interval=false>
                    <div class="inner">
            <?php endif; ?>
            
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
                            if($slug !== 'what-can-you-do') {
                                include(locate_template('parts/generic-contact-form.php'));
                            }
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
        </div>
        
        <?php
            if($slug === 'what-can-you-do') {
                include(locate_template('parts/generic-contact-form.php'));
            }
        ?>
        
        </div>
        
        <?php get_template_part('parts/footer'); ?>
    </div>
    <!-- end .wrapper -->

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>