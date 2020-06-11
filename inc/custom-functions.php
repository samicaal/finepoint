<?php
// Page breadcrumb section
function display_page_breadcrumb() {
	ob_start();
	$breadcrumb = '<div class="sideNav">';
		$breadcrumb .= '<div class="breadcrumb-wrapper">';
			$breadcrumb .= '<a href="javascript:void(0)" id="scrollTop" title="go up"><img src="'. get_template_directory_uri() .'/assets/images/top-arrow.png" title="go up" alt="go up" /></a>';
			//bcn_display();
			//$breadcrumb .= '<label>Finepoint</label>';
			$breadcrumb .= '<ul class="breadcrumb">';
				bcn_display_list();
				$breadcrumb .= ob_get_contents();
				if( is_front_page() ) {
					$breadcrumb .= '<li><span>home</span></li>';
				}
				//$breadcrumb .= '<li><a href="index.html">news</a></li>';
			$breadcrumb .= '</ul>';
		$breadcrumb .= '</div>';
	$breadcrumb .= '</div>';
	ob_end_clean();
	return $breadcrumb;
}
// Page banner section
function display_page_banner() {
	if( get_field( 'display_page_banner' ) ) {
		echo '<section class="banner">';
			echo '<div class="banner-slider">';
				echo '<div>';
					echo '<div class="container">';
						echo '<div class="info">';
							echo '<div class="row">';
								if( get_field( 'banner_title' ) ){
									echo '<div class="col-md-5 col-sm-7">';
										echo '<h2>'. get_field( 'banner_title' ) .'<span class="dot">.</span></h2>';
									echo '</div>';
								}
								if( get_field( 'banner_title' ) ){
									echo '<div class="col-md-6 col-sm-5">';
										echo '<p>'. get_field( 'banner_description' ) .'</p>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
					if( get_field( 'banner_image' ) ){
						echo '<div class="img">';
							echo '<img src="'. get_field( 'banner_image' ) .'" alt="'. get_field( 'banner_title' ) .'" title="'. get_field( 'banner_title' ) .'" class="greyScale" />';
						echo '</div>';
					}
				echo '</div>';
			echo '</div>';
		echo '</section>';
	}
}
//Change post type name to Blogs
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blogs';
    $submenu['edit.php'][5][0] = 'Blog';
    $submenu['edit.php'][10][0] = 'Add Blog';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blogs';
    $labels->singular_name = 'Blog';
    $labels->add_new = 'Add Blog';
    $labels->add_new_item = 'Add Blog';
    $labels->edit_item = 'Edit Blog';
    $labels->new_item = 'Blog';
    $labels->view_item = 'View Blogs';
    $labels->search_items = 'Search Blog';
    $labels->not_found = 'No blogs found';
    $labels->not_found_in_trash = 'No blogs found in Trash';
    $labels->all_items = 'All Blogs';
    $labels->menu_name = 'Blogs';
    $labels->name_admin_bar = 'Blogs';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

// Ajax Read More (JOB)
add_action('wp_ajax_nopriv_read_more_ajax', 'read_more_ajax');
add_action('wp_ajax_read_more_ajax', 'read_more_ajax');
function read_more_ajax(){
	$output = array();
	global $post;
	$postId	= $_POST["postId"];
	  
	header("Content-Type: text/html");
	$admin_mail = get_option( 'admin_email' );
	$output['content']  = '';
	$content_post 		= get_post($postId);
	$subject			= $content_post->post_title.' - '.get_field( 'job_reference_id', $postId );
	$output['content'] .= '<p>'. $content_post->post_content .'</p>';
	$output['content'] .= '<a href="mailto:'. $admin_mail .'?subject='. $subject .'" id="" data-id="'. $postId .'" class="btn-link green" title="'. __('APPLY FOR THIS POSITION', 'finepoint') .'">'. __('APPLY FOR THIS POSITION', 'finepoint') .'</a><br />';
	$output['content'] .= '<a href="#" id="close_'. $postId .'" data-id="'. $postId .'" class="btn-link ajax_show_less" title="'. __('CLOSE', 'finepoint') .'">'. __('CLOSE', 'finepoint') .'</a>';
	$output['abc'] = $content_post;
    echo json_encode($output);
    exit;
}

// Ajax Read Less (JOB)
add_action('wp_ajax_nopriv_read_less_ajax', 'read_less_ajax');
add_action('wp_ajax_read_less_ajax', 'read_less_ajax');
function read_less_ajax(){
	$output = array();
	global $post;
	$postId	= $_POST["postId"];
	  
	header("Content-Type: text/html");
	$output['content']  = '';
	$content_post 		= get_post($postId);
	$output['content']  = $content_post->post_content;
	$content 			= $content_post->post_content;
	if(strlen($content_post->post_content) > $length = 280){
		$content = strip_shortcodes($content_post->post_content);
		$content = strip_tags($content);
		$content = substr($content, 0, $length);
		$content = substr($content, 0, strripos($content, " "));
	}
	$output['content']  = '<p>'. $content .'</p>'; 
	$output['content'] .= '<a href="#" id="ajax_read_more_'. $postId .'" data-id="'. $postId .'" class="btn-link ajax_read_more" title="'. __('SEE FULL DETAILS', 'finepoint') .'">'. __('SEE FULL DETAILS', 'finepoint') .'</a>';
	
    echo json_encode($output);
    exit;
}

// job short description
function job_short_description($content, $length = 180){
	global $post; 
	if(strlen($content) > $length){
		$content = strip_shortcodes($content);
		$content = strip_tags($content);
		$content = substr($content, 0, $length);
		$content = substr($content, 0, strripos($content, " "));
	}
	$content = '<p>'. $content .'</p>'; 
	$content .= '<a href="#" id="ajax_read_more_'. $post->ID .'" data-id="'. $post->ID .'" class="btn-link ajax_read_more" title="'. __('SEE FULL DETAILS', 'finepoint') .'">'. __('SEE FULL DETAILS', 'finepoint') .'</a>';
	return $content;
}
// Short description
function get_custom_excerpt( $excerpt, $length = 180 ){
	if(strlen($excerpt) > $length){
		$excerpt = strip_shortcodes($excerpt);
		$excerpt = strip_tags($excerpt);
		$excerpt = substr($excerpt, 0, $length);
		$excerpt = substr($excerpt, 0, strripos($excerpt, " ")); 
	}
	$excerpt = '<p>'. $excerpt .'</p>';
	return $excerpt;
}
// formate email template
/*function make_email_template($mail_content = "", $tokens = array()){
	$pattern = '##%s##';
	$map = array();
	foreach($tokens as $var => $value){
		$map[sprintf($pattern, $var)] = $value;
	}
	$mail_message = strtr($mail_content, $map);
	return $mail_message;
}*/
// Custom telephone number validation
function custom_filter_wpcf7_is_tel( $result, $tel ) { 
  $result = preg_match( '/^(?=.*[0-9])[- +()0-9]+$/', $tel );
  return $result; 
}
add_filter( 'wpcf7_is_tel', 'custom_filter_wpcf7_is_tel', 10, 2 );

// Favicon Icon set in backend
function add_favicon() {
	if( get_field( 'favicon_icon', 'option' ) ) {
		$favicon_url = get_field( 'favicon_icon', 'option' );
		echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
	}
} 
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

// enable SVG Files 
function add_svg_to_upload_mimes( $upload_mimes ) {
	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	return $upload_mimes;
}
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );

// Submenu walker class
class Finepoint_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-nav\">\n";
	}
}

// custom pagination

function custom_pagination($numpages = '', $pagerange = '', $paged='') {
	if (empty($pagerange)) {
		$pagerange = 3;
	}
	global $paged;
	if (empty($paged)) {
		$paged = 1;
	}
	if ($numpages == '') {
		global $wp_query;
		$numpages = $wp_query->max_num_pages;
		if(!$numpages) {
			$numpages = 1;
		}
	}
	$pagination_args = array(
		'base'            => @add_query_arg('paged','%#%'),
		'format'          => '',
		'total'           => $numpages,
		'current'         => $paged,
		'show_all'        => False,
		'end_size'        => 1,
		'mid_size'        => $pagerange,
		'prev_next'       => false,
		'prev_text'       => __('&laquo;'),
		'next_text'       => __('&raquo;'),
		'type'            => 'array',
		'add_args'        => false,
		'add_fragment'    => '',
	);

	$paginate_links = paginate_links($pagination_args);
	$paginate_html = '';
	if ($paginate_links) {
		$paginate_html .= '<div class="pagination-wrapper">';
			$paginate_html .=  '<ul>';
				foreach($paginate_links as $paginate_link) {
					$paginate_html .= '<li>'. $paginate_link .'</li>';
				}
			$paginate_html .= '</ul>';
		$paginate_html .= '</div>';
	}
	return $paginate_html;
}

// Get all DISTINCT meta value from database
function get_meta_values( $key = '', $type = 'post', $status = '	' ) {
    global $wpdb;
    if( empty( $key ) )
        return;

    $result = $wpdb->get_col( $wpdb->prepare( "
        SELECT DISTINCT(pm.meta_value) FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = '%s' 
        AND p.post_status = '%s' 
        AND p.post_type = '%s'
    ", $key, $status, $type ) );

    return $result;
}

// Popular post
function wpb_set_post_views($postID) {
    $count_key 	= 'wpb_post_views_count';
    $view_count = get_post_meta($postID, $count_key, true);
    if($view_count==''){
        $view_count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
    }else{
        $view_count++;
        update_post_meta($postID, $count_key, $view_count);
    }
}

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

// category radio button
function wpse_custom_term_radio_checklist( $args ) {
    if ( ! empty( $args['taxonomy'] ) && $args['taxonomy'] === 'project_category' ) {
        if ( empty( $args['walker'] ) || is_a( $args['walker'], 'Walker' ) ) {
            if ( ! class_exists( 'WPSE_Custom_Walker_Category_Radio_Checklist' ) ) {
                class WPSE_Custom_Walker_Category_Radio_Checklist extends Walker_Category_Checklist {
                    function walk( $elements, $max_depth, $args = array() ) {
                        $output = parent::walk( $elements, $max_depth, $args );
                        $output = str_replace(
                            array( 'type="checkbox"', "type='checkbox'" ),
                            array( 'type="radio"', "type='radio'" ),
                            $output
                        );

                        return $output;
                    }
                }
            }
            $args['walker'] = new WPSE_Custom_Walker_Category_Radio_Checklist;
        }
    }
    return $args;
}
add_filter( 'wp_terms_checklist_args', 'wpse_custom_term_radio_checklist' );

// category radio button
function wpse_custom_product_term_radio_checklist( $args ) {
    if ( ! empty( $args['taxonomy'] ) && $args['taxonomy'] === 'product_category' ) {
        if ( empty( $args['walker'] ) || is_a( $args['walker'], 'Walker' ) ) {
            if ( ! class_exists( 'WPSE_Custom_Product_Walker_Category_Radio_Checklist' ) ) {
                class WPSE_Custom_Product_Walker_Category_Radio_Checklist extends Walker_Category_Checklist {
                    function walk( $elements, $max_depth, $args = array() ) {
                        $output = parent::walk( $elements, $max_depth, $args );
                        $output = str_replace(
                            array( 'type="checkbox"', "type='checkbox'" ),
                            array( 'type="radio"', "type='radio'" ),
                            $output
                        );

                        return $output;
                    }
                }
            }
            $args['walker'] = new WPSE_Custom_Product_Walker_Category_Radio_Checklist;
        }
    }
    return $args;
}
add_filter( 'wp_terms_checklist_args', 'wpse_custom_product_term_radio_checklist' );
