<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'custom_archive_widget' ) ) {
	return;
}
dynamic_sidebar( 'custom_archive_widget' );
if ( ! is_active_sidebar( 'custom_category_widget' ) ) {
	return;
}
dynamic_sidebar( 'custom_category_widget' );
if ( ! is_active_sidebar( 'popular_articles_widget' ) ) {
	return;
}
dynamic_sidebar( 'popular_articles_widget' );
?>
