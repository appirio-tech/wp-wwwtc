<header class="header">
    
    <?php 
       
        // show custom logo
        the_custom_logo(); 
        
        // get header custom options
        $arrOptions = get_option('quesks_header_link_options');
    ?>
    
    <div class="right-area pull-right">
        
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
       
        <?php /* <a href="https://connect.topcoder.com/" class="link-login"><?php echo $arrOptions['login_label']; ?></a> */ ?>
        <a href="http://crowdsourcing.topcoder.com/piqued_by_crowdsourcing" target="_blank" class="btn-white btn-get-started"><?php echo $arrOptions['get_started_label']; ?></a>
        <?php /* <a href="javascript:;" class="btn-icon-menu"><i class="icons"></i></a> */ ?>
        
    </div>
    <!-- end .right-area -->
    
    <a href="javascript:;" class="mobile-hamburger"><span></span></a>
    <a href="javascript:;" class="hideSubNAv"></a>
    
</header>
<!-- end .header -->