<?php  	get_header(); ?>
  <!-- Page Content -->
  	<div class="container">
    	<div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8">
        	<h1 class="my-4"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

        	 	<!-- Blog Post -->
           	<?php 
           		if ( have_posts() ) : 
   					while ( have_posts() ) : the_post(); 
					
					get_template_part( 'template-parts/content/content' );
					
   					endwhile; ?>
					
					 <!-- Pagination -->
					<ul class="pagination justify-content-center mb-4">
						<li class="page-item past-page"><?php previous_posts_link( 'Newer' ); ?></li> 
						<li class="page-item next-page"><?php next_posts_link( 'Older' ); ?></li>
				</ul>
				<?php 
  
				else:
				// If no content, include the "No posts found" template.
					get_template_part( 'template-parts/content/content', 'none' );
				endif;
   			?>
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