<?php  

/*
@package Materialize-components 
*/

 class MaterialComponentActivate {

  public static function activate() {

            // flush rewrite rules global method
            flush_rewrite_rules();
        }
}