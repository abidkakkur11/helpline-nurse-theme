<?php
/**
 * Site Header Template Part
 *
 * Renders the sticky site header with logo, primary navigation, and mobile toggle.
 *
 * @package HelplineNurse
 */

$is_sticky    = get_theme_mod( 'helpline_nurse_sticky_header', true );
$header_style = $is_sticky ? '' : ' style="position: relative;"';
?>
<header class="site-header" id="site-header" role="banner"<?php echo $header_style; ?>>
	<div class="container">

		<!-- Logo -->
		<div class="logo" aria-label="<?php esc_attr_e( 'Site Logo', 'helpline-nurse' ); ?>">
			<?php helpline_nurse_site_logo(); ?>
		</div>

		<!-- Mobile Menu Toggle -->
		<button
			class="menu-toggle"
			id="menu-toggle"
			aria-controls="primary-navigation"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle navigation', 'helpline-nurse' ); ?>"
		>
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false">
				<line x1="3" y1="12" x2="21" y2="12"></line>
				<line x1="3" y1="6" x2="21" y2="6"></line>
				<line x1="3" y1="18" x2="21" y2="18"></line>
			</svg>
		</button>

		<!-- Primary Navigation -->
		<nav class="main-nav" id="primary-navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'helpline-nurse' ); ?>">
			<?php
			$header_menu_id = absint( get_theme_mod( 'helpline_nurse_header_menu', 0 ) );
			$header_menu    = $header_menu_id ? wp_get_nav_menu_object( $header_menu_id ) : false;

			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu'           => $header_menu ? $header_menu_id : '',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => 'helpline_nurse_primary_menu_fallback',
				)
			);
			?>
		</nav>

	</div>
</header>
<?php

/**
 * Fallback primary navigation when no menu is assigned.
 * Renders basic page links so the theme is immediately usable.
 *
 * @return void
 */
function helpline_nurse_primary_menu_fallback(): void {
	$services_url = helpline_nurse_get_services_url();
	$contact_url  = helpline_nurse_get_contact_url();
	?>
	<ul id="primary-menu">
		<li<?php echo is_front_page() ? ' class="current-menu-item"' : ''; ?>>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'helpline-nurse' ); ?></a>
		</li>
		<li<?php echo is_post_type_archive( 'service' ) || is_singular( 'service' ) ? ' class="current-menu-item"' : ''; ?>>
			<a href="<?php echo esc_url( $services_url ); ?>"><?php esc_html_e( 'Services', 'helpline-nurse' ); ?></a>
		</li>
		<li>
			<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'helpline-nurse' ); ?></a>
		</li>
		<li<?php echo is_home() || is_singular( 'post' ) ? ' class="current-menu-item"' : ''; ?>>
			<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php esc_html_e( 'Blog', 'helpline-nurse' ); ?></a>
		</li>
		<li>
			<a href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact', 'helpline-nurse' ); ?></a>
		</li>
	</ul>
	<?php
}
