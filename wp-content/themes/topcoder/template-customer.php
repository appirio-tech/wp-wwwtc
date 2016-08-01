<?php /* Template Name: Customer Page*/
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<!-- Nav tabs -->	
		<ul class="nav nav-tabs">
		<?php 
			$categories =  get_categories('child_of=2');
			//print_r($categories);
			$separator = '';
			$output = '';
			
			if ( ! empty( $categories ) ) {
				$c = 1;
				$active = "";
				
				foreach( $categories as $category ) {
					if ( $c == 1 ){
						$active = "active";
					} else{
						$active = "";
					}
					$output .= '<li class="'.$active.'"><a data-toggle="tab" class="category" href="#' . esc_html( $category->slug ) . '"><span class="font-lato">' . esc_html( $category->name ) . '</span></a></li>';
					$c++;
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
			query_posts( 'cat='.$category->cat_ID.'' );
			if ( have_posts() ) : ?>

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				// End the loop.
				endwhile;

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/content', 'none' );

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
	
<?php get_footer(); ?>
