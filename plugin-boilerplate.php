<?php
/**
 * Plugin's bootstrap file to launch the plugin.
 *
 * @package     Gutenberg_Boilerplate
 * @author      Tihomir Selak
 * @license     GPL2+
 *
 * Plugin Name: Gutenberg Boilerplate - Blocks
 * Plugin URI:  https://gutenberg.courses
 * Description: A plugin containing gutenberg blocks
 * Version:     1.0.0
 * Author:      Tihomir Selak
 * Author URI:  https://tihomir-selak.from.hr
 * Text Domain: plugin-domain
 * Domain Path: /languages
 * License:     GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_gutenberg_blocks() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_gutenberg_blocks' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_gutenberg_blocks() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_gutenberg_blocks' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}
