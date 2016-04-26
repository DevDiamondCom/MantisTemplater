<?php

// Global variables
global $g_window_title,
	   $g_logo_image,
	   $g_logo_url,
	   $g_favicon_image,
       $g_copyright_statement;


#####################
#   Your settings   #
#####################

$g_window_title         = 'Title Site';
$g_logo_image           = 'logo/logo.png';
$g_logo_url             = '%default_home_page%';         // ['%default_home_page%' => default url] or ['example.html' => Your page]
$g_favicon_image        = 'logo/favicon.ico';
$g_copyright_statement  = 'Your Copyright';


################
# Custom Menus #
################

global $g_main_menu_custom_options;
$g_main_menu_custom_options = array(
	//array("My Link",  MANAGER,       'my_link.php'),
	//array("My Link2", MANAGER,       'my_link2.php'),
	//array("My Link3", ADMINISTRATOR, 'my_link3.php')
);

####################
#   Config START   #
####################

global $g_bug_report_page_fields;
$g_bug_report_page_fields = array(
	'category_id',
	'handler',
	'priority',
	'product_version',
	'product_build',
	'target_version',
	'summary',
	'eta',
	'description',
	'attachments',
);

global $g_bug_view_page_fields;
$g_bug_view_page_fields = array (
	'id',
	'project',
	'category_id',
	'date_submitted',
	'last_updated',
	'reporter',
	'handler',
	'priority',
	'status',
	'eta',
	'summary',
	'description',
	'attachments',
);

global $g_bug_update_page_fields;
$g_bug_update_page_fields = array (
	'id',
	'project',
	'category_id',
	'date_submitted',
	'last_updated',
	'reporter',
	'handler',
	'priority',
	'status',
	'eta',
	'summary',
	'description',
	'attachments',
);

global $g_bug_change_status_page_fields;
$g_bug_change_status_page_fields = array (
	'id',
	'project',
	'category_id',
	'date_submitted',
	'last_updated',
	'reporter',
	'handler',
	'priority',
	'status',
	'eta',
	'summary',
	'description',
	'attachments',
);

global $g_status_colors;
$g_status_colors = array(
	'new'           => '#fcbdbd', // red    (scarlet red #ef2929)
	'feedback'      => '#e3b7eb', // purple (plum        #75507b)
	'acknowledged'  => '#ffcd85', // orange (orango      #f57900)
	'confirmed'     => '#fff494', // yellow (butter      #fce94f)
	'assigned'      => '#c2dfff', // blue   (sky blue    #729fcf)
	'resolved'      => '#d2f5b0', // green  (chameleon   #8ae234)
	'closed'        => '#c9ccc4'  // grey   (aluminum    #babdb6)
);

////global $g_status_icon_arr;
//$g_status_icon_arr = array (
//	NONE      => '',
//	LOW       => 'priority_low_1.gif',
//	NORMAL    => 'priority_normal.gif',
//	HIGH      => 'priority_1.gif',
//	URGENT    => 'priority_2.gif',
//	IMMEDIATE => 'priority_3.gif'
//);

//// Sort direction to icon mapping
//global $g_sort_icon_arr;
//$g_sort_icon_arr = array (
//	ASCENDING  => 'up.gif',
//	DESCENDING => 'down.gif'
//);

//// Read status to icon mapping
//global $g_unread_icon_arr;
//$g_unread_icon_arr = array (
//	READ   => 'mantis_space.gif',
//	UNREAD => 'unread.gif'
//);

// The padding level when displaying project ids
global $g_display_project_padding;
$g_display_project_padding = 3;

// The padding level when displaying bug ids
global $g_display_bug_padding;
$g_display_bug_padding = 7;

// The padding level when displaying bugnote ids
global $g_display_bugnote_padding;
$g_display_bugnote_padding = 7;

// Number of bugs shown in each box
global $g_my_view_bug_count;
$g_my_view_bug_count = 10;

global $g_show_avatar;
$g_show_avatar = ON;

global $g_use_javascript;
$g_use_javascript = ON;

global $g_login_title_visible;
$g_login_title_visible = OFF;

global $g_enable_eta;
$g_enable_eta = ON;

global $g_display_bug_padding;
$g_display_bug_padding = 0;

global $g_show_footer_menu;
$g_show_footer_menu = OFF;

global $g_show_project_menu_bar;
$g_show_project_menu_bar = OFF;

global $g_show_priority_text;
$g_show_priority_text = OFF;


#####################
#   Include files   #
#####################

global $g_css_rtl_include_file;
$g_css_rtl_include_file = 'rtl.css';

global $g_css_include_file;
$g_css_include_file = 'default.css';

global $g_meta_include_file;
$g_meta_include_file = '';


#######################
#   DateTime Config   #
#######################

global $g_default_timezone;
$g_default_timezone = 'Europe/Moscow';

global $g_time_tracking_enabled;
$g_time_tracking_enabled = ON;

global $g_time_tracking_with_billing;
$g_time_tracking_with_billing =ON;

global $g_short_date_format;
$g_short_date_format = 'd.m.y';

global $g_normal_date_format;
$g_normal_date_format = 'd.m.y H:i';

global $g_complete_date_format;
$g_complete_date_format = 'd.m.Y H:i';


############################
#   Status Legend Config   #
############################

/**
 * Position of the status color legend
 * Allowed values are:
 * - STATUS_LEGEND_POSITION_NONE - do not display the legend at all
 * - STATUS_LEGEND_POSITION_TOP
 * - STATUS_LEGEND_POSITION_BOTTOM (default)
 * - STATUS_LEGEND_POSITION_BOTH
 * @global integer $g_status_legend_position
 */
global $g_status_legend_position;
$g_status_legend_position = STATUS_LEGEND_POSITION_BOTTOM;


##########################
#   Add TinyMCE Editor   #
##########################

global $g_html_valid_tags;
$g_html_valid_tags = 'p, li, ul, ol, br, pre, i, b, u, em, strong, div, table, tr, td, strike, h1, h2, h3, h4, h5, h6, hr';
