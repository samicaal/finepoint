<?php
/**
 * Template Name: Thank You Page
 * 
 */
get_header(); ?>
<div id="content">
	<?php
		if ( function_exists( 'display_page_breadcrumb' ) ) {
			echo display_page_breadcrumb();
		}
	?>
	<section class="thanks-msg">
		<div class="container">
			<div class="row">
				<div class="row-sm-height">
				<div class="col-sm-6 col-sm-height" >
					<h1><?php echo get_field('thank_you_title', 'option'); ?><span class="dot">.</span></h1>
					<p class="large-text"><?php echo get_field('thank_you_description', 'option'); ?></p>
				</div>
				<div class="col-sm-6 text-right col-sm-height col-sm-bottom">
					<a href="<?php echo home_url(); ?>" class="more-link" title="go back to homepage"><?php echo __('go back to homepage', 'finepoint'); ?></a>
				</div>
				</div>
			</div>
		</div>
	</section>
	<?php
		if( get_field('thank_you_image', 'option') ) {
			echo '<section class="img-wrapper">';
				echo '<img src="'. get_field('thank_you_image', 'option') .'" title="Thank You Page" alt="Thank You Page" class="greyScale" />';
			echo '</section>';
		}
	?>
</div>
<?php get_footer();
