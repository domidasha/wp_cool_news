<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
Plugin Name: Sidebar Widget Init Plugin
Plugin URI: http://www.example.com/textwidget
Description: An example plugin for news display
Version: 0.1
Author: domi
Author URI: http://www.example.com
License: GPL2 
 
    Copyright 2016 domi
 
    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License,
    version 2, as published by the Free Software Foundation. 
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/ 

/**
 * Adds Foo_Widget widget.
 */
class Sidebar_News_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'sidebar_new_widget', // Base ID
			__( 'Widget num_news', 'text_domain' ), // Name
			array( 'description' => __( 'A Sidebar New Widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {	
		
		
		
		
		$query = new WP_Query( array( 'author_name' => 'wordpressuser', 'post_type'=>'news' ) );
		echo '<ul>';
		while ( $query->have_posts() ) {
			$query->the_post();
			echo "<li><h2>".get_the_title(). "</h2><br>".
			the_excerpt()."</li>";
			
		}
		echo '</ul>';
		
		

	/*	$recent_posts = wp_get_recent_posts(array('post_type'=>'news'));
		echo '<ul>';
		foreach( $recent_posts as $recent ){
			
			echo '<li> <a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"].'</a> </li> ';
			
		};
		echo '</ul>';*/
		
		
		
		
// 		if ( ! empty( $instance['num_news'] ) ) {
// 			echo $args['before_num_news'] . apply_filters( 'widget_num_news', $instance['num_news'] ). $args['after_num_news'];
// 		}
// 		echo __( 'Hello, World!', 'text_domain' );
// 		echo $args['after_widget'];
	
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	
	public function form( $instance ) {
		var_dump($instance );
		$num_news = ! empty( $instance['num_news'] ) ? $instance['num_news'] : __( 'New num_news', 'text_domain' );
		?>
		<p>
		    <label for="<?php echo $this->get_field_id( 'num_news' ); ?>"><?php _e('News Number:', 'example'); ?></label>
		    <input id="<?php echo $this->get_field_id( 'num_news' ); ?>" name="<?php echo $this->get_field_name( 'num_news' ); ?>" value="<?php echo $instance['num_news']; ?>" style="width:100%;" />
		</p>
	 <p>
	    <input class="checkbox" type="checkbox" <?php checked( $instance['show_info'], true ); ?> id="<?php echo $this->get_field_id( 'show_info' ); ?>" name="<?php echo $this->get_field_name( 'show_info' ); ?>" />
	    <label for="<?php echo $this->get_field_id( 'show_info' ); ?>"><?php _e('Add Pictures?', 'example'); ?></label>
	</p> 
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['num_news'] = ( ! empty( $new_instance['num_news'] ) ) ? strip_tags( $new_instance['num_news'] ) : '';

		return $instance;
	}

} // class Foo_Widget


// register  widget
function register_sidebar_new_widget() { 
	register_widget( 'Sidebar_News_Widget' );
}
add_action( 'widgets_init', 'register_sidebar_new_widget' );


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


?>