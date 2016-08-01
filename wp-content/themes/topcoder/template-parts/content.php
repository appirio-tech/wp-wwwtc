<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div class="blog-post-item">
	<?php
	$post_id 		= 	get_the_id();
	$post			=	get_post($post_id);
	$type			= 	get_post_meta($post_id,'featured_audio-video-image',true);
	$title 			= 	get_the_title();
	$url 			= 	get_the_permalink();
	$content		= 	get_the_content();
	$excerpt 		= 	get_the_excerpt();
	$date 			= 	get_the_time('F jS, Y');
	$categories 	= 	get_the_category();
	$author 		= 	get_the_author();
	$comments_count = 	wp_count_comments($post_id);
	if (has_post_thumbnail() ): 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
	endif;
	?>
	<!-- POST ITEM -->
	<div class="blog-post-item">
		<!-- IMAGE -->
		<figure class="banner_img">
			<?php if(is_array($image)){?>
				<img class="img-responsive" src="<?php echo $image[0]; ?>" alt="">
			<?php } ?>
		</figure>
		
		<div class="post_descp">
			<div class="post_meta">
				<figure class="post_img"><?php echo get_avatar( get_the_author_email($post_id), '32' ); ?></figure>
				<p><span><?php echo get_the_author_posts_link($post_id); ?></span> In<span> <?php 
					$separator = ', ';
					$output = '';
					if ( ! empty( $categories ) ) {
						foreach( $categories as $category ) {
							$output .= '<a class="category" href="' . esc_url( get_category_link( $category->term_id ) ) . '" ><span class="font-lato">' . esc_html( $category->name ) . '</span></a>' . $separator;
						}
						echo trim( $output, $separator );
					}
					?></span> Posted <span><?php echo $date ?></span><p>
			</div>
			<div class="post_heading">
				<h2><a href="<?php echo $url ?>"><?php echo $title ?></a></h2>
			</div>
			<div class="post_article">
				<p><?php echo $excerpt ?></p>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="read_more">
						<a href="<?php echo $url ?>" class="btn btn_blue">Continue reading</a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="social">
						<ul>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /POST ITEM -->
</div>

