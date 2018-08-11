<?php

namespace  Inc\Blocks;

use Inc\Helpers\Consts;

class WpExampleBlock {

  public function register() {

		// Register hooks
		add_action( 'init', array( $this, 'register_render' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'editor_assets' ) );

  }

	public function register_render() {

		if ( ! function_exists( 'register_block_type' ) or is_admin() ) {
			return;
		}

		register_block_type(
     Consts::PLUGIN_NAME . '/wp-example-block',
      [ 'render_callback' => array( $this, 'render_block' ) ]
    );

	}

	public function render_block( $attributes ) {

		// Start cached output
		$output = "";
		ob_start();

		// Get template
		include Consts::get_path() . 'inc/block-templates/wp-example-block/wp-example-block.php';

		// En cached output
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

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
