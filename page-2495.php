<?php
/**
 * The Aluminium Slinding Doors template
 *
 * If the user has selected a static page  this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php
/*if ( function_exists( 'display_page_banner' ) ) {
	display_page_banner();
}*/
if( get_field( 'home_display_page_banner' ) ) {
	echo '<section class="banner home-banner">';
		echo '<div class="banner-slider">';
			echo '<div>';
				echo '<div class="container">';
					echo '<div class="info">';
						echo '<div class="row">';
							if( get_field( 'home_banner_title' ) ){
								echo '<div class="col-md-6 col-sm-7">';
									echo '<h1>'. get_field( 'home_banner_title' ) .'<span class="dot">.</span></h1>';
								echo '</div>';
							}
							if( get_field( 'home_banner_title' ) ){
								echo '<div class="col-md-6 col-sm-5 text-right">';
									echo '<p>'. get_field( 'home_banner_description' ) .'</p>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
				$random_images = array();
				$banner_images = get_field( 'home_banner_images' );
				$banner_number = 1;
				foreach( $banner_images as $banner_image ){
					$random_images[$banner_number]['url']   = $banner_image['home_banner_image']['url'];	
					$random_images[$banner_number]['alt']   = $banner_image['home_banner_image']['alt'];	
					$random_images[$banner_number]['title'] = $banner_image['home_banner_image']['title'];	
					$banner_number++;	
				}
				if( get_field( 'banner_image' ) ){
					$random_key = array_rand($random_images, 1);
					echo '<div class="img">';
						echo '<img src="'. $random_images[$random_key]['url'] .'" alt="'. $random_images[$random_key]['alt'] .'" title="'. $random_images[$random_key]['title'] .'" class="greyScale" />';
					echo '</div>';
				}
			echo '</div>';
		echo '</div>';
	echo '</section>';
}
?>
<!-- Content Start -->
<div id="content">
	<?php
		if ( function_exists( 'display_page_breadcrumb' ) ) {
			echo display_page_breadcrumb();
		}
		echo '<section class="what-we-do">';
			echo '<div class="container">';
				echo '<a href="/showroom" class="more-link" style="float:right;">Take a Virtual Tour of Our Showroom</a>';
				echo '<br>';
	
				if( get_field( 'what_we_do_slider_title' ) ) {
					echo '<h2>'. get_field( 'what_we_do_slider_title' ) .'<span class="dot">.</span></h2>';
				}
				
				if ( get_field( 'what_we_do_slider_intro' ) ){
					echo '<div style="margin-bottom: 55px;">' . get_field( 'what_we_do_slider_intro' ) . '</div>';
				}
				if( get_field( 'what_we_do_slider_slides' ) ) {
					echo '<div class="service-slider">';
						while( has_sub_field( 'what_we_do_slider_slides' ) ){
							echo '<div>';								
								if( get_sub_field( 'what_we_do_slide_image' ) ) {
									$what_we_do_slide_image = get_sub_field( 'what_we_do_slide_image' );
									echo '<div class="img-wrapper"><img src="'. $what_we_do_slide_image['url'] .'" alt="'. $what_we_do_slide_image['alt'] .'" title="'. $what_we_do_slide_image['title'] .'" class="greyScale" /></div>';
								}
								echo '<div class="desc first">';
									if( get_sub_field( 'what_we_do_slide_title' ) ) {
										echo '<h2>'. get_sub_field( 'what_we_do_slide_title' ) .'<span class="dot">.</span></h2>';
									}
									if( get_sub_field( 'what_we_do_slide_description' ) ) {
										echo '<p>'. get_sub_field( 'what_we_do_slide_description' ) .'</p>';
									}
									if( get_sub_field( 'what_we_do_slide_link_name' ) ) {
										echo '<a href="'. get_sub_field( 'what_we_do_slide_linked_page' ) .'" class="more-link" title="'. get_sub_field( 'what_we_do_slide_link_name' ) .'">'. get_sub_field( 'what_we_do_slide_link_name' ) .'</a>';
									}
								echo '</div>';
							echo '</div>';
						}
                    echo '</div>';
				}
				
				if( get_field( 'what_we_do_section_blogs' ) ) {
					$blog_number = 1;
					while( has_sub_field( 'what_we_do_section_blogs' ) ) {
						
						$class1 = '';
						$class2 = '';
						$class3 = '';
						if( $blog_number%2 == 0 ) {
							$class1 = 'col-sm-push-4';
							$class2 = 'col-sm-pull-8';
						} else {
							$class3 = 'right';
						} 
						$what_we_do_section_image = get_sub_field( 'what_we_do_section_image' );
						echo '<div class="block-wrapper">';
							echo '<div class="row">';
								echo '<div class="row-sm-height">';
									echo '<div class="col-sm-8 col-sm-height col-sm-top '. $class1 .'">';
										echo '<div class="img-wrapper"><img src="'. $what_we_do_section_image['url'] .'" alt="'. $what_we_do_section_image['alt'] .'" title="'. $what_we_do_section_image['title'] .'" class="greyScale" /></div>';
									echo '</div>';
									echo '<div class="col-sm-4 col-sm-height col-sm-top '. $class2 .'">';
										echo '<div class="desc '. $class3 .'">';
											echo '<h2>'. get_sub_field( 'what_we_do_section_block_title' ) .'</h2>';
											echo '<p>'. get_sub_field( 'what_we_do_section_description' ) .'</p>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
							echo '<div class="row">';
								echo '<div class="col-xs-12">';
									if ( get_sub_field( 'what_we_do_section_description_after' ) ){
										echo get_sub_field( 'what_we_do_section_description_after' );
									}
								echo '</div>';
								echo '<div class="col-xs-12">';
									echo '<p style="text-align: right;"><a href="'. get_sub_field( 'what_we_do_section_link_page' ) .'" class="more-link" title="'. get_sub_field( 'what_we_do_section_link_title' ) .'">'. get_sub_field( 'what_we_do_section_link_title' ) .'</a></p>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						
						$blog_number++;
					}
				}
				echo '<div class="border"></div>';
            echo '</div>';
        echo '</section>';

		if ( get_field( 'what_we_do_after_content' ) ){
			echo '<div>' . get_field( 'what_we_do_after_content' ) . '</div>';
		}

		while ( have_posts() ) : the_post();
			the_content();
		endwhile;
		
		if( get_field( 'partners' ) ) {
			echo '<section class="">';
				echo '<div class="container">';
					echo '<div class="border"></div>';
					echo '<div class="our-partners section-block">';
					if( get_field( 'partners_section_title' ) ) {
						echo '<h2>'. get_field( 'partners_section_title' ) .'<span class="dot">.</span></h2>';
					}
					if( get_field( 'partners' ) ) {
						echo '<div class="partner-wrapepr">';
							echo '<div class="row">';
								echo '<div class="partners-slider">';
								while( has_sub_field('partners') ){
									$partner_logo = get_sub_field('partner_logo');
									echo '<div>';
										echo '<div class="img-wrapper">';
											echo '<a href="'. get_sub_field('partner_url') .'" title="Partner"><img src="'. $partner_logo['url'] .'" alt="'. $partner_logo['alt'] .'" title="'. $partner_logo['title'] .'" class="greyScale" /></a>';
										echo '</div>';
									echo '</div>';
								}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					echo '</div>';
				echo '</div>';
			echo '</section>';
		}
	?>	
</div>

<?php get_footer();
