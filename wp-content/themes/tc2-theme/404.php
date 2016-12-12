<?php get_header(); ?>
    
    <?php get_template_part('parts/right-aside'); ?>
    
    <div class="wrapper generic">
        <div class="mask js-close-nav"></div>
        
        <?php get_template_part('parts/top-head'); ?>
        
        <div class="top-banner top-banner-blog" ></div>
        
        <div class="contents">
            <a name="fold"></a>
            
            <div class="blog-list-item">
                <div class="blog-list-item-content">
                    <h2 class="text-center">Oops! That page can’t be found.</h2>
                    <div class="blog-list-item-excerpt">
                        It looks like nothing was found at this location.
                    </div>
                </div>
            </div>
        </div>
        
        <?php get_template_part('parts/footer'); ?>
	</div><!-- .content-area -->

<?php get_template_part('parts/subscribe-modal'); ?>
<?php get_footer(); ?>
