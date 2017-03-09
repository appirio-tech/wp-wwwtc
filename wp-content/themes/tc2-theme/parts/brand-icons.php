<div id="brand-section-<?php echo $brand_section_key; ?>" class="brand-section brand-section-icons">
    <h2><?php echo $brand_section_val['brand_title']; ?></h2>
    <div class="row">
        <?php foreach( $brand_section_val['icons'] as $icon_key=>$icon ) : ?>
        <div class="col-md-6">
            <div class="item txt<?php echo $icon['text_color']; ?>" style="background: <?php echo $icon['background_color']; ?>">
                <div class="img">
                    <img src="<?php echo $icon['icon_image']; ?>" alt="">
                </div>
                <h3><?php echo $icon['title']; ?></h3>
                <?php echo apply_filters('the_content', $icon['description']); ?>
                
                <div class="hover">
                    <a href="<?php echo $icon['icon_file']['url']; ?>" class="btn-blue" target="_blank">Download</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="note"><?php echo $brand_section_val['note']; ?></div>
</div>