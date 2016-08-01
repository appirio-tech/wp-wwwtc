<?php 
    $contact_form_class = 'generic-contact-form contact-module';

    if ( $generic_section_val['form_module']=='Dark' ) {
        $contact_form_class .= ' contact-black-module';
    } else {
        $contact_form_class .= ' contact-white-module';
    }

    if ( $generic_section_val['show_form']=='No' ) {
        $contact_form_class .= ' web-applications-contact-module';
    }
?>
<div id="generic-section-<?php echo $generic_section_key; ?>" class="<?php echo $contact_form_class; ?>">
   
    <section class="section-contact bottom-spacing">
        <div class="container">
            <div class="valign-middle">
                
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
                <a href="<?php echo $generic_section_val['form_bottom_button'][0]['url']; ?>" target="<?php echo $generic_section_val['target_window'][0]; ?>" class="btn-blue btn-crowdsourcing-today"><?php echo $generic_section_val['form_bottom_button'][0]['label']; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- end .section-contact -->  
    
</div>