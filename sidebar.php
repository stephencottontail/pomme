<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pomme
 */
?>

<div class="row widgets-area">
	<aside class="widget-area col-md">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- ,widget-area -->
	
	<aside class="widget-area col-md">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</aside><!-- ,widget-area -->
	
	<aside class="widget-area col-md">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</aside><!-- ,widget-area -->
</div><!-- .row.widgets-area -->