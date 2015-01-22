jQuery(document).ready(function($){

	var rootstrap_upload;
	var rootstrap_selector;

	function rootstrap_add_file(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		rootstrap_selector = selector;

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( rootstrap_upload ) {
			rootstrap_upload.open();
		} else {
			// Create the media frame.
			rootstrap_upload = wp.media.frames.rootstrap_upload =  wp.media({
				// Set the title of the modal.
				title: $el.data('choose'),

				// Customize the submit button.
				button: {
					// Set the text of the button.
					text: $el.data('update'),
					// Tell the button not to close the modal, since we're
					// going to refresh the page when the image is selected.
					close: false
				}
			});

			// When an image is selected, run a callback.
			rootstrap_upload.on( 'select', function() {
				// Grab the selected attachment.
				var attachment = rootstrap_upload.state().get('selection').first();
				rootstrap_upload.close();
				rootstrap_selector.find('.upload').val(attachment.attributes.url);
				if ( attachment.attributes.type == 'image' ) {
					rootstrap_selector.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '"><a class="remove-image">Remove</a>').slideDown('fast');
				}
				rootstrap_selector.find('.upload-button').unbind().addClass('remove-file').removeClass('upload-button').val(rootstrap_l10n.remove);
				rootstrap_selector.find('.of-background-properties').slideDown();
				rootstrap_selector.find('.remove-image, .remove-file').on('click', function() {
					rootstrap_remove_file( $(this).parents('.section') );
				});
			});

		}

		// Finally, open the modal.
		rootstrap_upload.open();
	}

	function rootstrap_remove_file(selector) {
		selector.find('.remove-image').hide();
		selector.find('.upload').val('');
		selector.find('.of-background-properties').hide();
		selector.find('.screenshot').slideUp();
		selector.find('.remove-file').unbind().addClass('upload-button').removeClass('remove-file').val(rootstrap_l10n.upload);
		// We don't display the upload button if .upload-notice is present
		// This means the user doesn't have the WordPress 3.5 Media Library Support
		if ( $('.section-upload .upload-notice').length > 0 ) {
			$('.upload-button').remove();
		}
		selector.find('.upload-button').on('click', function(event) {
			rootstrap_add_file(event, $(this).parents('.section'));
		});
	}

	$('.remove-image, .remove-file').on('click', function() {
		rootstrap_remove_file( $(this).parents('.section') );
    });

    $('.upload-button').click( function( event ) {
    	rootstrap_add_file(event, $(this).parents('.section'));
    });

});