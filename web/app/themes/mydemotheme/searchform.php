<form role="search" method="get" class="searchform group form-inline md-form mr-auto mb-4" action="<?php echo home_url( '/' ); ?> ">
  <input class="form-control mr-sm-2" value="<?php echo get_search_query() ?>" type="search" placeholder="<?php echo __( 'Search', 'placeholder' ) ?>"  name="s" aria-label="Search">
  <button class="btn btn-outline-info" type="submit"><?php echo __( 'Submit', 'wpdemo' ) ?></button>
</form>