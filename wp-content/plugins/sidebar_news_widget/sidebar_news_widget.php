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
			echo "<li><h2>".get_the_title(). "</h2><br>".
			$query->the_post();			
			the_excerpt()."</li>";
			
		}
		echo '</ul>';
			
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




?>