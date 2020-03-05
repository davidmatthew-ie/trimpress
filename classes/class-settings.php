<?php
/**
 * The file that defines the settings class.
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
 * The settings class.
 *
 * @package    TrimPress
 * @subpackage TrimPress/classes
 */
class Settings {

	/**
	 * The class constructor.
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'create_settings' ) );
	}
    
	/**
	 * Initialize the settings section.
	 */
	public function create_settings() {
		register_setting( 'trimpress', 'trimpress_settings' );
	
		add_settings_section( 'section_main', '', '', 'trimpress' );
	
		add_settings_field(
			'wlwmanifest',
			'WLW Manifest Link',
			array( $this, 'wlwmanifest_cb' ),
			'trimpress',
			'section_main'
		);

		add_settings_field(
			'rsd',
			'RSD Link',
			array( $this, 'rsd_cb' ),
			'trimpress',
			'section_main'
		);
	}

	/**
	 * The wlwmanifest field callback.
	 */
	public function wlwmanifest_cb() {
		$options = get_option( 'trimpress_settings' );
		?>

		<input type="checkbox" name="trimpress_settings[wlwmanifest]" value="1" <?php checked( isset( $options['wlwmanifest'] ) ); ?>>
  		
		<label for="trimpress_settings[wlwmanifest]"><?php _e( 'Remove', 'trimpress' ); ?></label>

		<p class="description"><?php _e( 'This will remove the link to <code>wlwmanifest.xml</code>, used for <strong>Windows Live Writer</strong> support (a discontinued desktop application).', 'trimpress' ); ?></p>

		<?php
	}

	/**
	 * The rsd field callback.
	 */
	public function rsd_cb() {
		$options = get_option( 'trimpress_settings' );
		?>

		<input type="checkbox" name="trimpress_settings[rsd]" value="1" <?php checked( isset( $options['rsd'] ) ); ?>>
  		
		<label for="trimpress_settings[rsd]"><?php _e( 'Remove', 'trimpress' ); ?></label>

		<p class="description"><?php _e( 'This will remove the <strong>Really Simple Discovery</strong> (RSD) service endpoint link used for automatic pingbacks.', 'trimpress' ); ?></p>

		<?php
	}
}
