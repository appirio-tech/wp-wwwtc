<div class="blog-search">
    <form role="search" method="get" id="searchform" action="/" >
        <input type="search" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Blog Search" />
    </form>
</div>

<?php if ( !is_search() ) : ?>
<div class="blog-nav">
    <div class="container-fluid">
    <?php
        $nav = array(
            'container' 	=> false,
            'items_wrap' 	=> '<ul>%3$s</ul>',
            'menu'     		=> 'Blog Category Nav');
        wp_nav_menu($nav);									
    ?>
    </div>
</div>
<?php endif; ?>