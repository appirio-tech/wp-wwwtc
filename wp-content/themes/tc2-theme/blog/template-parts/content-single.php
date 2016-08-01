<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
$post_id		= 	get_the_id();
$date 			= 	get_the_time('F jS, Y');
$categories 	= 	get_the_category();
$author 		= 	get_the_author();
$tags	 		= 	wp_get_post_tags();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="meta">By <span><?php echo get_the_author_posts_link($post_id); ?></span> In <span><?php 
					$separator = ', ';
					$output = '';
					if ( ! empty( $categories ) ) {
						foreach( $categories as $category ) {
							$output .= '<a class="category" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"><span class="font-lato">' . esc_html( $category->name ) . '</span></a>' . $separator;
						}
						echo trim( $output, $separator );
					}
					?></span> Posted <?php echo $date ?></div>

	

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->
	<div class="tages">
		<p><img class="tag_icon" src="<?php echo get_stylesheet_directory_uri(); ?>/blog/images/tage_icon.png" alt=""><span>Tags:</span> 
			<?php 
			 
                /**
                 * This has been disabled as it fetch all the tag on all the posts 
                 * instead of just the current post
				$tax_tags = get_terms(array('post_tag'));
				$sep = ', ';
				$out = '';
				if ( ! empty( $tax_tags ) ) {
					foreach( $tax_tags as $tag ) {
						$out .= ''.$tag->name.'' . $sep;
					}
					echo trim( $out, $sep );
				}
                */
                if( get_the_tag_list() ) {
                    echo get_the_tag_list('', ', ', '');
                }
			?>
		</p>
	</div>
	<footer class="entry-footer">
		<?php //twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
