<?php
    $isBlog = is_home() || is_singular('post');
?>
<header class="header">
    <div class="bs-container">
        <?php 
            // show custom logo
            the_custom_logo(); 
            // get header custom options
            //$arrOptions = get_option('quesks_header_link_options');
        ?>
        
        <div class="right-area pull-left">
            <?php
                $nav = array(
                    'container' 	=> false,
                    'items_wrap' 	=> '<ul>%3$s</ul>',
                    'link_before'   => '<span>',
                    'link_after'    => '</span>',
                    'menu'     		=> 'Global Header Navigation', 
                    'walker'        => new Global_Nav_Walker);							  
                wp_nav_menu($nav);									
            ?>
            
            <?php if ( $isBlog ) : ?>
            <a href="javascript:;" class="search-icon"><span class="sr-only">Search</span></a>
            <?php endif; ?>
            
            <a href="http://crowdsourcing.topcoder.com/piqued_by_crowdsourcing" target="_blank" class="btn-white btn-get-started">Get Started</a>
        </div>
        <!-- end .right-area -->
        <a href="javascript:;" class="mobile-hamburger"><span></span></a>
        <a href="javascript:;" class="hideSubNAv"></a>
    </div>
</header>
<!-- end .header -->
<?php 
    if ( $isBlog ) {
        include(locate_template('parts/blog-nav.php'));
    }
?>