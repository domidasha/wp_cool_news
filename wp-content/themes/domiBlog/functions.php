<?php

/************************/
/** Define Constants **/
/**********************/

define('THEMEDIR', get_stylesheet_directory_uri());
define('IMG', THEMEDIR.'/images');

/************************/
/** Register Menus **/
/**********************/

add_action('init', 'register_my_menus');
function register_my_menus() {
	register_nav_menus(array(
			'main-menu' => 'Main Menu'
	));
}

?>
