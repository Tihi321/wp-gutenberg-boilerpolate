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

class Activate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}
