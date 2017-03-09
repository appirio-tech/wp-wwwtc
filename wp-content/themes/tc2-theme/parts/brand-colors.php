<div id="brand-section-<?php echo $brand_section_key; ?>" class="brand-section brand-section-color">
    <h2><?php echo $brand_section_val['brand_title']; ?></h2>
    
    <?php foreach( $brand_section_val['colors'] as $key_colors=>$color_group ) : ?>
    
    <h3><?php echo $color_group['group_title']; ?></h3>
    
    <div class="row">
        <?php foreach( $color_group['color_group'] as $cg_key=>$color ) : ?>
        <div class="col-md-4">
            <div class="color-box" style="background: <?php echo $color['color']; ?>"></div>
            <div class="item">
                <h4><?php echo $color['title']; ?></h4>
                <p><strong>HEX</strong> <?php echo strtoupper($color['color']); ?></p>
                <p>
                    <strong>R</strong> <?php echo $color['rgb'][0]['value']; ?>
                    <strong>G</strong> <?php echo $color['rgb'][1]['value']; ?>
                    <strong>B</strong> <?php echo $color['rgb'][2]['value']; ?>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <?php endforeach; ?>
    
    <div class="note"><?php echo $brand_section_val['note']; ?></div>
</div>