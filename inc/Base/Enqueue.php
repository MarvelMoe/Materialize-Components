<?php  

/*
@package Materialize-components 
*/

namespace Inc\Base;

use Inc\Base\BaseController;


class Enqueue extends BaseController
{
 	public function register() {
    	 add_action('admin_enqueue_scripts', array($this, 'adminEnqueue'));
    	 add_action('wp_enqueue_scripts', array($this, 'frontEnqueue'));
	}

   public function adminEnqueue(  ) {
         wp_enqueue_style('materialize_css', $this->plugin_url  . 'css/admin.css');	
    }
    	
    public function frontEnqueue() {
        wp_enqueue_style('materialize_css', $this->plugin_url  . 'css/materialize.min.css');
        wp_enqueue_style('materialize_js', $this->plugin_url  . 'js/materialize.min.js');             
    }

}