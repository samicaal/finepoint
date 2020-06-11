<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */




  if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
  }

if ( get_field('display_leadgen')):

  function add_inline_lead_generation_script() {

    echo "<script>

     jQuery(document).ready(function() {

    jQuery('#menu-main-menu.nav li > .sub-menu').parent().hover(function() {

    console.log('hovered');
    var submenu = jQuery(this).children('.sub-menu');

    if ( jQuery(submenu).is(':hidden') ) {

    jQuery(submenu).show();

    } else {

    jQuery(submenu).hide();

    }

    });

    });



      var icaalLeadGenerationFormValues = {};

      jQuery(document).ready(function($) {

         jQuery('.icaal__lead-generation-form .previous-button').on('click', function(e) {
          e.preventDefault();

        var \$formH = jQuery('.icaal__lead-generation-form');
        
        var \$active = \$formH.find('.pane.active');

        \$firstPanel = \$formH.find('.pane').eq(0);
        
          icaalLeadGenerationFormValues = {};
         \$active.removeClass('active');
         \$firstPanel.addClass('active');
         \$firstPanel.addClass('animated fadeIn slower');
          });



        \$progress = $('.icaal__lead-generation-form-progress .progress-bar');

        $('.icaal__lead-generation-form .pane-submit').click(function() {

          var name = $(this).data('name');
          var value = $(this).data('value');
          var pane = null;
          if( $(this).data('pane') ) {
            pane = $(this).data('pane');
          }
          if( $(this).data('image') ) {
            icaalLeadGenerationFormValues['image'] = $(this).data('image');
          }
          icaalLeadGenerationFormValues[name] = value;
          
          nextPane(pane);



        });

        $('.icaal__lead-generation-form .form-control').on('change keyup', function() {
          var name = $(this).attr('name');
          var value = $(this).val();
          icaalLeadGenerationFormValues[name] = value;
        });

        $('.icaal__lead-generation-form').submit(function() {

          var \$form = $(this);
          var \$submit = \$form.find('.submit');
          var \$response = \$form.find('#response');
          icaalLeadGenerationFormValues['screen_width'] = screen.width;
          icaalLeadGenerationFormValues['screen_height'] = screen.height;
          icaalLeadGenerationFormValues['nonce'] = '" . wp_create_nonce('icaal-lead-generation-form') . "';
          icaalLeadGenerationFormValues['action'] = 'lead_generation_form';

          \$form.find('.form-checkbox').each(function (index, value) {
            icaalLeadGenerationFormValues[$(this).attr('name')] = $(this).prop('checked');
          })
          console.log(icaalLeadGenerationFormValues);

          \$submit.addClass('btn-loading').prop('disabled', true);
          \$response.empty();

          $.ajax({
            url: 'https://api.clients.icaal.co.uk/forms/form_pk_yYuBNg8n0ox95L3MZ7RneiCm',
            method: 'post',
            data: icaalLeadGenerationFormValues,
          }).done(function (response) {
            nextPane();
            \$progress.addClass('bg-success').removeClass('progress-bar-animated bg-primary');
            
            gtag('event', 'Click', {
            'event_category': 'Email',
            'event_label': 'Get a quote Completion'
          });
          }).fail(function (response) {
            \$response.addAlert('danger', 'Validation errors occurred:', response.responseJSON.errors);
          });

          return false;
        });


        $('#validate-postcode').click(function() {

          var \$this = $(this);
          var \$response = \$this.prev();
          var \$parent = \$this.parents('.pane');
          var postcode = $('#postcode').val();

          \$this.prop('disabled', true);
          \$response.empty();
          $.ajax({
            url: 'https://api.postcodes.io/postcodes/' + postcode,
            method: 'get'
          }).done(function(response) {
            postcode = response.result.postcode;
            icaalLeadGenerationFormValues['postcode'] = postcode;
            if( typeof ga == 'function' ) { ga('send', 'event', 'Quoting Engine', 'Enter Postcode', 'Lead Generation Form'); }
            nextPane();
            setTimeout(function() {
              nextPane();
            }, 3000);
          }).fail(function(response) {
            \$response.addAlert('danger', 'Please enter a valid UK postcode.');
            \$this.prop('disabled', false);
          });


        });

      });

      function nextPane(pane) {

        console.log('s')

        var \$form = jQuery('.icaal__lead-generation-form ');
        var \$active = \$form.find('.pane.active');
        var \$next = \$active.next('.pane');
        var increment = 1;

        if( pane != null ) {
          \$next = \$form.find('.pane').eq(pane);
          increment = pane - \$active.index();
        }

        \$active.removeClass('active');
        \$active.addClass('animated fadeOut slower');
        \$next.addClass('active animated fadeIn slower');
        \$form.find('.response').empty();

        var currentStep = parseInt(\$progress.data('valuenow')) + increment;
        var steps = parseInt(\$progress.data('valuemax'));

        \$progress.data('valuenow', currentStep);
        \$progress.css('width', currentStep / steps * 100 + '%');

        // jQuery('html, body').animate({
        //   scrollTop: jQuery('.icaal__lead-generation-form').offset().top - 200
        // }, 500);


       
      }


    </script>";


  }
  add_action( 'wp_head', 'add_inline_lead_generation_script', PHP_INT_MAX );

endif;

get_header();
	while ( have_posts() ) : the_post(); 
	$term_name = '';
	$term_id   = '';
	$product_categories = get_the_terms(get_the_ID(), 'product_category');
	foreach( $product_categories as $product_category ){
		$term_name = $product_category->name;
		$term_id   = $product_category->term_id;
	}
?>
<div class="top-heading">
	<div class="container">
		<div class="clearfix">
			<h1><?php echo get_the_title(); ?><span class="dot">.</span></h1>
			<div class="right-part">
				<ul class="right-links">
					<li><a href="<?php echo get_term_link( $term_id ); ?>" title="<?php echo $term_name; ?>"><?php echo $term_name; ?></a></li>
					<li><span><?php echo get_the_title(); ?></span></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php if( get_field( 'display_product_banner' ) ) : ?>
<section class="banner">
	<div class="banner-slider">
		<div>
			<div class="container">
				<div class="info">
					<div class="row">
						<?php if( get_field( 'product_banner_title' ) ): ?>
							<div class="col-md-5 col-sm-7">
								<h3><?php the_field( 'product_banner_title' ); ?><span class="dot">.</span></h3>
							</div>
						<?php endif; ?>
						<?php if( get_field( 'product_banner_description' ) ) : ?>
							<div class="col-md-6 col-md-offset-1 col-sm-5 text-right">
								<p><?php the_field( 'product_banner_description' ); ?></p>
							</div>
						<?php endif; ?>
						<?php if( have_rows('ctas') ): ?>
							<div class="col-xs-12 text-center m-y-2">
							
								<?php while ( have_rows('ctas') ) : the_row(); ?>
								
									<a class="<?php echo get_sub_field('button_class') ?>" href="<?php echo the_sub_field('button_link') ?>"><?php the_sub_field('button_label'); ?></a>
								<?php endwhile; ?>
							
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php if( get_field( 'product_banner_image' ) ) : 
					$product_banner_image = get_field( 'product_banner_image' ); ?>
					<div class="img">
						<img src="<?php echo $product_banner_image['url']; ?>" alt="<?php echo $product_banner_image['alt']; ?>" title="<?php echo $product_banner_image['title']; ?>" class="greyScale" />
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>


<?php if ( get_field('product_content_block') ): ?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php the_field('product_content_block'); ?>
			</div>
		</div>
	</div>

<?php endif;

if ( have_rows( 'product_text_slider' ) ){
	echo '<div id="content">';
		echo '<section class="product-text-slider section-block">';
			echo '<div class="container">';
				echo '<div class="row">';
					echo '<div class="col-xs-12">';
						echo '<div class="service-slider">';
							while( have_rows( 'product_text_slider' ) ){ the_row();
								echo '<div>';
									echo '<div class="desc first">';
										if( get_sub_field( 'title' ) ) {
											echo '<h2>'. get_sub_field( 'title' ) .'<span class="dot">.</span></h2>';
										}
										if( get_sub_field( 'content' ) ) {
											echo '<p>'. get_sub_field( 'content' ) .'</p>';
										}
										if( get_sub_field( 'learn_more_link' ) ) {
											echo '<a href="'. get_sub_field( 'learn_more_link' ) .'" class="more-link" title="'. 'LEARN MORE' .'">'. 'Learn More' .'</a>';
										}
									echo '</div>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}

if ( have_rows( 'product_third_content' ) ){
	echo '<div id="content">';
		echo '<section class="product-text-third section-block">';
			echo '<div class="container">';
				echo '<div class="row">';

					while( have_rows( 'product_third_content' ) ){ the_row();
						echo '<div class="col-xs-12 col-md-4">';
							if( get_sub_field( 'title' ) ) {
								echo '<h2>'. get_sub_field( 'title' ) .'<span class="dot">.</span></h2>';
							}
							if( get_sub_field( 'content' ) ) {
								echo '<p>'. get_sub_field( 'content' ) .'</p>';
							}
						echo '</div>';
					}

				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}

echo '<div id="content">';
	if ( function_exists( 'display_page_breadcrumb' ) ) {
		echo display_page_breadcrumb();
	}
	echo '<section class="product-detail  section-block">';
		echo '<div class="container">';
			echo '<div class="product-desc">';
				if( get_field( 'product_brochure_file' ) ){
					echo '<div class="download-link text-right"><a href="'. get_field( 'product_brochure_file' ) .'" title="'. __('DOWNLOAD BROCHURE', 'finepoint') .'" class="more-link"  download>'. __('DOWNLOAD BROCHURE', 'finepoint') .'</a></div>';
				}
				echo '<div class="section-block product-info">';
					$d = false;
					$feature = 0;
					if( get_field('features') ){
						while( has_sub_field('features') ){
							if( $feature == 0 ) {
								$d = true;
								echo '<div class="row">';
							}
							$feature++;
							echo '<div class="col-sm-6">';
								echo '<h2>'. get_sub_field('feature_title') .'</h2>';
								echo get_sub_field('feature_content');
							echo '</div>';
							if( $feature == 2 ) {
								echo '</div>';
								$feature = 0;
								$d = false;
							}
						}
						if($d == true){
							echo '</div>';
						}
					}
				echo '</div>';
				if( get_field('feature_content') ){
					$feature_images = 1;
					$class = 'no-sec';
					$i = 0; while( has_sub_field('feature_content') ){ $i++; ?>

						<?php
						if( get_sub_field( 'feature_full_content_type' ) ){
							$class = '';
							if( get_sub_field( 'feature_full_content_type' ) == 'image' ){
								if( !get_sub_field( 'feature_full_image' ) ) {
									$prevent_padding = true;
								}
							}
							?> 
							<div class="center-block<?php echo ($prevent_padding ? ' p-y-0' : ''); ?>"> 
							<?php if( get_sub_field( 'feature_full_content_type' ) == 'image' ) : ?>
									<?php if( get_sub_field( 'feature_full_image' ) ) : 
										$feature_full_image = get_sub_field( 'feature_full_image' ) ; ?>
										<div class="img-wrapper" style="position:relative;">
											<img src="<?php echo $feature_full_image['url']; ?>" alt="<?php echo $feature_full_image['alt']; ?>" title="<?php echo $feature_full_image['title']; ?>" class="greyScale" />
											<?php if( get_sub_field( 'feature_full_content_description' ) ) : ?>
												<div class="img-text-prod">
													<div class="row">
														<div class="col-sm-12 hide-show" style="display: flex;">
															<div class="float-up" style="z-index: <?php echo $i; ?>;">
																<div class="left-line-wrap">
													    			<div class="left-line"></div>
																</div>
																<div class="right-div">
																	<span class="read-more">Read More</span>
																	<?php the_sub_field( 'feature_full_content_description' ); ?>
																</div>
															</div>
														</div>
													</div>
												</div>
											<?php endif; ?>
										</div>
									<?php else: ?>
										<div>
											<?php the_sub_field( 'feature_full_content_description' ); ?>
										</div>
									<?php endif; ?>
								<?php else: ?>
									<?php if( get_sub_field( 'feature_full_youtube_video' ) ) : ?>
										<div class="video-wrapper">
											<video
												id="YOUTUBE<?php echo rand(8,8888); ?>"
												class="video-js vjs-big-play-centered"
												controls
												width="640" height="530"
												data-setup='{ 
													"techOrder": ["youtube"], 
													"sources": [{ 
																"type": "video/youtube", 
																"src": "<?php echo get_sub_field( 'feature_full_youtube_video' ); ?>"
															   }], 
													"youtube": { "iv_load_policy": 1 } 
												}'
											>
										    </video>
										</div>
									<?php endif; ?>
								<?php endif; ?>								
							</div>
						<?php }
						
						if( get_sub_field( 'feature_half_content_type' ) ) {
							
							echo '<div class="section-block second-block '. $class .'">';
								echo '<div class="row">';
									echo '<div class="row-sm-height">';
										if( get_sub_field( 'feature_half_content_type' ) == 'image' ) {
											if( get_sub_field( 'feature_half_image' ) ) {
												$feature_half_image = get_sub_field( 'feature_half_image' );
												echo '<div class="col-sm-6 col-sm-height col-sm-top">';
													 echo '<div class="img-wrapper">';
														echo '<img src="'. $feature_half_image['url'] .'" alt="'. $feature_half_image['alt'] .'" title="'. $feature_half_image['title'] .'" class="greyScale" />';
													echo '</div>';
												echo '</div>';
											}
										} else {
											if( get_sub_field( 'feature_half_youtube_video' ) ) {
												echo '<div class="col-sm-6 col-sm-height col-sm-top">';
													 echo '<div class="img-wrapper">';
										?>
													<video
														id="YOUTUBE<?php echo rand(8,8888); ?>"
														class="video-js vjs-big-play-centered"
														controls
														width="640" height="530"
														data-setup='{ 
															"techOrder": ["youtube"], 
															"sources": [{ 
																		"type": "video/youtube", 
																		"src": "<?php echo get_sub_field( 'feature_half_youtube_video' ); ?>"
																	   }], 
															"youtube": { "iv_load_policy": 1 } 
														}'
													>
												  </video>
										<?php
													echo '</div>';
												echo '</div>';
											}
										}
										if( get_sub_field( 'feature_half_content_description' ) ) {
											echo '<div class="col-sm-6 col-sm-height col-sm-bottom">';
												echo '<p class="right-text"><b>'. get_sub_field( 'feature_half_content_description' ) .'</b></p>';
											echo '</div>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
							
						}
					
					$feature_images++;
					}
				}
			echo '</div>';

			if ( is_single( '303' ) ) {
				echo '<div style="margin-top:55px;" class="center-block>';

				echo'<div class="embed-responsive embed-responsive-16by9"><video controls="controls" width="1920" height="1080"><source src="https://doubleglazingontheweb.co.uk/wp-content/uploads/videos/bi-fold-door-configurations.mp4" type="video/mp4"></video></div>';

				echo '</div>';
			}


			/*$project_args = array(
					'post_type'     => 'project',
					'posts_per_page'=> -1,
				);
			$project_query = new WP_Query( $project_args );
			if ( $project_query->have_posts() ) {
				echo '<div class="content-wrapper gallery-wrapper">';
					echo '<h2>Gallery<span class="dot">.</span></h2>';
					echo '<div class="number-wrapper">';
						echo '<div class="slide-num">1 of 4</div>';
					echo '</div>';
					echo '<div class="gallery-slider">';
					while ( $project_query->have_posts() ) {
						$project_query->the_post();
						echo '<div>';
							if( get_field( 'project_gallery' ) ) {
								$gallery = get_field( 'project_gallery' );
								echo '<div class="slider-wrapper">';
									echo '<div class="img-wrapper"><img src="'. $gallery[0]['project_gallery_image'] .'" alt="'. get_the_title() .'" title="'. get_the_title() .'" class="greyScale" /></div>';
								echo '</div>';
							}
							echo '<div class="text-block">';
								echo '<div class="row">';
									echo '<div class="col-sm-4 col-sm-offset-3">';
										echo '<h3>'. get_the_title() .'<span class="dot">.</span></h3>';
										echo '<div>'. get_field( 'project_country' ) .'</div>';
									echo '</div>';
									echo '<div class="col-sm-5">';
										echo '<p class="large-text">'. substr($gallery[0]['project_work_description'], 0, 280) .'</p>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					wp_reset_postdata();
					echo '</div>';
				echo '</div>';
			}*/
			if( get_field('product_gallery') ) {
				echo '<div class="content-wrapper gallery-wrapper">';
					echo '<h2>'. __('Gallery', 'finepoint') .'<span class="dot">.</span></h2>';
					echo '<div class="number-wrapper">';
						echo '<div class="slide-num">1 of 4</div>';
					echo '</div>';
					echo '<div class="gallery-slider">';
					while( has_sub_field('product_gallery') ){
						echo '<div>';
							if( get_sub_field('product_gallery_image') ){
								echo '<div class="slider-wrapper">';
									echo '<div class="img-wrapper"><img src="'.get_sub_field('product_gallery_image') .'" alt="'. get_the_title() .'" title="'. get_the_title() .'" class="greyScale" /></div>';
								echo '</div>';
							}
							echo '<div class="text-block">';
								echo '<div class="row">';
									echo '<div class="col-sm-4 col-sm-offset-3">';
										echo '<h3>'. get_sub_field('gallery_title') .'<span class="dot">.</span></h3>';
									echo '</div>';
									echo '<div class="col-sm-5">';
										echo '<p class="large-text">'. substr(get_sub_field('product_gallery_description'), 0, 280) .'</p>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					echo '</div>';
				echo '</div>';
			}
		echo '</div>';
	echo '</section>';
echo '</div>';

endwhile; ?>

<?php if ( get_field('display_leadgen')): ?>

<?php do_shortcode('[lead_generation_form]') ?>

<?php endif; ?>



<script>
	(function( $ ) {
		$('ul.breadcrumb li:first-child').hide();
		$('ul.breadcrumb li:nth-child(2) span[property="itemListElement"]').addClass('first-item');
	})( jQuery );
</script>
<?php
get_footer();
