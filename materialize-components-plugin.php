<?php 
/**
@package Materialize-components 

Plugin Name: Materialize Components
Description: A plugin to add materilize components
Author: Moe Himed
Plugin URI: https://www.linkedin.com/in/moe-himed/
Version: 1.0.0
Text Domain: materialize-components 
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


// This file should not be called directly
defined('ABSPATH') or die('You shall not pass!!!!!');


// Composer Autolod required once
if ( file_exists( dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

 
 
// Runs on activation of plugin
function activate_materialize() {
      Inc\Base\Activate::activate(); 
}
register_activation_hook( __FILE__, 'activate_materialize');


// Runs on deactivation of plugin
function deactivate_materialize() {
      Inc\Base\Deactivate::deactivate(); 
}
register_deactivation_hook( __FILE__, 'deactivate_materialize' );


if (class_exists( 'Inc\\Init' )) {
   Inc\Init::register_services();
}

 
 
 ?>