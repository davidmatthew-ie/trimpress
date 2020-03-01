<?php
/**
 * The file that defines the core plugin class.
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
 * The core plugin class.
 *
 * @package    TrimPress
 * @subpackage TrimPress/classes
 */
class TrimPress {

	/**
	 * The class constructor.
	 */
	public function __construct() {
		$this->init_settings();
		$this->init_admin();	
	}

	/**
	 * Initialize the settings section.
	 */
	public function init_settings() {
		require plugin_dir_path( dirname( __FILE__ ) ) . 'classes/class-settings.php';
		new Settings();
	}
	
	/**
	 * Initialize the admin area.
	 */
	public function init_admin() {
		require plugin_dir_path( dirname( __FILE__ ) ) . 'classes/class-admin.php';
		new Admin();
	}	
}
