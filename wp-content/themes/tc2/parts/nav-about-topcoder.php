<nav class="nav-tab nav-tab-about">
   <?php
        $nav = array(
            'container' 	=> false,
            'items_wrap' 	=> '<ul>%3$s</ul>',
            'menu'     		=> 'About Topcoder Nav',
            'walker'        => new Tour_Nav_Walker());							  
        wp_nav_menu($nav);									
    ?>
</nav>
<div class="nav-placeholder tab-about hide"></div>
<!-- end .nav-tab -->