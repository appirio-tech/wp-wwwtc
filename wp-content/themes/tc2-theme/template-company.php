<?php
    /* Template Name: Company Page Template */
    
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
            <div class="tab-contents tab-contents-company">
                <div class="company-main">
                    <div class="section part-one">
                        <h2 class="title"><?php echo $fields['teaser_text']; ?></h2>
                        <div class="infos">
                            <?php 
                                while ( have_posts() ) {
                                    the_post();
                                    the_content(); 
                                }
                            ?>
                        </div>
                    </div>
                    <!-- end .section -->
                    
                    <?php if ( count($fields['bullet_points'])>0 ): ?>
                    <!-- start of custom section -->
                    <div class="section clearfix part-two">
                        <div class="left-box">
                            <div class="match-apple-mac pull-left"><img src="<?php echo $fields['company_study_image']; ?>" alt="" /></div>
                        </div>
                        <!-- end .pull-left -->
                        <div class="infos-list hidden-xs">
                            <?php foreach( $fields['bullet_points'] as $k=>$v ) : ?>
                            <div class="txt">
                                <h2 class="title-sub"><?php echo $v['title']; ?></h2>
                                <p class="infos-list-txt"><?php echo $v['description']; ?></p>
                                <br />
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- end .infos-list -->
                    </div>
                    <!-- end .section -->
                    <?php endif; ?>
                    
                    <?php if ($fields['company_study_description']!=''): ?>
                    <div class="section part-three">
                        <div class="txt-right">
                            <div class="left-box">
                                <div class="lefts">
                                    <div class="blue-line"></div>
                                    <div class="blue-txt-left"><?php echo $fields['company_study_image_caption']; ?></div>
                                </div>
                            </div>

                             <div id="infoListSlider" class="infos-list visible-xs carousel info-list-carousel default-carousel slide js-slider" data-ride="carousel" data-interval=false>
                                <ol class="carousel-indicators">
                                  <?php if ( $fields['bullet_points'] ) : foreach( $fields['bullet_points'] as $k=>$v ) : ?>
                                    <li data-target="#infoListSlider" data-slide-to="<?php echo $k; ?>" class="<?php if($k===0){ echo 'active';} ?>"></li>
                                    <?php endforeach; endif; ?>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                <?php if ( $fields['bullet_points'] ) : foreach( $fields['bullet_points'] as $k=>$v ) : ?>
                                    <div class="item col <?php if($k===0){ echo 'active';} ?>">
                                        <div class="txt">
                                            <h2 class="title-sub"><?php echo $v['title']; ?></h2>
                                            <p class="infos-list-txt"><?php echo $v['description']; ?></p>
                                            <br />
                                        </div>
                                    </div>
                                <?php endforeach; endif; ?>
                                </div>
                            </div>
                            <!-- end .infos-list carousel -->

                            <p class="infos">
                                <?php echo $fields['company_study_description']; ?>
                            </p>
                            <a href="<?php echo $fields['company_study_button_url']; ?>" target="<?php echo $fields['company_study_button_target_window']; ?>" class="btn-blue width165"><?php echo $fields['company_study_button_label']; ?></a>
                        </div>
                    </div>
                    <!-- end of custom section -->
                    <?php endif; ?>
                    
                </div>
            </div>
            <!-- end .tab-contents-company -->
        </div>
        <!-- end .contents -->

        <?php get_template_part('parts/footer'); ?>

    </div>
    <!-- end .wrapper -->

<?php get_footer(); ?>
<div class="overlay"></div>