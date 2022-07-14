<?php

/**
 * Plugin Name: Custom Message
 * Plugin URI: #
 * Description: Custom Message Plugin.
 * Author: Mili Jovicic
 * Version: 1.0.0
 * Text Domain: custom-message
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */
 
/**
 * Adding Submenu under Settings Tab
 *
 * @since 1.0
 */


function csm_add_menu() {
	add_submenu_page ( "options-general.php", "Custom Message", "Custom Message Plugin", "manage_options", "csm-page", "csm_hello_world_page" );
}
add_action ( "admin_menu", "csm_add_menu" );
 
/**
 * Setting Page Options
 * - add setting page
 * - save setting page
 *
 * @since 1.0
 */
function csm_hello_world_page() {
	?>
<div class="wrap">
	<h1>
		Show Custom Message 
	</h1>
 
	<form method="post" action="options.php">
            <?php
	settings_fields ( "csm_hello_world_config" );
	do_settings_sections ( "csm-page" );
	submit_button ();
	?>
         </form>
</div>
 
<?php
}
 
/**
 * Init setting section, Init setting field and register settings page
 *
 */
function csm_hello_world_settings() {
	add_settings_section ( "csm_hello_world_config", "", null, "csm-page" );
	add_settings_field ( "csm-text", "Textbox", "csm_hello_world_options", "csm-page", "csm_hello_world_config" );
	register_setting ( "csm_hello_world_config", "csm-text" );
}
add_action ( "admin_init", "csm_hello_world_settings" );
 

function csm_hello_world_settings_2() {
	add_settings_section ( "csm_hello_world_config_2", "", null, "csm-page" );
	add_settings_field ( "csm-text-2", "Textbox", "csm_hello_world_options_2", "csm-page", "csm_hello_world_config_2" );
	register_setting ( "csm_hello_world_config", "csm-text-2" );
}
add_action ( "admin_init", "csm_hello_world_settings_2" );

/**csm_hello_world_settings
 * Add simple textfield value to setting page
 *
 */
function csm_hello_world_options() {
	?>
<div class="postbox" style="width: 60%; padding: 30px;">
<h1>Url To Include</h1>	
<textarea type="text" rows="5" cols="40" name="csm-text"
		value="<?php
	echo stripslashes_deep ( esc_attr ( get_option ( 'csm-text' ) ) );
	?>" /> <?php
	echo stripslashes_deep ( esc_attr ( get_option ( 'csm-text' ) ) );
	?> </textarea>
    <p>Add Url Slugs</p>
</div>


<?php
}

function csm_hello_world_options_2() {
	?>
<div class="postbox" style="width: 60%; padding: 30px;">
<h1>Url To Exclude</h1>	
<textarea type="text" rows="5" cols="40" name="csm-text-2"
		value="<?php
	echo stripslashes_deep ( esc_attr ( get_option ( 'csm-text-2' ) ) );
	?>" /> <?php
	echo stripslashes_deep ( esc_attr ( get_option ( 'csm-text-2' ) ) );
	?> </textarea>
    <p>Add Url Slugs</p>
</div>


<?php
}
 
/**
 * Append saved textfield value to each page
 *
 */


add_action ( 'wp_footer', 'csm_com_content' ); 

function csm_com_content($content) {
    $slug = get_queried_object()->post_name;
	$slug = str_replace('-',' ',$slug);
	$slug1 = get_queried_object()->post_name;
	$input = stripslashes_deep ( esc_attr ( get_option ( 'csm-text' ) ) );
	$slugs = explode(PHP_EOL,$input);
	if(count($slugs)== 0) {
		?>
			<style>
			div.l-subheader.at_top {
				display: block!important;
				background: #5bc5f2!important;
    			color: #000000;
			}
			@media and (max-width: 480px) {
				div.l-subheader.at_top {
					display: none;
				}		
			}
			@media (min-width: 900px)
				.l-header.bg_transparent:not(.sticky) .l-subheader {
    				box-shadow: none!important;
    				background: #5bc5f2!important;
				}
			}
			</style>

		<?php 
	}

	else {
		foreach($slugs as $i) {
		if(str_contains($slug, trim($i))) { ?>
			<style>
			div.l-subheader.at_top {
				display: block!important;
				background: #5bc5f2!important;
    			color: #000000;
			}
			@media and (max-width: 480px) {
				div.l-subheader.at_top {
					display: none;
				}		
			}
			@media (min-width: 900px)
				.l-header.bg_transparent:not(.sticky) .l-subheader {
    				box-shadow: none!important;
    				background: #5bc5f2!important;
				}
			}
			</style>

		<?php }
	}
	}
	foreach($slugs as $i){
		if (str_contains($slug1, trim($i))) {?>
			<style>
			div.l-subheader.at_top {
				display: block!important;
				background: #5bc5f2!important;
    			color: #000000;
			}
			@media and (max-width: 480px) {
				div.l-subheader.at_top {
					display: none;
				}		
			}
			@media (min-width: 900px)
				.l-header.bg_transparent:not(.sticky) .l-subheader {
    				box-shadow: none!important;
    				background: #5bc5f2!important;
				}
			}
			</style>

		<?php 
	}
	}
    
}

add_action ( 'wp_footer', 'csm_com_content_2' ); 

function csm_com_content_2($content) {
    $slug = get_queried_object()->post_name;
	$slug = str_replace('-',' ',$slug);
	$slug1 = get_queried_object()->post_name;
	$input = stripslashes_deep ( esc_attr ( get_option ( 'csm-text-2' ) ) );
	$slugs = explode(PHP_EOL,$input);
	if(count($slugs)== 0) {
		?>
			<style>
			div.l-subheader.at_top {
				display: none!important;
				background: #5bc5f2!important;
    			color: #000000;
			}
			@media and (max-width: 480px) {
				div.l-subheader.at_top {
					display: none;
				}		
			}
			@media (min-width: 900px)
				.l-header.bg_transparent:not(.sticky) .l-subheader {
    				box-shadow: none!important;
    				background: #5bc5f2!important;
				}
			}
			</style>

		<?php 
	}

	else {
		foreach($slugs as $i) {
		if(str_contains($slug, trim($i))) { ?>
			<style>
			div.l-subheader.at_top {
				display: none!important;
				background: #5bc5f2!important;
    			color: #000000;
			}
			@media and (max-width: 480px) {
				div.l-subheader.at_top {
					display: none;
				}		
			}
			@media (min-width: 900px)
				.l-header.bg_transparent:not(.sticky) .l-subheader {
    				box-shadow: none!important;
    				background: #5bc5f2!important;
				}
			}
			</style>

		<?php }
	}
	}
	foreach($slugs as $i){
		if (str_contains($slug1, trim($i))) {?>
			<style>
			div.l-subheader.at_top {
				display: none!important;
				background: #5bc5f2!important;
    			color: #000000;
			}
			@media and (max-width: 480px) {
				div.l-subheader.at_top {
					display: none;
				}		
			}
			@media (min-width: 900px)
				.l-header.bg_transparent:not(.sticky) .l-subheader {
    				box-shadow: none!important;
    				background: #5bc5f2!important;
				}
			}
			</style>

		<?php 
	}
	}
    
}

add_action ( 'wp_footer', 'check_messages' ); 

function check_messages($content) {
	$input1 = stripslashes_deep ( esc_attr ( get_option ( 'csm-text' ) ) );
	$input2 = stripslashes_deep ( esc_attr ( get_option ( 'csm-text-2' ) ) );

	if(strlen($input1)==0 && strlen($input2)==0) { ?>
		<style>
			div.l-subheader.at_top {
				display: block!important;
				background: #5bc5f2!important;
    			color: #000000;
			}
			@media and (max-width: 480px) {
				div.l-subheader.at_top {
					display: none;
				}		
			}
			@media (min-width: 900px)
				.l-header.bg_transparent:not(.sticky) .l-subheader {
    				box-shadow: none!important;
    				background: #5bc5f2!important;
				}
			}
			</style>
	<?php
	}
}