<?php

function theme_styles_scripts_including(){
	# Include Css Theme Styles
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css');

	# Include Bootstarp Css Library
	wp_enqueue_style('theme-bootstrap-lib', get_template_directory_uri() . '/inc/css/bootstrap.min.css');

	# Include Font Awesome Library
	# wp_enqueue_style('font-awesome-lib', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	# Include Bootstrap Js Libraries
	wp_enqueue_script('theme-bootstrap-lib', get_template_directory_uri() . '/inc/js/bootstrap.min.js');
	wp_enqueue_script('theme-jquery-lib', get_template_directory_uri() . '/inc/js/jquery.min.js');
	wp_enqueue_script('theme-popper', get_template_directory_uri() . '/inc/js/popper.min.js');

	# Script Js File
	wp_enqueue_script('theme-script', get_template_directory_uri() . '/inc/js/js_functions.js');
}

// Resources Including Action
add_action( 'wp_enqueue_scripts', 'theme_styles_scripts_including');