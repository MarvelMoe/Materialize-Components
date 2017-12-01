<?php  

/*
@package Materialize-components 
*/

namespace Inc\Pages;


use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Callbacks\AdminCallbacks;
use Inc\Callbacks\ShortcodeCallbacks;



class Admin extends BaseController
{

	public $settings;

	public $callbacks;

	public $shortcodes;

	public $pages = array();

	public $subpages = array();

 	public function register() {

 		$this->settings = new SettingsApi();

 		$this->callbacks = new AdminCallbacks();

 		$this->shortcodes = new ShortcodeCallbacks();

 		$this->setPages();

 		$this->setSubPages();

 		$this->setSettings();

 		$this->setSections();

 		$this->setFields();


 		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
 	}

 	public function setPages() {

 			$this->pages =  array(
			 	array(
		 		   'page_title' => 'Material Components', 
		 		   'menu_title' => 'Materialize', 
		 		   'capability' => 'manage_options',
		 		   'menu_slug' => 'material_component',
		 		   'callback' =>  array( $this->callbacks, 'adminDashboard'),
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
			 		'capability' => 'manage_options',
			 		'menu_slug' => 'material_shortcodes',
			 		'callback' => array( $this->callbacks, 'shortcodesPage')
		 		)
	 	);
 	}


	public function setSettings() {
		$args = array(
			array(
				'option_group' => 'materialize_options_group',
				'option_name' => 'check_js',
				'callback' => array( $this->callbacks, 'materializeOptionsGroup' )
			)
		);

		$this->settings->setSettings( $args );
	}

	public function setSections() {
		$args = array(
			array(
				'id' => 'materialize_admin_index',
				'title' => 'Select which files to load',
				'callback' => array( $this->callbacks, 'materializeAdminSection' ),
				'page' => 'material_component'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields() {
		$args = array(
			array(
				'id' => 'check_css',
				'title' => 'Load CSS',
				'callback' => array( $this->callbacks, 'materializeCSS' ),
				'page' => 'material_component',
				'section' => 'materialize_admin_index',
				'args' => array(
					'label_for' => 'check_css'
				)
			),
			array(
				'id' => 'check_js',
				'title' => 'Load JavaScript',
				'callback' => array( $this->callbacks, 'materializeJavascript' ),
				'page' => 'material_component',
				'section' => 'materialize_admin_index',
				'args' => array(
					'label_for' => 'check_js'
				)
			)
		);

		$this->settings->setFields( $args );
	}

}