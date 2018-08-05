<?php
/**
 * @package  Gutenberg_Boilerplate\Base
 */

namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}
