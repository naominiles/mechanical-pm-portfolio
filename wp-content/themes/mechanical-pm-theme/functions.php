<?php
/**
 * Mechanical PM Theme Functions
 *
 * @package Mechanical_PM
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' )) {
	exit;
}

/**
 * Theme Setup
 */
function mechanical_pm_setup() {
	// Add theme support
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Register navigation menus
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mechanical-pm' ),
	) );

	// Add image sizes
	add_image_size( 'project-card', 600, 338, true ); // 16:9 ratio
	add_image_size( 'project-row', 800, 600, true ); // 4:3 ratio
	add_image_size( 'project-hero', 1920, 640, true ); // 21:7 ratio
}
add_action( 'after_setup_theme', 'mechanical_pm_setup' );

/**
 * Enqueue scripts and styles
 */
function mechanical_pm_scripts() {
	// Main stylesheet
	wp_enqueue_style( 'mechanical-pm-style', get_stylesheet_uri(), array(), '1.0.0' );

	// Google Fonts (already in style.css via @import, but can also be enqueued)
	// wp_enqueue_style( 'mechanical-pm-fonts', 'https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap', array(), null );

	// Main JavaScript (if needed)
	// wp_enqueue_script( 'mechanical-pm-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'mechanical_pm_scripts' );

/**
 * Include custom post types
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Custom navigation walker (optional - for adding active class)
 */
class Mechanical_PM_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		// Add active class for current page
		if ( in_array( 'current-menu-item', $classes ) || in_array( 'current_page_item', $classes ) ) {
			$classes[] = 'active';
		}

		// Check for accent class
		if ( in_array( 'accent', $classes ) ) {
			$class_names = ' class="accent"';
		} elseif ( in_array( 'active', $classes ) ) {
			$class_names = ' class="active"';
		} else {
			$class_names = '';
		}

		$output .= '<li>';

		$attributes  = ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		$output .= '<a' . $attributes . $class_names . '>';
		$output .= apply_filters( 'the_title', $item->title, $item->ID );
		$output .= '</a>';
	}
}

/**
 * Get featured projects for homepage
 */
function mechanical_pm_get_featured_projects( $count = 3 ) {
	$args = array(
		'post_type' => 'project',
		'posts_per_page' => $count,
		'orderby' => 'date',
		'order' => 'DESC',
	);

	return new WP_Query( $args );
}

/**
 * Custom excerpt length
 */
function mechanical_pm_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'mechanical_pm_excerpt_length', 999 );

/**
 * Custom excerpt more
 */
function mechanical_pm_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'mechanical_pm_excerpt_more' );
