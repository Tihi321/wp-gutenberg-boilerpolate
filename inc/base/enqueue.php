<?php
/**
 * @package  Gutenberg_Boilerplate\Base
 */

 namespace Inc\Base;

 use Inc\Base\Base_Controller;

/**
*
*/
class Enqueue extends Base_Controller
{
	public function register() {

 		//Enqueue block editor only JavaScript and CSS.
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_editor_assets' ) );
		//Enqueue front end and editor JavaScript and CSS assets.
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_assets' ) );
		//Enqueue frontend JavaScript and CSS assets.
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_frontend_assets' ) );

	}

	/**
	 * Enqueue block editor only JavaScript and CSS.
	 */
	function enqueue_block_editor_assets() {

		// Enqueue the bundled block JS file
		wp_enqueue_script(
			self::PLUGIN_DOMAIN . '-blocks-js',
			$this->plugin_url . self::EDITOR_JS_PATH,
			[ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components' ],
			filemtime( $this->plugin_path . self::EDITOR_JS_PATH )
		);

		// Enqueue optional editor only styles
		wp_enqueue_style(
			self::PLUGIN_DOMAIN . '-blocks-editor-css',
			$this->plugin_url . self::EDITOR_STYLE_PATH,
			[ 'wp-blocks' ],
			filemtime( $this->plugin_path . self::EDITOR_STYLE_PATH )
		);
	}


	/**
	 * Enqueue front end and editor JavaScript and CSS assets.
	 */
	function enqueue_assets() {
		wp_enqueue_style(
			self::PLUGIN_DOMAIN . '-blocks',
			$this->plugin_url . self::FRONTEND_STYLE_PATH,
			[ 'wp-blocks' ],
			filemtime( $this->plugin_path . self::FRONTEND_STYLE_PATH )
		);
	}


	/**
	 * Enqueue frontend JavaScript and CSS assets.
	 */
	function enqueue_frontend_assets() {
		// If in the backend, bail out.
		if ( is_admin() ) {
			return;
		}

		wp_enqueue_script(
			self::PLUGIN_DOMAIN . '-blocks-frontend',
			$this->plugin_url . self::FRONTEND_JS_PATH,
			[],
			filemtime( $this->plugin_path . self::FRONTEND_JS_PATH )
		);
	}

}
