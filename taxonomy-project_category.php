<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();
	$category = single_cat_title( '', false );	
	if( $category == 'Commercial' ) {
		echo do_shortcode('[projects type="commercial" title="Commercial projects" number_of_peoject="6"]');
	} else {
		echo do_shortcode('[projects type="residential" title="Residential projects" number_of_peoject="6"]');
	}
get_footer();
?>
