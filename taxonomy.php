<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<?php
$product_slug =  get_queried_object()->slug;
$product_args  = array(
				'post_type'     => 'product',
				'posts_per_page'=> -1,
				'tax_query' 	=> array(
						array(
							'taxonomy' => 'product_category',
							'field'    => 'slug',
							'terms'    => $product_slug,
						),
					),
			);
		
$product_query = new WP_Query( $product_args );
$count 		   = $product_query->post_count;
$total_product = $product_query->found_posts;
if ( $product_query->have_posts() ) {
	$cat_array = array();
	while ( $product_query->have_posts() ) {
		$product_query->the_post();
		$cat_array[] = '"'. get_the_title() .'"';
	}
	$cat_list = '['. implode(",", $cat_array) .']';
	echo '<script>var slider_cat = '. $cat_list .'</script>';
}

if ( $product_query->have_posts() ) {
	
	echo '<div class="top-heading">';
		echo '<div class="container">';
			echo '<div class="clearfix">';
				echo '<h2>'. get_queried_object()->name .'<span class="dot">.</span></h2>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
	
	echo '<div id="content">';
		if ( function_exists( 'display_page_breadcrumb' ) ) {
			echo display_page_breadcrumb();
		}
		echo '<section class="products-list">';
			echo '<div class="container">';
				
				
				echo '<div class="row">';
				echo '<div class="col-md-2 col-sm-2">';
					echo '<div class="number-wrapper">';
						echo '<h2 class="slide-num"></h2>';
					echo '</div>';
					echo '<div class="list-slider">';
					while ( $product_query->have_posts() ) {
						$product_query->the_post();
						echo '<div class="name-list"></div>';
					}
					echo '</div>';
					wp_reset_postdata();
				echo '</div>';
				echo '<div class="col-md-8 col-sm-10">';
				echo '<div class="product-slider">';
					while ( $product_query->have_posts() ) {
						$product_query->the_post();
						echo '<div>';
							
									echo '<div class="text-block">';
										echo '<div class="row">';
											echo '<div class="col-md-6 col-sm-5">';
												echo '<h3>'. get_the_title() .'<span class="dot">.</span></h3>';
												if( get_field( 'display_product_title_logo' ) ) {
													$product_title_logo = get_field( 'product_title_logo' );
													echo '<div class="img-wrapper product-logo">';
														echo '<img src="'. $product_title_logo['url'] .'" alt="'. $product_title_logo['alt'] .'" title="'. $product_title_logo['title'] .'" class="greyScale" />';
													echo '</div>';
												}
											echo '</div>';
											echo '<div class="col-md-6 col-sm-7 text-right">';
												echo '<p class="large-text">'. substr(get_the_content(), 0, 280) .'</p>';
											echo '</div>';
										echo '</div>';
									echo '</div>';
									if(has_post_thumbnail()){
										$product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_query->ID), 'large');
										echo '<div class="img-wrapper">';
											echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'"><img src="'. $product_image[0] .'" alt="'. get_the_title() .'" title="'. get_the_title() .'" class="greyScale" /></a>';
										echo '</div>';
									}
									echo '<div class="section-block text-center"><a href="'. get_permalink() .'" class="more-link" title="'. __('see product details', 'finepoint') .'">'. __('see product details', 'finepoint') .'</a></div>';
								
						echo '</div>';
					}
					wp_reset_postdata();
				echo '</div>';
				echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</section>';
	echo '</div>';
}
?>
<?php get_footer();
