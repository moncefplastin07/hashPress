<?php
function register_theme_menus(){
	register_nav_menus(array('top-menu','header-menu-nav'));
}
add_action( 'init', 'register_theme_menus' );
?>
