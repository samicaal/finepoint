<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="top-heading">
	<div class="container">
		<div class="clearfix">
			<h1><?php printf( __( 'Search Results for: %s', 'finepoint' ), get_search_query() ); ?><span class="dot">.</span></h1>
			<div class="right-part">
				<div class="search-wrapper">
					<a href="javascript:void(0);" id="searchBtn" title="<?php echo __('search', 'finepoint') ?>"><?php echo __('search', 'finepoint') ?></a>
					<form role="search" method="get" action=<?php echo esc_url( home_url( '/' ) ); ?>>
					<div class="searchbox"> 
						<input type="text" placeholder="search" value="<?php echo get_search_query() ?>" name="s" class="searchinput" />
						<input type="submit" value="go" class="serchbtn" />
					</div>
					</form>
				</div>
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
	<section class="blog-list">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-4">
					<div class="leftBar">
					<?php
						get_sidebar();
					?>
					</div>
				</div>
				<?php
					$paged 	    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$searchText = trim($_GET["s"]);
					$my_args 	= array(
						'post_type'  	=> array("post"),
						's' 			=> $searchText,
						'posts_per_page'=> get_option('posts_per_page'),
						'paged'         => $paged,
					);
					$search_query = new WP_Query($my_args);
					if ( $search_query->have_posts() ) {
						echo '<div class="col-md-8 col-md-offset-1 col-sm-8">';
						while ( $search_query->have_posts() ) {
							$search_query->the_post();
							echo '<div class="blog-wrapper">';
								echo '<h2>'. get_the_title() .'</h2>';
								echo '<div class="text-block">';
									echo '<div class="row">';
										echo '<div class="row-sm-height">';
											echo '<div class="col-sm-8 col-sm-height">';
												echo get_custom_excerpt( get_the_content(), 300 );
											echo '</div>';
											echo '<div class="col-sm-4 col-sm-height col-sm-bottom">';
												echo '<div class="text-right"><a href="'. get_permalink() .'" class="more-link" title="'. __('READ MORE', 'finepoint') .'">'. __('READ MORE', 'finepoint') .'</a></div>';
											echo '</div>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
						echo custom_pagination( $search_query->max_num_pages, $pagerange = '', $paged );
						echo '</div>';
						wp_reset_postdata();
					} else {
						echo '<div class="col-md-8 col-md-offset-1 col-sm-8">';
							echo '<div class="blog-wrapper">';
								echo  '<h2>'. __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'finepoint' ).'</h2>';
							echo '</div>';
						echo '</div>';
					}
				?>
			</div>  
		</div>
	</section> 
</div>
<?php get_footer();
