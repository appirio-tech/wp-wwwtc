<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/blog/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/blog/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/blog/css/custom.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,700,900' rel='stylesheet' type='text/css'>
	<style>
		#header .login_section{ position:relative;}
		.primary-menu{ margin:0px; padding:0px;}
		.primary-menu li{ border-bottom:1px solid #ccc;}
		.primary-menu li:last-child{ border-bottom:0px solid #ccc;}
		.primary-menu li a{ display:block; padding:5px 15px; border-bottom: 1px solid #000;}
        <?php if ( is_admin_bar_showing() ) : ?>
            #header { top: 32px; }
            #mySidenav { padding-top: 47px; }
            #content { padding-top: 68px; }
        <?php endif; ?>	
	</style>
	
	<script src="https://use.typekit.net/bkf5idz.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		
		<!--header starts here-->
		<header id="header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="logo site-branding" itemscope>
							<?php //twentysixteen_the_custom_logo(); ?>
							<a href="https://www.topcoder.com">
							    <img src="<?php echo get_stylesheet_directory_uri(); ?>/blog/images/logo.png" alt="topcoder" />
							</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="menu">
							<?php
								wp_nav_menu( array(
									'menu'           => 'Top Menu',
									'fallback_cb'    => false // Do not fall back to wp_page_menu()
								) );
							?>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="login_section">
							<div class="login">
								<a id="toggle_menu" href="#" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></a>
								<form role="search" method="get" class="search-form searchbox" action="<?php bloginfo( 'url' ); ?>">
									<input type="search" class="search-field searchbox-input" placeholder="Search..." value="" name="s" onkeyup="buttonUp();">
									<button type="submit" class="search-submit btn btn_blue searchbox-submit"><i class="fa fa-search"></i></button>
									<a class="btn hidden-xs searchbox-icon" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
								</form>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
			
						
		</header><!--header ends here-->
		
		<?php if ( is_single() ) : while ( have_posts() ) : the_post(); ?>
        <div class="post-head">
            <?php if ( has_post_thumbnail() ) : 
                the_post_thumbnail('full');
            else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/blog/images/default-top-banner.jpg" alt="" />
            <?php endif; ?>
            <div class="post-title">
                <h2><?php the_title(); ?></h2>
                <div class="post-meta">
                    
                    <div class="post-meta-value">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php the_author_posts_link(); ?>
                    </div>
                    
                    <div class="post-meta-value">
                       <i class="fa fa-calendar-o" aria-hidden="true"></i>
                        <?php the_date("l, F j, Y"); ?>
                    </div>
                </div>
            </div>
        </div>
		<?php endwhile; wp_reset_postdata(); endif; ?>

		<div id="content" class="site-content container">
