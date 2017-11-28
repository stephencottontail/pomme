<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Pomme
 */

get_header();
?>
	<header class="archive-header masonry-brick">
		<?php
		global $wp_query;
		
		if ( '0' != $wp_query->found_posts ) :
		?>
			<h1 class="archive-title">
				<?php
				/* translators: %s = search query */
				printf( __( 'Search results for &ldquo;%s&rdquo;', 'pomme' ), get_search_query() );
				?>
			</h1>
			<p class="archive-subtitle search-results">
				<?php
				
				if ( '1' === $wp_query->found_posts ) {
					printf( __( '%s result', 'pomme' ), number_format_i18n( $wp_query->found_posts ) );
				} else {
					printf( __( '%s results', 'pomme' ), number_format_i18n( $wp_query->found_posts ) );
				}
				?>
			</p>
		<?php else : ?>
			<h1 class="archive-title">
				<?php
				/* translators: %s = search query */
				printf( __( 'No results for &ldquo;%s&rdquo;', 'pomme' ), get_search_query() );
				?>
			</h1>
		<?php endif; ?>
	</header>
	
	<?php
	if ( have_posts() ) :
	
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'archive' );

		endwhile;

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
</div><!-- .container.masonry-container -->

<div class="container">
	<?php the_posts_navigation(); ?>
</div>
	
<?php
get_footer();
