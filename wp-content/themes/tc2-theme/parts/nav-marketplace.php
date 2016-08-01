<nav class="nav-tab nav-tab-marketplace">
   <?php
        $nav = array(
            'container' 	=> false,
            'items_wrap' 	=> '<ul>%3$s</ul>',
            'menu'     		=> 'Marketplace Nav',
            'walker'        => new Tour_Nav_Walker());							  
        wp_nav_menu($nav);									
    ?>
</nav>
<div class="nav-placeholder tab-marketplace hide"></div>
<!-- end .nav-tab -->