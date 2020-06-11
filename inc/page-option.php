<?php
/*** Code for Theme Option Sub Page Starts Here ***/
function my_acf_options_page_settings( $settings ) {
	$settings['title'] = 'Theme Option';
	$settings['pages'] = array('Header Settings', 'Google Map Settings', 'General Setting','Footer Settings', '404 & Thank You Page Settings');
	return $settings;
}
add_filter('acf/options_page/settings', 'my_acf_options_page_settings');
/*** Code for Theme Option Sub Page Ends Here ***/
