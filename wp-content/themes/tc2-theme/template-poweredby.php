<?php
    /* Template Name: Powered By */

    // get all custom fields
	$fields = get_fields();

    // Dynamic CSS
	wp_enqueue_style('section-custom-style', get_template_directory_uri() . '/css/screen.css' );
	$custom_css = "";
	
        // background for top banner
        if ( $fields['background_image']!='' ) {
            $custom_css .= ".top-banner { background-image: url(".$fields['background_image'].") !important; }";
        }

        if ( $fields['systems_integrators'][0]['background_image'] ) {
            $custom_css .= ".section-integrators .img-txt { background-image: url(".$fields['systems_integrators'][0]['background_image'].") !important; }";
        }

    // Render custom css
	wp_add_inline_style( 'section-custom-style', $custom_css );

    get_header();
?>

    <?php get_template_part('parts/right-aside'); ?>

    <div class="wrapper powered-by-page">
        
        <?php get_template_part('parts/top-head'); ?>

        <div class="top-banner-powered-by top-banner-about top-banner">
            <div class="container">
                <div class="valign-middle">
                    <h2 class="titles"><?php echo $fields['title']; ?></h2>
                    <p class="txt font20"><?php echo $fields['subtitle']; ?></p>
                </div>
            </div>
        </div>
        <!-- end .top-banner -->

        <div class="contents powered-by-contents">
            
            <?php if ($fields['powered_by'][0]['title']!=''): ?>
            <div class="powered-by-info">
                <div class="info-main">
                    <h2 class="titles"><?php echo $fields['powered_by'][0]['title']; ?></h2>
                    <p class="infos"><?php echo $fields['powered_by'][0]['description']; ?></p>
                </div>
            </div>
            <!-- end .powered-by-info -->
            <?php endif; ?>
            

            <div class="section-integrators">
               
                <?php
                    // WP_Query arguments
                    $args = array (
                        'post_type'         => array( 'clients' ),
                        'post_status'       => array( 'publish' ),
                        'posts_per_page'    => -1,
                        'order'             => 'ASC',
                        'orderby'           => 'menu_order'
                    );

                    // The Query
                    $query = new WP_Query( $args );

                    if ( $query->have_posts() ) :
                        $terms = get_terms( 'client_category' );
                ?>
                <div class="partners">
                    <div class="head clearfix">
                        <h2 class="titles text-center"><?php echo $fields['powered_by'][0]['sub_title']; ?></h2>
                        
                        <?php /*
                        <div class="dropdown" id="clientSelectCat">
                            <a id="dLabel" class="dropdown-current" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="txt selected-option">All</span>
                                <i class="icons2 icon-down-arrow"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <li><a href="javascript:;" data-cat="0">All</a></li>
                                <?php if ( count($terms)>0 ) : foreach( $terms as $k=>$v ) : ?>
                                <li><a href="javascript:;" data-cat="<?php echo $v->term_id; ?>"><?php echo $v->name; ?></a></li>
                                <?php endforeach; endif; ?>
                            </ul>
                        </div>
                        <!-- end .dropdown -->
                        */ ?>
                    </div>
                    <!-- end .head -->
                    <div class="partners-list clearfix" id="clientToggleCat">
                        <ul class="partners-ul clearfix">
                            <?php 
                                while ( $query->have_posts() ) : 
                                    $query->the_post(); 
                                    $client_fields  = get_fields(); 
                                    $post_terms     = get_the_terms( $post->ID, 'client_category' );
                                    $term_class     = '';
                                    if ( $post_terms != null ){
                                        foreach( $post_terms as $post_k=>$post_v ) {
                                            $term_class .= ' client-' . $post_v->term_id;
                                        }
                                    }
                            ?>
                            <li class="btn-row<?php echo $term_class; ?>">
                                <div class="main <?php echo  $client_fields['hover_logo']=='' ? ' noHover' : ''; ?> ">
                                    <a class="partner-link" href="<?php echo $client_fields['logo_link']!='' ? $client_fields['logo_link'] : 'javascript:;'; ?>">
                                        <span class="block">
                                            <img src="<?php echo $client_fields['logo']; ?>" alt="<?php the_title(); ?>" class="imgNormal" />
                                            <?php if ( $client_fields['hover_logo']!='' ) : ?>                                            
                                               <img src="<?php echo $client_fields['hover_logo']; ?>" alt="<?php the_title(); ?>" class="imgHover" />
                                            <?php endif; ?>
                                        </span>
                                    </a>
                                    
                                    <?php if ( $client_fields['logo_link']!='' ) : ?>
                                    <a href="<?php echo $client_fields['logo_link']; ?>" class="btn-view">View Case Study</a>
                                    <?php endif; ?>
                                    
                                </div>
                                <!-- end .main -->
                            </li>
                            <?php endwhile; ?>
                            <!-- end li -->
                        </ul>
                        <!-- end ul -->
                    </div>
                    <!-- end .partners-list -->
                </div>
                <!-- end .parters -->
                <?php endif; wp_reset_postdata(); ?>
                
                <style>
                #generic-section-100 {
    background-image: url(http://wwwtc.staging.wpengine.com/wp-content/uploads/2016/07/woman-smartphone-girl-technology-BG-Update.jpg);
        background-size: cover;
}
                </style>
                
                <div id="generic-section-100" class="generic-left-image-right-text mobile-info-area info-area">
    
    
    
    <div class="mains">
        
                
                <h3 class="titles" style="color: #ffffff">Want to use Topcoder Directly?</h3>
                
                <p class="detail" style="color: #ffffff">Great, we built this crowdsourcing tool just for you.</p>
                
                <a href="http://crowdsourcing.topcoder.com/connect" class="btn-blue btn-get-started-with-crowdsourcing">Discover Topcoder Connect</a>
                
                
                
                
                
    </div><!-- / .mains -->
</div>
                
                <?php if ($fields['systems_integrators'][0]['title']!=''): ?>
                <div class="img-txt">
                    <div class="boxs right">
                        <h2 class="titles"><?php echo $fields['systems_integrators'][0]['title']; ?></h2>
                        <p class="txt"><?php echo $fields['systems_integrators'][0]['description']; ?></p><BR><BR>
                        <a href="http://crowdsourcing.topcoder.com/gsi_partners" class="btn-blue btn-get-started-with-crowdsourcing">Let's Chat</a>
                        <BR><BR>
                    </div>
                </div>
                <!-- end .img-txt -->
                <?php endif; ?>
                
            </div>
            <!-- end .section-integrators -->
            
            
            <section id="home-section-9" class="section section-contact widget active" style="display: block; z-index: 2;">
                <div class="container">
                    <div class="valign-middle">
                        <h2 class="titles">Want to use Topcoder directly?</h2>
                        <center><h2 class="sub-titles" style="color: white">Deliver on it faster.</h3></center><br />
                        <center><a href="http://crowdsourcing.topcoder.com/connect" class="btn-blue btn-get-started-with-crowdsourcing">Discover Topcoder Connect</a></center>
                    </div>
                </div>
            </section>

        </div>
        <!-- end .contents -->
       
        <?php get_template_part('parts/footer'); ?>
        
    </div>
    <!-- end .wrapper -->

<?php get_footer(); ?>