<?php  

/*
@package Materialize-components 
*/

namespace Inc\Callbacks;

use Inc\Base\BaseController;


class ShortcodeCallbacks 
{

   public function material_button( $atts, $content ) {
	  	$atts = shortcode_atts(
	  		array(
	  			'href' => '',
	  			'class' => '',
	  		), $atts, 'button' );

	  	$blank = "#";
	  	$href = ( $atts['href'] == '' ? $blank : $atts['href'] );

  	return '<a class="waves-effect waves-light btn  '. $atts['class'] .' "href="'. $href . '">'  . $content . ' </a>';
  }


	  public function __construct() {
	  	add_shortcode('button', array($this, 'material_button') );
	  }
 
 }

 