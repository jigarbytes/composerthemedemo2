<?php
	get_header();
?>
  <!-- Page Content -->
  	<div class="container">
    	<div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-12">

        	<h1 class="my-4"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

        	<!-- Blog Post -->
        	<?php 
        		if ( have_posts() ) : 
					while ( have_posts() ) : the_post(); ?>
						<div class="card mb-4">
				         <?php the_post_thumbnail( array( 750, 300 ) ); ?>
				         <div class="card-body">
   				         <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            				By, <a href="#"><?php the_author(); ?></a>
            				<p class="card-text"><?php the_content(); ?></p>
          				</div>
        				</div>
					<?php 
					endwhile;
				endif;
			?>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<?php get_footer(); ?>