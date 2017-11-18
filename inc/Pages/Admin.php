<?php  

/*
@package Materialize-components 
*/

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;



class Admin extends BaseController
{

	public $settings;

	public $pages = array();

	public $subpages = array();

 	public function register() {

 		$this->settings = new SettingsApi();

 		$this->setPages();

 		$this->setSubPages();

 		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
 	}

 	public function setPages() {

 			$this->pages =  array(
		 	array(
	 		   'page_title' => 'Material Component', 
	 		   'menu_title' => 'Materialize', 
	 		   'capabilty' => 'manage_options',
	 		   'menu_slug' => 'material_component',
	 		   'callback' =>  function() { return require_once "$this->plugin_path/templates/admin.php" ;}, 
	 		   'icon_url' => 'none', 
	 		   'position' => 110 

	 		)
 		);
 	}

 	public function setSubPages() {

 			$this->subpages =  array(
		 	array(
		 		'parent_slug' => 'material_component',
		 		'page_title' => 'Shortcodes',
		 		'menu_title' => 'Shortcodes', 
		 		'capabilty' => 'manage_options',
		 		'menu_slug' => 'material_shortcodes',
		 		'callback' => function() { return require_once "$this->plugin_path/templates/shortcodes.php" ;}
	 		)
 	);
 }

}