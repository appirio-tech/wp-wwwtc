<?php
    
    if ( isset($fields['top_banner'])) { // fields coming from generic template
        $slides['title']        = $fields['top_banner'][0]['title'];
        $slides['description']  = $fields['top_banner'][0]['sub_title'];
        $slides['background']   = $fields['top_banner'][0]['background_image'];
        
        if ( $fields['top_banner'][0]['button'][0]['label']!='' ) {
            $slides['call_to_actions'][]= array(
                'label'     => $fields['top_banner'][0]['button'][0]['label'],
                'url'       => $fields['top_banner'][0]['button'][0]['url'],
                'target'    => $fields['top_banner'][0]['button'][0]['target_window'],
                'type'      => 'Button'
            );
        }
        
        if ( $fields['top_banner'][0]['video_button'][0]['label']!='' ) {
            $slides['call_to_actions'][]= array(
                'label'     => $fields['top_banner'][0]['video_button'][0]['label'],
                'url'       => $fields['top_banner'][0]['video_button'][0]['youtube_id'],
                'type'      => 'Video'
            );
        }
        
    } else {
        $slides['title']        = $fields['title'];
        $slides['description']  = $fields['subtitle'];
        $slides['background']   = $fields['background_image'];
    }
    
    // user carouse as hero
    $carousel_hero = isset($fields['carousel_in_hero']) ? $fields['carousel_in_hero'] : false;

    if ( $carousel_hero )  {
        $data_interval  = '5000';
        $arrSlides      = $fields['slides'];
        
        // Set current hero as first slide
        if ( $fields['page_banner_as_slide'] ) {
            array_unshift($arrSlides, $slides);
        }
    } else {
        $data_interval  = 'false';
        $arrSlides[]    = $slides;
    }
?>
<div class="hero-carousel">
    <div id="hero-carousel" class="carousel slide" data-ride="carousel" data-interval="<?php echo $data_interval; ?>">
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php foreach( $arrSlides as $ks=>$slide ) : ?>
            <div class="item <?php echo $ks==0 ? 'active' : ''; ?>" style="background-image: url(<?php echo $slide['background']; ?>);">
                
                <div class="carousel-caption <?php echo $slide['layout']=='2 Column' ? 'hero-two-column' : ''; ?>">
                    <?php if ($slide['title']!='') : ?><h1><?php echo $slide['title']; ?></h1><?php endif; ?>
                    <?php if ($slide['description']!='') : ?><p><?php echo $slide['description']; ?></p><?php endif; ?>
                    
                    <?php if ( isset($slide['call_to_actions']) && $slide['call_to_actions'] ) : ?>
                    <div class="buttons">
                        <?php foreach( $slide['call_to_actions'] as $kb=>$button ) : ?>
                            
                            <?php if ( $button['type']=='Button' ) : ?>
                                <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="btn-white">
                                    <?php echo $button['label']; ?>
                                </a>
                            <?php else : ?>
                                <a href="#" class="btn-video"  data-toggle="modal" data-target="#modal-video" data-video="<?php echo $button['url']; ?>">
                                    <span class="icon-video"><i class="icons"></i></span>
                                    <span class="font-txt"><?php echo $button['label']; ?></span>
                                </a>
                            <?php endif; ?>
                            
                        <?php endforeach; ?>
                    </div>
                    
                    <?php if ( $slide['left_image']!='' ) : ?>
                    <div class="left-image-holder"><img src="<?php echo $slide['left_image']; ?>" alt=""></div>
                    <?php endif; ?>
                    
                    <?php endif; ?>
                </div>
                
            </div>
            <?php endforeach; ?>
        </div><!-- / .carousel-inner -->
        
        <?php if ( $carousel_hero ) : ?>
        <!-- Controls -->
        <a class="left carousel-control" href="#hero-carousel" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#hero-carousel" role="button" data-slide="next">
            <span class="sr-only">Next</span>
        </a>
        <?php endif; ?>
        
    </div><!-- / #hero-carousel -->
</div><!-- / .hero-carousel -->