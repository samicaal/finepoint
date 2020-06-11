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
<div id="post-<?php the_ID(); ?>">
	<div class="slider-wrapper">
		<div class="img-wrapper"><img src="assets/images/project-detail.jpg" alt="" class="greyScale" /></div>
	</div>
	<div class="container">
		<div class="section-block">
			<div class="row">
				<div class="col-md-5">
					<div class="row">
						<div class="col-md-6 col-md-offset-6 col-sm-12">
							<p class="caption">This is a text describing the picture above and it changes when the picture changes</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-md-offset-1">
					<div class="project-info large-text">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
						<p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
						<p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


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
							$signle_image = get_sub_field( 'single_blog_image' );
							echo '<div class="center-row">';
								echo '<div class="row">';
									echo '<div class="col-md-8">';
										echo '<div class="img-wrapper">';
											echo '<img src="'. $signle_image['url'] .'" alt="'. get_the_title() .'" title="'. get_the_title() .'" class="greyScale" />';
										echo '</div>';
									echo '</div>';
									if( $signle_image['caption'] ) {
										echo '<div class="col-md-4">';
											echo '<p class="note">'. $signle_image['caption'] .'</p>';
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
		<a href="<?php echo home_url().'/blog/' ?>" class="more-link large-text"><?php echo __('back to all articles', 'finepoint');  ?></a>
	</div>
</div>
