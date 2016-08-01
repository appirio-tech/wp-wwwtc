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
		<!-- Footer starts here-->
		<footer id="blog_post">
			<div class="pre_footer">
				<div class="container">
					<div class="row">
						<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
							<?php dynamic_sidebar( 'footer-1' ); ?>
						<?php endif; ?>
						<aside class="widget col-xs-12 col-sm-4 categories">
						<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
							<?php dynamic_sidebar( 'footer-2' ); ?> 
						<?php endif; ?>
						</aside>
						<aside class="widget col-xs-12 col-sm-3 ">
						<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
							<?php dynamic_sidebar( 'footer-3' ); ?>
						<?php endif; ?>
						</aside>
					</div>
				</div>
			</div>
			<div class="footer">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="social_icon">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer_logo.png" alt="">
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<?php if ( is_active_sidebar( 'footer-social' ) ) : ?>
								<?php dynamic_sidebar( 'footer-social' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</footer><!-- Footer ends here-->
	</div><!-- .site-inner -->
</div><!-- .site -->

<!-- Modal -->
<!--div class="modal fade" id="menuModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
		<div class="row">
			<div class="col-xs-12 col-sm-4 text-center">
				<h3>ABOUT</h3>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'primary-menu',
					 ) );
				?>
			</div>
			<div class="col-xs-12 col-sm-4 text-center">
				<h3>SERVICES</h3>
				<?php
					wp_nav_menu( array(
						'menu'           => 'Services',
						'menu_class'     => 'primary-menu',
					 ) );
				?>
			</div>
			<div class="col-xs-12 col-sm-4 text-center">
				<h3>SOCIAL</h3>
				<?php
					wp_nav_menu( array(
						'menu'           => 'Social',
						'menu_class'     => 'primary-menu',
					 ) );
				?>
			</div>
		</div>
      </div>
    </div>
  </div>
</div-->
<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
	<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_class'     => 'primary-menu',
		 ) );
	?>
</div>



<?php wp_footer(); ?>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
<script>
jQuery(document).ready(function($){
	if( $('.home_break') ){
		var link = $('.home_break').find('.widget_sp_image-image-link').attr('href');
		$('.home_break .widget_sp_image-description').append('<div class="banner_button"><a href="'+link+'" class="btn btn_blue">Begin Competing!</a></div>');
		$('.widget_sp_image-image-link').removeAttr( "id" );
	}
});
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
