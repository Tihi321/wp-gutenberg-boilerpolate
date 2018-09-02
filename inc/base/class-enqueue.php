<?php
/**
 * Script for block are enqueued here
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

 use Inc\Helpers\Consts;

/**
 * Enqueue class
 */
class Enqueue {
  /**
   * Register all block scripts to WordPress
   *
   * @return void
   */
  public function register() {

    // Enqueue block editor only JavaScript and CSS.
    add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_editor_assets' ) );
    // Enqueue front end and editor JavaScript and CSS assets.
    add_action( 'enqueue_block_assets', array( $this, 'enqueue_assets' ) );
    // Enqueue frontend JavaScript and CSS assets.
    add_action( 'enqueue_block_assets', array( $this, 'enqueue_frontend_assets' ) );

  }

  /**
   * Enqueue block editor only JavaScript and CSS.
   */
  public function enqueue_block_editor_assets() {

    // Enqueue the bundled block JS file.
    wp_enqueue_script(
      Consts::SCRIPTS_DOMAIN_EDITOR,
      Consts::get_url() . Consts::EDITOR_JS_PATH,
      [
        'wp-components',
        'wp-blocks',
        'wp-element',
        'wp-editor',
        'wp-date',
        'wp-data',
        'wp-i18n',
    ],
      filemtime( Consts::get_path() . Consts::EDITOR_JS_PATH )
    );

    // Set always after script_add_data or it won't show.
    wp_localize_script(
      Consts::SCRIPTS_DOMAIN_EDITOR,
      Consts::LOCALIZE_SCRIPTS_PREFIX . '_globals',
      array(
          'ajaxurl' => admin_url( 'admin-ajax.php' ),
          'pluginurl' => Consts::get_url(),
      )
    );

    // Enqueue optional editor only styles.
    wp_enqueue_style(
      Consts::PLUGIN_NAME . '-blocks-editor-css',
      Consts::get_url() . Consts::EDITOR_STYLE_PATH,
      [ 'wp-blocks' ],
      filemtime( Consts::get_path() . Consts::EDITOR_STYLE_PATH )
    );

    // Get translations.
    $locale  = gutenberg_get_jed_locale_data( 'wp-boilerplate' );
    $content = 'wp.i18n.setLocaleData(' . wp_json_encode( $locale ) . ', "wp-boilerplate" );';
    wp_script_add_data( Consts::PLUGIN_NAME, 'data', $content );

  }


  /**
   * Enqueue frontend and editor JavaScript and CSS assets.
   */
  public function enqueue_assets() {
    wp_enqueue_style(
      Consts::PLUGIN_NAME . '-blocks',
      Consts::get_url() . Consts::FRONTEND_STYLE_PATH,
      [ 'wp-blocks' ],
      filemtime( Consts::get_path() . Consts::FRONTEND_STYLE_PATH )
    );
  }


  /**
   * Enqueue frontend JavaScript and CSS assets.
   */
  public function enqueue_frontend_assets() {

    // If in the backend, bail out.
    if ( is_admin() ) {
      return;
    }

    wp_enqueue_script(
      Consts::SCRIPTS_DOMAIN_FRONTEND,
      Consts::get_url() . Consts::FRONTEND_JS_PATH,
      [ 'jquery' ],
      filemtime( Consts::get_path() . Consts::FRONTEND_JS_PATH )
    );

    // Set always after script_add_data or it won't show.
    wp_localize_script(
      Consts::SCRIPTS_DOMAIN_FRONTEND,
      Consts::LOCALIZE_SCRIPTS_PREFIX . '_globals',
      array(
          'ajaxurl' => admin_url( 'admin-ajax.php' ),
          'pluginurl' => Consts::get_url(),
      )
    );
  }

}
