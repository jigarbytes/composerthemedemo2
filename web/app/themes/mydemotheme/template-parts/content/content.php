	<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */

?>

<div class="card mb-4" id="post-<?php the_ID(); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
	<div itemprop="image"><?php the_post_thumbnail( array( 750, 300 ) ); ?></div>
	<?php endif;?>
	
 <div class="card-body">
	 <h2 itemprop="name" class="card-title"><a  itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p class="card-text"  itemprop="articleBody"><?php the_content(); ?></p>
		<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php _e( 'Read More', 'wpdemo' ) ?> &rarr;</a>
	</div>
	
	<div class="card-footer text-muted">
	<p itemprop="datePublished"><?php _e( 'Posted on ', 'wpdemo' ) ?><?php the_time('M d, Y'); ?></p> by
	<a itemprop="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a>
	</div>
</div>
								

