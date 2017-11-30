<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pomme
 */

?>

<div class="masonry-brick single-masonry-brick masonry-stamp">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="entry-thumbnail">
				<?php the_post_thumbnail(); ?>
			</figure>
		<?php endif; ?>
		
		<header class="entry-header">
			<?php pomme_entry_header(); ?>
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pomme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => sprintf( '<div class="page-links">%s', __( 'Pages:', 'pomme' ) ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
	
		<footer class="entry-footer">
			<?php pomme_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- .masonry-brick -->