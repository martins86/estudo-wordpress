<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package test_teme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function test_teme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'has-sidebar';
	}

	if( is_page() ) {
		$page_sidebar = get_theme_mod( 'page_sidebar', 'no-sidebar' );
		$classes[] = esc_attr( $page_sidebar );
	}

	if( is_single() ) {
		$single_post_sidebar = get_theme_mod( 'single_post_sidebar' , 'right-sidebar' );
		$classes[] = esc_attr( $single_post_sidebar );
	}

	if ( is_home() ) {
		$blog_sidebar = get_theme_mod( 'blog_sidebar' , 'no-sidebar' );
		$classes[] = esc_attr( $blog_sidebar );
	}

	if( is_archive() || is_search() || is_404() ) {
		$archive_sidebar = get_theme_mod( 'archive_sidebar' , 'no-sidebar' );
		$classes[] = esc_attr( $archive_sidebar );
	}

	return $classes;
}
add_filter( 'body_class', 'test_teme_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function test_teme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'test_teme_pingback_header' );
