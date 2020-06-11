<?php

	function icaal_post_types() {

		// Media centre
		$labels = array(
			'name'                => 'Media Centre',
			'singular_name'       => 'Document',
			'menu_name'           => 'Media Centre',
			'name_admin_bar'      => 'Document',
			'parent_item_colon'   => 'Parent Document:',
			'all_items'           => 'All Documents',
			'add_new_item'        => 'Add New Document',
			'add_new'             => 'Add New',
			'new_item'            => 'New Document',
			'edit_item'           => 'Edit Document',
			'update_item'         => 'Update Document',
			'view_item'           => 'View Document',
			'search_items'        => 'Search Documents',
			'not_found'           => 'Not found',
			'not_found_in_trash'  => 'Not found in Trash',
		);
		$rewrite = array(
			'slug'                => 'media-centre',
			'with_front'          => false,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => 'Document',
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'revisions', 'author' ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 30,
			'menu_icon'           => 'dashicons-upload',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'query_var'			  => true,
			'capability_type'     => 'post',
		);
		register_post_type( 'media', $args );

		// Filter media permalinks
		function media_add_rewrite_rules( $rules ) {
		  $new = array();
		  $new['media-centre/([^/]+)/(.+)/?$'] = 'index.php?media=$matches[2]';
		  $new['media-centre/(.+)/?$'] = 'index.php?media-category=$matches[1]';

		  return array_merge( $new, $rules ); // Ensure our rules come first
		}
		add_filter( 'rewrite_rules_array', 'media_add_rewrite_rules' );

		// function icaal_filter_post_type_link( $link, $post ) {
		//   if ( $post->post_type == 'installer' ) {
		//     if ( $cats = get_the_terms( $post->ID, 'installer-areas' ) ) {
		//       $link = str_replace( 'installers', 'installers/' . current( $cats )->slug, $link );
		//     }
		//   }
		//   return $link;
		// }
		// add_filter( 'post_type_link', 'icaal_filter_post_type_link', 10, 2 );



	}
	add_action( 'init', 'icaal_post_types', 0 );

	function allowAuthorEditing()
	{
		add_post_type_support( 'resource', 'author' );
	}
	add_action('init','allowAuthorEditing');

?>
