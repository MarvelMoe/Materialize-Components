<?php 

 // Trigger this file on uninstall

/*
@package Materialize-components 
*/


if (! defined( 'WP_UNINSTALL_PLUGIN') ) {
	die;
}


$materials = get_posts( array( 'post_type' => 'material', 'number_osts => -1'));

foreach ($materials as $material  ) {
	wp_delete_post( $postid, false );
}
