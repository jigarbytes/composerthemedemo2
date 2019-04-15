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
				         <!-- <?php the_post_thumbnail( array( 750, 300 ) ); ?> -->
				         <div class="card-body">
   				         <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            				By, <a href="#"><?php the_author(); ?></a>
            				<p class="card-text"><?php the_content(); ?></p>
                    <?php 
                      $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                      $attachments = array_filter( explode( ',', $image_gallery ) );
                      if ( $attachments )
                      foreach ( $attachments as $attachment_id ) {
                          $image_attributes = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
                          echo '<li class="image attachment details" data-attachment_id="' . $attachment_id . '"><div class="attachment-preview"><div class="thumbnail">'.'<img class="attachement-image" src="'.$image_attributes[0].'"/></div>
                                  <a href="#" class="delete check" title="' . esc_attr__( 'Remove image', 'naked' ) . '"><div class="media-modal-icon"></div></a>
                                  </div>
                               </li>';
                      }
                    ?>
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