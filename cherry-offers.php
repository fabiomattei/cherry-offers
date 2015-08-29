<?php

/*
Plugin Name: Cherry Offers
Plugin URI: http://www.redcherries.net/cherry-offers
Description: TODO
Version: 1.0.0
Author: Red Cherries
Author URI: http://www.redcherries.net/
License: GPLv2
*/

/*******************************************
* Plugin CONSTANT
********************************************/
define( 'RCOF_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'RCOF_PLUGIN_URL' , plugin_dir_url( __FILE__ ) );
define( 'RCOF_TEXT_DOMAIN', 'cherry-offers' );
define( 'RCOF_SLUG',        'cherry-offers' );

define( 'RCOF_SETTINGS_KEY', 'RCEV_Gallery_Settings_');

/*******************************************
* Global Variables
* variables and costants that are used 
* in this plug in
********************************************/



/*******************************************
* Includes
********************************************/

if ( is_admin() ) {
	// include admin side
	include( 'include/installer.php' );
	include( 'include/register-posttype.php' );

} else {
	// include for client side
	include( 'include/display-shortcode.php');
	
}
