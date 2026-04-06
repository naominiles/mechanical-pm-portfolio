<?php
/**
 * Custom Post Types
 *
 * @package Mechanical_PM
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Project Custom Post Type
 */
function mechanical_pm_register_project_cpt() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'mechanical-pm' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'mechanical-pm' ),
		'menu_name'             => __( 'Projects', 'mechanical-pm' ),
		'name_admin_bar'        => __( 'Project', 'mechanical-pm' ),
		'archives'              => __( 'Project Archives', 'mechanical-pm' ),
		'attributes'            => __( 'Project Attributes', 'mechanical-pm' ),
		'parent_item_colon'     => __( 'Parent Project:', 'mechanical-pm' ),
		'all_items'             => __( 'All Projects', 'mechanical-pm' ),
		'add_new_item'          => __( 'Add New Project', 'mechanical-pm' ),
		'add_new'               => __( 'Add New', 'mechanical-pm' ),
		'new_item'              => __( 'New Project', 'mechanical-pm' ),
		'edit_item'             => __( 'Edit Project', 'mechanical-pm' ),
		'update_item'           => __( 'Update Project', 'mechanical-pm' ),
		'view_item'             => __( 'View Project', 'mechanical-pm' ),
		'view_items'            => __( 'View Projects', 'mechanical-pm' ),
		'search_items'          => __( 'Search Project', 'mechanical-pm' ),
		'not_found'             => __( 'Not found', 'mechanical-pm' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'mechanical-pm' ),
		'featured_image'        => __( 'Project Image', 'mechanical-pm' ),
		'set_featured_image'    => __( 'Set project image', 'mechanical-pm' ),
		'remove_featured_image' => __( 'Remove project image', 'mechanical-pm' ),
		'use_featured_image'    => __( 'Use as project image', 'mechanical-pm' ),
		'insert_into_item'      => __( 'Insert into project', 'mechanical-pm' ),
		'uploaded_to_this_item' => __( 'Uploaded to this project', 'mechanical-pm' ),
		'items_list'            => __( 'Projects list', 'mechanical-pm' ),
		'items_list_navigation' => __( 'Projects list navigation', 'mechanical-pm' ),
		'filter_items_list'     => __( 'Filter projects list', 'mechanical-pm' ),
	);

	$args = array(
		'label'                 => __( 'Project', 'mechanical-pm' ),
		'description'           => __( 'Mechanical PM Projects', 'mechanical-pm' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-building',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'projects',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'               => array( 'slug' => 'projects', 'with_front' => false ),
	);

	register_post_type( 'project', $args );
}
add_action( 'init', 'mechanical_pm_register_project_cpt', 0 );

/**
 * Register Project Sector Taxonomy
 */
function mechanical_pm_register_project_sector_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Project Sectors', 'Taxonomy General Name', 'mechanical-pm' ),
		'singular_name'              => _x( 'Project Sector', 'Taxonomy Singular Name', 'mechanical-pm' ),
		'menu_name'                  => __( 'Sectors', 'mechanical-pm' ),
		'all_items'                  => __( 'All Sectors', 'mechanical-pm' ),
		'parent_item'                => __( 'Parent Sector', 'mechanical-pm' ),
		'parent_item_colon'          => __( 'Parent Sector:', 'mechanical-pm' ),
		'new_item_name'              => __( 'New Sector Name', 'mechanical-pm' ),
		'add_new_item'               => __( 'Add New Sector', 'mechanical-pm' ),
		'edit_item'                  => __( 'Edit Sector', 'mechanical-pm' ),
		'update_item'                => __( 'Update Sector', 'mechanical-pm' ),
		'view_item'                  => __( 'View Sector', 'mechanical-pm' ),
		'separate_items_with_commas' => __( 'Separate sectors with commas', 'mechanical-pm' ),
		'add_or_remove_items'        => __( 'Add or remove sectors', 'mechanical-pm' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'mechanical-pm' ),
		'popular_items'              => __( 'Popular Sectors', 'mechanical-pm' ),
		'search_items'               => __( 'Search Sectors', 'mechanical-pm' ),
		'not_found'                  => __( 'Not Found', 'mechanical-pm' ),
		'no_terms'                   => __( 'No sectors', 'mechanical-pm' ),
		'items_list'                 => __( 'Sectors list', 'mechanical-pm' ),
		'items_list_navigation'      => __( 'Sectors list navigation', 'mechanical-pm' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
		'rewrite'                    => array( 'slug' => 'project-sector' ),
	);

	register_taxonomy( 'project_sector', array( 'project' ), $args );
}
add_action( 'init', 'mechanical_pm_register_project_sector_taxonomy', 0 );

/**
 * Register Project Location Taxonomy
 */
function mechanical_pm_register_project_location_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Project Locations', 'Taxonomy General Name', 'mechanical-pm' ),
		'singular_name'              => _x( 'Project Location', 'Taxonomy Singular Name', 'mechanical-pm' ),
		'menu_name'                  => __( 'Locations', 'mechanical-pm' ),
		'all_items'                  => __( 'All Locations', 'mechanical-pm' ),
		'parent_item'                => __( 'Parent Location', 'mechanical-pm' ),
		'parent_item_colon'          => __( 'Parent Location:', 'mechanical-pm' ),
		'new_item_name'              => __( 'New Location Name', 'mechanical-pm' ),
		'add_new_item'               => __( 'Add New Location', 'mechanical-pm' ),
		'edit_item'                  => __( 'Edit Location', 'mechanical-pm' ),
		'update_item'                => __( 'Update Location', 'mechanical-pm' ),
		'view_item'                  => __( 'View Location', 'mechanical-pm' ),
		'separate_items_with_commas' => __( 'Separate locations with commas', 'mechanical-pm' ),
		'add_or_remove_items'        => __( 'Add or remove locations', 'mechanical-pm' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'mechanical-pm' ),
		'popular_items'              => __( 'Popular Locations', 'mechanical-pm' ),
		'search_items'               => __( 'Search Locations', 'mechanical-pm' ),
		'not_found'                  => __( 'Not Found', 'mechanical-pm' ),
		'no_terms'                   => __( 'No locations', 'mechanical-pm' ),
		'items_list'                 => __( 'Locations list', 'mechanical-pm' ),
		'items_list_navigation'      => __( 'Locations list navigation', 'mechanical-pm' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
		'rewrite'                    => array( 'slug' => 'project-location' ),
	);

	register_taxonomy( 'project_location', array( 'project' ), $args );
}
add_action( 'init', 'mechanical_pm_register_project_location_taxonomy', 0 );

/**
 * Flush rewrite rules on theme activation
 */
function mechanical_pm_rewrite_flush() {
	mechanical_pm_register_project_cpt();
	mechanical_pm_register_project_sector_taxonomy();
	mechanical_pm_register_project_location_taxonomy();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'mechanical_pm_rewrite_flush' );
