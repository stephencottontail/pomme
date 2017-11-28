<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Pomme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function pomme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'pomme_body_classes' );

/**
 * Adds custom classes to post classes
 *
 * @param array $classes Classes for posts
 * @return array
 */
function pomme_post_classes( $classes ) {
	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'archive-masonry';
	}
	
	return $classes;
}
add_filter( 'post_class', 'pomme_post_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function pomme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'pomme_pingback_header' );
