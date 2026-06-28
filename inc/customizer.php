<?php
/**
 * Theme Customizer settings.
 *
 * @package HelplineNurse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns available navigation menus for Customizer select controls.
 *
 * @return array
 */
function helpline_nurse_get_menu_choices(): array {
	$choices = array(
		'0' => esc_html__( 'Use assigned theme location', 'helpline-nurse' ),
	);
	$menus   = wp_get_nav_menus();

	foreach ( $menus as $menu ) {
		$choices[(string) $menu->term_id] = $menu->name;
	}

	return $choices;
}

/**
 * Sanitizes a selected nav menu term ID.
 *
 * @param mixed $value Menu term ID.
 * @return int
 */
function helpline_nurse_sanitize_menu_choice( $value ): int {
	$value = absint( $value );

	if ( 0 === $value ) {
		return 0;
	}

	return wp_get_nav_menu_object( $value ) ? $value : 0;
}

/**
 * Registers theme display options in the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 * @return void
 */
function helpline_nurse_customize_register( WP_Customize_Manager $wp_customize ): void {
	$wp_customize->add_section(
		'helpline_nurse_theme_settings',
		array(
			'title'       => esc_html__( 'Theme Settings', 'helpline-nurse' ),
			'description' => esc_html__( 'Select the menus used by the theme header and footer.', 'helpline-nurse' ),
			'priority'    => 80,
		)
	);

	$wp_customize->add_setting(
		'helpline_nurse_header_menu',
		array(
			'default'           => 0,
			'sanitize_callback' => 'helpline_nurse_sanitize_menu_choice',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'helpline_nurse_header_menu',
		array(
			'label'   => esc_html__( 'Header Menu', 'helpline-nurse' ),
			'section' => 'helpline_nurse_theme_settings',
			'type'    => 'select',
			'choices' => helpline_nurse_get_menu_choices(),
		)
	);

	$wp_customize->add_setting(
		'helpline_nurse_footer_menu',
		array(
			'default'           => 0,
			'sanitize_callback' => 'helpline_nurse_sanitize_menu_choice',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'helpline_nurse_footer_menu',
		array(
			'label'   => esc_html__( 'Footer Menu', 'helpline-nurse' ),
			'section' => 'helpline_nurse_theme_settings',
			'type'    => 'select',
			'choices' => helpline_nurse_get_menu_choices(),
		)
	);
}
add_action( 'customize_register', 'helpline_nurse_customize_register' );

