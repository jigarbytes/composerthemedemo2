<?php 
// <!doctype html>
?>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container-fluid">
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
	  
		<?php if ( has_nav_menu( 'menu-1' ) ) : 
			function add_classes_on_li($classes, $item, $args) {
			  $classes[] = 'nav-item';
			  return $classes;
			}
			add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );
			function wpse156165_menu_add_class( $atts, $item, $args ) {
				$class = 'nav-link'; // or something based on $item
				$atts['class'] = $class;
				return $atts;
			}
			add_filter('nav_menu_css_class','add_classes_on_li',1,3); 
			
			 wp_nav_menu( array( 'theme_location' => 'menu-1',
				'container'       => false, 
				'items_wrap'=>'<ul class="navbar-nav ml-auto">%3$s</ul>'
				
			 ) );
	
		 endif; ?>
      </div>
    </div>
  </nav>
</div>