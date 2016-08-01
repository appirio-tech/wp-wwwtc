<?php
    /* Template Name: Team Page Template */

    // get all custom fields
	$fields = get_fields();

    // Dynamic CSS
	wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
	$custom_css = "";
	
        // background for top banner
        if ( $fields['background_image']!='' ) {
            $custom_css .= ".top-banner { background-image: url(".$fields['background_image'].") !important; }";
        }
        
    // Render custom css
	wp_add_inline_style( 'section-custom-style', $custom_css );

    get_header(); 
?>

    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper about-topcoder-page about-topcoder-team-page">
        
        <?php get_template_part('parts/top-head'); ?>

        <div class="top-banner-team top-banner-about top-banner">
            <div class="container">
                <div class="valign-middle">
                    <h2 class="titles"><?php echo $fields['title']; ?></h2>
                    <p class="txt"><?php echo $fields['subtitle']; ?></p>
                </div>
            </div>
        </div>
        <!-- end .top-banner -->

        <?php get_template_part('parts/nav-about-topcoder'); ?>
        
        <div class="contents top-border">
            <div class="tab-contents tab-contents-team">
                <div class="team-main">
                    <div class="executive-team-module">
                        <h2 class="title"><?php echo $fields['executive_title']; ?></h2>
                        <div class="row mb94">
                            
                            <?php foreach( $fields['executive_team'] as $k=>$v ) : ?>
                            <div class="col-xs-4">
                                <figure class="img-pannel-item">
                                    <a href="javascript:;">
                                        <img src="<?php echo $v['photo']; ?>" alt="photo" />
                                    </a>
                                    <div class="txt-area">
                                        <div class="title">EXECUTIVE TEAM</div>
                                        <p class="info-txt">
                                            <span class="block"><?php echo $v['name']; ?></span>
                                            <span class="block"><?php echo $v['title']; ?></span>
                                        </p>
                                        <div class="link-group clearfix">
                                            <ul>
                                                <li><a href="<?php echo $v['twitter']; ?>"><i  class="icons  icon-twitter"></i></a></li>
                                                <li><a href="<?php echo $v['facebook']; ?>"><i  class="icons icon-facebook"></i></a></li>
                                                <li><a href="tel:<?php echo $v['mobile']; ?>"><i  class="icons icon-phone"></i></a></li>
                                                <li><a href="<?php echo $v['linkedin']; ?>"><i  class="icons icon-in"></i></a></li>
                                            </ul>
                                        </div>
                                        <!-- end .link-group -->
                                    </div>
                                    <!-- end .txt-area -->
                                </figure>
                                <!-- end .img-pannel-item -->
                            </div>
                            <?php endforeach; ?>
                            <!-- end .col-xs-4  -->
                            
                            
                            
                        </div>
                        <!-- end .row -->
                    </div>
                    <!-- end .executive-team-module -->

                    <div class="the-topcoder-module">
                        <h2 class="title"><?php echo $fields['topcoder_team_title']; ?></h2>
                        <ul class="user-img-team clearfix">
                            <?php foreach( $fields['topcoder_team'] as $k=>$v ) : ?>
                            <li>
                                <a href="javascript:;" class="img-link">
                                    <img src="<?php echo $v['photo']; ?>" alt="photo">
                                    <span class="blue-cover">
                                        <span class="name"><?php echo $v['name']; ?></span>
                                        <span class="info"><?php echo $v['title']; ?></span>
                                    </span>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- end .the-topcoder-module -->
                </div>
                <!-- end .team-main -->
            </div>
            <!-- end .tab-contents-team -->
        </div>
        <!-- end .contents -->
    
        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_footer(); ?>