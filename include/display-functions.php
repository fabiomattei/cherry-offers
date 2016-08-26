<?php

/**
 * This functions check the loaded post, in case a shortcode is present id loads
 * necessary css and js in order to show the gallery
 *
 * It relies on a jquery dependency
 */
function RCOF_ShortCodeDetect() {
    global $wp_query;
    $Posts = $wp_query->posts;
    $Pattern = get_shortcode_regex();
    foreach ($Posts as $Post) {
		if ( strpos($Post->post_content, 'RCOFList' ) ) {
			// loading css scripts
			wp_enqueue_style('rcof-testimonialscss', RCOF_PLUGIN_URL.'css/rcoffers.css');

            // loading owl.carousel js scripts
            wp_enqueue_script('rcte-carousel-javascript', RCOF_PLUGIN_URL.'vendors/owlcarousel/owl.carousel.min.js', array('jquery'), '', true);

            // loading owl.carousel css scripts
            wp_enqueue_style('rcte-carousel-css', RCOF_PLUGIN_URL.'vendors/owlcarousel/owl.carousel.css');
            wp_enqueue_style('rcte-carousel-theme-css', RCOF_PLUGIN_URL.'vendors/owlcarousel/owl.theme.css');
            wp_enqueue_style('rcte-carousel-transitions-css', RCOF_PLUGIN_URL.'vendors/owlcarousel/owl.transitions.css');

            break;
        } //end of if
    } //end of foreach
}
add_action( 'wp', 'RCOF_ShortCodeDetect' );
