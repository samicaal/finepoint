<?php
/**
 * Template Name: CPD Form Page
 * 
 */
get_header(); ?>
<?php
if(	get_field( 'contact_form_title' ) ) {
	echo '<section class="banner">';
		echo '<div class="banner-slider">';
			echo '<div>';
				echo '<div class="container">';
					echo '<div class="info">';
						echo '<div class="row">';
							echo '<div class="col-sm-6">';
								echo '<h1>'. get_field( 'contact_form_title' ) .'<span class="dot">.</span></h1>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</section>';
}
echo '<div id="content">';
	if ( function_exists( 'display_page_breadcrumb' ) ) {
		echo display_page_breadcrumb();
	}
	echo '<section class="cpd-form">';
		echo '<div class="container">';
			echo '<div class="form-content">';
				echo '<div class="row">';
					if( get_field( 'contact_form_description' ) ) {
						echo '<div class="col-sm-5">'. get_field( 'contact_form_description' ) .'</div>';
					}
					if( get_field( 'contact_form_shortcode' ) ) {
						$contact_form = get_field( 'contact_form_shortcode' );
						echo '<div class="col-sm-6 col-sm-offset-1">'. do_shortcode("$contact_form") .'</div>';
					}
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</section>';
	if( get_field( 'display_contact_image' ) ) {
		if( get_field( 'contact_form_image' ) ) {
			echo '<section class="img-wrapper">';
				echo '<img src="'. get_field( 'contact_form_image' ) .'" alt="Contact Form" title="Contact Form" class="greyScale" />';
			echo '</section>';
		}
	}	
echo '</div>';
?>
<?php get_footer();
