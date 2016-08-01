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
                <a href="<?php echo get_permalink($post->ID); ?>" class="btn-gray-border btn-view-details">View Details</a>
                <a href="javascript:;" class="icons btn-right-arrow"></a>
            </div>
        </div>
        <!-- end .briefly -->
        <div class="detailed hide">
            <a href="javascript:;" class="icons btn-icon-close"></a>
            <div class="vedio-img">
                <a href="#" class="boxs" data-toggle="modal" data-target="#modal-video" data-video="<?php echo $product_fields['product_video_button'][0]['video_id']; ?>">
                    <span class="round-play"><i class="icons"></i></span>
                    <img src="<?php echo $product_fields['product_image']; ?>" alt="" />
                </a>
            </div>
            <!-- end .vedio-img -->
            <div class="data-infos">
                <p class="tag-txt">
                    <?php echo $terms[0]->name; ?>
                </p>
                <h2 class="titles"><?php the_title(); ?></h2>
                <p class="describe-txt"><?php echo $post->post_content; ?></p>
                <div class="line-br"></div>
                <div class="visual-area">
                    <div class="col col-duration">
                        <span class="txt">DURATION</span>
                        <span class="value"><?php echo $product_fields['product_duration']; ?></span>
                    </div>
                    <div class="col col-delivierables">
                        <span class="txt">DELIVERABLES</span>
                        <span class="value"><?php echo $product_fields['product_deliverables']; ?></span>
                    </div>
                </div>
                <!-- end .visual-area -->
                <div class="line-br"></div>
                <div class="info-options">
                    <div class="txt">
                        <?php echo $product_fields['product_available_option_text']; ?>
                    </div>

                    <?php if ( count($product_fields['product_available_options'])>0 ) : ?>
                    <div class="btn-group">
                        <?php foreach( $product_fields['product_available_options'] as $kk=>$vv ) : ?>
                        <a href="javascript:;" class="btn-gray-border <?php echo $kk==0 ? 'btn-black-border' : ''; ?>"><?php echo $vv['product_option_label']; ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <div class="question-group">
                        <a href="<?php echo $product_fields['product_option_difference'][0]['url']; ?>" class="link-tip">
                            <span class="btn-round-help">?</span>
                            <span class="red-txt"><?php echo $product_fields['product_option_difference'][0]['label']; ?></span>
                        </a>
                    </div>
                    <!-- end .bottom-btn-group -->
                    <div class="line-br"></div>
                    <div class="bottom-btn-group">
                        <a href="#" class="btn-gray-border" data-toggle="modal" data-target="#modal-video" data-video="<?php echo $product_fields['product_video_button'][0]['video_id']; ?>">
                            <?php echo $product_fields['product_video_button'][0]['label']; ?>
                            <i class="icon-right-arrow icons"></i>
                        </a>
                        <a href="<?php echo get_permalink($post->ID); ?>" class="btn-gray-border">View Details</a>
                        <a href="<?php echo $product_fields['product_pdf_button'][0]['url']; ?>" class="btn-pdf-icon">
                            <i class="icons"></i>
                            <span><?php echo $product_fields['product_pdf_button'][0]['label']; ?></span>
                        </a>
                        <a href="<?php echo $product_fields['product_get_started_button'][0]['url']; ?>" class="btn-blue"><?php echo $product_fields['product_get_started_button'][0]['label']; ?></a>
                    </div>
                    <!-- end .info-options -->
                </div>
                <!-- end .bottom-btn-group -->
            </div>
            <!-- end .data-infos -->
            <div class="clearfix"></div>
        </div>
        <!-- end .detailed -->
    </div>
    <!-- end .row -->

<?php
    endwhile;
endif;

// Restore original Post Data
wp_reset_postdata();
