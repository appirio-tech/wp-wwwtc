<?php
    /* Template Name: Team Page Template */

    // get all custom fields
	$fields = get_fields();
    
    get_header(); 
?>

    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper about-topcoder-page about-topcoder-team-page">
    <div class="mask js-close-nav"></div>
        
        <?php get_template_part('parts/top-head'); ?>
        
        <?php include(locate_template('parts/hero-carousel.php')); ?>
        
        <?php get_template_part('parts/nav-about-topcoder'); ?>
        
        <div class="contents top-border">
            <div class="tab-contents tab-contents-team">
                <div class="team-main">
                    <div class="executive-team-module">
                        <h2 class="title"><?php echo $fields['executive_title']; ?></h2>
                        <div class="row mb94 hidden-xs">
                            
                            <?php foreach( $fields['executive_team'] as $k=>$v ) : ?>
                            <div class="zero-padding panel col-xs-12 col-sm-4">
                                <figure class="img-pannel-item">
                                    <a href="#" data-toggle="modal" data-target="#modal-executive-team-<?php echo $k; ?>">
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
                                                <?php if ($v['twitter']!='') : ?>
                                                <li><a href="<?php echo $v['twitter']; ?>"><i  class="icons  icon-twitter"></i></a></li>
                                                <?php endif; ?>
                                                
                                                <?php if ($v['facebook']!='') : ?>
                                                <li><a href="mailto:<?php echo $v['facebook']; ?>" class="mail"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>
                                                <?php endif; ?>
                                                
                                                <?php if ($v['mobile']!='') : ?>
                                                <li><a href="tel:<?php echo $v['mobile']; ?>"><i  class="icons icon-phone"></i></a></li>
                                                <?php endif; ?>
                                                
                                                <?php if ($v['linkedin']!='') : ?>
                                                <li><a href="<?php echo $v['linkedin']; ?>"><i  class="icons icon-in"></i></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <!-- end .link-group -->
                                    </div>
                                    <!-- end .txt-area -->
                                </figure>
                                <!-- end .img-pannel-item -->
                                
                                <div class="product-modal modal fade team-modal" id="modal-executive-team-<?php echo $k; ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">   
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <img src="<?php echo $v['photo']; ?>" alt="photo" class="img-responsive" />
                                                    </div>
                                                    <div class="col-xsm-5">
                                                        <h3><?php echo $v['name']; ?></h3>
                                                        <h4><?php echo $v['title']; ?></h4>
                                                    </div>
                                                </div>
                                                <div class="summary">
                                                    <?php echo $v['summary']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <?php endforeach; ?>
                            <!-- end .col-xs-4  -->
                            
                            
                            
                        </div>
                        <!-- end .row -->

                        <div id="executeTeamSlider" class="ui-coverflow-wrapper ui-clearfix row mb94 visible-xs carousel default-carousel" data-ride="carousel" data-interval=false>
                            <ol class="carousel-indicators">
                                <?php if ( $fields['executive_team'] ) : foreach( $fields['executive_team'] as $k=>$v ) : ?>
                                    <li data-target="#executeTeamSlider" data-slide-to="<?php echo $k; ?>" class="<?php if($k===1){ echo 'active';} ?> team-item team-item-dot-<?php echo $k; ?>"></li>
                                <?php endforeach; endif; ?>
                            </ol>
                            <div id="coverflow" role="listbox">
                                <?php if ( $fields['executive_team'] ) : foreach( $fields['executive_team'] as $k=>$v ) : ?>
                                    <div class="item col <?php if($k===1){ echo 'active';} ?> team-item-<?php echo $k?>"> 
                                        <figure class="img-pannel-item">
                                            <a href="#" data-toggle="modal" data-target="#modal-executive-team-m-<?php echo $k; ?>">
                                                <img src="<?php echo $v['photo']; ?>" alt="photo" />
                                            </a>
                                            <div class="txt-area">
                                                <p class="info-txt">
                                                    <span class="block">Executive Team</span>
                                                    <span class="block"><?php echo $v['name']; ?></span>
                                                    <span class="block"><?php echo $v['title']; ?></span>
                                                </p>
                                                <div class="link-group clearfix">
                                                    <ul>
                                                        <?php if ($v['twitter']!='') : ?>
                                                        <li><a href="<?php echo $v['twitter']; ?>"><i  class="icons  icon-twitter"></i></a></li>
                                                        <?php endif; ?>
                                                        
                                                        <?php if ($v['facebook']!='') : ?>
                                                        <li><a href="mailto:<?php echo $v['facebook']; ?>" class="mail"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>
                                                        <?php endif; ?>
                                                        
                                                        <?php if ($v['mobile']!='') : ?>
                                                        <li><a href="tel:<?php echo $v['mobile']; ?>"><i  class="icons icon-phone"></i></a></li>
                                                        <?php endif; ?>
                                                        
                                                        <?php if ($v['linkedin']!='') : ?>
                                                        <li><a href="<?php echo $v['linkedin']; ?>"><i  class="icons icon-in"></i></a></li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                                <!-- end .link-group -->
                                            </div>
                                            <!-- end .txt-area -->
                                        </figure>
                                        <!-- end .img-pannel-item -->
                                    </div>
                                <?php endforeach; endif; ?>
                            </div>

                        </div>

                        <div class="model-groups">
                            <?php if ( $fields['executive_team'] ) : foreach( $fields['executive_team'] as $k=>$v ) : ?>
                                <div class="product-modal modal fade team-modal" id="modal-executive-team-m-<?php echo $k; ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">   
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <img src="<?php echo $v['photo']; ?>" alt="photo" class="img-responsive" />
                                                    </div>
                                                    <div class="col-xsm-5">
                                                        <h3><?php echo $v['name']; ?></h3>
                                                        <h4><?php echo $v['title']; ?></h4>
                                                    </div>
                                                </div>
                                                <div class="summary">
                                                    <?php echo $v['summary']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end .model-popup -->
                            <?php endforeach; endif; ?>
                        </div>
                        
                        <!-- end execute team carousel -->
                    </div>
                    <!-- end .executive-team-module -->

                    <div class="the-topcoder-module hidden-xs">
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

                    <div class="the-topcoder-module visible-xs">
                        <h2 class="title"><?php echo $fields['topcoder_team_title']; ?></h2>
                        <div id="topcoderModuleSlider" class="carousel topcoder-module-carousel default-carousel slide js-slider" data-ride="carousel" data-interval=false>
                            <?php 
                                $total = count($fields['topcoder_team']);
                                $pageSize = 15;
                                $pageCurr = 1;
                                $pageNum = ceil($total / $pageSize);
                            ?>
                            <ol class="carousel-indicators">
                                <?php if ( $pageNum > 1 ) : for($i = 0; $i < $pageNum; $i++) : ?>
                                    <li data-target="#topcoderModuleSlider" data-slide-to="<?php echo $i; ?>" class="<?php if($i===0){ echo 'active';} ?>"></li>
                                <?php endfor; endif; ?>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                            <?php if ( $pageNum > 1 ) : for($j = 0; $j < $pageNum; $j++) : ?>
                                <div class="item col <?php if($j===0){ echo 'active';} ?>">
                                    <ul class="user-img-team clearfix">
                                        <?php foreach( $fields['topcoder_team'] as $k2=>$v2 ) : ?>
                                        <?php if ($k2 < ($pageSize * ($j + 1)) && $k2 >= ($pageSize * ($j))): ?>
                                        <li>
                                            <a href="javascript:;" class="img-link">
                                                <img src="<?php echo $v2['photo']; ?>" alt="photo">
                                                <span class="blue-cover">
                                                    <span class="name"><?php echo $v2['name']; ?></span>
                                                    <span class="info"><?php echo $v2['title']; ?></span>
                                                </span>
                                            </a>
                                        </li>
                                        <?php endif;?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endfor; endif; ?>
                            </div>
                        </div>
                        <!-- end topcoderModule carousel -->    
                    </div>
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