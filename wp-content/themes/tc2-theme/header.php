<!DOCTYPE html>
<html>

<head>
    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <?php 
    if ( is_single() ) : 
        
        if ( has_post_thumbnail($post->ID) ) {
            $bg_url = get_the_post_thumbnail_url($post->ID, 'full');
        } else {
            $bg_url = catch_that_image();
        }
        
        $bg_url = str_replace('tc.wpengine.com//', '.topcoder.com/', $bg_url);
    ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@topcoder">
    <meta name="twitter:creator" content="@topcoder">
    <meta name="twitter:title" content="<?php echo $post->post_title; ?>">
    <meta name="twitter:image" content="<?php echo $bg_url; ?>">
    <link rel="canonical" href="https://www.topcoder.com/blog/<?php echo $post->post_name; ?>/">
    <?php endif; ?>
    <meta name="card-image" content="<?php echo $bg_url; ?>">
    
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
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MXXQHG8');</script>
    <!-- End Google Tag Manager -->
    
</head>
<?php
    // WP_Query arguments for Sticky Banner
    $args = array (
        'post_type'              => array( 'sticky_banner' ),
        'post_status'            => array( 'publish' ),
        'posts_per_page'         => -1
    );
    
    // The Query
    $query = new WP_Query( $args );
    
    // The Loop
    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) :
            $query->the_post();
            $sticky_posts[] = $post;
        endwhile;
        shuffle($sticky_posts);
        
        $sticky_fields = get_fields($sticky_posts[0]->ID);
        $sticky_banner = '
            <div class="sticky-banner">' . 
                $sticky_posts[0]->post_title . '
                <a href="' . $sticky_fields['sticky_button_url'] . '" target="' .  $sticky_fields['sticky_button_target_window'][0] . '" class="sticky-btn">' .  $sticky_fields['sticky_button_label'] . '</a>
                <a href="javascript:;" class="sticky-close">&times;</a>
            </div>';
        
        $class[] = 'has-sticky-banner';
        
    endif;
    
    // Restore original Post Data
    wp_reset_postdata();
    
    $class[] = 'page-body-'.$post->post_name;
    
    if ( isset($_GET['s']) && $_GET['s']!='' ) {
        $class[] = 'search search-results';
    }
?>
<body <?php body_class($class); ?>>
    
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXXQHG8"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <?php echo $sticky_banner; ?>