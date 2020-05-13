<?php

function _themename_assets() {
    wp_enqueue_style( '_themename-stylesheet', get_template_directory_uri().'/dist/assets/css/bundle.css', array(),'1.0.0', 'all' );

    wp_enqueue_script('_themename-scripts', get_template_directory_uri().'/dist/assets/js/bundle.js',array('jquery'),'1.0.0.', true );
} 

add_action( 'wp_enqueue_scripts', '_themename_assets' );

function _themename_admin_assets() {
    wp_enqueue_style( '_themename-admin-stylesheet', get_template_directory_uri().'/dist/assets/css/admin.css', array(),'1.0.0', 'all' );
    
    wp_enqueue_script('_themename-admin-scripts', get_template_directory_uri().'/dist/assets/js/admin.js',array(), true );
} 

add_action( 'admin_enqueue_scripts', '_themename_admin_assets' );

function _themename_customize_preview() {
    wp_enqueue_script( '_themename_customize_preview', get_template_directory_uri().'/dist/assets/js/customize-preview.js', array('customize-preview', 'jquery'), '1.0.0.', true );
}

add_action( 'customize_preview_init', '_themename_customize_preview' );

function _themename_load_more_scripts() {

    global $wp_query; 
    
    wp_enqueue_script( '_themename-load-more', get_template_directory_uri() . '/dist/assets/js/load-more.js', array('jquery'), '1.0.0' , true );
 

	wp_localize_script( '_themename-load-more', 'performance_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		'posts' => json_encode( $wp_query->query_vars ),
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages,
        'is_home' => $wp_query->is_home
	) );
}
 
add_action( 'wp_enqueue_scripts', '_themename_load_more_scripts' );


?>