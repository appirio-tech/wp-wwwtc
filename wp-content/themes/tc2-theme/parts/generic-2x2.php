<div id="generic-section-<?php echo $generic_section_key; ?>" class="generic-section-2x2">
    <div class="mains">
       
        <?php if ( $generic_section_val['title']!='' ) : ?>
            <h3 class="titles"><?php echo $generic_section_val['title']; ?></h3>
        <?php endif; ?>
        
        <div class="row">
            <?php foreach ( $generic_section_val['two_by_two_fields'] as $k=>$v ) : 
                switch ($k) {
                    case 0:
                        $class = 'top-left';
                        break;
                    
                    case 1:
                        $class = 'top-right';
                        break;
                    
                    case 2:
                        $class = 'bottom-left';
                        break;
                    
                    default:
                        $class = 'bottom-right';
                }
            ?>
            <div class="col-md-6 <?php echo $class; ?>">
                <div class="container-2x2">
                    <?php if ( is_array($v['icon']) ) : ?>
                    <div class="icon">
                        <img src="<?php echo $v['icon']['url']; ?>" alt="">
                    </div>
                    <?php endif; ?>
                    
                    <?php if ( $v['title']!='' ) : ?>
                    <h3 class="box-title"><?php echo $v['title']; ?></h3>
                    <?php endif; ?>
                    
                    <?php if ( $v['description']!='' ) : ?>
                    <div class="box-description"><?php echo apply_filters('the_content', $v['description']); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
            
        </div>
        
    </div>
    <!-- end .mains -->
</div>