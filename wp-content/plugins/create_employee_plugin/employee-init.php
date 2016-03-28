<?php
//Register new post type Employee
add_action( 'init', 'employee_init' );
/**
 * Register an employee post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function employee_init() {
	$labels = array(
			'name'               => _x( 'Employees', 'post type general name', 'your-plugin-textdomain' ),
			'singular_name'      => _x( 'Employee', 'post type singular name', 'your-plugin-textdomain' ),
			'menu_name'          => _x( 'Employees', 'admin menu', 'your-plugin-textdomain' ),
			'name_admin_bar'     => _x( 'Employee', 'add new on admin bar', 'your-plugin-textdomain' ),
			'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
			'add_new_item'       => __( 'Add New Employee', 'your-plugin-textdomain' ),
			'new_item'           => __( 'New Employee', 'your-plugin-textdomain' ),
			'edit_item'          => __( 'Edit Employee', 'your-plugin-textdomain' ),
			'view_item'          => __( 'View Employee', 'your-plugin-textdomain' ),
			'all_items'          => __( 'All Employees', 'your-plugin-textdomain' ),
			'search_items'       => __( 'Search Employees', 'your-plugin-textdomain' ),
			'parent_item_colon'  => __( 'Parent Employees:', 'your-plugin-textdomain' ),
			'not_found'          => __( 'No employees found.', 'your-plugin-textdomain' ),
			'not_found_in_trash' => __( 'No employees found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'book' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
	);

	register_post_type( 'employee', $args );
}
?>