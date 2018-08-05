<?php
/**
 * Blocks Initializer
 *
 * @since   1.0.0
 * @package Gutenberg_Boilerplate
 */

namespace Inc;

final class Init
{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
	public static function getServices()
	{
		return [
			Base\Enqueue::class,
			Lib\Block_Templates::class,
			Lib\Meta_Boxes::class,
		];
	}

	/**
	 * Loop through the classes, initialize them,
	 * and call the register() method if it exists
	 * @return none
	 */
	public static function register_services()
	{
		foreach ( self::getServices() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
	private static function instantiate( $class )
	{
		$service = new $class();

		return $service;
	}
}
