<?php

/*загружаемые стии и скрипты*/
function load_style_script() {
	wp_enqueue_style('style', get_template_directory_uri().'/style.css');
}

/*загружаем стили и скрипты*/
add_action('wp_enqueue_scripts', 'load_style_script');



/*поддержка миниатюр*/
add_theme_support( 'post-thumbnails' );


/*menu*/
register_nav_menu('menu', 'Header Menu');

// function register_nav_menus() {
// 	register_nav_menus(
// 			array(
// 				'header-menu' => __( 'Header Menu' ),
// 				"menu-1" => __( 'Menu 1' ),
// 				"menu-2" => __( 'Menu 2' ),
// 				"menu-3" => __( 'Menu 3' ),
// 			)			
// 	);
// }
// add_action( 'init', 'register_nav_menus' );

/*sidebar*/
register_sidebar(array(
	'name'=>'Sidebar widgets',
	'id'=>'left-sidebar',
	'description'=>'Put here your widgets'
	));




?>

