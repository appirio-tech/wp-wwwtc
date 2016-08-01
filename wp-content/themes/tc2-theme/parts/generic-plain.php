<div id="generic-section-<?php echo $generic_section_key; ?>" class="generic-section-plain innovation-info-detail info-area">
    <div class="mains">
       
        <?php if ( $generic_section_val['title']!='' && $generic_section_val['short_description']!='' ) : ?>
        <div class="top-boxs">
           
            <?php if ( $generic_section_val['title']!='' ) : ?>
            <h3 class="titles"><?php echo $generic_section_val['title']; ?></h3>
            <?php endif; ?>
            
            <?php if ( $generic_section_val['short_description']!='' ) : ?>
            <p class="info-detail"><?php echo $generic_section_val['short_description']; ?></p>
            <?php endif; ?>
            
        </div><!-- end .top-boxs -->
        <?php endif; ?>
        
        <?php if ( $generic_section_val['regular_content']!='' ) : ?>
        <div class="main-boxs">
            <div class="main-lefts">
                <div class="txt-p">
                    <?php echo apply_filters('the_content', $generic_section_val['regular_content']); ?>
                </div>
            </div>
        </div><!-- end .main-boxs -->
        <?php endif; ?>
    </div>
    <!-- end .mains -->
</div>