<?php
// Register Custom Post Type Banner
function job_post_type() {

	$labels = array(
		'name'                  => _x( 'Jobs', 'Post Type General Name', 'finepoint' ),
		'singular_name'         => _x( 'Job', 'Post Type Singular Name', 'finepoint' ),
		'menu_name'             => __( 'Jobs', 'finepoint' ),
		'name_admin_bar'        => __( 'Jobs', 'finepoint' ),
		'archives'              => __( 'Item Archives', 'finepoint' ),
		'attributes'            => __( 'Item Attributes', 'finepoint' ),
		'parent_item_colon'     => __( 'Parent Item:', 'finepoint' ),
		'all_items'             => __( 'Jobs', 'finepoint' ),
		'add_new_item'          => __( 'Add New', 'finepoint' ),
		'add_new'               => __( 'Add New', 'finepoint' ),
		'new_item'              => __( 'New Item', 'finepoint' ),
		'edit_item'             => __( 'Edit Item', 'finepoint' ),
		'update_item'           => __( 'Update Item', 'finepoint' ),
		'view_item'             => __( 'View Item', 'finepoint' ),
		'view_items'            => __( 'View Items', 'finepoint' ),
		'search_items'          => __( 'Search Item', 'finepoint' ),
		'not_found'             => __( 'Not found', 'finepoint' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'finepoint' ),
		'featured_image'        => __( 'Featured Image', 'finepoint' ),
		'set_featured_image'    => __( 'Set featured image', 'finepoint' ),
		'remove_featured_image' => __( 'Remove featured image', 'finepoint' ),
		'use_featured_image'    => __( 'Use as featured image', 'finepoint' ),
		'insert_into_item'      => __( 'Insert into item', 'finepoint' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'finepoint' ),
		'items_list'            => __( 'Items list', 'finepoint' ),
		'items_list_navigation' => __( 'Items list navigation', 'finepoint' ),
		'filter_items_list'     => __( 'Filter items list', 'finepoint' ),
	);
	$args = array(
		'label'                 => __( 'Jobs', 'finepoint' ),
		'description'           => __( 'Post Type Description', 'finepoint' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		//'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'           	=> 'dashicons-sticky',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'job', $args );

}
add_action( 'init', 'job_post_type', 0 );
