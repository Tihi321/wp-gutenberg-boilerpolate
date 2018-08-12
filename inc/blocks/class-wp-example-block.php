<?php
/**
 * The example dynamic block backend class.
 *
 * Text Domain: wp-boilerplate
 *
 * @since   1.0.0
 * @package  WP_Gutenberg_Boilerplate\Inc\Helpers
 */

namespace  Inc\Blocks;

use Inc\Helpers\Consts;


/**
 * Wp_Example_Block class
 */
class Wp_Example_Block {

  /**
   * Register hooks for dynamic block
   *
   * @return void
   */
  public function register() {

    // Register hooks.
    add_action( 'init', array( $this, 'register_render' ) );
    add_action( 'enqueue_block_editor_assets', array( $this, 'editor_assets' ) );

  }

  /**
   * Render function for frontend
   *
   * @return void
   */
  public function register_render() {

    if ( ! function_exists( 'register_block_type' ) || is_admin() ) {
      return;
    }

    register_block_type(
      Consts::PLUGIN_NAME . '/wp-example-block',
      [ 'render_callback' => array( $this, 'render_block' ) ]
    );

  }
  /**
   * Render function returns html output for frontend
   *
   * @param array $attributes saved atributes from block.
   * @return string
   */
  public function render_block( $attributes ) {

    // Start cached output.
    $output = '';
    ob_start();

    // Get template.
    include Consts::get_path() . 'inc/block-templates/wp-example-block/wp-example-block.php';

    // En cached output.
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
  }
  /**
   * Extra assets for editor from backend
   *
   * @return void
   */
  public function editor_assets() {

    wp_localize_script(
      Consts::SCRIPTS_DOMAIN_EDITOR,
      Consts::LOCALIZE_SCRIPTS_PREFIX . '_wpExampleBlock',
      array(
          'extra' => 'extra_information',
      )
    );
  }

}
