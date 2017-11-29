<?php  

/*
@package Materialize-components 
*/

namespace Inc\Base;

use Inc\Base\BaseController;

 
class Settings extends BaseController  // inheritance
{

	public function register() {

		add_filter( "plugin_action_links_$this->plugin"   , array($this, 'settings_link'));

	}

	public function settings_link( $links ) {

	   $plugin_settings = '<a href="admin.php?page=material_component">Settings</a>';
	   array_push($links, $plugin_settings);
	   return $links;

	}
}
