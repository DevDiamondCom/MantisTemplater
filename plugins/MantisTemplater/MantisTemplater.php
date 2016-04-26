<?php

/**
 * Mantis Templater plugin Class
 */
class MantisTemplaterPlugin extends MantisPlugin
{
	/**
	 * A method that populates the plugin information and minimum requirements.
	 *
	 * @return void
	 */
	function register()
	{
		$this->name = lang_get('plugin_MantisTemplater_title');
		$this->description = lang_get('plugin_MantisTemplater_description');
		$this->page = 'config';

		$this->version = '1.0';
		$this->requires = array(
			'MantisCore' => '1.3',
		);

		$this->author = 'DevDiamond';
		$this->contact = 'me@devdiamond.com';
		$this->url = 'https://github.com/DevDiamondCom/MantisTemplater';
	}

	/**
	 * Default plugin configuration.
	 *
	 * @return array
	 */
	function config()
	{
		return array(
			'templater_enable'	=> ON,
			'template_name' 	=> 'MantisTemplater-1.3.X',
			'send_comment_fix'  => ON,
			'brackets_fix'   	=> ON,
			'name_as_link_fix'  => ON,
			'add_tinymce'       => ON,
		);
	}

	/**
	 * Hooks
	 *
	 * @return array
	 */
	function hooks()
	{
        return array(
            'EVENT_LAYOUT_RESOURCES' => 'initializeHead',
            'EVENT_PLUGIN_INIT' => 'initializeConfigTemplates',
        );
    }

	/**
	 * initializeHead() - Header Code
	 *
	 * @param string $p_event
	 */
    function initializeHead($p_event)
	{
		// Template name
		$curent_template_folder_name = plugin_config_get( 'template_name' );

		if( ON == plugin_config_get( 'templater_enable' ) )
		{
			$path_to_custom_css = "./templates/" . $curent_template_folder_name . "/css/style.css";
			$path_to_custom_js = "./templates/" . $curent_template_folder_name . "/js/script.js";
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $path_to_custom_css . "\" />" . "\r\n";
			echo "<script src=\"" . $path_to_custom_js . "\"></script>" . "\r\n";
		}

		if( ON == plugin_config_get( 'send_comment_fix' ) )
			echo "<script src=\"./plugins/MantisTemplater/custom-features/send_comment_fix_for_v1.3.js\"></script>" . "\r\n";

		if( ON == plugin_config_get( 'brackets_fix' ) )
		{
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"./plugins/MantisTemplater/custom-features/brackets_fix_for_v1.3.css\"></script>" . "\r\n";
			echo "<script src=\"./plugins/MantisTemplater/custom-features/brackets_fix_for_v1.3.js\"></script>" . "\r\n";
		}
		
		if( ON == plugin_config_get( 'add_tinymce' ) )
		{
			echo "<script src=\"./plugins/MantisTemplater/custom-features/tinymce/tinymce.min.js\"></script>" . "\r\n";
			echo "<script src=\"./plugins/MantisTemplater/custom-features/add_tinymce.js\"></script>" . "\r\n";
		}		
		
		if( ON == plugin_config_get( 'name_as_link_fix' ) )
			echo "<script src=\"./plugins/MantisTemplater/custom-features/name_as_link_fix_for_v1.3.js\"></script>" . "\r\n";
	}

	/**
	 * initializeConfigTemplates() - Config Templates
	 *
	 * @param $p_event
	 */
	function initializeConfigTemplates($p_event)
	{
		global $g_absolute_path,
		       $g_logo_image,
		       $g_favicon_image,
//		       $g_status_icon_arr,
//		       $g_sort_icon_arr,
//		       $g_unread_icon_arr,
		       $g_css_rtl_include_file,
		       $g_css_include_file,
		       $g_meta_include_file;

		// Template name
		$curent_template_folder_name = plugin_config_get( 'template_name' );

		// Path configuration template file
		$configTemplateUrl = $g_absolute_path .'templates'. DIRECTORY_SEPARATOR . $curent_template_folder_name . DIRECTORY_SEPARATOR . 'config_template.php';

		// Loading a configuration template file
		if (file_exists($configTemplateUrl))
		{
			require_once($configTemplateUrl);

			// template URL
			$templateUrl = 'templates/'.$curent_template_folder_name.'/';

			// Correct data
			$g_logo_image = $templateUrl.$g_logo_image;
			$g_favicon_image = $templateUrl.$g_favicon_image;
//			foreach ($g_status_icon_arr as $sKey => $sVal)
//				$g_status_icon_arr[$sKey] = $templateUrl.$sVal;
//			foreach ($g_sort_icon_arr as $sKey => $sVal)
//				$g_sort_icon_arr[$sKey] = $templateUrl.$sVal;
//			foreach ($g_unread_icon_arr as $sKey => $sVal)
//				$g_unread_icon_arr[$sKey] = $templateUrl.$sVal;
			if ($g_css_rtl_include_file !== 'rtl.css')
				$g_css_rtl_include_file = $templateUrl.$g_css_rtl_include_file;
			if ($g_css_include_file !== 'default.css')
				$g_css_include_file = $templateUrl.$g_css_include_file;
			if ($g_meta_include_file !== '')
				$g_meta_include_file = $templateUrl.$g_meta_include_file;
		}
	}
}
