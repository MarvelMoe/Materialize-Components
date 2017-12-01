<?php  

/*
@package Materialize-components 
*/

namespace Inc\Callbacks;

use Inc\Base\BaseController;


class AdminCallbacks extends BaseController
{
  	public function adminDashboard() {
  		return require_once ( "$this->plugin_path/templates/admin.php" );
  	}

  	public function shortcodesPage() {
  		return require_once ( "$this->plugin_path/templates/shortcodes.php" );
  	}

  	public function materializeOptionsGroup( $input ) {
      return $input;
    }

    public function materializeAdminSection() {
      echo '<p>CSS file is required for all shortcodes while some need JavaScript</p>';
    }

    public function materializeJavascript() {
      $value = esc_attr( get_option( 'check_js' ) );
      echo '<input type="checkbox"  name="check_js" value="' . $value . '" id="jscheck" >';
    }

    public function materializeCSS() {
      $value = esc_attr( get_option( 'check_css' ) );
      echo '<input type="checkbox"  name="check_css" value="' . $value . '" id="csscheck" >';
    }
 

 }
