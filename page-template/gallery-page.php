<?php
/**
 * Template Name: Gallery Page
 * 
 */
get_header(); ?>
<div class="top-heading">
	<div class="container">
		<div class="clearfix">
        	<h1><?php echo __('Project Gallery', 'finepoint'); ?><span class="dot">.</span></h1>
		</div>
	</div>
</div>
<?php
echo '<div id="content">';
	if ( function_exists( 'display_page_breadcrumb' ) ) {
		echo display_page_breadcrumb();
	}
	//custom_breadcrumbs();
	echo do_shortcode('[home_projects title="Latest projects" number_of_peoject="-1"]');
echo '</div>';
get_footer();
