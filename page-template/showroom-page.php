<?php
/**
 * Template Name: Showroom Page
 * 
 */
get_header(); ?>


<?php
	if( get_field( 'display_page_banner' ) ) {
		echo '<section class="banner">';
			echo '<div class="banner-slider">';
				echo '<div>';
					echo '<div class="container">';
						echo '<div class="info">';
							echo '<div class="row">';
								if( get_field( 'banner_title' ) ){
									echo '<div class="col-md-6 col-sm-7">';
										echo '<h1>'. get_field( 'banner_title' ) .'<span class="dot">.</span></h1>';
									echo '</div>';
								}
								if( get_field( 'banner_title' ) ){
									echo '<div class="col-md-6 col-sm-5 text-right">';
										echo '<p>'. get_field( 'banner_description' ) .'</p>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
					echo '<div class="vr-block" >';
 						echo'<div class="embed-responsive embed-responsive-vr embed-responsive-16by9">';
   						echo'<iframe src="https://www.finepoint.glass/wp-content/uploads/vr/main-june-2018/VRTour_FinePoint_7June2018.html" width="100%" height="100%" scrolling="no" border="0" style="overflow: hidden; border: none;">';
   						echo'</iframe>';
  						echo'</div>';
					echo'</div>';
					
				echo '</div>';
			echo '</div>';
		echo '</section>';
	}
?>
	<div id="content">
		<?php
			if ( function_exists( 'display_page_breadcrumb' ) ) {
				echo display_page_breadcrumb();
			}
		?>

		<section class="about-showroom">
			<div class="container">
				<?php
					if( get_field( 'showroom_section_description' ) ) {
						echo '<div class="content-wrapper section-block">';
							if( get_field( 'showroom_section_title' ) ) {
								echo '<h2>'. get_field( 'showroom_section_title' ) .'</h2>';
							}
							echo '<div class="text-block">';
								echo '<div class="row">';
									echo '<div class="row-sm-height">';
										echo '<div class="col-sm-4 col-sm-push-8 col-sm-height  col-sm-top ">';
											echo '<div class="desc  right-sec">';
												if( get_field( 'banner_image_description' ) ) {
													echo '<p class="note">'. get_field( 'banner_image_description' ) .'</p>';
												}
												if( get_field( 'showroom_section_display_learn_more' ) ) {
													echo '<div class="text-right hidden-xs"><a href="'. get_field( 'showroom_section_linked_page' ) .'" class="more-link" title="'. get_field( 'showroom_section_link_name' ) .'">'. get_field( 'showroom_section_link_name' ) .'</a></div>';
												}
											echo '</div>';
										echo '</div>';
										echo '<div class="col-sm-8 col-sm-pull-4 col-sm-height col-sm-top">';
											echo '<div class="text-column">';
												echo get_field( 'showroom_section_description' );
											echo '</div>';
											if( get_field( 'showroom_section_display_learn_more' ) ) {
												echo '<div class="text-right visible-xs"><a href="'. get_field( 'showroom_section_linked_page' ) .'" class="more-link" title="'. get_field( 'showroom_section_link_name' ) .'">'. get_field( 'showroom_section_link_name' ) .'</a></div>';
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					if( get_field( 'showroom_gallery' ) ) {
						echo '<section class="content-wrapper section-block gallery-wrapper showroom-gallery">';
							echo '<div class="number-wrapper">';
								echo '<div class="slide-num">1 of 4</div>';
							echo '</div>';
							echo '<div class="gallery-slider">';
								while( has_sub_field( 'showroom_gallery' ) ){
									echo '<div>';
										if( get_sub_field( 'showroom_gallery_image' ) ){
											$showroom_gallery_image = get_sub_field( 'showroom_gallery_image' );
											echo '<div class="slider-wrapper">';
												echo '<div class="img-wrapper"><img src="'. $showroom_gallery_image['url'] .'" alt="'. $showroom_gallery_image['alt'] .'" title="'. $showroom_gallery_image['title'] .'" class="greyScale" /></div>';
											echo '</div>';
										}
										echo '<div class="text-block">';
											echo '<div class="row">';
												if( get_sub_field( 'showroom_gallery_title' ) ){
													echo '<div class="col-sm-4">';
														echo '<h2>'. get_sub_field( 'showroom_gallery_title' ) .'<span class="dot">.</span></h2>';
													echo '</div>';
												}
												if( get_sub_field( 'showroom_gallery_description' ) ){
													echo '<div class="col-sm-8">';
														echo '<div class="text-column">';
															echo get_sub_field( 'showroom_gallery_description' );
														echo '</div>';
													echo '</div>';
												}												
											echo '</div>';
										echo '</div>';
									echo '</div>';
								}
							echo '</div>';
						echo '</section>';
					}
					
					if( get_field( 'display_showroom_project_section' ) ) {
						echo '<div class="content-wrapper section-block">';
							echo '<div class="block-wrapper innovative-methods">';
								echo '<div class="row">';
									echo '<div class="row-sm-height">';
										if( get_field( 'showroom_project_section_image' ) ){
											echo '<div class="col-sm-8 col-sm-height col-sm-top">';
												echo '<div class="img-wrapper"><img src="'. get_field( 'showroom_project_section_image' ) .'" alt="'. get_field( 'showroom_project_section_title' ) .'" title="'. get_field( 'showroom_project_section_title' ) .'" class="greyScale" /></div>';
											echo '</div>';
										}
										echo '<div class="col-sm-4 col-sm-height col-sm-top">';
											echo '<div class="desc">';
												if( get_field( 'showroom_project_section_title' ) ){
													echo '<h2>'. get_field( 'showroom_project_section_title' ) .'</h2>';
												}
												if( get_field( 'showroom_project_section_decsrtioption' ) ){
													echo '<p>'. get_field( 'showroom_project_section_decsrtioption' ) .'</p>';
												}
												if( get_field( 'showroom_project_section_link_name' ) ){
													echo '<a href="'. get_field( 'showroom_project_section_linked_page' ) .'" class="more-link" title="'. get_field( 'showroom_project_section_link_name' ) .'">'. get_field( 'showroom_project_section_link_name' ) .'</a>';
												}
											echo '</div>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				?>
			</div>
		</section> 
	</div>

	<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('.embed-responsive-vr').click(function () {
      $('.embed-responsive-vr iframe').css("pointer-events", "auto");
    });

    $( ".embed-responsive-vr" ).mouseleave(function() {
      $('.embed-responsive-vr iframe').css("pointer-events", "none");
    });
  });
</script>

<?php get_footer();
