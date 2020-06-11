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
<div class="top-heading">
	<div class="container">
		<div class="clearfix">
			<?php if (is_archive('product')): ?>
			<h1><?php echo __('Our Products', 'finepoint') ?><span class="dot">.</span></h1>
			<?php else: ?>
			<h1><?php echo __('News', 'finepoint') ?><span class="dot">.</span></h1>
			<?php endif; ?>

			<div class="right-part">
				<div class="search-wrapper">
					<a href="javascript:void(0);" id="searchBtn" title="<?php echo __('search', 'finepoint') ?>"><?php echo __('search', 'finepoint') ?></a>
					<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="searchbox">
						<input type="text" placeholder="search" value="<?php echo get_search_query(); ?>" name="s" class="searchinput" />
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
						<?php get_sidebar(); ?>
					</div>
				</div>
				<div class="col-md-8 col-md-offset-1 col-sm-8">
				<?php
					$paged 	   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							echo '<div class="blog-wrapper">';
								echo '<div class="date">'. get_the_date('jS F Y') .'</div>';
								if( get_the_title() ){
									echo '<h2>'. get_the_title() .'</h2>';
								}
								if( get_the_excerpt() ){
									echo '<p>'. get_the_excerpt() .'</p>';
								}
								if(has_post_thumbnail()){
									$blog_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'large');
									echo '<div class="center-row">';
										echo '<div class="img-wrapper">';
											echo '<img src="'. $blog_image[0] .'" alt="'. get_the_title() .'" title="'. get_the_title() .'" class="greyScale" />';
										echo '</div>';
									echo '</div>';
								}
								echo '<div class="text-block">';
									echo '<div class="row">';
										echo '<div class="row-sm-height">';
											if ( function_exists( 'get_custom_excerpt' ) ) {
												echo '<div class="col-sm-8 col-sm-height">';
													echo  get_custom_excerpt( get_the_content(), 300 );
												echo '</div>';
											}
											echo '<div class="col-sm-4 col-sm-height col-sm-bottom">';
												echo '<div class="text-right"><a href="'. get_permalink() .'" class="more-link" title="'. __('READ MORE', 'finepoint') .'">'. __('READ MORE', 'finepoint') .'</a></div>';
											echo '</div>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						endwhile;
						echo custom_pagination( $post->max_num_pages, $pagerange = '', $paged );
					else :
						get_template_part( 'template-parts/post/content', 'none' );
					endif;
				?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer();
