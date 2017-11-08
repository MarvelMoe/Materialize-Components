<?php  

/*
@package Materialize-components 
*/

namespace Inc;

final class Init 
{

	/*
	Store all classes inside an array @return array list of classs
	*/
	public static function get_services() {
		return [
		    Pages\Admin::class,
		    Base\Enqueue::class,
		    Base\Settings::class
		];
 			 
	}

	/*
	Loop through the classes and initialize them and call register method
	*/
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			 $service = self::instantiate( $class );
			 if ( method_exists( $service, 'register' )) {
			 	$service->register();
			 }
		}
	}

	/*
	Initialize the class - parameter is class from service array & return class instance
	*/
	private static function instantiate( $class ) {
		$service = new $class();
		return $service;
	}
}