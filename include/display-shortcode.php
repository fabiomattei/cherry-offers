<?php

/**
 * This function handle the short code
 */
function RCOF_offers_list( $atts, $content ) {
	global $post;

	$atts = array( // a few default values
			'posts_per_page' => '2',
			'post_type' => 'cherry-offers'
			);

	$posts = new WP_Query( $atts );
	$out = '<div class="external-post-slider-container">
				<div class="post-slider-title-wrapper">
					<h4 class="post-slider-title">Special Offers</h4>
				</div>';
	$out .= '<ul id="post-slider-container">';

    ob_start();

		$i = 1;
	if ($posts->have_posts()) {

	    while ($posts->have_posts()) {
	        $posts->the_post();

	        $out .= '<li id="#slide'.$i.'">';

			$out .= '<div class="post-slider-box">
					<div class="post-slider-box-child">'.get_the_post_thumbnail( $post->ID, 'offer-img', array( 'class' => 'offer-thumb' ) ).'</div>
	                <div class="post-slider-box-child">
				    	<h6><a href="'.get_permalink().'" title="' . get_the_title() . '">'.get_the_title() .'</a></h6>
				    <p>'.get_the_content().'</p>
				    </div> <!-- .post-slider-box-child -->
				</div> <!-- .post-slider-box -->';

	        $out .= '</li>';

			$i++;

		} // end while loop

		$out .= '</ul>
		</div>
		<script type="text/javascript">
		jQuery( document ).ready(function( jQuery ) {
			jQuery(\'#post-slider-container\').slippry({
				adaptiveHeight: true,
			});
		});
		</script>';

	} else {
		return; // no posts found
	}

	echo $out;

    return ob_get_clean();
}

add_shortcode( 'RCOFList', 'RCOF_offers_list' );

// rename to RCPostSlider
