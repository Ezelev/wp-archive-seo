<?php 

/*
Plugin Name: Sample Plugin
Description: This is a test plugin 
*/

function get_custom_post_types() {

	$args = array(
		'_builtin' => false,
		'has_archive' => true
	);
  $post_types = get_post_types( $args );
  return $post_types;
}

add_action('init', 'get_custom_post_types');


