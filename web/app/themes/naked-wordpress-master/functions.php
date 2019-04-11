<?php
   define( 'NAKED_VERSION', 1.0 );

if ( ! isset( $content_width ) ) $content_width = 900;

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

register_nav_menus( 
   array(
      'primary'   => __( 'Primary Menu', 'naked' ),
   )
);

require get_template_directory() . '/inc/bootstrap-nav-menu-walker.php';
require get_template_directory() . '/inc/post-type.php';
require get_template_directory() . '/inc/gallery-metabox.php';


function naked_register_sidebars() {
   register_sidebar(array(
      'id' => 'sidebar',
      'name' => 'Sidebar',
      'description' => 'Take it on the side...', 
      'before_widget' => '<div>',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="side-title">',
      'after_title' => '</h3>',
      'empty_title'=> '',
   ));
} 
add_action( 'widgets_init', 'naked_register_sidebars' );

function naked_scripts()  { 
   wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');

   wp_enqueue_script( 'naked-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), NAKED_VERSION, true );   
   wp_enqueue_script( 'naked', get_template_directory_uri() . '/js/theme.min.js', array(), NAKED_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'naked_scripts' );


function admin_load_scripts() {
   wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', array(), NAKED_VERSION, true );

   wp_enqueue_style('custom.css', get_stylesheet_directory_uri() . '/css/custom.css');


}
add_action( 'admin_enqueue_scripts', 'admin_load_scripts' );