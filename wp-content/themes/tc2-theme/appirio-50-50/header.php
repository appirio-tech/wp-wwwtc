<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin 
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>

<!doctype html charset="utf-8">
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MXXQHG8');</script>
    <!-- End Google Tag Manager -->
<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file, 
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>
    
	<?php /*<link href="<?php echo get_template_directory_uri(); ?>/appirio-50-50/css/fonts.css" rel="stylesheet" type="text/css">*/ ?>
    <link href="<?php echo get_template_directory_uri(); ?>/appirio-50-50/css/screen.css" rel="stylesheet" type="text/css">
    <script src="//wwwtc.wpengine.com/wp-content/themes/tc2-theme/appirio-50-50/js/jquery-2.1.4.js"></script>
    <script src="//wwwtc.wpengine.com/wp-content/themes/tc2-theme/appirio-50-50/js/jquery.mousewheel.js"></script>
	<script src="//wwwtc.wpengine.com/wp-content/themes/tc2-theme/appirio-50-50/js/jquery.touchSwipe.js"></script>
    <script src="//wwwtc.wpengine.com/wp-content/themes/tc2-theme/appirio-50-50/js/slick.js"></script>
    <script src="//wwwtc.wpengine.com/wp-content/themes/tc2-theme/appirio-50-50/js/matchMedia.js"></script>
    <script src="//wwwtc.wpengine.com/wp-content/themes/tc2-theme/appirio-50-50/js/matchMedia.addListener.js"></script>
    <script src="//wwwtc.wpengine.com/wp-content/themes/tc2-theme/appirio-50-50/js/script.js"></script>
    
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?> 

    <?php if ( is_admin_bar_showing() ) : ?>
    <style>
        #wpadminbar { display: none; }
    </style>
    <?php endif; ?>	
    
    <script src="https://use.typekit.net/bkf5idz.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-6340959-1', 'auto');
  ga('send', 'pageview');

</script>
<link rel="shortcut icon" href="https://s3.amazonaws.com/app.topcoder.com/favicon.ico">
</head>

<body class="gallery">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXXQHG8"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) --> 
    
	<header>
    	<div class="clearfix">
			<a href="javascript:;" class="logo"></a>
			<a href="javascript:;" class="btn btn-primary js-modal" data-target="modal-login">LOG IN</a>
            <a href="http://crowdsourcing.topcoder.com/tc-want-to-talk" class="btn btn-primary">CONTACT US</a> 
        </div>   
    </header>
