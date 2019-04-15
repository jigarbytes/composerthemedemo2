<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<?php  global $redux_demo; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php 
      if(array_key_exists('media-no-url',$redux_demo)){
			$favicon_log_src = $redux_demo['media-no-url']['url'];
	?>
        <link rel="shortcut icon" href="<?php echo $favicon_log_src; ?>"/>
      <?php 
      }
   ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container-fluid">
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
     
	 <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
         <?php 
            $site_log_src = $redux_demo['opt-media']['url'];
            if(!empty($site_log_src)){ ?>
               <img src="<?php echo $site_log_src; ?>" width="70" alt="<?php echo bloginfo( 'name' );?>">
               <?php 
            } else {
               echo bloginfo( 'name' );
            }
         ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
		<?php 
			if ( has_nav_menu( 'menu-1' ) ) :
			 wp_nav_menu( array( 'theme_location' => 'menu-1',
				'container'       => false, 
				'items_wrap'=>'<ul class="navbar-nav ml-auto">%3$s</ul>'
				
			 ) );
			endif; 
		  ?>
      </div>
    </div>
  </nav>
</div>