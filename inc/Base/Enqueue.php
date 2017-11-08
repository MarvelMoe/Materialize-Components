<?php  

/*
@package Materialize-components 
*/

namespace Inc\Base;


class Enqueue
{
 	public function register() {
    	 add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    	}


    function enqueue() {
            wp_enqueue_style('materialiize', PLUGIN_URL . 'css/materialize.min.css');
        }
}