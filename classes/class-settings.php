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
			'auto_rss',
			'Automatic RSS Links',
			array( $this, 'auto_rss_cb' ),
			'trimpress',
			'section_main'
		);

		add_settings_field(
			'emojis',
			'Emojis',
			array( $this, 'emojis_cb' ),
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

		add_settings_field(
			'wlwmanifest',
			'WLW Manifest Link',
			array( $this, 'wlwmanifest_cb' ),
			'trimpress',
			'section_main'
		);
		
		add_settings_field(
			'adj_posts',
			'Adjacent Post Links',
			array( $this, 'adj_posts_cb' ),
			'trimpress',
			'section_main'
		);

		add_settings_field(
			'version',
			'WordPress Version Info',
			array( $this, 'version_cb' ),
			'trimpress',
			'section_main'
		);

		add_settings_field(
			'shortlink',
			'Post Shortlinks',
			array( $this, 'shortlink_cb' ),
			'trimpress',
			'section_main'
		);

	}

	/**
	 * The auto_rss field callback.
	 */
	public function auto_rss_cb() {
		$options = get_option( 'trimpress_settings' );
		?>

		<input type="checkbox" name="trimpress_settings[auto_rss]" value="1" <?php checked( isset( $options['auto_rss'] ) ); ?>>
  		
		<label for="trimpress_settings[auto_rss]"><?php _e( 'Remove', 'trimpress' ); ?></label>

		<p class="description"><?php _e( 'This will remove <strong>Really Simple Syndication</strong> (RSS) links from the header. The RSS links will still exist; they just won\'t be automatically loaded.', 'trimpress' ); ?></p>

		<?php
	}

	/**
	 * The emojis field callback.
	 */
	public function emojis_cb() {
		$options = get_option( 'trimpress_settings' );
		?>

		<input type="checkbox" name="trimpress_settings[emojis]" value="1" <?php checked( isset( $options['emojis'] ) ); ?>>
  		
		<label for="trimpress_settings[emojis]"><?php _e( 'Remove', 'trimpress' ); ?></label>

		<p class="description"><?php _e( 'This will remove several inline styles and scripts used for the automatic detection and rendering of emojis.', 'trimpress' ); ?></p>

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
	 * The adj_posts field callback.
	 */
	public function adj_posts_cb() {
		$options = get_option( 'trimpress_settings' );
		?>

		<input type="checkbox" name="trimpress_settings[adj_posts]" value="1" <?php checked( isset( $options['adj_posts'] ) ); ?>>
  		
		<label for="trimpress_settings[adj_posts]"><?php _e( 'Remove', 'trimpress' ); ?></label>

		<p class="description"><?php _e( 'This will remove links to the next and previous posts in the header, if present.', 'trimpress' ); ?></p>

		<?php
	}

	/**
	 * The version field callback.
	 */
	public function version_cb() {
		$options = get_option( 'trimpress_settings' );
		?>

		<input type="checkbox" name="trimpress_settings[version]" value="1" <?php checked( isset( $options['version'] ) ); ?>>
  		
		<label for="trimpress_settings[version]"><?php _e( 'Remove', 'trimpress' ); ?></label>

		<p class="description"><?php _e( 'This will remove the <code>meta</code> generator tag and <code>ver</code> url parameters that let potential attackers know what WordPress version you\'re using.', 'trimpress' ); ?></p>

		<?php
	}

	/**
	 * The shortlink field callback.
	 */
	public function shortlink_cb() {
		$options = get_option( 'trimpress_settings' );
		?>

		<input type="checkbox" name="trimpress_settings[shortlink]" value="1" <?php checked( isset( $options['shortlink'] ) ); ?>>
  		
		<label for="trimpress_settings[shortlink]"><?php _e( 'Remove', 'trimpress' ); ?></label>

		<p class="description"><?php _e( 'This will remove the post shortlink url, if present.', 'trimpress' ); ?></p>

		<?php
	}
}
