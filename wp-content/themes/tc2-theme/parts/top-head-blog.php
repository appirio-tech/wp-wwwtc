<header class="header">
    
    <?php 
       
        // show custom logo
        the_custom_logo(); 
        
        echo '<a href="/home" class="blog-logo" rel="home" itemprop="url">Blog</a>';
        
        // get header custom options
        $arrOptions = get_option('quesks_header_link_options');
    ?>
    
    <div class="right-area pull-right">
        
        <?php
            $objCatNav = wp_get_nav_menu_items('Top Menu');
            if ( $objCatNav ) :
                foreach( (array)$objCatNav as $k=>$v ) :
                    echo '<a href="'.$v->url.'" class="link-login">'.$v->title.'</a>';
                endforeach;
            endif;
        ?>
        
        <a href="#" data-toggle="modal" data-target="#modal-subscribe" class="btn-white btn-get-started">Subscribe</a>
        <a href="javascript:;" class="btn-icon-menu"><i class="icons"></i></a>
    </div>
    <!-- end .right-area -->
    
</header>
<!-- end .header -->