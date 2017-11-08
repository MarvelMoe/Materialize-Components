<?php 

/*
@package Materialize-components 
*/

// To be triggered on uninstall

if (! defined( 'WP_UNINSTALL_PLUGIN') ) {
	die;
}


$materials = get_posts( array( 'post_type' => 'material', 'number_posts => -1'));

foreach ($materials as $material  ) {
	wp_delete_post( $postid, false );
}
