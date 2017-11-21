/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
jQuery( document ).ready( function( $ ) {
	var masonryContainer = $( '.masonry-container' );
	var masonryArgs = {
		itemSelector: '.masonry-brick',
		columnWidth: '.masonry-brick',
		stamp: '.masonry-stamp',
		gutter: '.gutter-sizer',
		horizontalOrder: true,
		percentPosition: true
	};
	
	if ( masonryContainer ) {
		masonryContainer.imagesLoaded( function() {
			masonryContainer.masonry( masonryArgs );
		} );
	}
	
	var body = $( 'body' );
	var menuContainer = $( '.site-navigation' );
	var menu = menuContainer.find( 'ul' );
	var button = $( '.menu-toggle' );
	
	if ( ! menuContainer || ! menu ) {
		button.css( 'display', 'none' );
		return;
	}

	menu.attr( 'aria-expanded', 'false' );

	button.on( 'click', function( e ) {
		e.preventDefault();
		
		body.toggleClass( 'menu-active' );
		
		if ( 'false' === menu.attr( 'aria-expanded' ) ) {
			button.attr( 'aria-expanded', 'true' );
			menu.attr( 'aria-expanded', 'true' );
		} else {
			button.attr( 'aria-expanded', 'false' );
			menu.attr( 'aria-expanded', 'false' );	
		}
		
		/**
		 * We retrigger Masonry because the height changes after the menu opens or
		 * closes. Seems scary performance-wise but I'm not sure if there's a better
		 * way to handle it.
		 */ 
		masonryContainer.masonry( masonryArgs );
	} );
} )();
