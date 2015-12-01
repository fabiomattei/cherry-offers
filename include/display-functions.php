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
			
			// loading slippry js scripts
			wp_enqueue_script('rcof-slippry-javascript', RCOF_PLUGIN_URL.'lib/slippry/slippry.min.js', array('jquery'), '', true);
			// loading slippry css scripts
			wp_enqueue_style('rcof-slippry-css', RCOF_PLUGIN_URL.'lib/slippry/slippry.css');

            break;
        } //end of if
    } //end of foreach
}
add_action( 'wp', 'RCOF_ShortCodeDetect' );
