<?php
/**
 * shdwp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shdwp
 */
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
/**
 * Register theme support
 */
function theme_support_setup()
{
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'custom-background',
		apply_filters(
			'shdwp_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);	
	add_theme_support( 'customize-selective-refresh-widgets' );	
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
add_action( 'after_setup_theme', 'theme_support_setup' );

/**
 * Register menu locations.
 */

function menu_locations_setup()
{
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'shdwp' ),
		)
	);
}
add_action( 'after_setup_theme', 'menu_locations_setup' );

/**
 * Register widget area.
 */
function shdwp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'shdwp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'shdwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'shdwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shdwp_scripts() {
	wp_enqueue_style( 'shdwp-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	wp_style_add_data( 'shdwp-style', 'rtl', 'replace' );

	wp_enqueue_script( 'shdwp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shdwp_scripts' );

/**
 * Include nav-walker for Bootstrap navbar
 */
require get_template_directory() . '/walker/class-wp-bootstrap-navwalker.php';

//ACTIVATE IMAGE UPLOADER ON WIDGET
function admin_scripts()
{
	wp_enqueue_media();
    wp_enqueue_script('ads_script', get_template_directory_uri() . '/js/widget_media_upload.js', false, '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'admin_scripts');

//ENABLE SVG PICTURE
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

//ADDITIONAL FUNCTIONS
