<?php  

/*
@package Materialize-components 
*/

 class MaterialComponentDeactivate {

  public static function deactivate() {

            // flush rewrite rules global method
            flush_rewrite_rules();
        }
}