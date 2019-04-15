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

}
add_action( 'wp_enqueue_scripts', 'register_scripts' );


function admin_enque_script(){
	
	$minify = '';
	if(WP_ENV != 'development') $minify = '.min';
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/assets/js/custom-admin'.$minify.'.js', array(),  wp_get_theme()->get( 'Version' ) , true );

   wp_enqueue_style('custom.css', get_stylesheet_directory_uri() . '/assets/css/custom'.$minify.'.css',  wp_get_theme()->get( 'Version' ));
}
add_action( 'admin_enqueue_scripts', 'admin_enque_script' );
add_action( 'wp_enqueue_scripts', 'admin_enque_script' );

?>