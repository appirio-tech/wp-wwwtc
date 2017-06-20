<?php

// WP_Query arguments
$args = array (
	'post_type'              => array( 'products' ),
	'post_status'            => array( 'publish' ),
	'posts_per_page'         => '-1',
	'order'                  => 'ASC',
	'orderby'                => 'menu_order',
);

if ( $objProductCat!='' ) {
    $args['tax_query'] = array(
		array(
			'taxonomy' => 'product_category',
			'field'    => 'term_id',
			'terms'    => $objProductCat,
            'operator' => 'IN',
		)
	);
}

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) : 
    while ( $query->have_posts() ) : 
        $query->the_post(); 
        $product_fields = get_fields(); 
        $terms = wp_get_post_terms( $post->ID, 'product_category' );

        $term_class     = 'product-row-0';
        if ( $terms != null ){
            foreach( $terms as $post_k=>$post_v ) {
                $term_class .= ' product-row-' . $post_v->term_id;
            }
        }
?>
    <div class="row product-row <?php echo $term_class; ?>">
        <div class="briefly">
            <div class="briefly-columns">
                <div class="col col-icon">
                    <img src="<?php echo $product_fields['product_icon']; ?>" alt="" />
                </div>
                <div class="col col-title">
                    <h4><?php the_title(); ?></h4>
                </div>
                <div class="col col-duration">
                    <span class="txt">DURATION</span>
                    <span class="value"><?php echo $product_fields['product_duration']; ?></span>
                </div>
                <div class="col col-delivierables">
                    <span class="txt">DELIVERABLES</span>
                    <span class="value"><?php echo $product_fields['product_deliverables']; ?></span>
                </div>
                <div class="col col-btn">
                    <a href="javascript:;" class="icons btn-right-arrow"></a>
                </div>
            </div>
            
            <div class="detailed">
                
                <div class="data-infos">
                    
                    <div class="describe-txt">
                        <?php echo apply_filters('the_content', $product_fields['product_details_content']); ?>
                    </div>
                    <div class="btn-sub-group">
                        <?php if ( $product_fields['product_video_button'][0]['video_id']!='' ) : ?>
                        <a href="#" class="video-icon" data-toggle="modal" data-target="#modal-video" data-video="<?php echo $product_fields['product_video_button'][0]['video_id']; ?>">
                            <?php echo $product_fields['product_video_button'][0]['label']; ?>
                        </a>
                        <?php endif; ?>

                        <?php if ( $product_fields['product_pdf_button'][0]['url']!='' ) : ?>
                        <a href="<?php echo $product_fields['product_pdf_button'][0]['url']; ?>" target="<?php echo $product_fields['product_pdf_button'][0]['target_window']; ?>" class="btn-pdf-icon">
                            <i class="icons"></i>
                            <span><?php echo $product_fields['product_pdf_button'][0]['label']; ?></span>
                        </a>
                        <?php endif; ?>
                    </div>
                    
                    <div class="clearfix"></div>
                    <div class="cta-button">
                        <a href="http://crowdsourcing.topcoder.com/piqued_by_crowdsourcing" target="_blank" class="btn-blue"><?php echo $product_fields['product_get_started_button'][0]['label']; ?></a>
                    </div>
                    
                </div>
                <!-- end .data-infos -->
                <div class="clearfix"></div>
            </div>
            <!-- end .detailed -->
        </div>
        <!-- end .briefly -->
        
    </div>
    <!-- end .row -->


    <!-- Modals -->
    <?php 
        if ( count($product_fields['product_available_options'])>0 ) : 
            foreach( $product_fields['product_available_options'] as $kk=>$vv ) :
                $option_count = count($vv['modal_content']);
                if ( $option_count>0 ) :
                    $col_class = $option_count==1 ? 'col-xs-12' : 'col-xs-6';
    ?>
    <div class="product-modal modal fade" id="modal-<?php echo $post->ID; ?>-<?php echo $kk; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">   
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="row">
                        <?php foreach( $vv['modal_content'] as $key_option=>$val_option ) : ?>
                        <div class="<?php echo $col_class; ?>">
                           
                            <?php if ( $val_option['image']!='') : ?>
                            <div class="product-modal-image">
                                <img src="<?php echo $val_option['image']; ?>" alt="">
                            </div>
                            <?php endif; ?>
                            
                            <?php if ( $val_option['title']!='') : ?>
                            <strong class="product-modal-title"><?php echo $val_option['title']; ?></strong>
                            <?php endif; ?>
                            
                            <?php if ( $val_option['description']!='') : ?>
                            <p class="product-modal-description"><?php echo $val_option['description']; ?></p>
                            <?php endif; ?>
                            
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
                endif;
            endforeach;
        endif; 
    ?>


<?php
    endwhile;
endif;

// Restore original Post Data
wp_reset_postdata();
