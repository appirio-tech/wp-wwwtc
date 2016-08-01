<div id="generic-section-<?php echo $generic_section_key; ?>" class="generic-clients clients-module">
    <section class="section section-clients">
        <div class="container">
            <div class="valign-middle">
                <?php if ( $generic_section_val['title']!='' ) : ?>
                <h2 class="titles"><?php echo $generic_section_val['title']; ?></h2>
                <?php endif; ?>
                <?php 
                    $product_type = $generic_section_val['client_category'];    
                    if ( count($product_type)>0 ) {
                        include(locate_template('parts/clients.php')); 
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- end .section-clients -->
</div>