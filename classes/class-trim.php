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
		
		if ( isset( $options['auto_rss'] ) && $options['auto_rss'] === '1' ) {
			remove_action( 'wp_head', 'feed_links', 2 );
			remove_action( 'wp_head', 'feed_links_extra', 3 );
		}

		if ( isset( $options['emojis'] ) && $options['emojis'] === '1' ) {
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		}

		if ( isset( $options['adj_posts'] ) && $options['adj_posts'] === '1' ) {
			remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
		}
        
        if ( isset( $options['wlwmanifest'] ) && $options['wlwmanifest'] === '1' ) {
			remove_action( 'wp_head', 'wlwmanifest_link' );
		}
		
		if ( isset( $options['rsd'] ) && $options['rsd'] === '1' ) {
			remove_action( 'wp_head', 'rsd_link' );
		}

		if ( isset( $options['version'] ) && $options['version'] === '1' ) {
			remove_action( 'wp_head', 'wp_generator' );
			add_filter( 'script_loader_src', array( $this, 'remove_ver_param' ) );
			add_filter( 'style_loader_src', array( $this, 'remove_ver_param' ) );
		}

		if ( isset( $options['shortlink'] ) && $options['shortlink'] === '1' ) {
			remove_action( 'wp_head', 'wp_shortlink_wp_head' );
		}		
	}

	/**
	 * Remove the WordPress version info url parameter.
	 */
	public function remove_ver_param( $url ) {
		return remove_query_arg( 'ver', $url );
	}
}
