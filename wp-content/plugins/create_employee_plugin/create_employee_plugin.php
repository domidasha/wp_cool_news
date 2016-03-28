<?php
include_once('employee-init.php');
/*
 Plugin Name: Create Employee Plugin
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

class Create_Employee_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
				'widget_Employee',
				'Widgets for Employees Display',
				array( 'description' => __( 'Nice Widget for Employees Display!', 'text_domain' ), )
				);
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	public function form( $instance ) {
		?>
           <p>
                 <label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label>
                 <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                  name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
                  value="<?php echo $instance['title']; ?>" />
           </p>

    <?php  }
     public function widget( $args, $instance ) {

           $query = new WP_Query( array( 'post_type'=>'employee' ) );
		echo '<ul>';
		while ( $query->have_posts() ) {
			echo "<li><h2>".get_the_title(). "</h2><br>".
			$query->the_post();			
			the_excerpt()."</li>";
			
		}
		echo '</ul>';
	}
}

add_action( 'widgets_init', function(){
     register_widget( 'Create_Employee_Widget' );
});

?>