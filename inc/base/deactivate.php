<?php
/**
 * @since   1.0.0
 * @package  WP_Gutenberg_Boilerplate\Inc\Base
 */

namespace Inc\Base;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Deactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}
