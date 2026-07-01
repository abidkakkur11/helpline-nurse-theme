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
			'description' => esc_html__( 'Configure theme specific settings including logos and menus.', 'helpline-nurse' ),
			'priority'    => 80,
		)
	);

	// Header Logo.
	$wp_customize->add_setting(
		'helpline_nurse_header_logo',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'helpline_nurse_header_logo',
			array(
				'label'       => esc_html__( 'Header Logo', 'helpline-nurse' ),
				'description' => esc_html__( 'Overrides the default site logo in the header.', 'helpline-nurse' ),
				'section'     => 'helpline_nurse_theme_settings',
				'mime_type'   => 'image',
			)
		)
	);

	// Footer Logo.
	$wp_customize->add_setting(
		'helpline_nurse_footer_logo',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'helpline_nurse_footer_logo',
			array(
				'label'       => esc_html__( 'Footer Logo', 'helpline-nurse' ),
				'description' => esc_html__( 'Overrides the default site logo in the footer.', 'helpline-nurse' ),
				'section'     => 'helpline_nurse_theme_settings',
				'mime_type'   => 'image',
			)
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

	// Colors Section (built-in 'colors').
	$wp_customize->add_setting( 'helpline_nurse_primary_color', array(
		'default'           => '#1a9381',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'helpline_nurse_primary_color', array(
		'label'   => esc_html__( 'Primary Color', 'helpline-nurse' ),
		'section' => 'colors',
	) ) );

	$wp_customize->add_setting( 'helpline_nurse_secondary_color', array(
		'default'           => '#11363e',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'helpline_nurse_secondary_color', array(
		'label'   => esc_html__( 'Secondary Color', 'helpline-nurse' ),
		'section' => 'colors',
	) ) );

	$wp_customize->add_setting( 'helpline_nurse_text_color', array(
		'default'           => '#2d3748',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'helpline_nurse_text_color', array(
		'label'   => esc_html__( 'Text Color', 'helpline-nurse' ),
		'section' => 'colors',
	) ) );

	// Typography Section.
	$wp_customize->add_section( 'helpline_nurse_typography', array(
		'title'       => esc_html__( 'Typography', 'helpline-nurse' ),
		'description' => esc_html__( 'Select your primary font family.', 'helpline-nurse' ),
		'priority'    => 85,
	) );

	$wp_customize->add_setting( 'helpline_nurse_font_family', array(
		'default'           => 'Inter',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'helpline_nurse_font_family', array(
		'label'   => esc_html__( 'Base Font Family', 'helpline-nurse' ),
		'section' => 'helpline_nurse_typography',
		'type'    => 'select',
		'choices' => array(
			'Inter'      => 'Inter',
			'Roboto'     => 'Roboto',
			'Poppins'    => 'Poppins',
			'Montserrat' => 'Montserrat',
			'Lato'       => 'Lato',
			'Open Sans'  => 'Open Sans',
		),
	) );

	// Global Settings Section.
	$wp_customize->add_section( 'helpline_nurse_global_settings', array(
		'title'       => esc_html__( 'Global Settings', 'helpline-nurse' ),
		'description' => esc_html__( 'Professional global layout options.', 'helpline-nurse' ),
		'priority'    => 90,
	) );

	$wp_customize->add_setting( 'helpline_nurse_border_radius', array(
		'default'           => 'md',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'helpline_nurse_border_radius', array(
		'label'   => esc_html__( 'Border Radius (Cards & Buttons)', 'helpline-nurse' ),
		'section' => 'helpline_nurse_global_settings',
		'type'    => 'select',
		'choices' => array(
			'none' => 'Square (0px)',
			'sm'   => 'Small (8px)',
			'md'   => 'Rounded (16px)',
			'lg'   => 'Large (24px)',
			'pill' => 'Pill (Full)',
		),
	) );

	$wp_customize->add_setting( 'helpline_nurse_sticky_header', array(
		'default'           => true,
		'sanitize_callback' => 'wp_validate_boolean',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'helpline_nurse_sticky_header', array(
		'label'   => esc_html__( 'Enable Sticky Header', 'helpline-nurse' ),
		'section' => 'helpline_nurse_global_settings',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'helpline_nurse_agency_branding', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'helpline_nurse_agency_branding', array(
		'label'       => esc_html__( 'Footer Agency Branding Text', 'helpline-nurse' ),
		'description' => esc_html__( 'Custom text or HTML to display in the footer.', 'helpline-nurse' ),
		'section'     => 'helpline_nurse_global_settings',
		'type'        => 'textarea',
	) );
}
add_action( 'customize_register', 'helpline_nurse_customize_register' );

/**
 * Display a notice on the Theme Options page linking to the Customizer.
 */
function helpline_nurse_admin_notice_customizer_link() {
	$screen = get_current_screen();
	if ( $screen && $screen->id === 'toplevel_page_helpline-nurse-options' ) {
		$customizer_url = admin_url( 'customize.php' );
		?>
		<div class="notice notice-info">
			<p>
				<?php esc_html_e( 'Looking for colors, typography, or global layout settings?', 'helpline-nurse' ); ?>
				<a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-secondary" style="margin-left: 10px;"><?php esc_html_e( 'Go to Customizer', 'helpline-nurse' ); ?></a>
			</p>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'helpline_nurse_admin_notice_customizer_link' );

