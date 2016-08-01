<div id="generic-section-<?php echo $generic_section_key; ?>" class="generic-testimonials quotes-module">
    <section class="section section-quotes">
        <?php
            $testimonial_category  = $generic_section_val['testimonial_category'];
            include(locate_template('parts/testimonials.php')); 
            //get_template_part('parts/testimonials'); 
        ?>
    </section>
    <!-- end .section-quotes -->
</div>