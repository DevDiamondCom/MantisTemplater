<?php
form_security_validate('plugin_MantisTemplater_config_edit');
auth_reauthenticate();
access_ensure_global_level( config_get('manage_plugin_threshold'));

$f_templater_enable  = gpc_get_int('templater_enable', ON);
$f_template_name     = gpc_get_string('template_name', ON);
$f_send_comment_fix  = gpc_get_int('send_comment_fix', ON);
$f_brackets_fix      = gpc_get_int('brackets_fix', ON);
$f_name_as_link_fix  = gpc_get_int('name_as_link_fix', ON);
$f_add_tinymce       = gpc_get_int('add_tinymce', ON);

if (plugin_config_get('templater_enable') != $f_templater_enable)
	plugin_config_set('templater_enable', $f_templater_enable);

if (plugin_config_get('template_name') != $f_template_name)
	plugin_config_set('template_name', $f_template_name);

if (plugin_config_get('send_comment_fix') != $f_send_comment_fix)
	plugin_config_set('send_comment_fix', $f_send_comment_fix);

if (plugin_config_get('brackets_fix') != $f_brackets_fix)
	plugin_config_set('brackets_fix', $f_brackets_fix);

if (plugin_config_get('name_as_link_fix') != $f_name_as_link_fix)
	plugin_config_set('name_as_link_fix', $f_name_as_link_fix);

if (plugin_config_get('add_tinymce') != $f_add_tinymce)
	plugin_config_set('add_tinymce', $f_add_tinymce);

form_security_purge('plugin_MantisTemplater_config_edit');
print_successful_redirect( plugin_page('config', true));
