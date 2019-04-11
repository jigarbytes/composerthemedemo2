<?php 
function image_gallery_add_meta_box() {
   add_meta_box( 'naked_portfolio_gallery', __('Gallery', 'twintysixteen' ), 'image_gallery_metabox', 'gallery', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'image_gallery_add_meta_box' );

function image_gallery_metabox() {
   global $post; ?>

   <div id="gallery_images_container" class="kad_image_gallery">
      <ul class="gallery_images">
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
      </ul>
      
      <input type="hidden" id="image_gallery" name="image_gallery" value="<?php echo esc_attr( $image_gallery ); ?>" />
      <?php wp_nonce_field( 'kad_image_gallery', 'kad_image_gallery' ); ?>
   </div>

   <p class="add_gallery_images hide-if-no-js">
      <input type="button" class="kad_gallery_btn button" value="<?php esc_attr_e( 'Add images', 'naked' ); ?>">
   </p>   
   <?php 
}

function image_gallery_save_post( $post_id ) {
   if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return;

   $post_types = array ('page', 'post','images_gallery');

   // check user permissions
   if ( isset( $_POST[ 'post_type' ] ) && !array_key_exists( $_POST[ 'post_type' ], $post_types ) ) {
      if ( !current_user_can( 'edit_page', $post_id ) )
         return;
   } else {
      if ( !current_user_can( 'edit_post', $post_id ) )
         return;
   }

   if ( ! isset( $_POST[ 'kad_image_gallery' ] ) || ! wp_verify_nonce( $_POST[ 'kad_image_gallery' ], 'kad_image_gallery' ) )
      return;

   if ( isset( $_POST[ 'image_gallery' ] ) && !empty( $_POST[ 'image_gallery' ] ) ) {

        $attachment_ids = sanitize_text_field( $_POST['image_gallery'] );

        // turn comma separated values into array
        $attachment_ids = explode( ',', $attachment_ids );

        // clean the array
        $attachment_ids = array_filter( $attachment_ids  );

        // return back to comma separated list with no trailing comma. This is common when deleting the images
        $attachment_ids =  implode( ',', $attachment_ids );

        update_post_meta( $post_id, '_kad_image_gallery', $attachment_ids );
   } else {
      delete_post_meta( $post_id, '_kad_image_gallery' );
   }

   do_action( 'image_gallery_save_post', $post_id );
}
add_action( 'save_post', 'image_gallery_save_post' );