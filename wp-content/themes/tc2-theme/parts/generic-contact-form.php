<?php 
    $contact_form_class = 'generic-contact-form contact-module';
    
    if ( $generic_section_val['form_module']=='Dark' ) {
        $contact_form_class .= ' contact-black-module';
    } else {
        $contact_form_class .= ' contact-white-module';
    }
    
    if ( !isset($generic_section_val['background']) || $generic_section_val['background']=='None' ) {
        $contact_form_class .= ' no-bg';
    }
?>
<div id="generic-section-<?php echo $generic_section_key; ?>" class="item <?php echo $contact_form_class; ?>">
   
    <section class="section-contact">
        <div class="container">
            <div class="valign-middle">
                <div class="container-fluid">
                    <?php if ( $generic_section_val['title']!='' ) : ?>
                    <h2 class="titles"><?php echo $generic_section_val['title']; ?></h2>
                    <?php endif; ?>
                    
                    <?php if ( $generic_section_val['sub_title']!='' ) : ?>
                    <h3 class="sub-titles"><?php echo $generic_section_val['sub_title']; ?></h3>
                    <?php endif; ?>

                    <?php if ( $generic_section_val['contact_form']->ID>0 ) : ?>
                    <?php echo do_shortcode('[contact-form-7 id="'.$generic_section_val['contact_form']->ID.'" title="'.$generic_section_val['contact_form']->post_title.'"]'); ?>
                    <?php endif; ?>

                    <?php if ( $generic_section_val['show_form']=='No' && $generic_section_val['form_bottom_button'][0]['label']!='' ) : ?>
                    <div class="text-center">
                    <a href="<?php echo $generic_section_val['form_bottom_button'][0]['url']; ?>" target="<?php echo $generic_section_val['target_window'][0]; ?>" class="btn-blue btn-crowdsourcing-today"><?php echo $generic_section_val['form_bottom_button'][0]['label']; ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                <!-- /.vm-wrap -->
            </div>
        </div>
    </section>
    <!-- end .section-contact -->  
    
</div>