<?php

function jquery_init() {
	if (!is_admin()) {
		wp_enqueue_script('jquery');
	}
}
add_action('wp_enqueue_scripts', 'jquery_init');



function my_scripts_method() {
	$example = 'calculation_widget/example.js';
	$plugin = 'calculation_widget/myCountScript.js';
	wp_register_script( 'javascript', plugins_url($plugin));
	wp_enqueue_script( 'javascript', plugins_url($plugin));
	
	wp_enqueue_script( 'newscript', plugins_url($example));
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );





?>