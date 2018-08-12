<?php
/**
 * The general constants specific functionality.
 *
 * Text Domain: wp-boilerplate
 *
 * @since   1.0.0
 * @package  WP_Gutenberg_Boilerplate\Inc\Helpers
 */

namespace Inc\Helpers;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Constants, Strings, values shared by the plugin
 *
 * @author Tihomir Selak
 * @version 1.0.0
 * @since 1.0.0
 */
class Consts {

  const PLUGIN_NAME             = 'wp-gutenberg-boilerplate';
  const SCRIPTS_DOMAIN_EDITOR   = 'wp-gutenberg-boilerplate-scripts-editor';
  const SCRIPTS_DOMAIN_FRONTEND = 'wp-gutenberg-boilerplate-scripts-frontend';
  const LOCALIZE_SCRIPTS_PREFIX = 'wpgb';
  const EDITOR_JS_PATH          = '/assets/js/blocks.editor.js';
  const FRONTEND_JS_PATH        = '/assets/js/blocks.frontend.js';
  const EDITOR_STYLE_PATH       = '/assets/css/blocks.editor.style.css';
  const FRONTEND_STYLE_PATH     = '/assets/css/blocks.frontend.style.css';

  /**
   * Gets this plugin file.
   *
   * @since  1.0.0
   *
   * @return string
   */
  public static function get_basename() {
    return plugin_basename( dirname( __FILE__, 3 ) ) . self::PLUGIN_NAME . '.php';
  }

  /**
   * Gets this plugin's absolute directory path.
   *
   * @since  1.0.0
   *
   * @return string
   */
  public static function get_path() {
    return plugin_dir_path( dirname( __FILE__, 2 ) );
  }

  /**
   * Plugin URL for assets enqueing.
   *
   * @since  1.0.0
   *
   * @return string
   */
  public static function get_url() {
    return plugin_dir_url( dirname( __FILE__, 2 ) );
  }

}
