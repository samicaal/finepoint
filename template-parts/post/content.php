<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
?>
<div class="col-md-8 col-md-offset-1 col-sm-7 col-sm-offset-1" id="post-<?php the_ID(); ?>">
	<div class="blog-wrapper">
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
		<div class="blog-detail">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
					<?php echo get_the_content(); ?>
				</div>
			</div>
			<?php
				if( get_field( 'single_blogs' ) ) {
					while( has_sub_field( 'single_blogs' ) ) {
						if( get_sub_field( 'single_blog_image' ) ) {
							echo '<div class="center-row">';
								echo '<div class="row">';
									if( get_sub_field( 'single_blog_image' ) ) {
										echo '<div class="col-md-8">';
											echo '<div class="img-wrapper">';
												echo '<img src="'. get_sub_field( 'single_blog_image' ) .'" alt="'. get_the_title() .'" title="'. get_the_title() .'" class="greyScale" />';
											echo '</div>';
										echo '</div>';
									}
									if( get_sub_field( 'single_blog_image_description' ) ) {
										echo '<div class="col-md-4">';
											echo '<p class="note">'. get_sub_field( 'single_blog_image_description' ) .'</p>';
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
						}
						if( get_sub_field( 'single_blog_content' ) ) {
							echo '<div class="row">';
								echo '<div class="col-md-10 col-md-offset-2">'. get_sub_field( 'single_blog_content' ) .'</div>';
							echo '</div>';
						}
					}
				}
			?>
		</div>
	</div>	
	<div class="pagination-wrapper text-right">
		<a href="<?php echo home_url().'/news/' ?>" class="more-link large-text" title="<?php echo __('back to all articles', 'finepoint');  ?>"><?php echo __('back to all articles', 'finepoint');  ?></a>
	</div>
</div>
