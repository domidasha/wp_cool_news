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

/* Register new post type */
add_action('init', 'register_post_types');
function register_post_types() {
	$labels = array(
			'name'               => 'News', // основное название для типа записи
			'singular_name'      => 'Item of News', // название для одной записи этого типа
			'add_new'            => 'Add new', // для добавления новой записи
			'add_new_item'       => 'Add more news', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit news', // для редактирования типа записи
			'new_item'           => 'New Item', // текст новой записи
			'view_item'          => 'view news', // для просмотра записи этого типа.
			'search_items'       => 'search news', // для поиска по этим типам записи
			'not_found'          => 'no news', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'no items in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родительских типов. для древовидных типов
			'menu_name'          => 'News', // название меню
	);
	$args = array(
			'labels' => $labels,
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => null,
			'menu_icon'           => null,
			'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail', 'comments'),
			'has_archive'         => true,
			'rewrite'             => true,
			'query_var'           => true,
			'show_in_nav_menus'   => null,
	);

	register_post_type('news', $args );
}



//чтобы работал shortcode
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );





?>

