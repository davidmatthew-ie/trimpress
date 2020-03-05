<?php
/**
 * The file that defines the trim class.
 *
 * @package    TrimPress
 * @subpackage TrimPress/classes
 */

// Define the plugin namespace.
Namespace TrimPress;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The trim class, which looks after cleanup.
 *
 * @package    TrimPress
 * @subpackage TrimPress/classes
 */
class Trim {

	/**
	 * The class constructor.
	 */
	public function __construct() {
        $this->clean_up();
	}
	
	/**
	 * The main clean up method.
	 */
	public function clean_up() {
        $options = get_option( 'trimpress_settings' );
        
        if ( isset( $options['wlwmanifest'] ) && $options['wlwmanifest'] === '1' ) {
			remove_action( 'wp_head', 'wlwmanifest_link' );
		}
		
		if ( isset( $options['rsd'] ) && $options['rsd'] === '1' ) {
			remove_action( 'wp_head', 'rsd_link' );
        }
	}
}
