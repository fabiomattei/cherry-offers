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
	$out = '<div class="offers-maincontainer">
				<h4>Special Offers</h4>';
	$out .= '<ul id="offers-container">';

    ob_start();

		$i = 1;
	if ($posts->have_posts()) {

	    while ($posts->have_posts()) {
	        $posts->the_post();

	        $out .= '<li id="#slide'.$i.'">';

			$out .= '<div class="offer-box">
				<div class="offer-thumbnail">'.get_the_post_thumbnail( $post_id, 'offer-img', array( 'class' => 'offer-thumb' ) ).'</div>
	                <div class="offer-desc">
				    	<h5><a href="'.get_permalink().'" title="' . get_the_title() . '">'.get_the_title() .'</a></h5>
				    <p>'.get_the_content().'</p>
				    </div> <!-- .offer-desc -->
				</div> <!-- .offer-box -->';

	        $out .= '</li>';

			$i++;
	/* these arguments will be available from inside $content
	    get_permalink()
	    get_the_content()
	    get_the_category_list(', ')
	    get_the_title()
	    and custom fields
	    get_post_meta($post->ID, 'field_name', true);
	*/

		} // end while loop

		$out .= '</ul>
		</div>
		<script type="text/javascript">
jQuery( document ).ready(function( jQuery ) {
	jQuery(\'#offers-container\').slippry({
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


// usage [RCOFList]
