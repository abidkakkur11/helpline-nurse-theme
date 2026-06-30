<?php
/**
 * Template Functions
 *
 * Reusable helper functions for outputting common HTML components.
 * Keeps templates clean and logic centralised.
 *
 * @package HelplineNurse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// =========================================================================
// SCF / ACF Helpers
// =========================================================================

/**
 * Safely retrieves an SCF field value with an optional fallback.
 *
 * @param string     $field_name  The SCF field name.
 * @param int|string $post_id     Post ID, 'option', or false for current post.
 * @param mixed      $fallback    Value to return if field is empty.
 * @return mixed
 */
function helpline_nurse_get_field( string $field_name, $post_id = false, $fallback = '' ) {
	if ( ! function_exists( 'get_field' ) ) {
		return $fallback;
	}
	$value = get_field( $field_name, $post_id );

	if ( null === $value || false === $value || '' === $value || array() === $value ) {
		return $fallback;
	}

	return $value;
}

/**
 * Retrieves an SCF options page field.
 *
 * @param string $field_name The SCF field name.
 * @param mixed  $fallback   Fallback value if empty.
 * @return mixed
 */
function helpline_nurse_get_option( string $field_name, $fallback = '' ) {
	return helpline_nurse_get_field( $field_name, 'option', $fallback );
}

// =========================================================================
// Component Renderers
// =========================================================================

/**
 * Outputs a reusable button element.
 *
 * @param string $url      Button URL.
 * @param string $label    Button label text.
 * @param string $class    CSS class(es) for the button.
 * @param array  $attrs    Additional HTML attributes as key => value.
 * @return void
 */
function helpline_nurse_button( string $url, string $label, string $class = 'btn btn-primary', array $attrs = [] ): void {
	if ( empty( $url ) || empty( $label ) ) {
		return;
	}

	$extra_attrs = '';
	foreach ( $attrs as $attr_key => $attr_value ) {
		$extra_attrs .= ' ' . esc_attr( $attr_key ) . '="' . esc_attr( $attr_value ) . '"';
	}

	printf(
		'<a href="%s" class="%s"%s>%s</a>',
		esc_url( $url ),
		esc_attr( $class ),
		$extra_attrs, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
		esc_html( $label )
	);
}

/**
 * Outputs a reusable section header with badge, heading, and description.
 *
 * @param string $badge       Badge text (optional).
 * @param string $heading     Section heading.
 * @param string $description Section description paragraph (optional).
 * @param string $class       Additional CSS class for the wrapper.
 * @return void
 */
function helpline_nurse_section_header( string $heading, string $badge = '', string $description = '', string $class = 'section-title' ): void {
	echo '<div class="' . esc_attr( $class ) . '">';

	if ( ! empty( $badge ) ) {
		echo '<span class="badge">' . esc_html( $badge ) . '</span>';
	}

	echo '<h2>' . esc_html( $heading ) . '</h2>';

	if ( ! empty( $description ) ) {
		echo '<p>' . esc_html( $description ) . '</p>';
	}

	echo '</div>';
}

/**
 * Outputs the SVG arrow right icon.
 *
 * @param int $size Icon size in pixels.
 * @return string SVG markup.
 */
function helpline_nurse_icon_arrow_right( int $size = 20 ): string {
	return sprintf(
		'<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icon-right" aria-hidden="true" focusable="false"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
		absint( $size )
	);
}

/**
 * Outputs the SVG check circle icon.
 *
 * @param int $size Icon size in pixels.
 * @return string SVG markup.
 */
function helpline_nurse_icon_check( int $size = 24 ): string {
	return sprintf(
		'<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
		absint( $size )
	);
}

/**
 * Returns allowed SVG tags/attributes for inline icon paths.
 *
 * @return array
 */
function helpline_nurse_svg_allowed_tags(): array {
	return array(
		'path'     => array(
			'd'      => true,
			'fill'   => true,
			'stroke' => true,
		),
		'circle'   => array(
			'cx'     => true,
			'cy'     => true,
			'r'      => true,
			'fill'   => true,
			'stroke' => true,
		),
		'rect'     => array(
			'x'      => true,
			'y'      => true,
			'width'  => true,
			'height' => true,
			'rx'     => true,
			'ry'     => true,
			'fill'   => true,
			'stroke' => true,
		),
		'polygon'  => array(
			'points' => true,
			'fill'   => true,
			'stroke' => true,
		),
		'polyline' => array(
			'points' => true,
			'fill'   => true,
			'stroke' => true,
		),
		'line'     => array(
			'x1'     => true,
			'y1'     => true,
			'x2'     => true,
			'y2'     => true,
			'stroke' => true,
		),
		'ellipse'  => array(
			'cx'     => true,
			'cy'     => true,
			'rx'     => true,
			'ry'     => true,
			'fill'   => true,
			'stroke' => true,
		),
	);
}

/**
 * Outputs the CTA banner section.
 *
 * @param string $title   Banner heading.
 * @param string $desc    Banner description.
 * @param string $btn_url CTA button URL.
 * @param string $btn_label CTA button label.
 * @return void
 */
function helpline_nurse_cta_banner( string $title, string $desc, string $btn_url, string $btn_label ): void {
	?>
	<div class="cta-banner">
		<h2 class="cta-title"><?php echo esc_html( $title ); ?></h2>
		<p class="cta-desc"><?php echo esc_html( $desc ); ?></p>
		<?php helpline_nurse_button( $btn_url, $btn_label, 'btn btn-primary btn-solid-primary' ); ?>
	</div>
	<?php
}

/**
 * Outputs the site logo. Uses custom logo if set based on location, otherwise fallback.
 *
 * @param string $location Location of the logo ('header' or 'footer'). Default 'header'.
 * @return void
 */
function helpline_nurse_site_logo( string $location = 'header' ): void {
	$logo_id = false;

	if ( 'footer' === $location ) {
		$logo_id = get_theme_mod( 'helpline_nurse_footer_logo' );
	} else {
		$logo_id = get_theme_mod( 'helpline_nurse_header_logo' );
	}

	if ( $logo_id ) {
		echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="custom-logo-link">';
		echo wp_get_attachment_image( $logo_id, 'full', false, array( 'class' => 'custom-logo' ) );
		echo '</a>';
		return;
	}

	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}

	// SVG text logo fallback (matches prototype design).
	?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-text-link" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
		<svg width="200" height="50" viewBox="0 0 200 50" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
			<rect width="200" height="50" fill="transparent"/>
			<text fill="#1a9381" xml:space="preserve" font-family="Inter, sans-serif" font-size="24" font-weight="800" letter-spacing="-0.02em">
				<tspan x="10" y="32"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></tspan>
			</text>
		</svg>
	</a>
	<?php
}

/**
 * Outputs a responsive featured image for a post.
 *
 * @param int    $post_id   The post ID.
 * @param string $size      The image size to use.
 * @param string $alt       Alt text for the image.
 * @param string $class     CSS class for the image.
 * @return void
 */
function helpline_nurse_post_thumbnail( int $post_id, string $size = 'helpline-blog-card', string $alt = '', string $class = '' ): void {
	if ( ! has_post_thumbnail( $post_id ) ) {
		return;
	}

	$alt_text = ! empty( $alt ) ? $alt : get_the_title( $post_id );

	echo wp_get_attachment_image(
		get_post_thumbnail_id( $post_id ),
		$size,
		false,
		array(
			'alt'     => esc_attr( $alt_text ),
			'loading' => 'lazy',
			'class'   => esc_attr( $class ),
		)
	);
}

/**
 * Outputs a page header banner (used on inner pages).
 *
 * @param string $title    Page title.
 * @param string $subtitle Page subtitle/description.
 * @return void
 */
function helpline_nurse_page_header( string $title, string $subtitle = '' ): void {
	?>
	<section class="page-header" aria-label="<?php esc_attr_e( 'Page Header', 'helpline-nurse' ); ?>">
		<div class="container">
			<?php get_template_part( 'template-parts/components/breadcrumbs' ); ?>
			<h1><?php echo esc_html( $title ); ?></h1>
			<?php if ( ! empty( $subtitle ) ) : ?>
				<p class="page-subtitle"><?php echo esc_html( $subtitle ); ?></p>
			<?php endif; ?>
		</div>
	</section>
	<?php
}

/**
 * Gets the contact page URL, searching by template filename.
 *
 * @return string Contact page URL.
 */
function helpline_nurse_get_contact_url(): string {
	$contact_page = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'page-contact.php' ) );
	if ( ! empty( $contact_page ) ) {
		return get_permalink( $contact_page[0]->ID );
	}

	// Fallback: look for a page named "Contact".
	$contact_pages = get_posts(
		array(
			'post_type'              => 'page',
			'post_status'            => 'publish',
			'title'                  => 'Contact',
			'posts_per_page'         => 1,
			'fields'                 => 'ids',
			'orderby'                => 'ID',
			'order'                  => 'ASC',
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
		)
	);

	if ( ! empty( $contact_pages ) ) {
		return get_permalink( $contact_pages[0] );
	}

	return home_url( '/contact/' );
}

/**
 * Gets the services archive URL.
 *
 * @return string Services archive URL.
 */
function helpline_nurse_get_services_url(): string {
	$archive = get_post_type_archive_link( 'service' );
	return $archive ? $archive : home_url( '/our-services/' );
}
