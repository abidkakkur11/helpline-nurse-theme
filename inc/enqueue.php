<?php
/**
 * Asset Enqueuing
 *
 * Registers and enqueues all theme CSS and JavaScript.
 *
 * @package HelplineNurse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueues theme scripts and styles.
 *
 * @return void
 */
function helpline_nurse_scripts(): void {
	$theme_version = HELPLINE_NURSE_VERSION;
	$style_path    = HELPLINE_NURSE_DIR . '/assets/css/style.css';
	$script_path   = HELPLINE_NURSE_DIR . '/assets/js/main.js';

	// Google Fonts – Inter (300 to 800).
	wp_enqueue_style(
		'helpline-nurse-google-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap',
		array(),
		null
	);

	// Main theme stylesheet.
	wp_enqueue_style(
		'helpline-nurse-style',
		HELPLINE_NURSE_URI . '/assets/css/style.css',
		array( 'helpline-nurse-google-fonts' ),
		file_exists( $style_path ) ? filemtime( $style_path ) : $theme_version
	);

	// Main JavaScript file (deferred).
	if ( file_exists( $script_path ) ) {
		wp_enqueue_script(
			'helpline-nurse-main',
			HELPLINE_NURSE_URI . '/assets/js/main.js',
			array(),
			filemtime( $script_path ),
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);
	}

	// Threaded comments reply script.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'helpline_nurse_scripts' );

/**
 * Preconnects to Google Fonts origin for performance.
 *
 * @param array  $urls     Resource hint URLs.
 * @param string $rel_type The relationship type.
 * @return array Modified resource hint URLs.
 */
function helpline_nurse_preconnect_fonts_origin( array $urls, string $rel_type ): array {
	if ( 'preconnect' === $rel_type ) {
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'helpline_nurse_preconnect_fonts_origin', 10, 2 );
