<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pomme
 */

get_header();

	if ( have_posts() ) : ?>

		<header class="archive-header masonry-brick">
			<?php
			the_archive_title( '<h1 class="archive-title">', '</h1>' );
			the_archive_description( '<p class="archive-subtitle">', '</p>' );
			?>
		</header><!-- .archive-header -->

		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'archive' );

		endwhile;

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
</div><!-- .container.masonry-container -->

<div class="container">
	<?php
	the_posts_navigation( array(
		'prev_text' => __( '&laquo; Older Posts', 'pomme' ),
		'next_text' => __( 'Newer Posts &raquo;', 'pomme' )
	) );
	?>
</div>
	
<?php
get_footer();
