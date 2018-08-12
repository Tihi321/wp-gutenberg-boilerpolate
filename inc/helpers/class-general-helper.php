<?php
/**
 * The general helper specific functionality.
 *
 * Text Domain: wp-boilerplate
 *
 * @package WP_Gutenberg_Boilerplate\Inc\Helpers
 * @since   1.0.0
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

    if ( ! version_compare( $wp_version, '5.0', '>=' ) && ! is_plugin_active( 'gutenberg/gutenberg.php' ) ) {

      deactivate_plugins( Consts::get_basename() );
      add_action( 'admin_notices', array( $this, 'compatibility_notice' ) );
    }
  }

  /**
   * Undocumented function
   *
   * @return void
   */
  public function compatibility_notice() {
    ?>
    <div class="error notice is-dismissible">
        <p><?php esc_html_e( 'All Gutenberg Blocks requires WordPress 5.0 or Gutenberg plugin to be activated', 'wp-boilerplate' ); ?></p>
    </div>
    <?php

  }

  /**
   * Load text domain
   */
  public function load_textdomain() {
    load_plugin_textdomain( 'wp-boilerplate', false, Consts::get_path() . '/languages' );
  }

}
