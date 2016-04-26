<?php
// Headers
auth_reauthenticate();
access_ensure_global_level( config_get('manage_plugin_threshold'));
html_page_top( lang_get('plugin_MantisTemplater_edit_page_title'));

// Menu
print_manage_menu();

/**
 * All the names of the templates out of the way - templates
 *
 * @return array
 */
function get_template_dir()
{
	$files_and_dirs = scandir(config_get( 'absolute_path' ) . "templates/");
	$i = 0;
	$result_array = array();
	foreach($files_and_dirs as $item)
	{
		if (is_dir(config_get('absolute_path')."templates/".$item) && $item != "." && $item != "..")
		{
			$result_array[$i] = $item;	
			$i++;
		}
	}
	return $result_array;
}
?>

<br />
<form action="<?php echo plugin_page( 'config_edit' )?>" method="post">
	<?= form_security_field( 'plugin_MantisTemplater_config_edit' ); ?>
	<table align="center" class="width50" cellspacing="1">
		<tr>
			<td class="form-title" colspan="3">
				<?= lang_get('plugin_MantisTemplater_edit_page_name_dec') ?>
				<span class="small">(<?= lang_get('plugin_MantisTemplater_edit_page_name_dec') ?>: <b> <?= MANTIS_VERSION  . config_get_global( 'version_suffix' ); ?> </b>)</span>
			</td>
		</tr>
		
		<tr <?= helper_alternate_class( )?>>
			<td class="category" width="60%">
				<?= lang_get('plugin_MantisTemplater_edit_page_status_template') ?>
				<span class="small">(<?= lang_get('plugin_MantisTemplater_edit_page_status_template_dec') ?>)</span>
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="templater_enable" value="1" <?=( ON == plugin_config_get( 'templater_enable' ) ) ? 'checked="checked" ' : ''?>/>
				<?= lang_get('plugin_MantisTemplater_on') ?>
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="templater_enable" value="0" <?=( OFF == plugin_config_get( 'templater_enable' ) ) ? 'checked="checked" ' : ''?>/>
				<?= lang_get('plugin_MantisTemplater_off') ?>
			</td>
		</tr>

		<tr <?= helper_alternate_class( )?>>
			<td class="category" width="60%">
				<?= lang_get('plugin_MantisTemplater_edit_page_current_template') ?>
			</td>
			<td class="center" colspan="2">
				<select name="template_name" style="width: 50%;">
					<?php
						$selected_item_name = plugin_config_get('template_name');
						$folders = get_template_dir();
						foreach ($folders as $item)
						{
							if (plugin_config_get( 'template_name' ) == $item)
								echo "<option value=\"" . $item . "\" selected=\"selected\">" . $item . "</option>";
							else
								echo "<option value=\"" . $item . "\">" . $item . "</option>";
						}
					?>
				</select>
			</td>
		</tr>
			
		<tr <?= helper_alternate_class( )?>>
			<td class="category" width="60%">
				<?= lang_get('plugin_MantisTemplater_edit_page_ctrl_enter') ?>
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="send_comment_fix" value="1" <?=( ON == plugin_config_get( 'send_comment_fix' ) ) ? 'checked="checked" ' : ''?>/>
				<?= lang_get('plugin_MantisTemplater_on') ?>
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="send_comment_fix" value="0" <?=( OFF == plugin_config_get( 'send_comment_fix' ) ) ? 'checked="checked" ' : ''?>/>
				<?= lang_get('plugin_MantisTemplater_off') ?>
			</td>
		</tr>

		<tr <?= helper_alternate_class( )?>>
			<td class="category" width="60%">
				<?= lang_get('plugin_MantisTemplater_edit_page_braces') ?>
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="brackets_fix" value="1" <?=( ON == plugin_config_get( 'brackets_fix' ) ) ? 'checked="checked" ' : ''?>/>
				<?= lang_get('plugin_MantisTemplater_on') ?>
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="brackets_fix" value="0" <?=( OFF == plugin_config_get( 'brackets_fix' ) ) ? 'checked="checked" ' : ''?>/>
				<?= lang_get('plugin_MantisTemplater_off') ?>
			</td>
		</tr>

		<tr <?= helper_alternate_class( )?>>
			<td class="category" width="60%">
				<?= lang_get('plugin_MantisTemplater_edit_page_incident') ?>
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="name_as_link_fix" value="1" <?=( ON == plugin_config_get( 'name_as_link_fix' ) ) ? 'checked="checked" ' : ''?>/>
				<?= lang_get('plugin_MantisTemplater_on') ?>
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="name_as_link_fix" value="0" <?=( OFF == plugin_config_get( 'name_as_link_fix' ) ) ? 'checked="checked" ' : ''?>/>
				<?= lang_get('plugin_MantisTemplater_off') ?>
			</td>
		</tr>
		
		<tr <?= helper_alternate_class( )?>>
			<td class="category" width="60%">
				<?= lang_get('plugin_MantisTemplater_edit_page_tinymce') ?>
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="add_tinymce" value="1" <?=( ON == plugin_config_get( 'add_tinymce' ) ) ? 'checked="checked" ' : ''?>/>
				<?= lang_get('plugin_MantisTemplater_on') ?>
			</td>
			<td class="center" width="20%">
				<label><input type="radio" name="add_tinymce" value="0" <?=( OFF == plugin_config_get( 'add_tinymce' ) ) ? 'checked="checked" ' : ''?>/>
				<?= lang_get('plugin_MantisTemplater_off') ?>
			</td>
		</tr>

		<tr>
			<td class="center" colspan="3">
				<input type="submit" class="button" value="<?= lang_get( 'change_configuration' )?>" />
			</td>
		</tr>
	</table>
</form>

<?php
// Footer
html_page_bottom();
