<header class="header">
    
    <?php 
        // show custom logo
        the_custom_logo(); 
    
        // get header custom options
        $arrOptions = get_option('quesks_header_link_options');
    ?>
    
    <!-- end .logo -->
    <div class="right-area pull-right">
        <a href="https://connect.topcoder.com/" class="link-login"><?php echo $arrOptions['login_label']; ?></a>
        <a href="http://crowdsourcing.topcoder.com/piqued_by_crowdsourcing" target="_blank" class="btn-white btn-get-started"><?php echo $arrOptions['get_started_label']; ?></a>
        <a href="javascript:;" class="btn-icon-menu"><i class="icons"></i></a>
    </div>
    <!-- end .right-area -->
    
</header>
<!-- end .header -->