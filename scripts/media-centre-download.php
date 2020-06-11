<?php

	global $analytics;

?>
<script type="text/javascript">

	jQuery(function($) {

		var files = []
		var submit = $('#media-centre-form-submit')

		// Add to array
		$.fn.addToArray = function() {

			var file = $(this).attr('name');
			files.push(file);
			$(submit).removeClass('disabled')

		}

		// Remove array
		$.fn.removeFromArray = function() {

			var file = $(this).attr('name');
			var index = files.indexOf(file);
			if ( index >= 0 ) {
				files.splice( index, 1 );
			}
			if( index === 0 ) {
				$(submit).addClass('disabled')
			}

		}

		// On select media file
		$('[data-toggle="file"]').change(function() {

			if ( $(this).is( ":checked" ) ) {
				$(this).addToArray();
				$(this).parent().addClass('active')
			} else {
				$(this).removeFromArray();
				$(this).parent().removeClass('active')
			}

		})

		$('#media-centre-form').submit(function(event) {
			event.preventDefault()

			if( files.length > 0 ) {

				$this = $(this);
				
				$('html').addClass('loading');
				// Post to WordPress
				$.post('<?php echo admin_url('admin-ajax.php'); ?>', $this.serialize(), function(response) {
					
					$('html').removeClass('loading');
					location.assign(response.url);
					$this.trigger('reset');
					$('[data-toggle="file"]').parent().removeClass('active');
					$(submit).addClass('disabled');

					<?php if( $analytics ): ?>
					// Submit Google Analytics Event
					ga('send', 'event', 'File Download', 'Download', 'Media Centre' )
					<?php endif; ?>
				})

			} else {
				// No files to download
			}

		})

		$('#downloadLink').click(function() {
			$('#media-centre-form').trigger('reset')
		})

	});
</script>
