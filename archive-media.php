<?php

	// Redirect user if not logged in
	if( !is_user_logged_in() ) {
		$redirect = urlencode(get_post_type_archive_link('media'));
		$url = wp_login_url();
		wp_redirect( $url . '?login=media&redirect_to=' . $redirect );
	}

	get_header();

	$args = array(
		'taxonomy'		=> 'media-category',
		'orderby'			=> 'name',
		'order'				=> 'ASC',
		'parent'			=> 0,
		'hide_empty'	=> false
	);

	$categories = get_terms( $args );

?>

	<?php if( have_posts() ): ?>
	<div class="bg-shadow bg-white p-y-3 media-row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="blog-title">
					  <h4 class="section-heading">Media Centre</h4>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="container media-text-container">
		<div class="row">
			<div class="col-xs-12">
				<p class="text-muted" style="padding-left: 10px">The Finepoint media centre has all the content you need to market our products. Choose a category below and start browsing!</p>
			</div>
		</div>
	</div>

	<div class="p-y-1" style="margin-bottom: 250px;">
		<div class="container">
			<div class="row">
				<?php
					$i = 1;

					foreach( $categories as $category ):

					$category_id = $category->term_id;
					$category_link = get_term_link( $category_id, 'media-category' );

					$thumbnail = get_field( 'featured_image', 'media-category_' . $category_id );
					$sizes = $thumbnail['sizes'];
					$thumbnail_md = $thumbnail['sizes']['thumbnail_md'];
					$thumbnail_lg = $thumbnail['sizes']['thumbnail_lg'];

					$i++;

				?>
				<div class="col-xs-12 col-sm-6 col-lg-4">
					<a href="<?php echo $category_link ?>">
						<div class="media-hub-image">
							<?php if( $thumbnail ): ?>
							<img class="img-m-centre img-media-c" src="<?php echo $thumbnail['url']; ?>" alt="<?php echo $thumbnail ?>">
							<?php else: ?>
							<img class="img-m-centre" src="https://placehold.it/450x300">
							<?php endif; ?>
						</div>
					</a>
					<div style="padding-top: 10px;">
						<h3 class="m-b-0"><?php echo $category->name; ?></h3>
					</div>
					<div class="p-a-1" style="margin-bottom: 70px">
						<?php echo $category->description; ?>
					</div>
				</div>

				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

<?php get_footer(); ?>
