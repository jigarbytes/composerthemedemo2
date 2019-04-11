<?php 
/**
 * 	Template Name: Sidebar/Home Page
*/
	get_header(); 
?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8">
			
			<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post(); ?>

					<article class="post">

						<?php if (!is_front_page()) : ?>
							<h1 class='title'><?php the_title(); ?></h1>
						<?php endif; ?>
										
						<div class="the-content">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; ?>

			<?php else : ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; ?>

		</div><!-- #content .site-content -->

		<div id="sidebar" role="sidebar" class="span4">
			<?php get_sidebar(); ?>
		</div><!-- #sidebar -->
		
	</div><!-- #primary .content-area -->

<?php get_footer(); ?>