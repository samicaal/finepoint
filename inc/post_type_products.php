<?php
// Register Custom Post Type Products
function product_post_type() {

	$labels = array(
		'name'                  => _x( 'Products', 'Post Type General Name', 'finepoint' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'finepoint' ),
		'menu_name'             => __( 'Products', 'finepoint' ),
		'name_admin_bar'        => __( 'Products', 'finepoint' ),
		'archives'              => __( 'Item Archives', 'finepoint' ),
		'attributes'            => __( 'Item Attributes', 'finepoint' ),
		'parent_item_colon'     => __( 'Parent Item:', 'finepoint' ),
		'all_items'             => __( 'Products', 'finepoint' ),
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
		'label'                 => __( 'Products', 'finepoint' ),
		'description'           => __( 'Post Type Description', 'finepoint' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		//'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'           	=> 'dashicons-products',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'product', $args );

}
add_action( 'init', 'product_post_type', 0 );

// Register Custom Taxonomy
function custom_product_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Product Categories', 'Taxonomy General Name', 'finepoint' ),
		'singular_name'              => _x( 'Product Category', 'Taxonomy Singular Name', 'finepoint' ),
		'menu_name'                  => __( 'Product Category', 'finepoint' ),
		'all_items'                  => __( 'All Categories', 'finepoint' ),
		'parent_item'                => __( 'Parent Category', 'finepoint' ),
		'parent_item_colon'          => __( 'Parent Category:', 'finepoint' ),
		'new_item_name'              => __( 'New Category Name', 'finepoint' ),
		'add_new_item'               => __( 'Add New Category', 'finepoint' ),
		'edit_item'                  => __( 'Edit Category', 'finepoint' ),
		'update_item'                => __( 'Update Category', 'finepoint' ),
		'view_item'                  => __( 'View Category', 'finepoint' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'finepoint' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'finepoint' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'finepoint' ),
		'popular_items'              => __( 'Popular Categories', 'finepoint' ),
		'search_items'               => __( 'Search Categories', 'finepoint' ),
		'not_found'                  => __( 'Not Found', 'finepoint' ),
		'no_terms'                   => __( 'No Categories', 'finepoint' ),
		'items_list'                 => __( 'Categories list', 'finepoint' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'finepoint' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'product_category', array( 'product' ), $args );

}
add_action( 'init', 'custom_product_taxonomy', 0 );
