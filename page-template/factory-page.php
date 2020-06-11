<?php
/**
 * Template Name: Factory Page
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
								if( get_field( 'banner_description' ) ){
									echo '<div class="col-md-6 col-sm-5 text-right">';
										echo '<p>'. get_field( 'banner_description' ) .'</p>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
					if( get_field( 'banner_image' ) ){
						$banner_image = get_field( 'banner_image' );
						echo '<div class="img">';
							echo '<img src="'. $banner_image['url'] .'" alt="'. $banner_image['alt'] .'" title="'. $banner_image['title'] .'" class="greyScale" />';
						echo '</div>';
					}
				echo '</div>';
			echo '</div>';
		echo '</section>';
	}
	
	if( get_field( 'factory_content_blocks' ) ) {
		
		echo '<div id="content">';
			if ( function_exists( 'display_page_breadcrumb' ) ) {
				echo display_page_breadcrumb();
			}
			echo '<section class="about-factory">';
				echo '<div class="container">';
				$block_number = 1;
				while( has_sub_field( 'factory_content_blocks' ) ){
					
					if( $block_number%2 != 0 ){
						echo '<div class="content-wrapper section-block">';
							if( get_sub_field( 'factory_content_block_title' ) ){
								echo '<h2>'. get_sub_field( 'factory_content_block_title' ) .'</h2>';
							}
							echo '<div class="block-wrapper innovative-methods">';
								echo '<div class="row">';
									echo '<div class="row-sm-height">';
										if( get_sub_field( 'factory_content_block_image' ) ){
											$factory_content_block_image = get_sub_field( 'factory_content_block_image' );
											echo '<div class="col-sm-8 col-sm-height col-sm-top">';
												echo '<div class="img-wrapper"><img src="'. $factory_content_block_image['url'] .'" alt="'. $factory_content_block_image['alt'] .'" title="'. $factory_content_block_image['title'] .'" class="greyScale" /></div>';
											echo '</div>';
										}
										if( get_sub_field( 'display_factory_content_short_description' ) ){
											echo '<div class="col-sm-4 col-sm-height col-sm-top">';
												echo '<div class="desc right">';
													echo get_sub_field( 'factory_content_short_description' );
													if( get_sub_field( 'factory_content_display_learn_more' ) ) {
														echo '<a href="'. get_sub_field( 'factory_content_linked_page' ) .'" class="more-link" title="'. get_sub_field( 'factory_content_link_name' ) .'" target="_blank">'. get_sub_field( 'factory_content_link_name' ) .'</a>';
													}
												echo '</div>';
											echo '</div>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
							echo '<div class="text-block">';
								echo '<div class="row">';
									echo '<div class="row-sm-height">';
										echo '<div class="col-sm-4 col-sm-push-8 col-sm-height  col-sm-bottom ">';
											if( get_sub_field( 'factory_content_block_image_description' ) ){
												echo '<p class="note">'. get_sub_field( 'factory_content_block_image_description' ) .'</p>';
											}
										echo '</div>';
										if( get_sub_field( 'factory_content_description' ) ){
											echo '<div class="col-sm-8 col-sm-pull-4 col-sm-height col-sm-top">';
												echo '<div class="text-column small-sec">';
													echo get_sub_field( 'factory_content_description' );
												echo '</div>';
											echo '</div>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					} else {
						echo '<div class="content-wrapper section-block">';
							if( get_sub_field( 'factory_content_block_title' ) ){
								echo '<h2>'. get_sub_field( 'factory_content_block_title' ) .'</h2>';
							}
							if( get_sub_field( 'factory_content_block_image' ) ){
								$factory_content_block_image = get_sub_field( 'factory_content_block_image' );
								echo '<div class="block-wrapper">';
									echo '<div class="row">';
										echo '<div class="row-sm-height">';
											echo '<div class="col-sm-12">';
												echo '<div class="img-wrapper"><img src="'. $factory_content_block_image['url'] .'" alt="'. $factory_content_block_image['alt'] .'" title="'. $factory_content_block_image['title'] .'" class="greyScale" /></div>';
											echo '</div>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							}
							echo '<div class="text-block">';
								echo '<div class="row">';
									echo '<div class="row-sm-height">';
										if( get_sub_field( 'factory_content_block_image_description' ) ){
											echo '<div class="col-sm-3 col-sm-height  col-sm-top">';
												echo '<p class="note">'. get_sub_field( 'factory_content_block_image_description' ) .'</p>';
											echo '</div>';
										}
										if( get_sub_field( 'factory_content_description' ) ){
											echo '<div class="col-sm-6 col-sm-height col-sm-top">';
												echo '<div class="text-column more">';
													echo get_sub_field( 'factory_content_description' );
												echo '</div>';
												if( get_sub_field( 'factory_content_display_learn_more' ) ) {
													echo '<a href="'. get_sub_field( 'factory_content_linked_page' ) .'" class="more-link" title="'. get_sub_field( 'factory_content_link_name' ) .'" target="_blank">'. get_sub_field( 'factory_content_link_name' ) .'</a>';
												}
											echo '</div>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					$block_number++;
				}
				echo '</div>';
			echo '</section>';
		echo '</div>';
	}	
?>
<?php get_footer();
