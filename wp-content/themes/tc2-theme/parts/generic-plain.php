<div id="generic-section-<?php echo $generic_section_key; ?>" class="generic-section-plain text-<?php echo $generic_section_val['content_alignment']; ?> <?php echo $generic_section_val['custom_class']; ?>">
    
    <?php
        $section_style = '';
        $main_lefts_style = '';
        
        if ( $generic_section_val['content_width']!='' ) {
            $section_style .= 'width:' . $generic_section_val['content_width'] . ';';
            
            if ( $generic_section_val['content_width']!='100%') {
                if ( $generic_section_val['content_alignment']=='center' ) {
                    $section_style .= 'margin-left:auto; margin-right:auto;padding-left:0;';
                    $main_lefts_style = 'margin-right:0;';
                }
            }
        }
        
    ?>
    <div class="mains"  style="<?php echo $section_style; ?>">
       
        <?php if ( $generic_section_val['title']!='' || $generic_section_val['short_description']!='' ) : ?>
        <div class="top-boxs">
           
            <?php if ( $generic_section_val['title']!='' ) : 
                $title_style = '';
                if ( $generic_section_val['title_top_offset']>0 ) {
                    $title_style .= 'margin-top:'.$generic_section_val['title_top_offset'].'px;';
                }
            ?>
            <h3 class="titles" style="<?php echo $title_style; ?>"><?php echo $generic_section_val['title']; ?></h3>
            <?php endif; ?>
            
            <?php if ( $generic_section_val['short_description']!='' ) : ?>
            <p class="info-detail"><?php echo $generic_section_val['short_description']; ?></p>
            <?php endif; ?>
            
        </div><!-- end .top-boxs -->
        <?php endif; ?>
        
        <?php if ( $generic_section_val['regular_content']!='' ) : ?>
        <div class="main-boxs">
            <div class="main-lefts" style="<?php echo $main_lefts_style; ?>">
                <div class="txt-p">
                    <?php echo apply_filters('the_content', $generic_section_val['regular_content']); ?>
                </div>
            </div>
        </div><!-- end .main-boxs -->
        <?php endif; ?>
        
        <?php if ( $generic_section_val['bottom_button'][0]['label']!='' ) : ?>
        <div class="text-<?php echo $generic_section_val['content_alignment']; ?>">
        <a href="<?php echo $generic_section_val['bottom_button'][0]['url']; ?>" target="<?php echo $generic_section_val['bottom_button'][0]['target_window'][0]; ?>" class="btn-blue">
            <?php echo $generic_section_val['bottom_button'][0]['label']; ?>
        </a>
        </div>
        <?php endif; ?>
        
    </div>
    <!-- end .mains -->
</div>