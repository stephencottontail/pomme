<?php
/**
 * Template part for displaying posts in an archive view
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pomme
 */

$background_image_url = '';

if ( has_post_thumbnail() ) {
	$background_image_url = esc_url( get_the_post_thumbnail_url() );
}
?>

<div class="masonry-brick">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="<?php printf( 'background-image: url(%s);', $background_image_url ); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="overlay"></div>
		<?php endif; ?>
		
		<header class="entry-header">
			<?php
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			
			printf( '<time class="entry-date" datetime="%s"><a href="%s" rel="bookmark">%s</a></time>',
				esc_attr( get_the_date( 'c' ) ),
				esc_url( get_permalink() ),
				esc_html( get_the_date() )
			);
			?>
		</header><!-- .entry-header -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- .masonry-brick -->