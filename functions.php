<?php
/**
 * Pomme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pomme
 */

if ( ! function_exists( 'pomme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pomme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Pomme, use a find and replace
		 * to change 'pomme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pomme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'pomme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pomme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'pomme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pomme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pomme_content_width', 640 );
}
add_action( 'after_setup_theme', 'pomme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pomme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Left Sidebar', 'pomme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Widgets for the left-most column in the footer', 'pomme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Center Sidebar', 'pomme' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Widgets for the center column in the footer', 'pomme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Right Sidebar', 'pomme' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Widgets for the right-most column in the footer', 'pomme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pomme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pomme_scripts() {
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( 'inc/css/bootstrap.css' ) );
	wp_enqueue_style( 'pomme-google-fonts', pomme_google_fonts() );
	wp_enqueue_style( 'pomme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery-masonry' );
	wp_enqueue_script( 'pomme-functions', get_theme_file_uri( '/js/functions.js' ), array( 'jquery' ), null, true );

	wp_enqueue_script( 'pomme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pomme_scripts' );

/**
 * Enqueue Google fonts
 */
function pomme_google_fonts() {
	$fonts = array();
	$fonts_url = '';

	/* translators: If there are characters in your language that are not supported by Alegreya Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Alegreya Sans font: on or off', 'pomme' ) ) {
		$fonts[] = 'Alegreya Sans:400,400i,700,700i,900,900i';
	}

	/* translators: If there are characters in your language that are not supported by Crimson Text, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Crimson Text font: on or off', 'pomme' ) ) {
		$fonts[] = 'Crimson Text:400,400i,700,700i';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'pomme' ) ) {
		$fonts[] = 'Inconsolata';
	}

	if ( $fonts ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => 'latin,latin-ext'
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
