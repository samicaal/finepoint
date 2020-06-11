<?php

	// Redirect user if not logged in
	if( !is_user_logged_in() ) {
		$redirect = urlencode(get_post_type_archive_link('media'));
		$url = wp_login_url();
		wp_redirect( $url . '?login=media&redirect_to=' . $redirect );
	}

	$term_id = get_queried_object()->term_id;

	if( $term_id == 2969 ) {
		$url = get_permalink(5241);
		wp_redirect($url);
	}
	
	get_header();


	include 'scripts/media-centre-download.php';

	$args = array(
		'taxonomy'		=> 'media-category',
		'orderby'			=> 'name',
		'order'				=> 'ASC',
		'parent'			=> 0,
		'hide_empty'	=> false
	);

	$categories = get_terms( $args );

	$args = array(
		'taxonomy'		=> 'media-category',
		'orderby'			=> 'count',
		'order'				=> 'DESC',
		'parent'			=> $term_id,
		'hide_empty'	=> true
	);

	$child_terms = get_terms( $args );

	$user_id = wp_get_current_user()->ID;
	$used_media_centre = get_user_meta( $user_id, 'used_media_centre', true );

?>

	<div class="bg-shadow bg-white p-y-2" style="margin-top: 3rem;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="m-b-0"><a href="<?php echo get_post_type_archive_link('media') ?>">Media Centre</a> <small>&#47; <?php single_term_title() ?></small></h1>
				</div>
			</div>
		</div>
	</div>

	<div class="p-y-3">
		<div class="container">
			<div class="row m-b-1">
				<div class="col-xs-12">
					<div class="bg-white z-depth-1">
						<ul class="nav nav-tabs nav-tabs-disabled nav-tabs-center">
							<?php

								foreach( $categories as $category ):

								$category_id = $category->term_id;
								$category_link = get_term_link( $category_id, 'media-category' );

							?>
						  <li class="nav-item">
						    <a class="nav-link<?php if( $term_id == $category_id ) { echo ' active'; } ?>" href="<?php echo $category_link ?>"><?php echo $category->name ?></a>
						  </li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
			<?php

				wp_reset_query();

				$args = array(
					'post_type'			=> 'media',
					'posts_per_page'	=> -1,
					'orderby'			=> 'name',
					'order'				=> 'ASC',
					'tax_query'			=> array(
						array(
							'taxonomy'	=> 'media-category',
							'field'		=> 'term_id',
							'terms'		=> $term_id
						)
					)
				);

				$query = new WP_Query( $args );

				if( $query->have_posts() ):

			?>
			<?php if( !$used_media_centre ): ?>
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-info">
						Filter through our list of documents and select multiple files by ticking the checkbox in the bottom right. You can then download all the selected documents packaged in a .zip file.
					</div>
				</div>
			</div>
			<?php endif; ?>
			<form id="media-centre-form" method="post" action="<?php echo get_term_link($term_id) ?>">
				<div class="row">
					<div class="col-xs-12 col-lg-3">
						<div class="bg-white z-depth-1 m-b-1">
							<div class="p-a-1">
<!-- 								<h6>Sort by</h6>
							  <div class="radio">
							    <label class="form-control-label">
							      <input type="radio" class="sort" data-sort="name:asc" name="sort" checked>
							      <span class="indicator"></span>
							      <span class="label">Name</span>
							    </label>
							  </div>
							  <div class="radio">
							    <label class="form-control-label">
							      <input type="radio" class="sort" data-sort="order:desc" name="sort" value="newest">
							      <span class="indicator"></span>
							      <span class="label">Newest First</span>
							    </label>
							  </div>
							  <div class="radio">
							    <label class="form-control-label">
							      <input type="radio" class="sort" data-sort="order:asc" name="sort" value="oldest">
							      <span class="indicator"></span>
							      <span class="label">Oldest First</span>
							    </label>
							  </div>
							  <div class="radio">
							    <label class="form-control-label">
							      <input type="radio" class="sort" data-sort="downloads:desc" name="sort" value="downloads">
							      <span class="indicator"></span>
							      <span class="label">Most Downloaded</span>
							    </label>
							  </div> -->
							  <?php if( $child_terms ): ?>
								<hr>
								<h6>Filter Type</h6>
								<?php

									foreach( $child_terms as $tag ):
									$tag_name = $tag->name;
									$tag_slug = $tag->slug;

								?>
							  <div class="checkbox">
							    <label class="form-control-label">
							      <input type="checkbox" name="filter" class="filter" data-filter=".<?php echo $tag_slug ?>">
							      <span class="indicator"></span>
							      <span class="label"><?php echo $tag_name ?></span>
							    </label>
							  </div>
								<?php endforeach; ?>
								<?php endif; ?>
								<?php

									$tags = array();

									while( $query->have_posts() ) { $query->the_post();
										$brands = get_the_terms( $post->ID, 'media-brand' );
										if( $brands ) {
											foreach( $brands as $cat ) {
												if( !array_key_exists( $cat->term_id, $tags ) ) {
													$tags[$cat->term_id] = $cat->term_id;
												}
											}
										}
									}

									if( $tags ):

									$args = array(
										'taxonomy' 		=> 'media-brand',
										'orderby'		=> 'name',
										'order'			=> 'ASC',
										'include'		=>	$tags
									);

									$tags = get_terms( $args );
								?>
								<hr>
								<h6>Filter Brand</h6>
								<?php

									foreach( $tags as $tag ):
									$tag_name = $tag->name;
									$tag_slug = $tag->slug;

								?>
							  <div class="checkbox">
							    <label class="form-control-label">
							      <input type="checkbox" name="filter" class="filter" data-filter=".<?php echo $tag_slug ?>">
							      <span class="indicator"></span>
							      <span class="label"><?php echo $tag_name ?></span>
							    </label>
							  </div>
								<?php endforeach; ?>
								<?php endif; ?>
								<?php

									$tags = array();

									while( $query->have_posts() ) { $query->the_post();
										$brands = get_the_terms( $post->ID, 'media-product-category' );
										if( $brands ) {
											foreach( $brands as $cat ) {
												if( !array_key_exists( $cat->term_id, $tags ) ) {
													$tags[$cat->term_id] = $cat->term_id;
												}
											}
										}
									}

									if( $tags ):

									$args = array(
										'taxonomy' 		=> 'media-product-category',
										'orderby'		=> 'name',
										'order'			=> 'ASC',
										'include'		=>	$tags
									);

									$tags = get_terms( $args );

								?>
								<hr>
								<h6>Filter Product</h6>
								<?php

									foreach( $tags as $tag ):

									$tag_name = $tag->name;
									$tag_slug = $tag->slug;

								?>
							  <div class="checkbox">
							    <label class="form-control-label">
							      <input type="checkbox" name="filter" class="filter" data-filter=".<?php echo $tag_slug ?>">
							      <span class="indicator"></span>
							      <span class="label"><?php echo $tag_name ?></span>
							    </label>
							  </div>
								<?php endforeach; ?>
								<?php endif; ?>
								<hr>
								<?php wp_nonce_field( 'media_centre_download' ) ?>
								<input type="hidden" name="action" value="media_centre_download">
								<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
								<input type="submit" id="media-centre-form-submit" class="btn btn-primary btn-lg btn-block disabled" value="Download File(s)">
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-lg-9">
						<div class="row mix-toggle mix-container">
							<?php

								$index = 0; while( $query->have_posts() ): $query->the_post(); $index++;

								$file = get_field('file_upload');
								$file_id = $file['ID'];
								$file_url = $file['url'];
								$file_size = filesize( get_attached_file( $file_id ) );
								$file_size = size_format($file_size, 2);
								$file_type = pathinfo( get_attached_file( $file_id ) );
								$file_type = $file_type['extension'];

								if( !$download_count = get_post_meta( $file_id, 'download_count', true ) ) {
									$download_count = 0;
								}

								$types = get_the_terms( $post->ID, 'media-category' );
								$brands = get_the_terms( $post->ID, 'media-brand' );
								$products = get_the_terms( $post->ID, 'media-product-category' );

							?>
							<div id="<?php echo $post->ID; ?>" class="col-xs-12 col-md-6 col-xxl-4 mix<?php if( $types ) { foreach( $types as $type ) { if( $type->ID != $term_id ) { echo ' ' . $type->slug; } } } ?><?php if( $brands ) { foreach( $brands as $brand ) { echo ' ' . $brand->slug; } } ?><?php if( $products ) { foreach( $products as $product ) { echo ' ' . $product->slug; } } ?> m-y-1" data-name="<?php the_title() ?>" data-order="<?php the_time('U') ?>" data-downloads="<?php echo $download_count ?>">
								<div class="bg-white z-depth-1 m-b-1" title="<?php the_title() ?>" style="overflow:auto; display: flex;">
									<?php

										if( has_post_thumbnail() ) :
										$thumbnail_id = get_post_thumbnail_id( $post->ID );
										$thumbnail = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail_md_portrait' )[0];

									?>
									<img class="img-fluid pull-xs-left m-r-1" width="100" height="150" src="<?php echo $thumbnail ?>" alt="<?php the_title() ?>">
									<?php else: ?>
									<img class="img-fluid pull-xs-left m-r-1" width="100" height="150" src="https://placehold.it/200x300">
									<?php endif; ?>
									<div style="padding: 1rem;">
										<h3 class="h6 text-truncate"><?php the_title(); ?></h3>
										<hr style="margin:0.5rem 0 0;">
										<div class="text-truncate text-muted"><small>Type: <?php echo $file_type ?></small></div>
										<div class="text-truncate text-muted"><small>Size: <?php echo $file_size ?></small></div>
										<div class="text-truncate text-muted"><small>Downloads: <?php echo $download_count ?></small></div>
										<div class="pull-xs-right">
											<a class="btn-reset btn-checkbox active" href="<?php echo $file_url ?>" target="_blank" data-toggle="tooltip" title="Preview"><i class="icon icon-share"></i></a>
											<label class="btn-checkbox" data-toggle="tooltip" title="Download">
												<input type="checkbox" name="<?php echo $file['ID'] ?>" value="<?php echo $file['filename'] ?>" data-toggle="file">
												<i class="icon icon-check"></i>
											</label>
										</div>
									</div>
								</div>
							</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</form>
			<?php else: ?>
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-info">
						There are currently no documents to display in this category.
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>