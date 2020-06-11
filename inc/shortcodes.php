<?php
// [home_projects title="" number_of_peoject=""]
add_shortcode('home_projects', 'home_projects_function');
function home_projects_function( $atts ){
	$atts = shortcode_atts(array(
        'title' 			=> '',
        'number_of_peoject'	=> '-1',
    ), $atts);
 
    $output = '';
	
	$output .= '<section class="content-wrapper section-block latest-project-slider">';
		$output .= '<div class="container">';
			$output .= '<div class="gallery-wrapper showroom-gallery">';
			$output .= '<div class="number-wrapper">';
				$output .= '<div class="slide-num">1 of 4</div>';
			$output .= '</div>';
			
			$output .= '<div class="gallery-slider">';
			
			$project_args = array(
						'post_type'     => 'project',
						'posts_per_page'=> $atts['number_of_peoject'],
					);
			$project_query = new WP_Query( $project_args );
			$count = $project_query->post_count;
			if ( $project_query->have_posts() ) {
				while ( $project_query->have_posts() ) {
					$project_query->the_post();
					
					$project_slug = '';
					$project_categories = get_the_terms(get_the_ID(), 'project_category');
					foreach( $project_categories as $project_category ){
						$project_slug = $project_category->slug;
					}
					$output .= '<div>';
						if(has_post_thumbnail()){
							$gallery_image = wp_get_attachment_image_src(get_post_thumbnail_id($project_query->ID), 'large');
							$output .= '<div class="slider-wrapper">';
								$output .= '<div class="img-wrapper"><img src="'. $gallery_image[0] .'" alt="'. get_the_title() .'" title="'. get_the_title() .'" class="greyScale" /></div>';
							$output .= '</div>';
						}
						if( get_field( 'project_gallery' ) ) {
							$gallery = get_field( 'project_gallery' );
						}
						
						$output .= '<div class="text-block">';
							$output .= '<div class="row">';
								$output .= '<div class="col-sm-4">';
									if( !empty( $atts['title'] ) ) {
										$output .= '<h2>'. $atts['title'] .'<span class="dot">.</span></h2>';
									}
								$output .= '</div>';
								$output .= '<div class="col-sm-8">';
									$output .= '<div class="desc">';
										$output .= '<h3>'. get_the_title() .'<span class="dot">.</span></h3>';
										$output .= get_custom_excerpt( $gallery[0]['project_work_description'], 200 );
										if( $project_slug == 'residential' ){
											$output .= '<a href="'. home_url() .'/residential-projects/" class="more-link" title="'. __('SEE RESIDENTIAL PROJECTS', 'finepoint') .'">'. __('SEE RESIDENTIAL PROJECTS', 'finepoint') .'</a>';
										} else {
											$output .= '<a href="'. home_url() .'/commercial-projects/" class="more-link" title="'. __('SEE COMMERCIAL PROJECTS', 'finepoint') .'">'. __('SEE COMMERCIAL PROJECTS', 'finepoint') .'</a>';
										}
									$output .= '</div>';
								$output .= '</div>';											
							$output .= '</div>';
						$output .= '</div>';
						
					$output .= '</div>';
				}
			}
			wp_reset_postdata();
			$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';
    $output .= '</section>';
	return $output;
}


// [home_blogs title="" number_of_blogs=""]
add_shortcode('home_blogs', 'home_blogs_function');
function home_blogs_function( $atts ){
	$atts = shortcode_atts(array(
        'title' 			=> '',
        'number_of_blogs'	=> '-1',
    ), $atts);
 
    $output = '';
	
	$blog_args = array(
					'post_type'     => 'post',
					'posts_per_page'=> $atts['number_of_blogs'],
				);
	$blog_query = new WP_Query( $blog_args );
	$count = $blog_query->post_count;
	if ( $blog_query->have_posts() ) {
		
		$output .= '<section>';
			$output .= '<div class="container">';
				$output .= '<div class="border"></div>';
				$output .= '<div class="our-blog section-block">';
					$output .= '<h2>'. $atts['title'] .'<span class="dot">.</span></h2>';
					$output .= '<div class="row">';
					while ( $blog_query->have_posts() ) {
						$blog_query->the_post();
						$output .= '<div class="col-sm-4">';
							$output .= '<div class="thumbnail">';
								if(has_post_thumbnail()){
									$blog_image = wp_get_attachment_image_src(get_post_thumbnail_id($blog_query->ID), 'large');
									$output .= '<div class="img-wrapper"><img src="'. $blog_image[0] .'" alt="'. get_the_title() .'" title="'. get_the_title() .'" class="greyScale" /></div>';
								}
								$output .= '<h3>'. get_the_title() .'</h3>';
								$output .= '<div class="date">'. __('PUBLISHED ON', 'finepoint') .' '. get_the_date('d.m.Y') .'</div>';
								$output .= get_custom_excerpt( get_the_content(), 130 );
								$output .= '<a href="'. get_permalink() .'" class="btn-link" title="'. __('READ MORE', 'finepoint') .'">'. __('READ MORE', 'finepoint') .'</a>';
							$output .= '</div>';
						$output .= '</div>';
					}
					wp_reset_postdata();
					$output .= '</div>';
				$output .= '</div>';
				//$output .= '<div class="border"></div>';
			$output .= '</div>';
		$output .= '</section>';
	}
	
	return $output;
}

// [blogs title="" number_of_blogs=""]
add_shortcode('blogs', 'blogs_function');
function blogs_function( $atts ){
	$atts = shortcode_atts(array(
        'title' 			=> '',
        'number_of_blogs'	=> '-1',
    ), $atts);
	
	ob_start();
    $output = '';
    $paged 	   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	
	$blog_args = array(
					'post_type'     => 'post',
					'posts_per_page'=> $atts['number_of_blogs'],
					'paged'         => $paged,
				);
	$blog_query = new WP_Query( $blog_args );
	$count = $blog_query->post_count;
	if ( $blog_query->have_posts() ) {
		
		$output .= '<div class="top-heading">';
        	$output .= '<div class="container">';
            	$output .= '<div class="clearfix">';
            		$output .= '<h2>'. $atts['title'] .'<span class="dot">.</span></h2>';
                    $output .= '<div class="right-part">';
                    	$output .= '<div class="search-wrapper">';
                        	$output .= '<a href="javascript:void(0);" id="searchBtn" title="'. __('search', 'finepoint') .'">'. __('search', 'finepoint') .'</a>';
                            $output .= '<form role="search" method="get" action="'. esc_url( home_url( '/' ) ) .'">';
                            $output .= '<div class="searchbox">';
                            	$output .= '<input type="text" placeholder="search" value="'. get_search_query() .'" name="s" class="searchinput" />';
                                $output .= '<input type="submit" value="go" class="serchbtn" />';
                            $output .= '</div>';
                            $output .= '</form>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
		
		
		$output .= '<div id="content">';
			if ( function_exists( 'display_page_breadcrumb' ) ) {
				$output .= display_page_breadcrumb();
			}
            $output .= '<section class="blog-list">';
            	$output .= '<div class="container">';
  					$output .= '<div class="row">';
                    	$output .= '<div class="col-md-3 col-sm-4">';
                        	$output .= '<div class="leftBar">';
								get_sidebar();
								$output .= ob_get_contents();
                            $output .= '</div>';
                        $output .= '</div>';
                        $output .= '<div class="col-md-8 col-md-offset-1 col-sm-8">';
							while ( $blog_query->have_posts() ) {
								$blog_query->the_post();
								
								$output .= '<div class="blog-wrapper">';
									$output .= '<div class="date">'. get_the_date('jS F Y') .'</div>';
									if( get_the_title() ){
										$output .= '<h2>'. get_the_title() .'</h2>';
									}
									if( get_the_excerpt() ){
										$output .= '<p>'. get_the_excerpt() .'</p>';
									}
									if(has_post_thumbnail()){
										$blog_image = wp_get_attachment_image_src(get_post_thumbnail_id($blog_query->ID), 'large');
										$output .= '<div class="center-row">';
											$output .= '<div class="img-wrapper">';
												$output .= '<img src="'. $blog_image[0] .'" alt="'. get_the_title() .'" title="'. get_the_title() .'" class="greyScale" />';
											$output .= '</div>';
										$output .= '</div>';
									}
									$output .= '<div class="text-block">';
										$output .= '<div class="row">';
											$output .= '<div class="row-md-height">';
												if ( function_exists( 'get_custom_excerpt' ) ) {
													$output .= '<div class="col-md-8 col-md-height">';
														$output .= get_custom_excerpt( get_the_content(), 300 );
													$output .= '</div>';
												}
												$output .= '<div class="col-md-4 col-md-height col-md-bottom">';
													$output .= '<div class="text-right"><a href="'. get_permalink() .'" class="more-link" title="'. __('READ MORE', 'finepoint') .'">'. __('READ MORE', 'finepoint') .'</a></div>';
												$output .= '</div>';
											$output .= '</div>';
										$output .= '</div>';
									$output .= '</div>';
								$output .= '</div>';
							}
							$output .= custom_pagination( $blog_query->max_num_pages, $pagerange = '', $paged );
							wp_reset_postdata();
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</section>';
        $output .= '</div>';	
	}
	ob_end_clean();
	return $output;
}

// [jobs number_of_jobs=""]
add_shortcode('jobs', 'jobs_function');
function jobs_function( $atts ){
	$atts = shortcode_atts(array(
        'number_of_jobs'=> '-1',
    ), $atts);
 
    $output	   = '';
    $paged 	   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    
	$job_department = (isset($_GET['department'])) ? $_GET['department'] : '';
	$job_location 	= (isset($_GET['location'])) ? $_GET['location'] : '';
	$job_salary 	= (isset($_GET['salary'])) ? $_GET['salary'] : '';
	$contract_type 	= (isset($_GET['contract'])) ? $_GET['contract'] : '';
	
	if( empty( $_GET ) || isset( $_GET['all'] ) && $_GET['all'] == 'true' ) {
		$job_args = array(
				'post_type'     => 'job',
				'posts_per_page'=> $atts["number_of_jobs"],
				'paged'         => $paged,
			);
	} else {
		
		if( $_GET['department'] == '' && $_GET['location'] == '' && $_GET['salary'] == '' && $_GET['contract'] == '' ) {
			$job_args = array(
				'post_type'     => 'job',
				'posts_per_page'=> $atts["number_of_jobs"],
				'paged'         => $paged,
			);
		} else {
			
			$filter_array = array( 'relation'=>'AND' );
			if( $_GET['department'] != '' ){
				array_push( $filter_array,  array( 'key' => 'job_department', 'value' => $job_department ) );
			}
			if( $_GET['location'] != '' ){
				array_push( $filter_array,  array( 'key' => 'job_location', 'value' => $job_location ) );
			}
			if( $_GET['salary'] != '' ){
				array_push( $filter_array,  array( 'key' => 'job_salary', 'value' => $job_salary ) );
			}
			if( $_GET['contract'] != '' ){
				array_push( $filter_array,  array( 'key' => 'job_contract_type', 'value' => $contract_type ) );
			}
			$job_args = array(
				'post_type'  	 => 'job',
				'posts_per_page' => $atts["number_of_jobs"],
				'paged'          => $paged,
				'meta_query' 	 => $filter_array,
			);
		}
	}
		
	$job_query 	  = new WP_Query( $job_args );
	$count		  = $job_query->post_count;
	$total_result = $job_query->found_posts;
	//if ( $job_query->have_posts() ) {
		
		$output .= '<div class="top-heading">';
        	$output .= '<div class="container">';
            	$output .= '<div class="clearfix">';
            		$output .= '<h2>'. __('Work with us', 'finepoint') .'<span class="dot">.</span></h2>';
                    $output .= '<div class="right-part">';
                    	$output .= '<div class="filter-wrapper">';
                    		$output .= '<a href="javascript:void(0);" id="jobFilter" title="'. __('FILTERS', 'finepoint') .'">'. __('FILTERS', 'finepoint') .'</a>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
		
		$output .= '<form role="search" action="">';
		$output .= '<div class="filter-job">';
        	$output .= '<div class="container">';
            	$output .= '<div class="row">';
					$select = '';
					$departments = get_meta_values( 'job_department', 'job', 'publish' );
					if( !empty( $departments  ) ) {
						$output .= '<div class="col-sm-3">';
							$output .= '<div class="customize">';
								$output .= '<h2>'. __('Department', 'finepoint') .'</h2>';
								$output .= '<select class="selectpicker" name="department" title="'. __('select one', 'finepoint') .'">';
									$output .= '<option value=""></option>';
									foreach( $departments as $department ) {
										if( !empty( $department ) ) {
											if(isset($_GET['department'])){
												if( $_GET['department'] == $department ) { $select = 'selected="selected"'; } else { $select = ''; }
											} 
											$output .= '<option value="'. $department .'" '. $select .'>'. ucfirst( $department ) .'</option>';
										}
									}
								$output .= '</select>';
							$output .= '</div>';
						$output .= '</div>';
					}
                    $contract_types = get_meta_values( 'job_contract_type', 'job', 'publish' );
                    if( !empty( $contract_types  ) ) {
						 $output .= '<div class="col-sm-3">';
							$output .= '<div class="customize">';
								$output .= '<h2>'. __('Contract', 'finepoint') .'</h2>';
								$output .= '<select class="selectpicker" name="contract" title="'. __('select one', 'finepoint') .'">';
									$output .= '<option value=""></option>';
									foreach( $contract_types as $contract_type ) {
										if( !empty( $contract_type ) ) {
											if(isset($_GET['contract'])){
												if( $_GET['contract'] == $contract_type ) { $select = 'selected="selected"'; } else { $select = ''; }
											}
											$output .= '<option value="'. $contract_type .'" '. $select .'>'. ucfirst( $contract_type ) .'</option>';
										}
									}									
								$output .= '</select>';
							$output .= '</div>';
						$output .= '</div>';
					}
                    $locations = get_meta_values( 'job_location', 'job', 'publish' );
				    if( !empty( $locations  ) ) {
						$output .= '<div class="col-sm-3">';
							$output .= '<div class="customize">';
								$output .= '<h2>'. __('Location', 'finepoint') .'</h2>';
								$output .= '<select class="selectpicker" name="location" title="'. __('select one', 'finepoint') .'">';
								$output .= '<option value=""></option>';
									foreach( $locations as $location ) {
										if( !empty( $location ) ) {
											if(isset($_GET['location'])){
												if( $_GET['location'] == $location ) { $select = 'selected="selected"'; } else { $select = ''; }
											}
											$output .= '<option value="'. $location .'" '. $select .'>'. ucfirst( $location ) .'</option>';
										}
									}
								$output .= '</select>';
							$output .= '</div>';
						$output .= '</div>';
				    }
					$salaries = get_meta_values( 'job_salary', 'job', 'publish' );
					if( !empty( $salaries  ) ) {
						$output .= '<div class="col-sm-3">';
							$output .= '<div class="customize">';
								$output .= '<h2>'. __('Salary', 'finepoint') .'</h2>';
								$output .= '<select class="selectpicker" name="salary" title="'. __('select one', 'jaspar') .'">';
									$output .= '<option value=""></option>';
									foreach( $salaries as $salary ) {
										if( !empty( $salary ) ) {
											if(isset($_GET['salary'])){
												if( $_GET['salary'] == $salary ) { $select = 'selected="selected"'; } else { $select = ''; }
											}
											$output .= '<option value="'. $salary .'" '. $select .'>£'. strtoupper( $salary ) .'</option>';
										}
									}
								$output .= '</select>';
							$output .= '</div>';
						$output .= '</div>';
					}                   
                $output .= '</div>';
                $output .= '<div class="clearfix job-links">';
                	$output .= '<ul class="list-inline">';
                        $output .= '<li><button type="submit" class="more-link">'. __('SEE RESULTS', 'finepoint') .'</button></li>';
                        $output .= '<li><a href="?all=true" title="'. __('VIEW ALL JOBS', 'finepoint') .'">'. __('VIEW ALL JOBS', 'finepoint') .'</a></li>';
                    $output .= '</ul>';
                    $output .= '<span class="page-result">'. $total_result .' results</span>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
        $output .= '</form>';
        
        $output .= '<div id="content">';
			if ( function_exists( 'display_page_breadcrumb' ) ) {
				$output .= display_page_breadcrumb();
			}
            $output .= '<section class="about-jobs">';
            	$output .= '<div class="container">';
				if ( $job_query->have_posts() ) {
					while ( $job_query->have_posts() ) {
						$job_query->the_post();
						$output .= '<div class="job-wrapper">';
							$output .= '<div class="row">';
								$output .= '<div class="col-sm-4">';
									$output .= '<div class="job-desc">';
										if( get_the_title() ) {
											$output .= '<h3>'. get_the_title() .'</h3>';
										}
										if( get_field( 'job_location' ) ) {
											$output .= '<p class="place">'. get_field( 'job_location' ) .'</p>';
										}
										$output .= '<div>';
											if( get_field( 'job_salary' ) ) {
												$output .= '<span class="amt">£'. get_field( 'job_salary' );
											}
											if( get_field( 'job_salary_type' ) ) {
												$output .= get_field( 'job_salary_type' );
												$output .= '</span>';
											}
											if( get_field( 'job_type' ) ) {
												$output .= ucfirst( get_field( 'job_type' ) );
											}
											if( get_field( 'job_contract_type' ) ) {
												$output .= '/';
												$output .= ucfirst( get_field( 'job_contract_type' ) );
											}
										$output .= '</div>';
									$output .= '</div>';
								$output .= '</div>';
								if( get_the_content() ) {
									$output .= '<div class="col-sm-8">';
										$output .= '<div class="job-detail ajax_content" id="ajax_content_'. get_the_ID() .'">';
											$output .= job_short_description(get_the_content(), 280);
										$output .= '</div>';
									$output .= '</div>';
								}
							$output .= '</div>';
						$output .= '</div>';
					}
					$output .= custom_pagination( $job_query->max_num_pages, $pagerange = '', $paged );
					wp_reset_postdata();
				} else {
					$output .= '<div class="job-wrapper">';
						$output .= '<div class="row">';
							$output .= '<div class="col-sm-12"><div class="job-desc">No jobs jound. Please try again with some different options.</div></div>';
						$output .= '</div>';
					$output .= '</div>';
				}
                $output .= '</div>';
            $output .= '</section>';
            if( get_field( 'display_candidate_information' ) ){
				$output .= '<section class="good-fit">';
					$output .= '<div class="container">';
						$output .= '<div class="row">';
							if( get_field( 'candidate_information_content' ) ) {
								$output .= '<div class="col-md-6 col-md-offset-4">';
									$output .= '<h2>'. get_field( 'candidate_information_title' ) .'</h2>';
									$output .= get_field( 'candidate_information_content' );
								$output .= '</div>';
							}
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</section>';
			}
            $testimonial_args = array(
				'post_type'     => 'testimonial',
				'posts_per_page'=> 1,
			);
			$testimonial_query 	  = new WP_Query( $testimonial_args );
			if ( $testimonial_query->have_posts() ) {
				$output .= '<section class="feedback-wrapper">';
					$output .= '<div class="container">';
						$output .= '<div class="feedback">'; 
						while ( $testimonial_query->have_posts() ) {
							$testimonial_query->the_post();
							$output .= '<div class="row">';
								$output .= '<div class="col-sm-4">';
									$output .= '<h2>'. __('What our employees say about us', 'finepoint') .'<span class="dot">.</span></h2>';
								$output .= '</div>';
								$output .= '<div class="col-sm-8">';
									$output .= '<p>“'. get_the_content() .'”</p>';
									$output .= '<div class="emp-info">';
										$output .= '<h4>'. get_the_title() .'<span>'. get_field('testimonials_designation') .'</span></h4>';
									$output .= '</div>';
								$output .= '</div>';
							$output .= '</div>';
						}
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</section>';
			}
        $output .= '</div>';
	//}
	return $output;
}

// [projects type="" title="" number_of_peoject=""]
add_shortcode('projects', 'projects_function');
function projects_function( $atts ){
	$atts = shortcode_atts(array(
		'type'				=> 'residential',
        'title' 			=> '',
        'number_of_peoject'	=> '-1',
    ), $atts);
 
    $output 	   = '';
    $paged 	   	   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    
    if( empty( $_GET ) ) {
		$project_args  = array(
					'post_type'     => 'project',
					'posts_per_page'=> $atts['number_of_peoject'],
					'paged'         => $paged,
					'tax_query' 	=> array(
							array(
								'taxonomy' => 'project_category',
								'field'    => 'slug',
								'terms'    => $atts['type'],
							),
						),
				);
	} else {
		if( $_GET['all'] == 'true' ) {
			$project_args  = array(
					'post_type'     => 'project',
					'posts_per_page'=> -1,
					'paged'         => $paged,
					'tax_query' 	=> array(
							array(
								'taxonomy' => 'project_category',
								'field'    => 'slug',
								'terms'    => $atts['type'],
							),
						),
				);
		} else {
			$project_args  = array(
					'post_type'     => 'project',
					'posts_per_page'=> $atts['number_of_peoject'],
					'paged'         => $paged,
					'tax_query' 	=> array(
							array(
								'taxonomy' => 'project_category',
								'field'    => 'slug',
								'terms'    => $atts['type'],
							),
						),
				);			
		}
	}
	
	$project_query = new WP_Query( $project_args ) ;
	$count 		   = $project_query->post_count;
	$total_project = $project_query->found_posts;
	if( $atts['number_of_peoject'] > $total_project || $atts['number_of_peoject'] == '-1') {
		$atts['number_of_peoject'] = $total_project;
	}
	
	if ( $project_query->have_posts() ) {
		$output .= '<div class="top-heading">';
			$output .= '<div class="container">';
				$output .= '<div class="clearfix">';
					$output .= '<h2>'. $atts['title'] .'<span class="dot">.</span></h2>';
					// $output .= '<div class="right-part">';
					// 	$output .= '<span class="num">'. $total_project .' '. __('projects', 'finepoint') .'</span>';
					// 	// $output .= '<ul class="right-links">';
					// 	// 	$link = '';
					// 	// 	if( $atts['type'] == 'residential' ){
					// 	// 		$link = home_url() .'/residential-projects/';
					// 	// 	} else {
					// 	// 		$link = home_url() .'/commercial-projects/';
					// 	// 	}
					// 	// 	$output .= '<li><a href="'. $link .'" title="'. __('SEE', 'finepoint') .' '. $atts['number_of_peoject'] .'">'. __('SEE', 'finepoint') .' '. $atts['number_of_peoject'] .'</a></li>';
					// 	// 	$output .= '<li><a href="'. $link .'?all=true" title="'. __('SEE ALL', 'finepoint') .'">'. __('SEE ALL', 'finepoint') .'</a></li>';
					// 	// $output .= '</ul>';
					// $output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';
		
		$output .= '<div id="content">';
			if ( function_exists( 'display_page_breadcrumb' ) ) {
				$output .= display_page_breadcrumb();
			}
			$output .= '<section class="project-list">';
				$output .= '<div class="container">';
				
				
					$project_count = 0;
					while ( $project_query->have_posts() ) {
						$project_query->the_post();
						if( $project_count%3 == 0 ) {
							$output .= '<div class="row">';
						}
						$output .= '<div class="col-sm-4">';
                        	$output .= '<div class="project-wrapper">';
								if(has_post_thumbnail()){
									$project_image = wp_get_attachment_image_src(get_post_thumbnail_id($project_query->ID), 'large');
									$output .= '<div class="img-wrapper">';
										$output .= '<img src="'. $project_image[0] .'" alt="'. get_the_title() .'" title="'. get_the_title() .'" class="greyScale" />';
									$output .= '</div>';
								}							
								/*if( get_field( 'project_gallery' ) ) {
									$gallery = get_field( 'project_gallery' );
									$output .= '<div class="img-wrapper">';
										$output .= '<img src="'. $gallery[0]['project_gallery_image'] .'" alt="'. get_the_title() .'" title="'. get_the_title() .'" class="greyScale" />';
									$output .= '</div>';
								}*/
                                $output .= '<a href="'. get_permalink() .'" class="hover-block" title="'. __('go to projectpage', 'finepoint') .'">';
									if( get_the_title() ) {
										$output .= '<h2>'. get_the_title() .'</h2>';
									}
									if( get_field( 'project_country' ) ){
										$output .= '<div class="place">'. get_field( 'project_country' ) .'</div>';
									}
									$output .= '<span class="btn-link">'. __('go to project page', 'finepoint') .'</span>';
                                $output .= '</a>';
                            $output .= '</div>';
                       $output .= '</div>';
                       $project_count++;
                       if( $project_count%3 == 0 || $count == $project_count ) {
							$output .= '</div>';
					   }
					}
					if( $count < $total_project ) {
						$output .= '<div class="border"></div>';
					}
                    // $output .= custom_pagination( $project_query->max_num_pages, $pagerange = '', $paged );
                    wp_reset_postdata();
                $output .= '</div>';
            $output .= '</section>';
        $output .= '</div>';		
	}
	return $output;
}

// [products title=""]
add_shortcode('products', 'products_function');
function products_function( $atts ){
	$atts = shortcode_atts(array(
        'title' 			=> '',
        'number_of_peoject'	=> '-1',
    ), $atts);
 
    $output 	   = '';
	$product_args  = array(
				'post_type'     => 'product',
				'posts_per_page'=> -1,
			);
		
	$product_query = new WP_Query( $product_args );
	$count 		   = $product_query->post_count;
	$total_product = $product_query->found_posts;
	
	if ( $product_query->have_posts() ) {
		
		$output .= '<div class="top-heading">';
        	$output .= '<div class="container">';
            	$output .= '<div class="clearfix">';
            		$output .= '<h2>'. $atts['title'] .'<span class="dot">.</span></h2>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
        
        $output .= '<div id="content">';
			if ( function_exists( 'display_page_breadcrumb' ) ) {
				$output .= display_page_breadcrumb();
			}
            $output .= '<section class="products-list">';
                $output .= '<div class="container">';
                	$output .= '<div class="number-wrapper">';
                    	$output .= '<h2 class="slide-num"></h2>';
                    $output .= '</div>';
                	$output .= '<div class="product-slider">';
						while ( $product_query->have_posts() ) {
							$product_query->the_post();
							$output .= '<div>';
								$output .= '<div class="row">';
									$output .= '<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">';
										$output .= '<div class="text-block">';
											$output .= '<div class="row">';
												$output .= '<div class="col-sm-6">';
													$output .= '<h3>'. get_the_title() .'</h3>';
												$output .= '</div>';
												$output .= '<div class="col-sm-6">';
													$output .= '<p class="large-text">'. substr(get_the_content(), 0, 280) .'</p>';
												$output .= '</div>';
											$output .= '</div>';
										$output .= '</div>';
										if(has_post_thumbnail()){
											$product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_query->ID), 'large');
											$output .= '<div class="img-wrapper">';
												$output .= '<img src="'. $product_image[0] .'" alt="'. get_the_title() .'" title="'. get_the_title() .'" class="greyScale" />';
											$output .= '</div>';
										}
										$output .= '<div class="section-block text-center"><a href="'. get_permalink() .'" class="more-link" title="'. __('see product details', 'finepoint') .'">'. __('see product details', 'finepoint') .'</a></div>';
									$output .= '</div>';
								$output .= '</div>';
							$output .= '</div>';
						}
						wp_reset_postdata();
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</section>';
        $output .= '</div>';	
	}
	return $output;
}
