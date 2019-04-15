<?php
   get_header();
?>
   <div class="container my-container">
      <div class="card">  
         <div class="row card-body">
         <!-- // start the loop -->
            <?php
               if( have_posts() ) :
                  while (have_posts()) : the_post(); ?>
                     <div class="col-lg-3 col-md-4 col-xs-6 thumb mb-5 text-center">
                        <div class="my-inner">
                           <h2 class="card-title" itemprop="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                           <?php 
                              if ( has_post_thumbnail() ) :
                                 the_post_thumbnail('thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']);
                              endif; 
                           ?>
                        </div>
                     </div>  
                  <div class="clearfix"></div>     
                  <?php  
                  endwhile;
               endif;
              wp_reset_query();
            ?>

         </div> <!-- raw -->
      
         <!-- Pagination -->
         <ul class="pagination justify-content-center mb-4">
            <li class="page-item past-page"><?php previous_posts_link( 'newer' ); ?></li>
            <li class="page-item next-page"><?php next_posts_link( 'older' ); ?></li>
         </ul>

      </div> <!-- card -->
   </div><!--/.container-->  
<?php get_footer(); ?>