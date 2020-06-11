<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); 
$count_array  = array();
$term_slug = '';
$post_categories = get_the_terms(get_the_ID(), 'project_category');
foreach( $post_categories as $post_category ){
	$term_slug = $post_category->slug;
}
$project_args = array(
	'post_type' => 'project',
	'posts_per_page' => -1,
	'tax_query' 	=> array(
			array(
				'taxonomy' => 'project_category',
				'field'    => 'slug',
				'terms'    => $term_slug,
			),
		),
	
);
$project_query = get_posts( $project_args );
$total_project = count( $project_query );
foreach( $project_query as $project ){
	$count_array[] = $project->ID;
}
?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="top-heading">
	<div class="container">
		<div class="clearfix">
			<h1><?php echo get_the_title(); ?><span class="dot">.</span></h1>
			<div class="right-part">
				<?php
					if( $term_slug == 'residential' ) {
						echo '<a href="'. home_url() .'/residential-projects/" class="btn-link" title="'. __('BACK TO ALL RESIDENTIAL', 'finepoint') .'">'. __('BACK TO ALL RESIDENTIAL', 'finepoint') .'</a>';
					} else {
						echo '<a href="'. home_url() .'/commercial-projects/" class="btn-link" title="'. __('BACK TO ALL COMMERCIAL', 'finepoint') .'">'. __('BACK TO ALL COMMERCIAL', 'finepoint') .'</a>';
					}
				?>
			</div>
		</div>
	</div>
</div>

<div id="content">
	<?php
		if ( function_exists( 'display_page_breadcrumb' ) ) {
			echo display_page_breadcrumb();
		}
	?>
	<section class="project-detail">
		<div class="project-detail-wrapper">
			<?php
				$slide_array = get_field( 'project_gallery' );
				echo '<div class="number-wrapper">';
					echo '<div class="slide-num">1 of '. count($slide_array) .'</div>';
				echo '</div>';
				//echo '<div class="container">';
				
				if( get_field( 'project_gallery' ) ) {
					echo '<div class="project-detail-slider">';
						while( has_sub_field( 'project_gallery' ) ) {
							$hover_class = '';
							$video = get_sub_field('video');

							



							echo '<div>';
								if( get_sub_field( 'project_gallery_image' ) ) {
									$project_gallery_image 	     = get_sub_field( 'project_gallery_image' );
									$project_gallery_hover_image = get_sub_field( 'project_gallery_hover_image' );

									if ($video) {
										echo '<div class="col-xs-12 col-md-6 col-md-push-3 text-center">';
														
													echo $video;

										echo '</div>';

									} else {


									echo '<div class="">';
										//echo '<div class="row">';
											//echo '<div class="col-sm-8 col-sm-offset-2">';
												if( get_sub_field( 'project_gallery_image' ) && get_sub_field( 'project_gallery_hover_image' ) ) { $hover_class = 'project-gallery-hover'; }
												echo '<div class="img-wrapper '. $hover_class .'"><img src="'. $project_gallery_image['url'] .'" alt="'. $project_gallery_image['alt'] .'" title="'. $project_gallery_image['title'] .'" class="normal-img" /><img src="'. $project_gallery_hover_image['url'] .'" alt="'. $project_gallery_hover_image['alt'] .'" title="'. $project_gallery_hover_image['title'] .'" class="hover-img" /></div>';
											//echo '</div>';
										//echo '</div>';
									echo '</div>';
									}

								}

							 


								echo '<div class="container">';
									echo '<div class="section-block">';
										echo '<div class="row">';
											if( get_sub_field( 'project_image_description' ) ) {
												echo '<div class="col-md-5">';
													echo '<div class="row">';
														echo '<div class="col-md-6 col-md-offset-6 col-sm-12">';
															echo '<p class="caption">'. get_sub_field( 'project_image_description' ) .'</p>';
														echo '</div>';
													echo '</div>';
												echo '</div>';
											}
											if( get_sub_field( 'project_work_description' ) ) {
												echo '<div class="col-md-6 col-md-offset-1">';
													echo '<div class="project-info large-text">'. get_sub_field( 'project_work_description' ) .'</div>';
												echo '</div>';
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				}
				
				//echo '</div>';
			?>
		</div>
		<div class="container">
			<div class="border"></div>
			<div class="project-pagination clearfix">
				<?php
					$prev_post = get_adjacent_post(true, '', false, 'project_category');
					if(!empty($prev_post)) {
						echo '<div class="left-nav page-links">';
							echo '<a href="' . get_permalink($prev_post->ID) . '" class="btn-link" title="' . $prev_post->post_title . '">PREVIOUS</a>';
							echo '<h2>'. $prev_post->post_title .' <span>'. get_field('project_country', $prev_post->ID) .'</span></h2>';
						echo '</div>'; 
					}
					
					$project_index = array_search( get_the_ID(), $count_array );
					echo '<span class="total-count">'. ++$project_index .' of '. $total_project .'</span>';
					
					$next_post = get_adjacent_post(true, '', true, 'project_category');
					if(!empty($next_post)) {
						echo '<div class="right-nav  page-links">';
							echo '<a href="'. get_permalink($next_post->ID) .'" class="btn-link" title="' . $next_post->post_title . '">NEXT</a>';
							echo '<h2>'. $next_post->post_title .'<span>'. get_field('project_country', $next_post->ID) .'</span></h2>';
						echo '</div>';
					}
				?>
			</div>
		</div>
	</section> 
</div>
<script>
	(function( $ ) {
		$('ul.breadcrumb li:first-child').hide();
		$('ul.breadcrumb li:nth-child(2) span[property="itemListElement"]').addClass('first-item');
	})( jQuery );
</script>
<?php 
endwhile;
get_footer();
