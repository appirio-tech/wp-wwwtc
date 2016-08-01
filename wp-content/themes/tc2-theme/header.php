<!DOCTYPE html>
<html>

<head>
    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no">
    <title><?php bloginfo('name'); ?> <?php is_home() ? '' : ' | ' . wp_title(''); ?></title>

    <?php wp_head(); ?>
    <?php if ( is_admin_bar_showing() ) : ?>
    <style>
        body { padding-top: 32px; }
        .wrapper.moving, .right-aside.moving { top: auto; }
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
<script src="https://use.typekit.net/bkf5idz.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>

<body <?php body_class($class); ?>>
