<?php

// WP_Query arguments
$args = array (
	'post_type'         => array( 'clients' ),
	'post_status'       => array( 'publish' ),
    'posts_per_page'    => -1,
	'order'             => 'ASC',
	'orderby'           => 'menu_order'
);

if ( $product_type!='' ) {
    $args['tax_query'] = array(
		array(
			'taxonomy' => 'client_category',
			'field'    => 'term_id',
			'terms'    => $product_type,
			'operator' => 'IN',
		)
    );
}

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) : ?>
<div class="info-clients">
    <ul>
	<?php while ( $query->have_posts() ) : $query->the_post(); $client_fields = get_fields(); ?>
		<li><a href="<?php echo $client_fields['logo_link']!='' ? $client_fields['logo_link'] : 'javascript:;'; ?>"><span class="block"><img src="<?php echo $client_fields['logo']; ?>" alt="<?php the_title(); ?>" class="img-block" /></span></a></li>
	<?php endwhile; ?>
    </ul>
</div>
<?php 
endif; 

// Restore original Post Data
wp_reset_postdata();

?>