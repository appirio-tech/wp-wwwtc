<?php
    /* Template Name: Branding Page Template */
    
    // get all custom fields
	$fields = get_fields();
    
    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper generic">
        <div class="mask js-close-nav"></div>
        
        <?php get_template_part('parts/top-head'); ?>
        
        <?php include(locate_template('parts/hero-carousel.php')); ?>
        
        
        <?php if ( count($fields['sections'])>0 ) : ?>
            
            
        <!-- START OF MIDDLE PAGE NAVIGATION -->
        <nav class="nav-tab js-nav-tab js-affix nav-tab-generic nav-branding">
            <a class="nav-current visible-xs"> <?php echo get_the_title() ?></a>
            <ul>
                <?php foreach( $fields['sections'] as $brand_section_key=>$brand_section_val ) : ?>
                <li class="menu-item">
                    <a href="javascript:;" data-target="brand-section-<?php echo $brand_section_key; ?>">
                        <?php echo $brand_section_val['brand_title']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="nav-placeholder tab-generic hide"></div>
        <!-- END OF MIDDLE PAGE NAVIGATION -->
        
        
        <div class="contents">
            <a name="fold"></a>
            
            <div class="container">
            <?php 
                foreach( $fields['sections'] as $brand_section_key=>$brand_section_val ) {
                    switch ( $brand_section_val['type'] ) {
                        case 'Logo':
                            include(locate_template('parts/brand-logo.php'));
                            break;
                        
                        case 'Logo Usage':
                            include(locate_template('parts/brand-logo-usage.php'));
                            break;
                        
                        case 'Icons':
                            include(locate_template('parts/brand-icons.php'));
                            break;
                        
                        case 'Colors':
                            include(locate_template('parts/brand-colors.php'));
                            break;
                        
                        default:
                            // do nothing
                    }
                } 
            ?>
            <!-- END OF SECTIONS -->
            </div>
            
        </div>
        <!-- end .contents -->
        <?php endif; ?>
        
        <?php get_template_part('parts/footer'); ?>
    </div>
    <!-- end .wrapper -->

<?php get_template_part('parts/video-modal'); ?>
<?php get_footer(); ?>