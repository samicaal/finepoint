<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php if( get_field( 'home_display_page_banner' ) ): ?>
<section class="banner home-banner">

<div class="wrap" style="position: relative">

	<div class="banner-slider-new">

			<?php if( have_rows('home_banner_images') ): ?>
				<?php while ( have_rows('home_banner_images') ) : the_row(); ?>
			<?php $banner_image = get_sub_field( 'home_banner_image' ); ?>
			<div class="img">
				<img src="<?php echo $banner_image['url'] ?>" alt="<?php echo $banner_image['alt'] ?>" title="<?php echo $banner_image['title'] ?> " class="greyScale new-banner-home-img">
			</div>
				<?php endwhile; ?>
			<?php endif; ?>

	</div>

	<div class="banner-content-abs">
		<div class="container">
		<div class="info">

			<div class="row">
				<div class="contentwrapper col-md-9 col-xs-12">
					<div class="col-md-12 col-sm-12">
						<h1><?php echo get_field( 'home_banner_title' ) ?><span class="dot">.</span></h1>
					</div>
					<div class="col-md-10 col-sm-12">
						<p><?php echo get_field( 'home_banner_description' ) ?></p>
					</div>

					<?php if( have_rows('ctas') ): ?>
						<div class="col-xs-12 m-y-2">

							<?php while ( have_rows('ctas') ) : the_row(); ?>

								<a style="padding: 8px 30px; margin-top: 10px;" class="<?php echo get_sub_field('button_class') ?>" href="<?php echo the_sub_field('button_link') ?>"><?php the_sub_field('button_label'); ?></a>
							<?php endwhile; ?>

						</div>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
	</div>

</div>
</section>
<?php endif; ?>






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

        ?>

		<?php if (get_field('cta_banner_image')): ?>
			<?php $bnr_cta_image = get_field('cta_banner_image') ?>
        <section class="m-y-2 greyScale" style="background: url('<?php echo $bnr_cta_image['url'] ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative;">
        	<div class="bnr-overlay"></div>
        	<div class="container p-y-6">
        		<div class="row">
        			<div class="col-xs-12 z-2 text-white new-cta-bnr">
        				<h3 class="m-y-2"><?php echo get_field('cta_subheading') ?></h3>
        				<h2 class="m-y-2"><?php echo get_field('cta_heading') ?></h2>
        				<p class="m-y-2"><?php echo get_field('cta_banner_content') ?></p>
        				<a href="<?php echo get_field('cta_banner_button_link') ?>" class="btn btn-secondary" onclick="ga('send', 'event', 'Home CTA Click', 'Email', 'Home CTA Clicked');"><?php echo get_field('cta_banner_button_label') ?></a>
        			</div>
        		</div>
        	</div>
        </section>
    	<?php endif; ?>


        <?php


		if ( get_field( 'what_we_do_after_content' ) ){
			echo '<div class="contact-team-pad">' . get_field( 'what_we_do_after_content' ) . '</div>';
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
