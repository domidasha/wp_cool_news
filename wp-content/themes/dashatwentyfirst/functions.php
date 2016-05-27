<?php

/*загружаемые стили и скрипты*/
function load_style_script() {
	wp_enqueue_style('style', get_template_directory_uri().'/style.css');
}

/*загружаем стили и скрипты*/
add_action('wp_enqueue_scripts', 'load_style_script');



/*поддержка миниатюр*/
add_theme_support( 'post-thumbnails' );


/*menu*/
register_nav_menu('menu', 'Header Menu');


/*sidebar Left*/
register_sidebar(array(
	'name'=>'Sidebar widget',
	'id'=>'left-sidebar',
	'description'=>'Put here your widgets'
	));

/*sidebar Home*/
register_sidebar(array(
		'name'=>'Home Index Sidebar widget',
		'id'=>'sidebar-bottom',
		'description'=>'Put here your widgets'
));


/*sidebar Home*/
register_sidebar(array(
		'name'=>'Calculation Sidebar',
		'id'=>'sidebar-calculation',
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
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail', 'comments'),
			'has_archive'         => true,
			'rewrite'             => true,
			'query_var'           => true,
			'show_in_nav_menus'   => null,
	);

	register_post_type('news', $args );
}


add_action('init', 'pictures_init');
function pictures_init() {

	// описываем наш тип контента
	$args = array(
			'label' => __('Pictures'),
			'labels' => array(
					'edit_item' => __('Edit Picture'),
					'add_new_item' => __('Add New Picture'),
					'view_item' => __('View Picture'),
			),
			'singular_label' => __('Picture'),
			'public' => true,
			'publicly_queryable'  => true,
			'show_ui' => true, // показывать в админке?
			'_builtin' => false, // это не встроенный тип данных
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array("slug" => "medewerkers"), // формат ссылок
			'supports' => array('title', 'editor', 'thumbnail'),
			'taxonomies' => array( 'post_tag','pictures_categories'),
			'rewrite' => array('slug' => 'pictures/%themes_categories%','with_front' => FALSE),
			);
	
	// регистрируем новый тип
	register_post_type( 'pictures' , $args ); // первый параметр - это название нашего нового типа данных
}


function pictures_taxonomy() {
	register_taxonomy(
			'pictures_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
			'pictures',        //post type name
			array(
					'hierarchical' => true,
					'label' => 'Picture categories',  //Display name
					'query_var' => true,
					'rewrite' => array(
							'slug' => 'pictures', // This controls the base slug that will display before each term
							'with_front' => false // Don't display the category base before
					)
			)
			);
}
add_action( 'init', 'pictures_taxonomy');

function default_taxonomy_term( $post_id, $post ) {
	if ( 'publish' === $post->post_status ) {
		$defaults = array(
				'pictures_categories' => array( 'other'),   //

		);
		$taxonomies = get_object_taxonomies( $post->post_type );
		foreach ( (array) $taxonomies as $taxonomy ) {
			$terms = wp_get_post_terms( $post_id, $taxonomy );
			if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
				wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
			}
		}
	}
}
add_action( 'save_post', 'default_taxonomy_term', 100, 2 );

//Then to change the permalink
function filter_post_type_link($link, $post)
{
	if ($post->post_type != 'pictures')
		return $link;

		if ($cats = get_the_terms($post->ID, 'pictures_categories'))
			$link = str_replace('%pictures_categories%', array_pop($cats)->slug, $link);
			return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);

//чтобы работал shortcode
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );

//img size
add_image_size( 'homepage-thumb', 180, 180 );



?>

