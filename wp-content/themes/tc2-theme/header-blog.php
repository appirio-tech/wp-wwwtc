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
    
    <!-- begin olark code -->
    <script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
    f[z]=function(){
    (a.s=a.s||[]).push(arguments)};var a=f[z]._={
    },q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
    f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
    0:+new Date};a.P=function(u){
    a.p[u]=new Date-a.p[0]};function s(){
    a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
    hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
    return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
    b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
    b.contentWindow[g].open()}catch(w){
    c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
    var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
    b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
    loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
    /* custom configuration goes here (www.olark.com/documentation) */
    olark.identify('4877-205-10-3312');/*]]>*/</script><noscript><a href="https://www.olark.com/site/4877-205-10-3312/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
    <!-- end olark code -->
    
    <!-- Hotjar Tracking Code for http://www.topcoder.com -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:133597,hjsv:5};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		
		<!--header starts here-->
		<header id="header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-sm-2">
						<div class="logo site-branding" itemscope>
							<?php //twentysixteen_the_custom_logo(); ?>
							<a href="https://www.topcoder.com">
							    <img src="<?php echo get_stylesheet_directory_uri(); ?>/blog/images/logo.png" alt="topcoder" />
							</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-8">
						<div class="menu">
							<?php
								wp_nav_menu( array(
									'menu'           => 'Top Menu',
									'fallback_cb'    => false // Do not fall back to wp_page_menu()
								) );
							?>
						</div>
					</div>
					<div class="col-xs-12 col-sm-2">
						<div class="login_section">
							<div class="login">
							    <a href="javascript:;" class="btn-header-subscribe" data-toggle="modal" data-target="#subscribeModal">Subscribe</a>
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
                
                <?php /*
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
                */ ?>
            </div>
        </div>
		<?php endwhile; wp_reset_postdata(); endif; ?>

		<div id="content" class="site-content container">
