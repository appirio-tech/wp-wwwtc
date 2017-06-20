<div id="generic-section-<?php echo $generic_section_key; ?>" class="generic-product-showcase-carousel carousel-module <?php echo $generic_section_val['custom_class']; ?>">
    <div class="head-box">

        <?php if ( $generic_section_val['title']!='' ) : ?>
        <h2 class="titles"><?php echo $generic_section_val['title']; ?></h2>
        <?php endif; ?>
        
        <?php if ( $generic_section_val['sub_title']!='' ) : ?>
        <h3 class="sub-titles"><?php echo $generic_section_val['sub_title']; ?></h3>
        <?php endif; ?>
    </div>
    <!-- end .head-box -->

    <?php 
        if ( count($generic_section_val['product_showcase_category'])>0 ) {
            $title_class    = '';
            $txt_class      = '';
            $showcase_type  = $generic_section_val['product_showcase_category'];
            include(locate_template('parts/product_showcase.php')); 
        }
    ?>
    
</div>