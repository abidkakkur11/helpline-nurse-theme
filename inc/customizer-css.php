<?php
/**
 * Dynamic Customizer CSS
 *
 * Generates and outputs inline CSS based on theme customizer settings.
 *
 * @package HelplineNurse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Generate dynamic CSS and attach it to the main stylesheet.
 *
 * @return void
 */
function helpline_nurse_customizer_css(): void {
	$primary_color   = get_theme_mod( 'helpline_nurse_primary_color', '#1a9381' );
	$secondary_color = get_theme_mod( 'helpline_nurse_secondary_color', '#11363e' );
	$text_color      = get_theme_mod( 'helpline_nurse_text_color', '#2d3748' );
	$font_family     = get_theme_mod( 'helpline_nurse_font_family', 'Inter' );
	$border_radius   = get_theme_mod( 'helpline_nurse_border_radius', 'md' );

	$css = ':root {';

	if ( $primary_color ) {
		$css .= '--primary-color: ' . esc_attr( $primary_color ) . ';';
	}
	if ( $secondary_color ) {
		$css .= '--secondary-color: ' . esc_attr( $secondary_color ) . ';';
	}
	if ( $text_color ) {
		$css .= '--text-color: ' . esc_attr( $text_color ) . ';';
	}
	if ( $font_family ) {
		$css .= '--font-main: "' . esc_attr( $font_family ) . '", system-ui, -apple-system, sans-serif;';
	}

	// Calculate Border Radius.
	$radius_val = '16px'; // default md
	switch ( $border_radius ) {
		case 'none':
			$radius_val = '0px';
			break;
		case 'sm':
			$radius_val = '8px';
			break;
		case 'md':
			$radius_val = '16px';
			break;
		case 'lg':
			$radius_val = '24px';
			break;
		case 'pill':
			$radius_val = '9999px';
			break;
	}

	$css .= '--radius-sm: ' . ( '0px' === $radius_val ? '0px' : 'calc(' . esc_attr( $radius_val ) . ' / 2)' ) . ';';
	$css .= '--radius-md: ' . esc_attr( $radius_val ) . ';';
	$css .= '--radius-lg: ' . ( '0px' === $radius_val ? '0px' : 'calc(' . esc_attr( $radius_val ) . ' * 1.5)' ) . ';';
	$css .= '--radius-full: ' . ( 'pill' === $border_radius ? '9999px' : esc_attr( $radius_val ) ) . ';';

	$css .= '}';

	wp_add_inline_style( 'helpline-nurse-style', $css );
}
add_action( 'wp_enqueue_scripts', 'helpline_nurse_customizer_css', 20 );
