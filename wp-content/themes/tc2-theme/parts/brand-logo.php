<div id="brand-section-<?php echo $brand_section_key; ?>" class="brand-section brand-section-logo">
    <h2><?php echo $brand_section_val['brand_title']; ?></h2>
    <div class="row">
        <?php foreach( $brand_section_val['logos'] as $logo_key=>$logo ) : ?>
        <div class="col-md-4">
            <div class="item txt<?php echo $logo['text_color']; ?>" style="background: <?php echo $logo['background_color']; ?>">
                <div class="img">
                    <img src="<?php echo $logo['logo_image']; ?>" alt="">
                </div>
                <h3><?php echo $logo['title']; ?></h3>
                <?php echo apply_filters('the_content', $logo['description']); ?>
                
                <div class="hover">
                    <a href="<?php echo $logo['download_file']['url']; ?>" class="btn-blue" target="_blank">Download</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="note"><?php echo $brand_section_val['note']; ?></div>
</div>