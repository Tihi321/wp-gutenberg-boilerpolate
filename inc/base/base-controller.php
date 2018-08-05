<?php
/**
 * The general helper specific functionality.
 *
 * @since   2.0.0
 * @package  Gutenberg_Boilerplate\Base
 */

namespace Inc\Base;

/**
 * Class Base_Controller
 */
class Base_Controller {

	const PLUGIN_DOMAIN 			= 'plugin-domain';
	const PLUGIN_FILE_NAME 	 	= 'plugin-boilerplate';
	const EDITOR_JS_PATH 			= '/assets/js/blocks.editor.js';
	const FRONTEND_JS_PATH 		= '/assets/js/blocks.frontend.js';
	const EDITOR_STYLE_PATH 	= '/assets/css/blocks.editor.style.css';
	const FRONTEND_STYLE_PATH = '/assets/css/blocks.frontend.style.css';

	public $plugin_path,$plugin_url,$plugin;

	public function __construct() {
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . self::PLUGIN_FILE_NAME . '.php';

	}

}
