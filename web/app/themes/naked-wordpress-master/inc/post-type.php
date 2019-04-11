<?php 

// Register Custom Post Type
function gallery_post_type() {

	$labels = array(
		'name'                  => _x( 'Gallery', 'Post Type General Name', 'naked' ),
		'singular_name'         => _x( 'Gallery', 'Post Type Singular Name', 'naked' ),
		'menu_name'             => __( 'Gallery', 'naked' ),
		'name_admin_bar'        => __( 'Gallery', 'naked' ),
		'archives'              => __( 'GalleryArchives', 'naked' ),
		'attributes'            => __( 'GalleryAttributes', 'naked' ),
		'parent_item_colon'     => __( 'Parent Gallery:', 'naked' ),
		'all_items'             => __( 'All Gallery', 'naked' ),
		'add_new_item'          => __( 'Add New Gallery', 'naked' ),
		'add_new'               => __( 'Add New Gallery', 'naked' ),
		'new_item'              => __( 'New Gallery Item', 'naked' ),
		'edit_item'             => __( 'Edit Gallery Item', 'naked' ),
		'update_item'           => __( 'Update Gallery Item', 'naked' ),
		'view_item'             => __( 'View Gallery Item', 'naked' ),
		'view_items'            => __( 'View Gallery', 'naked' ),
		'search_items'          => __( 'Search Gallery', 'naked' ),
		'not_found'             => __( 'Not found', 'naked' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'naked' ),
		'featured_image'        => __( 'Featured Image', 'naked' ),
		'set_featured_image'    => __( 'Set featured image', 'naked' ),
		'remove_featured_image' => __( 'Remove featured image', 'naked' ),
		'use_featured_image'    => __( 'Use as featured image', 'naked' ),
		'insert_into_item'      => __( 'Insert into Gallery', 'naked' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'naked' ),
		'items_list'            => __( 'Gallerylist', 'naked' ),
		'items_list_navigation' => __( 'Gallerylist navigation', 'naked' ),
		'filter_items_list'     => __( 'Filter Gallery list', 'naked' ),
	);

	$args = array(
		'label'                 => __( 'Gallery', 'naked' ),
		'description'           => __( 'Gallery Post Type', 'naked' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'gallery_categories' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'gallery', $args );

	$texonomy_labels = array(
		'name'                       => _x( 'Gallery Categories', 'Taxonomy General Name', 'naked' ),
		'singular_name'              => _x( 'Gallery Categories', 'Taxonomy Singular Name', 'naked' ),
		'menu_name'                  => __( 'Gallery Categories', 'naked' ),
		'all_items'                  => __( 'All Gallery Categories', 'naked' ),
		'parent_item'                => __( 'Parent Gallery Categories', 'naked' ),
		'parent_item_colon'          => __( 'Parent Gallery Categories', 'naked' ),
		'new_item_name'              => __( 'New Gallery Categorie', 'naked' ),
		'add_new_item'               => __( 'Add New', 'naked' ),
		'edit_item'                  => __( 'Edit Gallery Categorie', 'naked' ),
		'update_item'                => __( 'Update Gallery Categories', 'naked' ),
		'view_item'                  => __( 'View Gallery Categorie', 'naked' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'naked' ),
		'add_or_remove_items'        => __( 'Add or remove Gallery Categorie', 'naked' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'naked' ),
		'popular_items'              => __( 'Popular Gallery Categorie', 'naked' ),
		'search_items'               => __( 'Search Gallery Categories', 'naked' ),
		'not_found'                  => __( 'Not Found', 'naked' ),
		'no_terms'                   => __( 'No Gallery Categorie', 'naked' ),
		'items_list'                 => __( 'Gallery Categorie list', 'naked' ),
		'items_list_navigation'      => __( 'Gallery Categorie list navigation', 'naked' ),
	);

	$texonomy_args = array(
		'labels'                     => $texonomy_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'gallery_categories', array( 'gallery' ), $texonomy_args );
}
add_action( 'init', 'gallery_post_type', 0 );

	
