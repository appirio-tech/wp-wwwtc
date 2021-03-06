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
    <link href="//wwwtc.wpengine.com/wp-content/themes/naked-wordpress-master/i/favicon.ico" rel="shortcut icon">
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>
  
<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file, 
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>

	<link href="//wwwtc.wpengine.com/wp-content/themes/naked-wordpress-master/css/fonts.css" rel="stylesheet" type="text/css">
    <link href="//wwwtc.wpengine.com/wp-content/themes/naked-wordpress-master/css/screen.css" rel="stylesheet" type="text/css">
    <script src="//wwwtc.wpengine.com/wp-content/themes/naked-wordpress-master/js/jquery-2.1.4.js"></script>
    <script src="//wwwtc.wpengine.com/wp-content/themes/naked-wordpress-master/js/jquery.mousewheel.js"></script>
	<script src="//wwwtc.wpengine.com/wp-content/themes/naked-wordpress-master/js/jquery.touchSwipe.js"></script>
    <script src="//wwwtc.wpengine.com/wp-content/themes/naked-wordpress-master/js/slick.js"></script>
    <script src="//wwwtc.wpengine.com/wp-content/themes/naked-wordpress-master/js/matchMedia.js"></script>
    <script src="//wwwtc.wpengine.com/wp-content/themes/naked-wordpress-master/js/matchMedia.addListener.js"></script>
    <script src="//wwwtc.wpengine.com/wp-content/themes/naked-wordpress-master/js/script.js"></script>
    
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?> 

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-6340959-1', 'auto');
  ga('send', 'pageview');

</script>
 
</head>

<body class="gallery">
	
	<header>
    	<div class="clearfix">
			<a href="javascript:;" class="logo"></a>
			<a href="javascript:;" class="btn btn-primary js-modal" data-target="modal-login">LOG IN</a> 
        </div>   
    </header>
