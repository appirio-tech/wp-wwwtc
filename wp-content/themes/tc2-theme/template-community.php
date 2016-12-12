<?php
    /* Template Name: Community Page Template */
    
    // get all custom fields
	$fields = get_fields();
    
    get_header();
?>
    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper about-topcoder-page">
    <div class="mask js-close-nav"></div>
        
        <?php get_template_part('parts/top-head'); ?>
        
        <?php include(locate_template('parts/hero-carousel.php')); ?>
        
        <?php get_template_part('parts/nav-about-topcoder'); ?>
        
        
        <div class="contents top-border">
            <div class="tab-contents tab-contents-community">
                <div class="community-main">
                    <div class="txt-area">
                        <p class="say-txt"><?php echo $fields['teaser_text']; ?></p>
                        <div class="title-bottom-txt">
                            <?php 
                                while ( have_posts() ) {
                                    the_post();
                                    the_content(); 
                                }
                            ?>
                            <center><img src="/wp-content/uploads/2016/07/Member-Map.png" alt="Member-Map" /></center>
                        </div>
                    </div>
                    <!-- end .txt-area -->
                    
                    <div class="group-box clearfix">
                        <?php foreach( $fields['stats'] as $k=>$v ) : ?>
                        <div class="item">
                            <div class="left-blue-line"></div>
                            <h2 class="number"><?php echo $v['title']; ?></h2>
                            <p><?php echo $v['description']; ?></p>
                        </div>
                        <?php endforeach; ?>
                        <!-- end .item -->
                    </div>
                    <!-- end .group-box -->
                    
                    <?php if ($fields['month_member_title']!=''): ?>
                    <div class="photo-txt-area">
                        <div class="photo pull-left">
                            <img src="<?php echo $fields['month_member_photo']; ?>" alt="photo">
                        </div>
                        <!-- end .photo -->
                        <div class="photo-right">
                            <h2 class="title title-sub"><?php echo $fields['month_member_title']; ?></h2>
                            <h4 class="photo-name"><?php echo $fields['month_member_name']; ?></h4>
                            <p><?php echo $fields['month_member_description']; ?></p>
                            <a href="<?php echo $fields['month_member_button_url']; ?>" target="<?php echo $fields['month_member_button_target_window']; ?>" class="btn-blue btn-meet"><?php echo $fields['month_member_button_label']; ?></a>
                        </div>
                        <!-- end .photo-right -->
                    </div>
                    <!-- end .photo-txt-area -->
                    <?php endif; ?>
                    
                </div>
            </div>
            <!-- end .tab-contents-company -->
            
        </div>
        <!-- end .contents -->

        <?php get_template_part('parts/footer'); ?>
    </div>

<?php get_footer(); ?>