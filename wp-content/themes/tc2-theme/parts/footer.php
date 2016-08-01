<?php $arrFollowOptions = get_option('quesks_social_media_options'); ?>
<footer class="footer">
    <div class="footer-main">
        <div class="left-box">
            <a href="/" class="icons icon-footer-logo"></a>
        </div>
        <div class="item-list clearfix">
            <div class="item">
                <div class="col">
                    <h4 class="titles">COMPANY</h4>
                    <?php
                        $nav = array(
                            'container' 	=> false,
                            'items_wrap' 	=> '<ul>%3$s</ul>',
                            'menu'     		=> 'Footer Company Nav');							  
                        wp_nav_menu($nav);									
                    ?>
                </div>
            </div>
            <!-- end .item -->
            <div class="item">
                <div class="col">
                    <h4 class="titles">COMMUNITY</h4>
                    <?php
                        $nav = array(
                            'container' 	=> false,
                            'items_wrap' 	=> '<ul>%3$s</ul>',
                            'menu'     		=> 'Footer Community Nav');							  
                        wp_nav_menu($nav);									
                    ?>
                </div>
            </div>
            <!-- end .item -->
            <div class="item">
                <div class="col">
                    <h4 class="titles">WEBSITES</h4>
                    <?php
                        $nav = array(
                            'container' 	=> false,
                            'items_wrap' 	=> '<ul>%3$s</ul>',
                            'menu'     		=> 'Footer Websites Nav');							  
                        wp_nav_menu($nav);									
                    ?>
                </div>
            </div>
            <!-- end .item -->
            <div class="item">
                <div class="col">
                    <h4 class="titles">FOLLOW</h4>
                    <ul>
                        <li><a href="<?php echo $arrFollowOptions['blog']; ?>">Blog</a></li>
                        <li><a href="<?php echo $arrFollowOptions['instagram']; ?>">Instagram</a></li>
                        <li><a href="<?php echo $arrFollowOptions['facebook']; ?>">Facebook</a></li>
                        <li><a href="<?php echo $arrFollowOptions['twitter']; ?>">Twitter</a></li>
                        <li><a href="<?php echo $arrFollowOptions['google_plus']; ?>">Google Plus</a></li>
                        <li><a href="<?php echo $arrFollowOptions['linkedin']; ?>">LinkedIN</a></li>
                    </ul>
                </div>
            </div>
            <!-- end .item -->
        </div>
        <!-- end .item-list  -->
    </div>
    <!-- end .footer-main -->
</footer>
<!-- end .footer -->