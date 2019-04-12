<?php 
/**
 * Enqueue scripts and styles.
 */
function register_scripts() {
	
	$minify = '';
	if(WP_ENV != 'development') $minify = '.min';
	
	wp_enqueue_style( 'twentynineteen-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	
	
	wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri().'/node_modules/bootstrap/dist/css/bootstrap'.$minify.'.css', array(), wp_get_theme()->get( 'Version' ) );
	
	
	wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri().'/assets/css/style'.$minify.'.css', array(), wp_get_theme()->get( 'Version' ) );
	
	wp_enqueue_script('custom_script', get_template_directory_uri() . '/assets/js/custom'.$minify.'.js', array(), wp_get_theme()->get( 'Version' ), true );
	
	

	/*if ( has_nav_menu( 'menu-1' ) ) {
		wp_enqueue_script( 'twentynineteen-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.1', true );
		wp_enqueue_script( 'twentynineteen-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '1.1', true );
	}*/

	//wp_enqueue_style( 'twentynineteen-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	//if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		//wp_enqueue_script( 'comment-reply' );
	//}
}
add_action( 'wp_enqueue_scripts', 'register_scripts' );



?>