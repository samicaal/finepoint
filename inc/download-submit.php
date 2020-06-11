<?php

	global $analytics;

?>
<script type="text/javascript">
	$(document).ready(function() {

		var files = [];
		var submit = $('#media-centre-form-submit');
		var email = $('#download-email');

		// Add to array
		$.fn.addToArray = function() {

			var file = $(this).attr('name');
			files.push(file);
			$(submit).removeClass('disabled');

		};

		// Remove array
		$.fn.removeFromArray = function() {

			var file = $(this).attr('name');
			var index = files.indexOf(file);
			if ( index >= 0 ) {
				files.splice( index, 1 );
			}
			if( index === 0 ) {
				$(submit).addClass('disabled');
			}

		}

		// On select media file
		$('[data-toggle="file"]').change(function() {

			if ( $(this).is( ":checked" ) ) {
				$(this).addToArray();
				$(this).parent().addClass('active');
			} else {
				$(this).removeFromArray();
				$(this).parent().removeClass('active');
			}

		});

		$('#media-centre-form').submit(function(event) {
			event.preventDefault();

			<?php if( is_user_logged_in() ): ?>
			if( files.length > 0 ) {
			<?php else: ?>
			if( files.length > 0 && $(email).hasClass('form-control-success') ) {
			<?php endif; ?>

				$('#download-response').remove();

				$this = $(this);
				NProgress.start();
				$('html').addClass('loading');
				// Post to WordPress
				$.post('<?php echo admin_url('admin-ajax.php'); ?>', $this.serialize(), function(response) {
					NProgress.done();
					$('html').removeClass('loading');
					location.assign(response.url);
					$this.trigger('reset');
					$('[data-toggle="file"]').parent().removeClass('active');
					$(submit).addClass('disabled');

					<?php if( $analytics ): ?>
					// Submit Google Analytics Event
					ga('send', 'event', 'File Download', 'Download', 'Downloads' );
					<?php endif; ?>

				});

			} else {
				// No files to download
				if( !$(email).hasClass('form-control-success') ) {
					$(email).parent().after('<div id="download-response" class="alert alert-danger">Please enter your email address.</div>');
				}
			}

		});

		$('#downloadLink').click(function() {
			$('#media-centre-form').trigger('reset');
		});

	});
</script>