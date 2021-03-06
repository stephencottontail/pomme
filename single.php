<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pomme
 */

get_header();

	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_type() );
		
	endwhile;
	?>
</div><!-- .container.masonry-container -->

<div class="container">
	<?php
	the_post_navigation( array(
		'prev_text' => sprintf( '<span class="nav-title">%s</span>%%title', __( 'Previous Post', 'pomme' ) ),
		'next_text' => sprintf( '<span class="nav-title">%s</span>%%title', __( 'Next Post', 'pomme' ) )
	) );
	
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>
</div>

<?php
get_footer();
