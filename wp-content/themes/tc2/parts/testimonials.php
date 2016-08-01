<?php

	// WP_Query arguments
	$args = array (
		'post_type'              => array( 'testimonials' ),
		'post_status'            => array( 'publish' ),
		'posts_per_page'         => '-1',
		'order'                  => 'ASC',
		'orderby'                => 'menu_order',
	);
	
	// The Query
	$query = new WP_Query( $args );
  
        $html = '<div id="carousel-quotes" class="carousel slide" data-ride="carousel" data-interval="">
                    <div class="head-box">';
        
        if ( isset($query->posts) ):
            $html .= '<ol class="carousel-indicators">';
            foreach( $query->posts as $k=>$v ) : 
                $fields = get_fields($v->ID);
                $html .= '<li data-target="#carousel-quotes" data-slide-to="'.$k.'" class="'. (($k==0) ? "active" : "") .'">
                            <img src="'. $fields['testimonial_photo'] .'" alt="head">
                            <span class="cover"></span>
                          </li>';
            endforeach;
            $html .= '</ol>';
        endif;
        $html .= '</div><!-- end .head-box -->';
            
        $html .= '<div class="carousel-inner" role="listbox">';
        if ( isset($query->posts) ) : 
            foreach( $query->posts as $k=>$v ) :
            $fields = get_fields($v->ID);
            $html .= '<div class="item quotes-photo'. ($k+1) . (($k==0) ? ' active' : '') . '" style="background-image: url('.$fields['testimonial_background_image'].') !important;">
                        <div class="container">
                            <div class="valign-middle">
                                <div class="info-main">
                                    <p class="txt">“'. $v->post_content .'”</p>
                                    <h3 class="txt-name">—'. $v->post_title .'</h3>';
                                    
                                    if ( $fields['testimonial_case_study_link']!='' ) :
                                        $html .= '<a href="'. $fields['testimonial_case_study_link'] .'" class="btn-blue btn-view-case-study">View case study</a>';
                                    endif;
            $html .= '          </div><!-- end .info-main -->
                            </div>
                        </div>
                    </div><!-- end .item -->';
            endforeach; 
         endif;
        $html .= '</div><!-- end .carousel-inner -->
            </div><!-- end .carousel -->';
	
	// Restore original Post Data
	wp_reset_postdata();

    echo $html;

