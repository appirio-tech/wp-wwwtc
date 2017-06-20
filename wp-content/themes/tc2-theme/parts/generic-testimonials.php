<?php 
    $testimonial_category  = $generic_section_val['testimonial_category']; 
    $objCat = get_term_by('id', $testimonial_category[0], 'testimonial_category');
?>
<div id="generic-section-<?php echo $generic_section_key; ?>" class="generic-testimonials quotes-module <?php echo $generic_section_val['custom_class']; ?>">
    <section class="section section-quotes testimonial_category_<?php echo $objCat->slug; ?>">
        <?php
            
            include(locate_template('parts/testimonials.php')); 
            //get_template_part('parts/testimonials'); 
        ?>
    </section>
    <!-- end .section-quotes -->
</div>