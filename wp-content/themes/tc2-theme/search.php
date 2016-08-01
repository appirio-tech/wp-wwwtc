<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header('blog'); ?>

	<div id="primary" class="content-area padding_top">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			</header><!-- .page-header -->
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'blog/template-parts/content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( '&laquo;', 'twentysixteen' ),
				'next_text'          => __( '&raquo;', 'twentysixteen' ),
				'before_page_number' => '',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'blog/template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
	
<?php get_footer('blog'); ?>
