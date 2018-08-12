<?php
/**
 * Blocks Initializer class
 *
 * Text Domain: wp-boilerplate
 *
 * @since   1.0.0
 * @package WP_Gutenberg_Boilerplate\Inc
 */

namespace Inc;

use Inc\Helpers\General_Helper;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Starting class for plugin, register all blocks in this calss
 */
final class Init {

  /**
   * Store all the classes inside an array
   *
   * @return array Full list of classes
   */
  public static function get_services() {
    return [
        Base\Enqueue::class,
        Lib\Block_Templates::class,
        Lib\Meta_Boxes::class,
        Blocks\Wp_Example_Block::class,
    ];
  }

  /**
   * Checks for compatibility
   *
   * @return void
   */
  public static function register() {
    $general_helper = new General_Helper();

    // Check compatibility (WP 5.1 or gutenberg plugin is activated).
    add_action( 'admin_init', array( $general_helper, 'check_compatibility' ), 1 );

    // Load text domain.
    add_action( 'plugins_loaded', array( $general_helper, 'load_textdomain' ) );

    self::register_services();
  }

  /**
   * Loop through the classes, initialize them,
   * and call the register() method if it exists
   *
   * @return void
   */
  public static function register_services() {
    foreach ( self::get_services() as $class ) {
      $service = self::instantiate( $class );
      if ( method_exists( $service, 'register' ) ) {
        $service->register();
      }
    }
  }

  /**
   * Initialize the class
   *
   * @param  class $class    class from the services array.
   * @return class instance  new instance of the class
   */
  private static function instantiate( $class ) {
    $service = new $class();

    return $service;
  }
}
