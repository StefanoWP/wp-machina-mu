<?php
/*
Plugin Name: WP-Machina MU Plugin
Plugin URI: https://stefanowp.com
Description: A set of functions I use on all sites while building
Author: Stefano Grammenos
Version: 0.0.1
Requires at least: 3.0
Author URI: https://stefano.com
*/

/**
 * Set up our various debug functions and actions
 */

// Redefine the "expensive" query for Query Monitor.
define( 'QM_DB_EXPENSIVE', 0.1 );

// Set the name of the debug file.
define( 'WP_MACHINA_DEBUG_LOGFILE', WP_CONTENT_DIR . '/debug.log' );


/**
 * Remove all dashboard widgets.
 *
 * @global $wp_meta_boxes
 */
add_action( 'wp_dashboard_setup', function () {
	global $wp_meta_boxes;
	// Clear out the dashboard meta boxes array.
	$wp_meta_boxes['dashboard'] = array();
}, 999 );


/**
 * Add CSS to the Query Monitor output.
 *
 * @return void
 */
function wpmachina_add_qm_css() {
	echo '<style>#qm { position: relative; z-index: 1000; }</style>' . "\n";
}


/**
 * Add some custom CSS to the admin dashboard to clean up the presentation.
 *
 * This will hide the "Drag Boxes Here" message, as there are no boxes to drag.
 */
add_action( 'admin_print_styles-index.php', function () {
?>

    <style type="text/css">
        #dashboard-widgets-wrap .empty-container { display: none; }
    </style>

<?php
} );
