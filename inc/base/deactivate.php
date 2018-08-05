<?php
/**
 * @package  Gutenberg_Boilerplate\Base
 */

namespace Inc\Base;

class Deactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}
