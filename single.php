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

get_header(); ?>

<div id="content">
	<?php
		if ( function_exists( 'display_page_breadcrumb' ) ) {
			echo display_page_breadcrumb();
		}
	?>
	<section class="blog-list blog-detail-content no-banner">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-4">
					<div class="leftBar">
						<?php get_sidebar(); ?> 
					</div>
				</div> 
				<?php if(get_field('blog_post')):?>
					<div class="date"><?php echo get_the_date('jS F Y'); ?></div>
					<h2><?php echo get_the_title(); ?></h2>
					<p class="author"><?php echo __('Written by', 'finepoint').' '. ucfirst( get_the_author() ); ?></p>
					<?php
					if(has_post_thumbnail()){
						$blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
						echo '<div class="center-row">';
							echo '<div class="img-wrapper">';
								echo '<img src="'. $blog_image[0] .'" alt="'. get_the_title() .'" title="'. get_the_title() .'" class="greyScale" />';
							echo '</div>';
						echo '</div>';
					}
					?>
					<div><?php the_field('blog_post'); ?></div>
					<div class="pagination-wrapper text-right">
						<a href="<?php echo home_url().'/news/' ?>" class="more-link large-text" title="<?php echo __('back to all articles', 'finepoint');  ?>"><?php echo __('back to all articles', 'finepoint');  ?></a>
					</div>
				<?php  else:?>
					<?php 
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post/content', '' );
						endwhile;
					?>
				<?php endif; ?>
			</div>  
		</div>
	</section>
</div>
<?php get_footer();
