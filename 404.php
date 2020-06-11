<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div id="content">
	<section class="thanks-msg">
		<div class="container">
			<div class="row">
				<div class="row-sm-height">
				<div class="col-sm-6 col-sm-height" >
					<h1><?php echo get_field('404_title', 'option'); ?></h1>
					<p class="large-text"><?php echo get_field('404_description', 'option'); ?></p>
				</div>
				<div class="col-sm-6 text-right col-sm-height col-sm-bottom">
					<a href="<?php echo home_url(); ?>" class="more-link" title="go back to homepage" title="Go to home"><?php echo __('go back to homepage', 'finepoint'); ?></a>
				</div>
				</div>
			</div>
		</div>
	</section>
	<?php
		if( get_field('404_image', 'option') ) {
			echo '<section class="img-wrapper">';
				echo '<img src="'. get_field('404_image', 'option') .'" title="404 Page" alt="404 Page" class="greyScale">';
			echo '</section>';
		}
	?>
</div>
<?php get_footer();
