<?php
	get_header();
?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8 offset2">

			<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post(); ?>

					<article class="post">
					
						<h1 class="title"><?php the_title(); ?></h1>
						
						<div class="the-content">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; ?>

			<?php else : ?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; ?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); ?>
