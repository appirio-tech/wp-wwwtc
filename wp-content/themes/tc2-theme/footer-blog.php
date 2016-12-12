<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
	<?php 
	if ( !is_single() ){ ?>
		</div><!-- .site-content -->
	<?php } ?>
        
        <?php get_template_part('parts/footer'); ?>
        
	</div><!-- .site-inner -->
</div><!-- .site -->



<!-- Modal -->
<div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
		<!-- Begin MailChimp Signup Form -->
        <div id="mc_embed_signup">
            <form action="//topcoder.us13.list-manage.com/subscribe/post?u=65bd5a1857b73643aad556093&amp;id=45194053ce" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_65bd5a1857b73643aad556093_45194053ce" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                </div>
            </form>
        </div>
        <!--End mc_embed_signup-->
      </div>
    </div>
  </div>
</div>

<div id="mySidenav" class="sidenav">
    <?php /*
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
	<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_class'     => 'primary-menu',
		 ) );
	?>
    */ ?>
    <?php get_template_part('parts/right-aside'); ?>
</div>



<?php wp_footer(); ?>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/blog/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/blog/js/custom.js"></script>

<script>/*
jQuery(document).ready(function($){
	if( $('.home_break') ){
		var link = $('.home_break').find('.widget_sp_image-image-link').attr('href');
		$('.home_break .widget_sp_image-description').append('<div class="banner_button"><a href="'+link+'" class="btn btn_blue">Begin Competing!</a></div>');
		$('.widget_sp_image-image-link').removeAttr( "id" );
	}
});*/
</script>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("page").style.marginRight = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("page").style.marginRight= "0";
}
</script>
</body>
</html>
