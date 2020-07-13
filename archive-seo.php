<?php 

/*
Plugin Name: Archive Page Meta
Description: Plugin enables additional submenus for editing CPT's archive pages
Author: Ilya Ezelev
Version: 0.1
*/

function get_custom_post_types() {

	$args = array(
		'_builtin' => false,
		'has_archive' => true
	);
    $post_types = get_post_types( $args );
    //
    if($_GET["test"] == "y") {
        dd($post_types);
    }
    //
	return $post_types;
}

add_action('init', 'get_custom_post_types');


add_action( 'admin_menu', 'custom_p_enable_pages' );
/**
 * Register admin pages for description field
 */

function custom_p_enable_pages() {

	$post_types = get_custom_post_types();

	foreach ( $post_types as $post_type ) {

		if( post_type_exists( $post_type ) ) {
            add_submenu_page( 'edit.php?post_type=' . $post_type, 
			'Дополнительная страница для работы с meta страниц разделов', 
			'Редактировать meta', 'manage_options', 
			'cpt-settings-page', 
			'archive_meta_settings_page' ); 

		} // end if

	} // end foreach

}

function archive_meta_settings_page() {
	// контент страницы
	$screen = get_current_screen();
	$post_type = $screen->post_type;
	$pt = get_post_type_object($post_type);
	?>
	<div class="wrap">
		<h2>Edit <?php echo $pt->labels->name; ?> meta</h2>
		<form action="options.php" method="POST">
			//TODO form fields
		<?php submit_button(); ?>
		</form>
	</div> <?php
}
