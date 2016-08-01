<div id="generic-section-<?php echo $generic_section_key; ?>" class="generic-products products-module">
    
    <?php if ( $generic_section_val['title']!='' && $generic_section_val['short_description']!='' ) : ?>
    <div class="head-panel">
        <?php if ( $generic_section_val['title']!='' ) : ?>
        <h2 class="titles"><?php echo $generic_section_val['title']; ?></h2>
        <?php endif; ?>
        
        <?php if ( $generic_section_val['short_description']!='' ) : ?>
        <p class="txt"><?php echo $generic_section_val['short_description']; ?></p>
        <?php endif; ?>
    </div>
    <!-- end .head-panel -->
    <?php endif; ?>

    <?php if ( count($generic_section_val['product_category'])>0 ) : ?>
    <div class="data-panel">
    <?php 
        $objProductCat = $generic_section_val['product_category']; 
        include(locate_template('parts/products.php'));
    ?>
    </div>
    <!-- end .data-panel -->
    <?php endif; ?>
</div>