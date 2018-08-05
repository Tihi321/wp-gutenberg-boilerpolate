<?php
/**
 * The general helper specific functionality.
 *
 * @since   2.0.0
 * @package  Gutenberg_Boilerplate\Helpers
 */

namespace Inc\Helpers;

use Inc\Base\Base_Controller;

/**
 * Class General Helper
 */
class General_Helper {

	public $base_controller;

	public function __construct() {
		$this->base_controller = new Base_Controller();

	}

		/**
	 * Gets this plugin's absolute directory path.
	 *
	 * @since  2.1.0
	 * @ignore
	 * @access private
	 *
	 * @return string
	 */
	function _get_plugin_directory() {
		return $this->base_controller->plugin_path;
	}

	/**
	 * Gets this plugin's URL.
	 *
	 * @since  2.1.0
	 * @ignore
	 * @access private
	 *
	 * @return string
	 */
	function _get_plugin_url() {
		return $this->base_controller->plugin_url;
	}

}
