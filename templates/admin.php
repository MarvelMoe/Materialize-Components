<div class="wrap">
	<h1>Materialize Plugin Settings</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php 
			// output security fields
			settings_fields( 'materialize_options_group' );
			// slug - output settings section 
			do_settings_sections( 'material_component' );
			// serialize the options button
			submit_button( );
		?>
	</form>
</div>
<script>document.getElementById('csscheck').checked = true;</script>