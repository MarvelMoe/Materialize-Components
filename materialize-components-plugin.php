<?php 
/**
@package Materialize-components 

Plugin Name: Materialize Components
Description: A plugin to add materilize css components
Author: Moe Himed
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


defined('ABSPATH') or die('You shall not pass!!!!!');

if (!class_exists('MaterialComponent')) {


    class MaterialComponent {

        public $plugin;

        function __construct() {
            $this->plugin = plugin_basename( __FILE__ );
        }

    	function register() {

    	     add_action('admin_enqueue_scripts', array($this, 'enqueue'));

             add_action('admin_menu', array($this, 'admin_page_addon'));

             add_filter( "plugin_action_links_$this->plugin", array($this, 'settings_link'));
 
         }

         public function settings_link($links){

            $plugin_settings = '<a href="admin.php?page=material_component">Settings</a>';
            array_push($links, $plugin_settings);
            return $links;

         }

         public function admin_page_addon() {
            add_menu_page( 'Material Component', 'Materialize', 'manage_options','material_component', array($this, 'admin_index'  ), 'dashicons-wordpress-alt', 110 );
         }

         public function admin_index() {
                require_once plugin_dir_path( __FILE__ ) .'templates/admin.php';

         }
 

        function create_post_type() {

            add_action('init', array($this, 'custom_post_type'));

        }

        function custom_post_type() {

            register_post_type('material', ['public' => true, 'label' => 'Materialize']);

        }

        function enqueue() {

            wp_enqueue_style('materialiize', plugins_url('/css/materialize.min.css', __FILE__));

        }
 
    }


    $materialComponent = new MaterialComponent();
    $materialComponent -> register();

    require_once plugin_dir_path( __FILE__ ) .'inc/materialcomponent-activate.php';
    register_activation_hook(__FILE__, array('MaterialComponentActivate', 'activate'));

    require_once plugin_dir_path( __FILE__ ) .'inc/materialcomponent-deactivate.php';
    register_deactivation_hook(__FILE__, array('MaterialComponentDeactivate', 'deactivate'));

}
 
 
   ?>
