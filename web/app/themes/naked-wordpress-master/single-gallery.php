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
							<div class="post-img">
								<?php 
									if ( has_post_thumbnail() ) {
										the_post_thumbnail( 'full' );
									}
								?>
							</div>
							<?php the_content(); ?>
							<?php 
								$image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
								if(!empty($image_gallery)) {
									$thePostIdArray = explode(', ', $image_gallery);
									// print_r($thePostIdArray);
								   foreach ( $thePostIdArray as $image ) {
								      // echo '<li>';
								      print_r($thePostIdArray);
								      echo wp_get_attachment_image( $image, 'thumbnail' );
								      // echo '</li>';
								   }
								}
							?>
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
