<div id="generic-section-<?php echo $generic_section_key; ?>" class="generic-left-image-right-text mobile-info-area info-area">
    
    <div class="match-iphone <?php echo $generic_section_val['side_image_position']=='Edge' ? 'left-truncate' : ''; ?>">
        <img src="<?php echo $generic_section_val['side_image']; ?>" alt="" />
    </div>
    
    <div class="mains">
        
        <?php if ($generic_section_val['top_icon']!='') : ?>
        <div class="icons mobile-text-icon">
            <img src="<?php echo $generic_section_val['top_icon']; ?>" alt="" />
        </div>
        <?php endif; ?>
        
        <?php if ( $generic_section_val['title']!='' ) : ?>
        <h3 class="titles"><?php echo $generic_section_val['title']; ?></h3>
        <?php endif; ?>
        
        <?php if ( $generic_section_val['short_description']!='' ) : ?>
        <p class="detail"><?php echo $generic_section_val['short_description']; ?></p>
        <?php endif; ?>
        
        <?php if ( $generic_section_val['regular_content']!='' ) : ?>
        <div class="txt-p">
            <?php echo apply_filters('the_content', $generic_section_val['regular_content']); ?>
        </div>
        <?php endif; ?>
        
        <?php if ( $generic_section_val['bottom_button'][0]['label']!='' ) : ?>
        <a href="<?php echo $generic_section_val['bottom_button'][0]['url']; ?>" target="<?php echo $generic_section_val['bottom_button'][0]['target_window']; ?>" class="btn-blue">
            <?php echo $generic_section_val['bottom_button'][0]['label']; ?>
        </a>
        <?php endif; ?>
        
        <?php if ( $generic_section_val['video_button'][0]['label']!='' ) : 
        
            $video_button_class = 'btn-black-video';
            if ( isset($generic_section_val['text_color']) && $generic_section_val['text_color']!='' ) {
                if ( is_quesks_light($generic_section_val['text_color']) ) {
                    $video_button_class = 'btn-white-video';
                } 
            }
        
        ?>
        <a href="#" class="<?php echo $video_button_class; ?> btn-video" 
           data-toggle="modal" 
           data-target="#modal-video" 
           data-video="<?php echo $generic_section_val['video_button'][0]['video_id']; ?>">
            <span class="icon-video"><i class="icons"></i></span>
            <span class="font-txt"><?php echo $generic_section_val['video_button'][0]['label']; ?></span>
        </a>
        <?php endif; ?>
        
    </div><!-- / .mains -->
</div>



