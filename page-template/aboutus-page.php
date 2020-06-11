<?php
/**
 * Template Name: Peopel Page
 * 
 */
get_header(); ?>
<section class="banner">
	<div class="banner-slider">
		<div>
			<div class="container">
				<div class="info">
					<div class="row">
						<?php
							if( get_field( 'custom_page_title' ) ){
								echo '<div class="col-md-5 col-sm-7">';
									echo '<h1>'. get_field( 'custom_page_title' ) .'<span class="dot">.</span></h1>';
								echo '</div>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div id="content">
	<?php
		$total_section = 0;
		if ( function_exists( 'display_page_breadcrumb' ) ) {
			echo display_page_breadcrumb();
		}
		if( get_field( 'dispaly_company_section' ) ) {
			$total_section++;
		}
		if( get_field( 'display_people_section' ) ) {
			$total_section++;
		}
		if( get_field( 'display_accreditation_section' ) ) {
			$total_section++;
		}
		if( get_field( 'display_award_section' ) ) {
			$total_section++;
		}
	?>
	<section class="about-people">
		<div class="container">
			<div class="border"></div>
			<?php
				if( get_field( 'dispaly_company_section' ) ) {
					echo '<div class="content-wrapper section-block">';
						echo '<div class="text-block">';
							echo '<div class="row">';
								if( get_field( 'dispaly_company_section' ) ) {
									echo '<div class="col-sm-2">';
										echo '<h2>'. get_field( 'company_section_number' ) .'/'. $total_section .'</h2>';
									echo '</div>';
								}
								if( get_field( 'company_section_title' ) ) {
									echo '<div class="col-sm-4">';
										echo '<h2>'. get_field( 'company_section_title' ) .'</h2>';
									echo '</div>';
								}
								if( get_field( 'company_section_description' ) ) {
									echo '<div class="col-sm-6">';
										echo '<p class="large-text right-text">'. get_field( 'company_section_description' ) .'</p>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
						echo '<div class="block-wrapper innovative-methods">';
							echo '<div class="row">';
								echo '<div class="row-sm-height">';
									if( get_field( 'company_section_image' ) ) {
										$company_section_image = get_field( 'company_section_image' );
										echo '<div class="col-sm-8 col-sm-height col-sm-top">';
											echo '<div class="img-wrapper">';
												echo '<img src="'. $company_section_image['url'] .'" alt="'. $company_section_image['alt'] .'" title="'. $company_section_image['title'] .'" class="greyScale" style="display: inline;">';
											echo '</div>';
										echo '</div>';
									}
									echo '<div class="col-sm-4 col-sm-height col-sm-top">';
										echo '<div class="desc right">';
											if( get_field( 'company_section_other_description' ) ) {
												echo '<p class="large-text">'. get_field( 'company_section_other_description' ) .'</p>';
											}
											if( get_field( 'company_section_link_name' ) || get_field( 'company_section_linked_page' ) ) {
												echo '<a href="'. get_field( 'company_section_linked_page' ) .'" class="more-link" title="'. get_field( 'company_section_link_name' ) .'">'. get_field( 'company_section_link_name' ) .'</a>';
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div> ';
						echo '</div>';
					echo '</div>';
				}
				
				if( get_field( 'display_people_section' ) ) {
					echo '<div class="content-wrapper section-block">';
						echo '<div class="text-block">';
							echo '<div class="row">';
								if( get_field( 'display_people_section' ) ) {
									echo '<div class="col-sm-2">';
										echo '<h2>'. get_field( 'section_number' ) .'/'. $total_section .'</h2>';
									echo '</div>';
								}
								if( get_field( 'people_section_title' ) ) {
									echo '<div class="col-sm-4">';
										echo '<h2>'. get_field( 'people_section_title' ) .'</h2>';
									echo '</div>';
								}
								if( get_field( 'people_section_description' ) ) {
									echo '<div class="col-sm-6">';
										echo '<p  class="large-text right-text">'. get_field( 'people_section_description' ) .'</p>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
						if( get_field( 'team_members' ) ) {
							$member_count = 1;
							$class1 = '';
							$class2 = '';
							$class3 = '';
							while( has_sub_field( 'team_members' ) ) {
								$hover_class = '';
								if( $member_count <= 2 ) {
									if( $member_count == 2 ) { $class1 = 'col-sm-push-4'; $class2 = 'col-sm-pull-8'; $class3 = 'pull-right'; }
									echo '<div class="block-wrapper info-wrapper">';
										echo '<div class="row">';
										echo '<div class="col-md-12">';
										echo '<div class="row">';
											echo '<div class="row-sm-height">';
												if( get_sub_field('team_member_image') ){
													echo '<div class="col-sm-8 col-sm-height '. $class1 .'">';
														echo '<div class="img-wrapper '.$class3.'">';
															if( get_sub_field('team_member_image') && get_sub_field('team_member_hover_image') ) { $hover_class = 'people-img-hover';  }
															$team_member_image = get_sub_field('team_member_image');
															$team_member_hover_image = get_sub_field('team_member_hover_image');
															echo '<img src="'. $team_member_image['url'] .'" data-src="'. $team_member_image['url'] .'" data-mysrc="'. $team_member_hover_image['url'] .'" alt="'. $team_member_image['alt'] .'" title="'. $team_member_image['title'] .'" class="'. $hover_class .'" />';
														echo '</div>';
													echo '</div>';
												}
												echo '<div class="col-sm-4 col-sm-height col-sm-bottom '. $class2 .'">';
													if( $member_count != 2 ) {
														echo '<div class="right-text">';
													}
													echo '<h2>';
													if( get_sub_field('team_member_name') ){
														echo '<span class="name">'. get_sub_field('team_member_name'). '</span>';
													}
													if( get_sub_field('team_member_designation') ){
														echo '<span class="desg">'. get_sub_field('team_member_designation') .'</span>';
													}
													echo '</h2>';
													if( get_sub_field('team_member_description') ){
														echo '<p>'. get_sub_field('team_member_description') .'</p>';
													}
													if( get_sub_field('team_member_email') ){
														echo '<a href="mailto:'. get_sub_field('team_member_email') .'" class="btn-link" title="'. get_sub_field('team_member_email') .'">'. get_sub_field('team_member_email') .'</a>';
													}
													if( $member_count != 2 ) {
														echo '</div>';
													}
												echo '</div>';
											echo '</div>';
										echo '</div>';
										echo '</div>';
										echo '</div>';
									echo '</div>';
								} else {
									if( $member_count % 2 != 0 ) {
										echo '<div class="block-wrapper">';
											echo '<div class="row">';
									}
									echo '<div class="col-md-6">';
										echo '<div class="info-wrapper">';
											echo '<div class="row">';
												if( get_sub_field('team_member_image') ){
													echo '<div class="col-sm-6">';
														echo '<div class="img-wrapper">';
															if( get_sub_field('team_member_image') && get_sub_field('team_member_hover_image') ) { $hover_class = 'people-img-hover';  }
															$team_member_image = get_sub_field('team_member_image');
															$team_member_hover_image = get_sub_field('team_member_hover_image');
															echo '<img src="'. $team_member_image['url'] .'" data-src="'. $team_member_image['url'] .'" data-mysrc="'. $team_member_hover_image['url'] .'" alt="'. $team_member_image['alt'] .'" title="'. $team_member_image['title'] .'" class="'. $hover_class .'" />';
														echo '</div>';
													echo '</div>';
												}
												echo '<div class="col-sm-6">';
													echo '<h2>';
													if( get_sub_field('team_member_name') ){
														echo '<span class="name">'. get_sub_field('team_member_name'). '</span>';
													}
													if( get_sub_field('team_member_designation') ){
														echo '<span class="desg">'. get_sub_field('team_member_designation') .'</span>';
													}
													echo '</h2>';
													if( get_sub_field('team_member_description') ){
														echo '<p class="right-text">'. get_sub_field('team_member_description') .'</p>';
													}
													if( get_sub_field('team_member_email') ){
														echo '<a href="mailto:'. get_sub_field('team_member_email') .'" class="btn-link" title="'. get_sub_field('team_member_email') .'">'. get_sub_field('team_member_email') .'</a>';
													}
												echo '</div>';
											echo '</div>';
										echo '</div>';
									echo '</div>';
									if( $member_count % 2 == 0 ) {
											echo '</div>';
										echo '</div>';
									}
								}
								$member_count++;
							}
							if( $member_count % 2 == 0 ) {
									echo '</div>';
								echo '</div>';
							}
							echo '</div>';
						}
					}
					
					if( get_field( 'display_accreditation_section' ) ) {
						
						echo '<div class="content-wrapper section-block">';
							echo '<div class="text-block">';
								echo '<div class="row">';
									if( get_field( 'accreditation_section_number' ) ) {
										echo '<div class="col-sm-2">';
											echo '<h2>'. get_field( 'accreditation_section_number' ) .'/'. $total_section .'</h2>';
										echo '</div>';
									}
									if( get_field( 'accreditation_section_title' ) ) {
										echo '<div class="col-sm-4">';
											echo '<h2>'. get_field( 'accreditation_section_title' ) .'</h2>';
										echo '</div>';
									}
									if( get_field( 'accreditation_section_description' ) ) {
										echo '<div class="col-sm-6">';
											echo '<p  class="large-text">'. get_field( 'accreditation_section_description' ) .'</p>';
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
							if( get_field( 'accreditation_logos' ) ) {
								echo '<div class="accreditations-slider">';
									while( has_sub_field( 'accreditation_logos' ) ){
										if(get_sub_field('accreditation_logo')){
											$accreditation_logo = get_sub_field('accreditation_logo');
											echo '<div><div class="img-wrapper"><a href="'. get_sub_field('accreditation_logo_link') .'" title="Accreditation" target="_blank"><img src="'. $accreditation_logo['url'] .'" alt="'. $accreditation_logo['alt'] .'" title="'. $accreditation_logo['title'] .'" class="greyScale" /></a></div></div>';
										}
									}								
								echo '</div>';
							}
						echo '</div>';
					}
					if( get_field( 'display_award_section' ) ) {
						
						echo '<div class="content-wrapper awards-sec">';
							echo '<div class="text-block">';
								echo '<div class="row">';
									if( get_field( 'award_section_number' ) ) {
										echo '<div class="col-sm-2">';
											echo '<h2>'. get_field( 'award_section_number' ) .'/'. $total_section .'</h2>';
										echo '</div>';
									}
									if( get_field( 'award_section_title' ) ) {
										echo '<div class="col-sm-4">';
											echo '<h2>'. get_field( 'award_section_title' ) .'</h2>';
										echo '</div>';
									}
									if( get_field( 'award_section_description' ) ) {
										echo '<div class="col-sm-6">';
											echo '<p  class="large-text">'. get_field( 'award_section_description' ) .'</p>';
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
							echo '<div class="info-wrapper">';
								echo '<div class="table-responsive">';
									echo '<table class="table">';
										echo '<thead>';
											echo '<tr>'; 
												echo '<th>Year</th>';
												echo '<th>Award</th>';
												echo '<th>Project</th>';
												echo '<th></th>';
											echo '</tr>';
										echo '</thead>';
										if( get_field( 'awards' ) ) {
											echo '<tbody>';
											while( has_sub_field( 'awards' ) ){
												echo '<tr>';
													echo '<td>';
														echo '<div class="th">Year</div>';
														echo '<div class="content">'. get_sub_field('award_year') .'</div>';
													echo '</td>';
													echo '<td>';
														echo '<div class="th">Award</div>';
														echo '<div class="content">'. get_sub_field('award_name') .'</div>';
													echo '</td>';
													echo '<td class="name">';
														echo '<div class="th">Project</div>';
														$project 		 = get_sub_field('awarded_project_name');
														$Project_country = get_field( 'project_country', $project->ID );;
														echo '<div class="content"><a href="'. get_sub_field('awarded_project__link') .'" title="'. $project->post_title .'">'. $project->post_title .'—'. $Project_country .'</a></div>';
													echo '</td>';
													echo '<td class="text-right"><a href="'. get_sub_field('awarded_project__link') .'" class="more-link" title="'. $project->post_title .'">'. __('SEE', 'finepoint') .'</a></td>';
												echo '</tr>';
											}
											echo '</tbody>';
										}
									echo '</table>';
								echo '</div>';
							echo '</div>';	
						echo '</div>';
					}
			?>	
		</div>
	</section>
</div>
<?php get_footer();
