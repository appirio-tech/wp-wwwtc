<?php get_header(); ?>

<main>
	<div class="container">
    
    	<div class="row">
            <div class="col-sm-8">
            
            	<?php while ( have_posts() ) : the_post(); ?>
                	<h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            
            </div>
            <div class="col-sm-4">
            	<?php get_sidebar(); ?>
            </div>
        </div>
	</div>
</main>

<?php get_footer(); ?>