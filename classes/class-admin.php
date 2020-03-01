<?php
/**
 * The file that defines the admin class.
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
 * The admin class.
 *
 * @package    TrimPress
 * @subpackage TrimPress/classes
 */
class Admin {

	/**
	 * The class constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'create_submenu' ) );
    }
    
    /**
	 * Create the submenu page.
	 */
    public function create_submenu() {
        add_submenu_page(
            'options-general.php',
            'TrimPress',
            'TrimPress',
            'manage_options',
            'trimpress',
            array( $this, 'admin_html' )
        );
    }
	
	/**
	 * Callback to render the submenu page markup.
	 */
    public function admin_html() {
    
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
		}
		
		if ( isset( $_GET['settings-updated'] ) ) {
			add_settings_error( 'trimpress_messages', 'trimpress_message', __( 'Settings Saved', 'trimpress' ), 'updated' );
		}

		//settings_errors( 'trimpress_messages' );

        ?>

        <div class="wrap">
        	
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        
			<form action="options.php" method="post">
			
			<?php
			settings_fields( 'trimpress' );
			do_settings_sections( 'trimpress' );
			submit_button( 'Save Settings' );
			?>

			</form>

		</div>

        <?php
	}
}
