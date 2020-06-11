<?php

	function icaal_custom_taxonomies() {

		// Media Centre Categories
		$labels = array(
			'name'                       => 'Media Centre Categories',
			'singular_name'              => 'Category',
			'menu_name'                  => 'Categories',
			'all_items'                  => 'All Categories',
			'parent_item'                => 'Parent Category',
			'parent_item_colon'          => 'Parent Category:',
			'new_item_name'              => 'New Category Name',
			'add_new_item'               => 'Add New Category',
			'edit_item'                  => 'Edit Category',
			'update_item'                => 'Update Category',
			'view_item'                  => 'View Category',
			'separate_items_with_commas' => 'Separate categories with commas',
			'add_or_remove_items'        => 'Add or remove categories',
			'choose_from_most_used'      => 'Choose from the most used',
			'popular_items'              => 'Popular Categories',
			'search_items'               => 'Search Categories',
			'not_found'                  => 'Not Found',
			'items_list'                 => 'Categories list',
			'items_list_navigation'      => 'Categories list navigation'
		);
		$rewrite = array(
			'slug'                       => 'media-centre',
			'with_front'                 => false,
			'hierarchical'               => true,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'query_var'									 => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'rewrite'                    => $rewrite
		);
		register_taxonomy( 'media-category', 'media', $args );

		// Media Centre Product Categories
		$labels = array(
			'name'                       => 'Media Centre Product Categories',
			'singular_name'              => 'Product Category',
			'menu_name'                  => 'Products',
			'all_items'                  => 'All Product Categories',
			'parent_item'                => 'Parent Product Category',
			'parent_item_colon'          => 'Parent Product Category:',
			'new_item_name'              => 'New Product Category Name',
			'add_new_item'               => 'Add New Product Category',
			'edit_item'                  => 'Edit Product Category',
			'update_item'                => 'Update Product Category',
			'view_item'                  => 'View Product Category',
			'separate_items_with_commas' => 'Separate product categories with commas',
			'add_or_remove_items'        => 'Add or remove product categories',
			'choose_from_most_used'      => 'Choose from the most used',
			'popular_items'              => 'Popular Product Categories',
			'search_items'               => 'Search Product Categories',
			'not_found'                  => 'Not Found',
			'items_list'                 => 'Product Categories list',
			'items_list_navigation'      => 'Product Categories list navigation'
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'query_var'									 => true,
			'public'                     => false,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'rewrite'                    => false
		);
		register_taxonomy( 'media-product-category', 'media', $args );

		// Media Centre Product Categories
		$labels = array(
			'name'                       => 'Media Centre Brands',
			'singular_name'              => 'Brand',
			'menu_name'                  => 'Brands',
			'all_items'                  => 'All Brands',
			'parent_item'                => 'Parent Brand',
			'parent_item_colon'          => 'Parent Brand:',
			'new_item_name'              => 'New Brand Name',
			'add_new_item'               => 'Add New Brand',
			'edit_item'                  => 'Edit Brand',
			'update_item'                => 'Update Brand',
			'view_item'                  => 'View Brand',
			'separate_items_with_commas' => 'Separate brands with commas',
			'add_or_remove_items'        => 'Add or remove brands',
			'choose_from_most_used'      => 'Choose from the most used',
			'popular_items'              => 'Popular Brands',
			'search_items'               => 'Search Brands',
			'not_found'                  => 'Not Found',
			'items_list'                 => 'Brands list',
			'items_list_navigation'      => 'Brands list navigation'
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'query_var'									 => true,
			'public'                     => false,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'rewrite'                    => false
		);
		register_taxonomy( 'media-brand', 'media', $args );


		// Gallery Categories
		$labels = array(
			'name'                       => 'Gallery Categories',
			'singular_name'              => 'Category',
			'menu_name'                  => 'Categories',
			'all_items'                  => 'All Categories',
			'parent_item'                => 'Parent Category',
			'parent_item_colon'          => 'Parent Category:',
			'new_item_name'              => 'New Category Name',
			'add_new_item'               => 'Add New Category',
			'edit_item'                  => 'Edit Category',
			'update_item'                => 'Update Category',
			'view_item'                  => 'View Category',
			'separate_items_with_commas' => 'Separate categories with commas',
			'add_or_remove_items'        => 'Add or remove categories',
			'choose_from_most_used'      => 'Choose from the most used',
			'popular_items'              => 'Popular Categories',
			'search_items'               => 'Search Categories',
			'not_found'                  => 'Not Found',
			'items_list'                 => 'Categories list',
			'items_list_navigation'      => 'Categories list navigation'
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'query_var'									 => true,
			'public'                     => false,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'rewrite'                    => false
		);
		register_taxonomy( 'gallery-category', 'attachment', $args );

	}
	add_action( 'init', 'icaal_custom_taxonomies', 0 );

?>