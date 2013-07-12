<?php

	/**
	 * Insert into Functions 
	 *
	 * Used to create the Wordpress backend functionality within the insights section
	 * 
	 * @author 	False Behaving Animals - www.falsebehavinganimals.com
	 * @date	2012
	 */

	
	/**
	 * Register Multiple Post Types
	 *
	 * @param 	none
	 * @return 	void
	 * @author 	Michael Bell - False Behaving Animals - michael@falsebehavinganimals.com
	 * @date	2013
	 **/



/*	uncomment to enable 
		(Note - the custom post type rewrite rule cannot be the same as a page)


	register_post_type( 'directory',
		array(
			'labels' => array(
				'name' => __( 'Directory' ),
				'singular_name' => __( 'Listing' ),
				'add_new' => __( 'New Listing' ),
				'all_items' => __( 'All Listings' ),
				'add_new_item' => __( 'Add New Listing' ),
				'edit_item' => __( 'Edit Listing' ),
				'new_item' => __( 'New Listing' ),
				'view_item' => __( 'View Now (development only)' )
			),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array("slug" => "directories"),
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		)
	);


	
	add_action('init', 'add_default_boxes');
 
  function add_default_boxes() {
      register_taxonomy_for_object_type('category', 'directory');
  }
  
 */ 

  
	
?>