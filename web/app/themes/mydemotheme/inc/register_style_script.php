<?php 
/**
 * Enqueue scripts and styles.
 */
function register_scripts() {
	
	$minify = '';
	if(WP_ENV != 'development') $minify = '.min';
		
		wp_enqueue_script('jquery');
			
		wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri().'/node_modules/bootstrap/dist/css/bootstrap'.$minify.'.css', array(), wp_get_theme()->get( 'Version' ) );
	
		wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri().'/assets/css/style'.$minify.'.css', array(), wp_get_theme()->get( 'Version' ) );
	
		wp_enqueue_style( 'lightbox', get_stylesheet_directory_uri().'/node_modules/lightbox2/dist/css/lightbox'.$minify.'.css', array(), wp_get_theme()->get( 'Version' ) );

		wp_enqueue_script('lightbox', get_template_directory_uri() . '/node_modules/lightbox2/dist/js/lightbox'.$minify.'.js', array(), wp_get_theme()->get( 'Version' ), true );


		$minify = '';
		wp_enqueue_script( 'custom-view', get_template_directory_uri() . '/assets/js/custom.js', array(),wp_get_theme()->get( 'Version' ), true );

}
add_action( 'wp_enqueue_scripts', 'register_scripts' );
function admin_enque_script(){
	$minify = '';

	// if(WP_ENV != 'development') $minify = '.m      in';
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/assets/js/custom-admin'.$minify.'.js', array(),  wp_get_theme()->get( 'Version' ) , true );

   wp_enqueue_style('custom.css', get_stylesheet_directory_uri() . '/assets/css/custom'.$minify.'.css',  wp_get_theme()->get( 'Version' ));
}
?>