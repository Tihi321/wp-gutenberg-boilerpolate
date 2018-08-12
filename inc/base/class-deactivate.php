<?php
/**
 * Thid class is called upon deactivation of plugin
 *
 * Text Domain: wp-boilerplate
 *
 * @since   1.0.0
 * @package  WP_Gutenberg_Boilerplate\Inc\Base
 */

namespace Inc\Base;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Class Deactivate
 */
class Deactivate {
  /**
   * Function flush rules on plugin deactivation
   *
   * @return void
   */
  public static function deactivate() {
    flush_rewrite_rules();
  }
}
