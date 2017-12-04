<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Pomme
 */

if ( ! function_exists( 'pomme_entry_header' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time
 */
function pomme_entry_header() {
	if ( is_singular() ) {
		the_title( '<h1 class="entry-title">', '</h1>' );
	} else {
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	}
	
	printf( '<time class="entry-date" datetime="%s"><a href="%s" rel="bookmark">%s</a></time>',
		esc_attr( get_the_date( 'c' ) ),
		esc_url( get_permalink() ),
		esc_html( get_the_date() )
	);
}	
endif;

if ( ! function_exists( 'pomme_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function pomme_entry_footer() {
		$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%s">%s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
			esc_html( get_the_author() )
		);
		
		/* translators: %s = post author */
		printf( '<span class="meta-info byline">' .  _x( 'by %s', 'post author', 'pomme' ) . '</span>', $author );
		
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'pomme' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="meta-info cat-links">' . __( 'Posted in %1$s', 'pomme' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', _x( ', ', 'list item separator', 'pomme' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="meta-info tags-links">' . __( 'Tagged %1$s', 'pomme' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'pomme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'pomme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="meta-info edit-link">',
			'</span>'
		);
	}
endif;
