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
		// register a new setting
		register_setting( 'trimpress', 'trimpress_settings' );
	
		// register a new section in the "reading" page
		add_settings_section(
			'trimpress_settings_section',
			'TrimPress Settings Section',
			array( $this, 'settings_section_cb' ),
			'trimpress'
		);
	
		// register a new field in the trimpress_settings_section
		add_settings_field(
			'trimpress_field_1',
			'TrimPress Field 1',
			array( $this, 'settings_field_cb_1' ),
			'trimpress',
			'trimpress_settings_section'
		);
	}

	
	public function settings_section_cb() {
		echo '<p>This bit seems a little redundant.</p>';
	}

	public function settings_field_cb_1() {
		$options = get_option( 'trimpress_settings' );
		?>
		
		<select id="<?php echo esc_attr( $options['trimpress_field_1'] ); ?>" name="trimpress_settings[trimpress_field_1]">
			
			<option value="yes" <?php echo isset( $options['trimpress_field_1'] ) ? ( selected( $options['trimpress_field_1'], 'yes', false ) ) : ( '' ); ?>>
				<?php esc_html_e( 'Yes', 'trimpress' ); ?>
			</option>
			
			<option value="no" <?php echo isset( $options['trimpress_field_1'] ) ? ( selected( $options['trimpress_field_1'], 'no', false ) ) : ( '' ); ?>>
				<?php esc_html_e( 'No', 'trimpress' ); ?>
			</option>

			<option value="maybe" <?php echo isset( $options['trimpress_field_1'] ) ? ( selected( $options['trimpress_field_1'], 'maybe', false ) ) : ( '' ); ?>>
				<?php esc_html_e( 'Maybe', 'trimpress' ); ?>
			</option>
		
		</select>
		<?php
	}
}
