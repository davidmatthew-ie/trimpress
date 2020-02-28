<?php
/**
 * The main plugin file.
 *
 * @package           TrimPress
 * Plugin Name:       TrimPress
 * Description:       Trim some of the unnecessary cruft from your theme.
 * Version:           1.0.0
 * Author:            David Matthew
 * Author URI:        https://davidmatthew.ie
 * License:           GPL-3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       trimpress
 * Domain Path:       /languages
 */

// Define the plugiin namespace.
Namespace TrimPress;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Current plugin version, manually defined for performance reasons.
define( 'TRIMPRESS_VERSION', '1.0.0' );
