<?php
	get_header();
?>
  <!-- Page Content -->
  	<div class="container">
    	<div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        	<h1 class="my-4"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

        	<!-- Blog Post -->
        	<?php 
        		if ( have_posts() ) : 
					while ( have_posts() ) : the_post(); ?>
						<div class="card mb-4">
				         <?php the_post_thumbnail( array( 750, 300 ) ); ?>
				         <div class="card-body">
   				         <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            					<p class="card-text"><?php the_content(); ?></p>
            					<a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More &rarr;</a>
          				</div>
          				
          				<div class="card-footer text-muted">
            				Posted on <?php the_time('M d, Y'); ?> by
            				<a href="#"><?php the_author(); ?></a>
          				</div>
        				</div>
					<?php 
					endwhile;
				endif;
			?>
       

        <!-- Pagination -->
        	<ul class="pagination justify-content-center mb-4">
          	<li class="page-item past-page page-link"><?php previous_posts_link( 'newer' ); ?></li>
				<li class="page-item next-page page-link"><?php next_posts_link( 'older' ); ?></li>
        	</ul>

        	<!-- <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul> -->

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4 sidebar-widget" style="margin-top: 4%;">
      	<?php 
      		if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
					<ul id="sidebar">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</ul>
					<?php 
				endif; 
			?>
      </div>

    	</div> <!-- /.row -->
  	</div> <!-- /.container -->

<?php get_footer(); ?>