<aside class="right-aside">
    <a href="javascript:;" class="icons btn-icon-close"></a>
    <nav class="nav-menu">
       <?php
            $nav = array(
                'container' 	=> false,
                'items_wrap' 	=> '<ul>%3$s</ul>',
                'menu'     		=> 'Right Side Primary Nav');							  
            wp_nav_menu($nav);									
        ?>
    </nav>
    
    <!-- end .nav-menu -->
    <nav class="nav-menu-small">
        <?php
            $nav = array(
                'container' 	=> false,
                'items_wrap' 	=> '<ul>%3$s</ul>',
                'menu'     		=> 'Right Side Secondary Nav');							  
            wp_nav_menu($nav);									
        ?>
    </nav>
    <!-- end .nav-menu-small -->
    
    <?php $arrOptions = get_option('quesks_social_media_options'); ?>
    <div class="aside-follow">
        <h2 class="titles">Follow Us:</h2>
        <div class="icon-box">
            <a href="<?php echo $arrOptions['twitter']; ?>" class="icon-tt icons"></a>
            <a href="<?php echo $arrOptions['facebook']; ?>" class="icon-fb icons"></a>
            <a href="<?php echo $arrOptions['google_plus']; ?>" class="icon-gg icons"></a>
            <a href="<?php echo $arrOptions['instagram']; ?>" class="icon-ig icons"></a>
        </div>
    </div>
    <!-- end .aside-follow -->
</aside>
<!-- end .right-aside -->