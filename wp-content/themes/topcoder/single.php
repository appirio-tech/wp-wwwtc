<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<header class="heading">
	<div class="">
		<h2><?php the_title(); ?></h2>
	</div>
</header>
<figure class="feat_img">
	<?php twentysixteen_post_thumbnail(); ?>
</figure>
<!--main content starts here-->
<div id="blog_post">
	<div class="">
		<div class="row">
			<div class="col-xs-12 col-sm-8">
				<div class="blog_content">
					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();

						// Include the single post content template.
						get_template_part( 'template-parts/content', 'single' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							//comments_template();
						}

						

						// End of the loop.
					endwhile;
					?>

				</div><!-- .site-main -->
			</div>
			<div class="col-xs-12 col-sm-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	
</div><!-- .content-area -->

</div>

<div class="introducing_article">
	<div class="container">
		<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation( array(
						'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
					) );
				} elseif ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( '', 'twentysixteen' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Next Article:', 'twentysixteen' ) . '</span> ' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '', 'twentysixteen' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Previous Article:', 'twentysixteen' ) . '</span> ' .
							'<span class="post-title">%title</span>',
					) );
				}

				// End of the loop.
			endwhile;
		?>
	</div>
</div><!--main content ends here-->



<?php get_footer(); ?>
