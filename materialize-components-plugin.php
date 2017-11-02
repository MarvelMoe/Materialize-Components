<?php 
/**
@package Materialize-components 

Plugin Name: Materialize Components
Description: A plugin to add materilize css components
Author: Moe Himed
Version: 1.0.0
License: GPLV2 or later
**/

/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {URI to Plugin License}.
*/


 defined( 'ABSPATH' )  or  die( 'You shall not pass!!!!!' );

 if ( !class_exists( 'MaterialComponent') ) {
 

	class MaterialComponent  
	{
			function __construct() {

			add_action('init', array( $this, 'custom_post_type'));			 

		}

			function custom_post_type() {

			register_post_type('material' , ['public' => true, 'label' =>'Materialize']);

		}

			function enqueue() {

		    wp_enqueue_style( 'materialiize', plugins_url( '/materialize.min.css', __FILE__ ) );
		
		}

			function register() {
				add_action( 'admin_enqueue_scripts', array( $this, 'enqueue') );
			}

			function activate() {

				// call custom post type
				$this->custom_post_type();

				// flush rewrite rules global method
				flush_rewrite_rules();
		}


			function deactivate() {

		 	   // flush rewrite rules global method
				flush_rewrite_rules();
		}

		/*	uninstallation of plugin triggers uninstall.php  - hence no function */
		 
	}

	 
	$materialComponent = new MaterialComponent();
	$materialComponent->register();
	 
	 
	register_activation_hook( __FILE__, array( $materialComponent, 'activate') );
	register_deactivation_hook( __FILE__, array( $materialComponent, 'deactivate') );

}

  
 
   ?>
