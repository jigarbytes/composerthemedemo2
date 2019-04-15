jQuery(document).ready(function($){
	// Uploading files
   var image_gallery_frame;
   var image_gallery_ids = $('#image_gallery');
   var gallery_images = $('#gallery_images_container ul.gallery_images');

   $('.add_gallery_images').on( 'click', '.kad_gallery_btn', function( event ) {

      var el = $(this);
      var attachment_ids = image_gallery_ids.val();

      event.preventDefault();

      // If the media frame already exists, reopen it.
      if ( image_gallery_frame ) {
         image_gallery_frame.open();
         return;
      }

      // Create the media frame.
      image_gallery_frame = wp.media.frames.downloadable_file = wp.media({
        	// Set the title of the modal.
        	title: 'Add Images to Gallery',
        	button: {
            text: 'Add to gallery',
        	},
        	multiple: true
    	});

    	// When an image is selected, run a callback.
    	image_gallery_frame.on( 'select', function() {
        	var selection = image_gallery_frame.state().get('selection');
        	selection.map( function( attachment ) {
            attachment = attachment.toJSON();

            if ( attachment.id ) {
             	attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;

              		gallery_images.append('\
                    	<li class="image attachment details" data-attachment_id="' + attachment.id + '">\
                        <div class="attachment-preview">\
                           <div class="thumbnail">\
                              <img src="' + attachment.url + '" style="width: 100% !important; height:100% !important; background-size: cover !important; " />\
                           </div>\
                           <a href="#" class="delete check" title="Remove image"><div class="media-modal-icon"></div></a>\
                        </div>\
                    	</li>');
            }

         });

         image_gallery_ids.val( attachment_ids );
      });

      // Finally, open the modal.
      image_gallery_frame.open();
   });

   // Image ordering
   gallery_images.sortable({
    	items: 'li.image',
    	cursor: 'move',
    	scrollSensitivity:40,
    	forcePlaceholderSize: true,
    	forceHelperSize: false,
    	helper: 'clone',
    	opacity: 0.65,
    	placeholder: 'eig-metabox-sortable-placeholder',
      start:function(event,ui){
         ui.item.css('background-color','#f6f6f6');
 		},
      stop:function(event,ui){
        	ui.item.removeAttr('style');
      },
      update: function(event, ui) {
        	var attachment_ids = '';

        	$('#gallery_images_container ul li.image').css('cursor','default').each(function() {
            var attachment_id = $(this).attr( 'data-attachment_id' );
            attachment_ids = attachment_ids + attachment_id + ',';
        	});

        	image_gallery_ids.val( attachment_ids );
    	}
   });

   // Remove images
   $('#gallery_images_container').on( 'click', 'a.delete', function() {

      $(this).closest('li.image').remove();

      var attachment_ids = '';

      $('#gallery_images_container ul li.image').css('cursor','default').each(function() {
         var attachment_id = $(this).attr( 'data-attachment_id' );
         attachment_ids = attachment_ids + attachment_id + ',';
      });

      image_gallery_ids.val( attachment_ids );

      return false;
   });

})
