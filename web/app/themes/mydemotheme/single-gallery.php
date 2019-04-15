<?php
	get_header(); 
?>
  <!-- Page Content -->
  	<div class="container">
    	<div class="row">
			
			<div class="col-md-12">
        	<?php 
        		if ( have_posts() ) : 
					while ( have_posts() ) : the_post(); ?>
						<div class="card mb-4">
				         <div class="card-body">
						 <div class="text-center">
   				         <h2 itemprop="name" class="card-title"><a itemprop="url"  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						 </div>
                    <?php 
                      $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                      $attachments = array_filter( explode( ',', $image_gallery ) );
                      if ( $attachments ) ?>
                     <div class="row">
                        <?php
                        foreach ( $attachments as $attachment_id ) {
                          $image_attributes = wp_get_attachment_image_src( $attachment_id, 'thumbnail' ); 
                          $image_attributes_full = wp_get_attachment_image_src( $attachment_id, 'full' );
                          ?>
						   <div class="col-lg-3 col-md-4 col-xs-6 thumb mb-4 text-center" itemprop="image">
								<a class="thumbnail" href="<?php echo $image_attributes_full[0]; ?>"  data-lightbox="gallery-1" id="<?php echo $attachment_id; ?>"  data-image-id="" data-toggle="modal" data-title="">
									<img itemprop="image" class="img-thumbnail" src="<?php echo $image_attributes[0]; ?>" alt="<?php echo $attachment_id; ?>">
								</a>
							</div>

                        <?php
                        }
                    ?>
                 </div> <!-- raw -->
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