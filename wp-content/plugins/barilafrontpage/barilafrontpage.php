<?php
/*
Plugin Name: Barila Frontpage
Version: 0.1
Description: Plugin for the Barila website frontpage.
Author: Penar Musaraj
Author URI: http://www.curiousfish.org
*/

add_action('admin_init', 'barilafrontpage_init' );
add_action('admin_menu', 'barilafrontpage_add_page');

// Init plugin options to white list our options
function barilafrontpage_init(){
	register_setting( 'barilafrontpage_options', 'barila_front', 'barilafrontpage_validate' );
}

// Add menu page
function barilafrontpage_add_page() {
	add_options_page('Barila Frontpage Options', 'Barila Frontpage', 'manage_options', 'barilafrontpage', 'barilafrontpage_do_page');
}

// Draw the menu page itself
function barilafrontpage_do_page() {
	?>
	<div class="wrap">
		<h2>Barila Frontpage Options</h2>
		<form method="post" action="options.php">
			<?php settings_fields('barilafrontpage_options'); ?>
			<?php $options = get_option('barila_front'); ?>
			<table class="form-table">
			<?php 
				// 9 = total of slides +1
				for ($i=1; $i < 10; $i++) { 
			?>
				<tr style="border-top:1px solid #CCC;" valign="top"><th scope="row"><h3>Element #<?php echo $i; ?></h3></th>
					<td></td>
				</tr>
				<tr valign="top"><th scope="row">Title</th>
					<td><input type="text" size="25" name="barila_front[catname<?php echo $i; ?>]" value="<?php echo $options["catname$i"]; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row">Image URL</th>
					<td><input type="text" size="40" name="barila_front[imgurl<?php echo $i; ?>]" value="<?php echo $options["imgurl$i"]; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row">Link</th>
					<td><input type="text" size="40" name="barila_front[link<?php echo $i; ?>]" value="<?php echo $options["link$i"]; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row">Class</th>
					<td><input type="text" size="25" name="barila_front[class<?php echo $i; ?>]" value="<?php echo $options["class$i"]; ?>" /></td>
				</tr>
			<?php
				}
			?>

			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
	<?php	
}

// Sanitize and validate input. Accepts an array, return a sanitized array.
function barilafrontpage_validate($input) {
	// Our first value is either 0 or 1
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
	
	// Say our second option must be safe text with no HTML tags
	$input['sometext'] =  wp_filter_nohtml_kses($input['sometext']);
	
	return $input;
}

?>