<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
  }
get_header(); 

?>

	

<section class="blog-section">
	<div class="container">
		<div class="row">
			<div class="col-12 pb-4">
				<h1 class="display-4 border-heading">News</h1>
				<p class="lead">Take a look at our recent blog posts.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<?php if( have_posts() ): ?>
				<div class="row">
					<?php while( have_posts() ): the_post(); ?>
					<div class="col-12 col-lg-6 ">
						<div class="card m-b-2">

							<a class="embed-responsive embed-responsive-21by9 img-loader" href="<?php the_permalink(); ?>">
							<?php 

									if( has_post_thumbnail() ):

									$image = get_post_thumbnail_id( $post->ID );

									$image_thumbnail = wp_get_attachment_image_src( $image, 'thumbnail-wide-lg' );
									$image_thumbnail_url = $image_thumbnail[0];
									$image_thumbnail_width = $image_thumbnail[1];
									$image_thumbnail_height = $image_thumbnail[2];
									$image_thumbnail_alt = get_post_meta( $image, '_wp_attachment_image_alt', true);

									$image_thumbnail_md = wp_get_attachment_image_src( $image, 'thumbnail-wide-md' );
									$image_thumbnail_url_md  = $image_thumbnail_md[0];

									$image_thumbnail_sm = wp_get_attachment_image_src( $image, 'thumbnail-wide-sm' );
									$image_thumbnail_url_sm  = $image_thumbnail_sm[0];

							?>
								<picture>
									<!--[if IE 9]><video style="display: none;"><![endif]-->
									<source srcset="<?php echo $image_thumbnail_url ?>" media="(min-width: 1200px)">
									<source srcset="<?php echo $image_thumbnail_url_sm ?>" media="(min-width: 992px)">
									<source srcset="<?php echo $image_thumbnail_url_md ?>" media="(min-width: 768px)">
									<source srcset="<?php echo $image_thumbnail_url_sm ?>" media="(min-width: 544px)">
									<source srcset="<?php echo $image_thumbnail_url ?>">
									<!--[if IE 9]></video><![endif]-->
									<div id="bottom-gradient"></div>
									<img class="card-img-top img-fluid blog-img" width="<?php echo $image_thumbnail_width ?>" height="<?php echo $image_thumbnail_height ?>" src="<?php echo $image_thumbnail_url ?>" alt="<?php echo $image_thumbnail_alt ?>">
								</picture>
							<?php else: ?>
								<img class="card-img-top img-fluid lazyload" src="https://placehold.it/1200x514/f5f5f5?text=<?php the_title(); ?>">
							<?php endif; ?>
							</a>
							<div class="blog-title">
								<h2 class="card-title h3"><?php the_title(); ?></h2>
							</div>
							<div class="blog-content">
								<div>
									<ul class="blog-list">
										<li>Posted on: <?php the_date(); ?></li>
										<?php if( $categories = get_the_category_list(', ') ): ?>
										<li>Categorised in: <?php echo $categories ?></li>
										<?php endif; if( $tags = get_the_tag_list('', ', ') ): ?>
										<li>Tagged as: <?php echo $tags ?></li>
										<?php endif; ?>
									</ul>
								</div>
								<div class="blog-button">
									<a class="more-link" href="<?php the_permalink(); ?>">Read More</a>
								</div>
							</div>
							
							
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				<div class="row">
					<div class="col-12 text-xs-center">
				<div class="pagination">
					<?php 
						echo paginate_links( array(
									'prev_text'          => __('<span class="page-link">«</span>'),
									'next_text'          => __('<span class="page-link">»</span>'),
									'before_page_number' => '<span class="page-link">',
									'after_page_number'  => '</span>'
								) );
					?>
				</div>
					</div>
				</div>
				<?php else: ?>
					<p>No posts were found.</p>
				<?php endif; ?>
			</div>
			
		</div>
	</div>
</section>

<?php get_footer(); ?>