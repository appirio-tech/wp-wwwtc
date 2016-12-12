<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
	    
	    <section id="mc_embed_signup_widget" class="widget">
	        <h2 class="widget-title">Subscribe for Updates</h2>
	        
	        <div id="mc_embed_signup">
                <form action="//topcoder.us13.list-manage.com/subscribe/post?u=65bd5a1857b73643aad556093&amp;id=45194053ce" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="novalidate">
                    <div id="mc_embed_signup_scroll">	
                        <div class="mc-field-group">
                            <input type="email" value="" name="EMAIL" class="required email" placeholder="Email" id="mce-EMAIL" aria-required="true">
                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                        </div>
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>    
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                           <input type="text" name="b_65bd5a1857b73643aad556093_45194053ce" tabindex="-1" value="">
                        </div>
                    </div>
                </form>
            </div>
        </section>
	    
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
