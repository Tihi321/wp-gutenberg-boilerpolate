<?php
/**
 * The general helper specific functionality.
 *
 * @since   1.0.0
 * @package  WP_Gutenberg_Boilerplate\Inc\Helpers
 */

namespace Inc\Helpers;

use Inc\Helpers\Consts;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class General Helper
 */
class General_Helper {

		/**
	 * AGB needs WP 5.0+ or Gutenberg Plugin to work
	 */

	public function check_compatibility() {
		global $wp_version;

		if ( ! version_compare( $wp_version, '5.0', '>=' ) and ! is_plugin_active( 'gutenberg/gutenberg.php' ) ) {

			deactivate_plugins( Consts::get_basename() );
			add_action( 'admin_notices', array( $this , 'compatibility_notice') );
		}
	}

	public function compatibility_notice() {
		?>
		<div class="error notice is-dismissible">
			<p><?php _e( 'All Gutenberg Blocks requires WordPress 5.0 or Gutenberg plugin to be activated', Consts::TEXT_DOMAIN ); ?></p>
		</div>
		<?php
	}


	/**
	 * Load text domain
	 */

	public function load_textdomain() {
	  load_plugin_textdomain( Consts::TEXT_DOMAIN, false, Consts::get_path() . '/languages' );
	}

}
