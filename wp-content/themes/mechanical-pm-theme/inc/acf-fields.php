<?php
/**
 * ACF Field Groups
 *
 * @package Mechanical_PM
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register ACF Field Groups for Projects
 */
function mechanical_pm_register_acf_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key' => 'group_project_details',
		'title' => 'Project Details',
		'fields' => array(
			// Basic Info
			array(
				'key' => 'field_location',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'text',
				'instructions' => 'e.g., Las Vegas, NV',
				'required' => 1,
				'wrapper' => array(
					'width' => '50',
				),
			),
			array(
				'key' => 'field_year_completed',
				'label' => 'Year Completed',
				'name' => 'year_completed',
				'type' => 'number',
				'instructions' => '4-digit year',
				'required' => 1,
				'min' => 1900,
				'max' => 2100,
				'wrapper' => array(
					'width' => '50',
				),
			),
			array(
				'key' => 'field_project_value',
				'label' => 'Total Project Value',
				'name' => 'project_value',
				'type' => 'text',
				'instructions' => 'e.g., $1.9B or $35M',
				'required' => 0,
				'wrapper' => array(
					'width' => '50',
				),
			),
			array(
				'key' => 'field_project_size',
				'label' => 'Project Size',
				'name' => 'project_size',
				'type' => 'text',
				'instructions' => 'e.g., 1.8M sq ft',
				'required' => 0,
				'wrapper' => array(
					'width' => '50',
				),
			),
			array(
				'key' => 'field_project_scope',
				'label' => 'Project Scope (Short)',
				'name' => 'project_scope',
				'type' => 'text',
				'instructions' => 'Brief scope description for archive page',
				'required' => 0,
			),

			// Companies
			array(
				'key' => 'field_general_contractor',
				'label' => 'General Contractor',
				'name' => 'general_contractor',
				'type' => 'text',
				'required' => 0,
				'wrapper' => array(
					'width' => '50',
				),
			),
			array(
				'key' => 'field_mechanical_contractor',
				'label' => 'Mechanical Contractor',
				'name' => 'mechanical_contractor',
				'type' => 'text',
				'required' => 0,
				'wrapper' => array(
					'width' => '50',
				),
			),
			array(
				'key' => 'field_client',
				'label' => 'Client',
				'name' => 'client',
				'type' => 'text',
				'required' => 0,
			),

			// Role Information
			array(
				'key' => 'field_role_title',
				'label' => 'Role Title',
				'name' => 'role_title',
				'type' => 'text',
				'instructions' => 'e.g., Mechanical PM, Dry-Side',
				'required' => 0,
			),
			array(
				'key' => 'field_role_description',
				'label' => 'Role Description',
				'name' => 'role_description',
				'type' => 'textarea',
				'instructions' => 'Additional details about your role',
				'required' => 0,
				'rows' => 3,
			),

			// Project Content
			array(
				'key' => 'field_project_overview',
				'label' => 'Project Overview',
				'name' => 'project_overview',
				'type' => 'wysiwyg',
				'instructions' => 'Main project description',
				'required' => 0,
				'tabs' => 'all',
				'toolbar' => 'basic',
				'media_upload' => 0,
			),
			array(
				'key' => 'field_key_challenge',
				'label' => 'Key Challenge',
				'name' => 'key_challenge',
				'type' => 'textarea',
				'instructions' => 'What was the main challenge on this project?',
				'required' => 0,
				'rows' => 4,
			),
			array(
				'key' => 'field_field_notes',
				'label' => 'In the Field',
				'name' => 'field_notes',
				'type' => 'wysiwyg',
				'instructions' => 'Field experiences and execution details',
				'required' => 0,
				'tabs' => 'all',
				'toolbar' => 'basic',
				'media_upload' => 0,
			),
			array(
				'key' => 'field_outcome',
				'label' => 'Outcome',
				'name' => 'outcome',
				'type' => 'wysiwyg',
				'instructions' => 'Final results and completion details',
				'required' => 0,
				'tabs' => 'all',
				'toolbar' => 'basic',
				'media_upload' => 0,
			),

			// Featured Tag
			array(
				'key' => 'field_featured_tag',
				'label' => 'Featured Tag',
				'name' => 'featured_tag',
				'type' => 'text',
				'instructions' => 'Optional tag (e.g., Landmark, Healthcare)',
				'required' => 0,
			),

			// Scope Items (Repeater)
			array(
				'key' => 'field_scope_items',
				'label' => 'Mechanical Scope Items',
				'name' => 'scope_items',
				'type' => 'repeater',
				'instructions' => 'List of mechanical scope items',
				'required' => 0,
				'layout' => 'table',
				'button_label' => 'Add Scope Item',
				'sub_fields' => array(
					array(
						'key' => 'field_scope_item',
						'label' => 'Scope Item',
						'name' => 'scope_item',
						'type' => 'text',
						'required' => 1,
					),
				),
			),

			// Gallery
			array(
				'key' => 'field_project_gallery',
				'label' => 'Project Gallery',
				'name' => 'project_gallery',
				'type' => 'gallery',
				'instructions' => 'Additional project images (will show first 2 on detail page)',
				'required' => 0,
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
			),

			// Testimonial/Quote
			array(
				'key' => 'field_quote_text',
				'label' => 'Quote Text',
				'name' => 'quote_text',
				'type' => 'textarea',
				'instructions' => 'Testimonial or quote (without quotation marks)',
				'required' => 0,
				'rows' => 3,
			),
			array(
				'key' => 'field_quote_author',
				'label' => 'Quote Author',
				'name' => 'quote_author',
				'type' => 'text',
				'required' => 0,
				'wrapper' => array(
					'width' => '50',
				),
			),
			array(
				'key' => 'field_quote_title',
				'label' => 'Quote Author Title',
				'name' => 'quote_title',
				'type' => 'text',
				'instructions' => 'e.g., Project Manager, Bovis Lend Lease',
				'required' => 0,
				'wrapper' => array(
					'width' => '50',
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'project',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'active' => true,
	) );
}
add_action( 'acf/init', 'mechanical_pm_register_acf_fields' );
