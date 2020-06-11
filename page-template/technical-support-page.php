<?php
/**
 * Template Name: Technical & Support Page
 * 
 */
get_header(); ?>
<?php
if( get_field( 'technical_support_section_title' ) ) {
	echo '<section class="banner">';
		echo '<div class="banner-slider">';
			echo '<div>';
				echo '<div class="container">';
					echo '<div class="info">';
						echo '<div class="row">';
							if( get_field( 'technical_support_section_title' ) ) {
								echo '<div class="col-sm-6">';
									echo '<h1>'. get_field( 'technical_support_section_title' ) .'<span class="dot">.</span></h1>';
								echo '</div>';
							}
							if( get_field( 'technical_support_section_description' ) ) {
								echo '<div class="col-sm-6">';
									echo '<p>'. get_field( 'technical_support_section_description' ) .'</p>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</section>'; 
}
if( get_field( 'technical_support_section_documents' ) ) {
	echo '<div id="content">';
		if ( function_exists( 'display_page_breadcrumb' ) ) {
			echo display_page_breadcrumb();
		}
		echo '<section class="technical-support">';
			echo '<div class="container">';
				echo '<div class="border"></div>';
				echo '<div class="section-block content-wrapper">';
					echo '<div class="table-responsive">';
						echo '<table class="table">';
							echo '<thead>';
								echo '<tr>';
									echo '<th>'. __('Document', 'fineponit') .'</th>';
									echo '<th>'. __('Size', 'fineponit') .'</th>';
									echo '<th></th>';
								echo '</tr>';
							echo '</thead>';
							echo '<tbody>';
							while( has_sub_field( 'technical_support_section_documents' ) ){
								$document 	  = get_sub_field( 'document_file' );
								$documentSize = size_format( filesize( get_attached_file( $document['id'] ) ) );
								echo '<tr>';
									echo '<td class="name">';
										echo '<div class="th">'. __('Document', 'finepoint') .'</div>';
										echo '<div class="content">'. get_sub_field( 'document_name' ) .'</div>';
									echo '</td>';
									echo '<td>';
										echo '<div class="th">'. __('Size', 'finepoint') .'</div>';
										echo '<div class="content">'. $documentSize .'</div>';
									echo '</td>';
									echo '<td class="text-right links">';
										echo '<a href="'. $document['url'] .'" title="'. __('Download', 'finepoint') .'" download><img src="'. get_template_directory_uri() .'/assets/images/download-icon.jpg" alt="'. __('Download', 'finepoint') .'" title="'. __('Download', 'finepoint') .'" /></a>';
										echo '<a href="'. $document['url'] .'" target="_blank" title="'. __('View', 'finepoint') .'"><img src="'. get_template_directory_uri() .'/assets/images/search-icon.jpg" alt="'. __('View', 'finepoint') .'" title="'. __('View', 'finepoint') .'" /></a>';
									echo '</td>';
								echo '</tr>';
							}
							echo '</tbody>';
						echo '</table>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</section>';
	echo '</div>';
}
?>
<?php get_footer();
