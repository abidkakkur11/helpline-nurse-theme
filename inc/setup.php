<?php
/**
 * Theme Setup
 *
 * Registers menus, adds theme support, and sets up custom image sizes.
 *
 * @package HelplineNurse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @return void
 */
function helpline_nurse_setup(): void {
	// Load theme translations.
	load_theme_textdomain( 'helpline-nurse', HELPLINE_NURSE_DIR . '/languages' );

	// Enable automatic <title> tag management.
	add_theme_support( 'title-tag' );

	// Enable RSS feed links in the document head.
	add_theme_support( 'automatic-feed-links' );

	// Enable post thumbnail support.
	add_theme_support( 'post-thumbnails' );

	// Enable HTML5 markup.
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

	// Enable custom logo.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 60,
			'width'       => 220,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// Enable wide/full alignment in block editor (for compatibility).
	add_theme_support( 'align-wide' );

	// Enable responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Use core block styles where applicable.
	add_theme_support( 'wp-block-styles' );

	// Enable editor styles.
	add_theme_support( 'editor-styles' );

	// Register navigation menus.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Navigation', 'helpline-nurse' ),
			'footer'  => esc_html__( 'Footer Navigation', 'helpline-nurse' ),
		)
	);

	// Register custom image sizes.
	add_image_size( 'helpline-service-card', 600, 400, true );
	add_image_size( 'helpline-blog-card', 800, 450, true );
	add_image_size( 'helpline-hero', 1280, 720, true );
	add_image_size( 'helpline-about', 800, 600, true );
}
add_action( 'after_setup_theme', 'helpline_nurse_setup' );

/**
 * Adds custom image sizes to the media library size selector.
 *
 * @param array $sizes Existing image sizes.
 * @return array Modified image sizes.
 */
function helpline_nurse_custom_image_sizes( array $sizes ): array {
	return array_merge(
		$sizes,
		array(
			'helpline-service-card' => esc_html__( 'Service Card (600×400)', 'helpline-nurse' ),
			'helpline-blog-card'    => esc_html__( 'Blog Card (800×450)', 'helpline-nurse' ),
			'helpline-hero'         => esc_html__( 'Hero Image (1280×720)', 'helpline-nurse' ),
			'helpline-about'        => esc_html__( 'About Image (800×600)', 'helpline-nurse' ),
		)
	);
}
add_filter( 'image_size_names_choose', 'helpline_nurse_custom_image_sizes' );

/**
 * Sets the content width in pixels.
 *
 * @global int $content_width
 * @return void
 */
function helpline_nurse_content_width(): void {
	$GLOBALS['content_width'] = apply_filters( 'helpline_nurse_content_width', 1280 );
}
add_action( 'after_setup_theme', 'helpline_nurse_content_width', 0 );
