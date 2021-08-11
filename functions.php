<?php
/**
 * shd-wpstarter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shd-wpstarter
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'shd_wpstarter_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shd_wpstarter_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on shd-wpstarter, use a find and replace
		 * to change 'shd-wpstarter' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'shd-wpstarter', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'navbar' => esc_html__( 'Primary', 'shd-wpstarter' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'shd_wpstarter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shd_wpstarter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shd_wpstarter_content_width', 640 );
}
add_action( 'after_setup_theme', 'shd_wpstarter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shd_wpstarter_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'shd-wpstarter' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'shd-wpstarter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    register_sidebar(
		array(
			'name'          => esc_html__( 'Home Before Posts', 'shd-wpstarter' ),
			'id'            => 'home-before-posts',
			'description'   => esc_html__( 'Add widgets here.', 'shd-wpstarter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    register_sidebar(
		array(
			'name'          => esc_html__( 'Home After Posts', 'shd-wpstarter' ),
			'id'            => 'home-after-posts',
			'description'   => esc_html__( 'Add widgets here.', 'shd-wpstarter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Page: About', 'shd-wpstarter' ),
			'id'            => 'page-about',
			'description'   => esc_html__( 'Add widgets here.', 'shd-wpstarter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Page: Contact', 'shd-wpstarter' ),
			'id'            => 'page-contact',
			'description'   => esc_html__( 'Add widgets here.', 'shd-wpstarter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'shd_wpstarter_widgets_init' );

//ACTIVATE IMAGE UPLOADER ON WIDGET
function admin_scripts()
{
	wp_enqueue_media();
	wp_enqueue_script('ads_script', get_template_directory_uri() . '/js/widget_media_upload.js', false, '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'admin_scripts');

/**
 * Enqueue scripts and styles.
 */
function shd_wpstarter_scripts() {
	wp_enqueue_style( 'shd-wpstarter-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'shd-wpstarter-style', 'rtl', 'replace' );

	wp_enqueue_script( 'shd-wpstarter-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shd_wpstarter_scripts' );

/**
 * Register Custom Navigation Walker
*/
function register_navwalker(){
	require_once get_template_directory() . '/walker/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
/**
 * ALLOW TO UPLOAD SVG FILE 
*/
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
?>


