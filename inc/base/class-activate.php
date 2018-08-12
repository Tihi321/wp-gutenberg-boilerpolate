<?php
/**
 * This class is called upon plugin activation
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
 * Do something upon activation
 */
class Activate {
  /**
   * Flush ruler on activation
   *
   * @return void
   */
  public static function activate() {
    flush_rewrite_rules();
  }
}
