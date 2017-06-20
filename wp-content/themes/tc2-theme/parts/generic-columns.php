<div id="generic-section-<?php echo $generic_section_key; ?>" class="generic-section-columns <?php echo $generic_section_val['custom_class']; ?>">
    
    <div class="container-fluid">
       
        <?php if ( $generic_section_val['title']!='' ) : ?>
        <h2 class="titles"><?php echo $generic_section_val['title']; ?></h2>
        <?php endif; ?>
        
        <div class="row">
            <?php 
                if ( count($generic_section_val['columns'])>0 ) : 
                    $col_count = 0;
                    foreach( $generic_section_val['columns'] as $k=>$column ) :
                        $col_count += $column['column_grid_width'];
            ?>
            <div class="col col-md-<?php echo $column['column_grid_width']; ?> <?php echo $column['column_offset']!='' ? 'col-md-offset-'.$column['column_offset'] : ''; ?>">
                
                <?php if ( $column['top_image']!='' ) : ?>
                <div class="text-center">
                    <img src="<?php echo $column['top_image']; ?>" alt="">
                </div>
                <?php endif; ?>
                
                <?php if ( $column['title']!='' ) : ?>
                <h3 class="titles"><?php echo $column['title']; ?></h3>
                <?php endif; ?>
                
                <?php if ( $column['content']!='' ) : ?>
                <div class="description">
                    <?php echo apply_filters('the_content', $column['content']); ?>
                </div>
                <?php endif; ?>
                
            </div>
            
            <?php if( $col_count>=12 ) : $col_count = 0; ?>
            <div class="clearfix hidden visible-md visible-lg"></div>
            <?php endif; ?>
            
            <?php 
                    endforeach;
                endif; 
            ?>
        </div>
    </div>
    
</div>