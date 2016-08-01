<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header('blog'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
			if ( is_home() ) {
				//query_posts( 'cat=2' );
                query_posts( 'category_name=customer' );
			}
			
		?>
		<!-- Nav tabs -->	
		<ul class="nav nav-tabs">
		<?php 
            $cat_parent = get_category_by_slug( 'customer' );
			$categories = get_categories('child_of='.$cat_parent->term_id);
			$separator = '';
			$output = '';
			if ( ! empty( $categories ) ) {
				foreach( $categories as $key=>$category ) {
                    $active_class = $key==0 ? 'active' : '';
                    
					$output .= '<li class="'.$active_class.'"><a data-toggle="tab" class="category" href="#' . esc_html( $category->slug ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"><span class="font-lato">' . esc_html( $category->name ) . '</span></a></li>';
				}
				echo trim( $output, $separator );
			}
		?>
		</ul>
<div class="tab-content">
	<?php 
	$count = 1;
	if ( ! empty( $categories ) ) {
	foreach( $categories as $category ) { ?>
		<div class="tab-pane fade <?php if($count==1) echo 'in active';?>" id="<?php echo esc_html( $category->slug ); ?>">
			
			<?php 
			query_posts( 'cat=.$category->cat_ID.' );
			if ( have_posts() ) : ?>

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

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'blog/template-parts/content', 'none' );

				endif;
			?>
		</div>
		
	<?php $count++; } } ?>
</div>
		

		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php if ( is_active_sidebar( 'home-break' ) ) : ?>
	<?php dynamic_sidebar( 'home-break' ); ?>
<?php endif; ?>
	
<?php get_footer('blog'); ?>
