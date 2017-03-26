<?php

/*
Plugin Name: Reading Reality Tweeks
Plugin URI: https://github.com/gmcharlt/reading-reality-tweaks
Description: Functionality tweaks for the Reading Reality website
Author: Galen Charlton based on work by Dave Clements
Author URI: https://www.theukedge.com
Version: 1.0.0
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

/* ---------------------------------- *
 * constants
 * ---------------------------------- */

if ( !defined( 'FUNC_PLUGIN_DIR' ) ) {
	define( 'FUNC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( !defined( 'FUNC_PLUGIN_URL' ) ) {
	define( 'FUNC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

/* ---------------------------------- *
 * includes
 * ---------------------------------- */

// include( FUNC_PLUGIN_DIR . 'includes/filename.php' );

/*
Set SOUP's search filter to show draft and scheduled posts
in the blog hop, blog tour, and giveaways categories.
*/
$today = getdate();
function limit_soup( $args ) {
    $args['post_status'] = array('draft', 'future');
    $args['cat'] = array(
                        '196', # blog tours
                        '569', # blog hops
                        '570'  # giveaways
                   );
    $args['date_query'] = array('after' => 'today');
    return $args;
}

add_filter( 'soup_query', 'limit_soup' );
