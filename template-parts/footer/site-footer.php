<?php
/**
 * Site Footer Template Part
 *
 * Renders the four-column footer with company info, navigation,
 * services links, contact details, and copyright — all editable
 * from the SCF Theme Options page.
 *
 * @package HelplineNurse
 */

// Global options.
$site_name          = get_bloginfo( 'name' );
$footer_desc        = helpline_nurse_get_option( 'footer_description', __( 'We provide end-to-end documentation services for nurses and healthcare professionals globally.', 'helpline-nurse' ) );
$footer_copyright   = helpline_nurse_get_option( 'footer_copyright', '&copy; ' . gmdate( 'Y' ) . ' ' . esc_html( $site_name ) . '. ' . __( 'All Rights Reserved.', 'helpline-nurse' ) );
$phone              = helpline_nurse_get_option( 'phone', '+91 123 456 7890' );
$email              = helpline_nurse_get_option( 'email', 'info@helplinenurse.com' );
$address            = helpline_nurse_get_option( 'address', 'India, Riyadh' );
$social_links       = helpline_nurse_get_option( 'social_links', array() );
?>
<footer class="site-footer" role="contentinfo">
	<div class="container">
		<div class="footer-grid">

			<!-- Company Info -->
			<div class="footer-widget">
				<h4 class="footer-logo-title"><?php echo esc_html( $site_name ); ?></h4>
				<p><?php echo esc_html( $footer_desc ); ?></p>

				<?php if ( ! empty( $social_links ) ) : ?>
					<div class="footer-social" aria-label="<?php esc_attr_e( 'Social Links', 'helpline-nurse' ); ?>">
						<?php foreach ( $social_links as $social ) : ?>
							<?php if ( ! empty( $social['url'] ) && ! empty( $social['platform'] ) ) : 
								$platform = strtolower( $social['platform'] );
								$svg = '';
								switch ( $platform ) {
									case 'facebook':
										$svg = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>';
										break;
									case 'instagram':
										$svg = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>';
										break;
									case 'linkedin':
										$svg = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>';
										break;
									case 'youtube':
										$svg = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33 2.78 2.78 0 0 0 1.94 2c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.33 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>';
										break;
									case 'tiktok':
										$svg = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path></svg>';
										break;
									case 'x':
										$svg = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4l11.733 16h4.267l-11.733-16z"></path><path d="M4 20l6.768-6.768m2.46-2.46L20 4"></path></svg>';
										break;
									default:
										$svg = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>';
										break;
								}
							?>
								<a
									href="<?php echo esc_url( $social['url'] ); ?>"
									target="_blank"
									rel="noopener noreferrer"
									class="footer-social-link"
									aria-label="<?php echo esc_attr( $social['platform'] ); ?>"
								>
									<?php echo $svg; ?>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<!-- Quick Links -->
			<div class="footer-widget">
				<h4><?php esc_html_e( 'Quick Links', 'helpline-nurse' ); ?></h4>
				<?php
				$footer_menu_id = absint( get_theme_mod( 'helpline_nurse_footer_menu', 0 ) );
				$footer_menu    = $footer_menu_id ? wp_get_nav_menu_object( $footer_menu_id ) : false;

				if ( $footer_menu || has_nav_menu( 'footer' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu'           => $footer_menu ? $footer_menu_id : '',
							'menu_id'        => 'footer-menu',
							'container'      => false,
							'menu_class'     => 'footer-links',
							'depth'          => 1,
						)
					);
				} else {
					// Fallback static links.
					?>
					<ul class="footer-links">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'helpline-nurse' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Us', 'helpline-nurse' ); ?></a></li>
						<li><a href="<?php echo esc_url( helpline_nurse_get_services_url() ); ?>"><?php esc_html_e( 'Our Services', 'helpline-nurse' ); ?></a></li>
						<li><a href="<?php echo esc_url( helpline_nurse_get_contact_url() ); ?>"><?php esc_html_e( 'Contact', 'helpline-nurse' ); ?></a></li>
					</ul>
					<?php
				}
				?>
			</div>

			<!-- Support Links -->
			<div class="footer-widget">
				<h4><?php esc_html_e( 'Support', 'helpline-nurse' ); ?></h4>
				<ul class="footer-links">
					<?php
					$privacy_page = get_privacy_policy_url();
					?>
					<li><a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>"><?php esc_html_e( 'FAQ', 'helpline-nurse' ); ?></a></li>
					<?php if ( $privacy_page ) : ?>
						<li><a href="<?php echo esc_url( $privacy_page ); ?>"><?php esc_html_e( 'Privacy Policy', 'helpline-nurse' ); ?></a></li>
					<?php else : ?>
						<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'helpline-nurse' ); ?></a></li>
					<?php endif; ?>
					<li><a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'helpline-nurse' ); ?></a></li>
				</ul>
			</div>

			<!-- Contact Details -->
			<div class="footer-widget">
				<h4><?php esc_html_e( 'Contact Details', 'helpline-nurse' ); ?></h4>
				<ul class="footer-links">
					<?php if ( $email ) : ?>
						<li>
							<?php esc_html_e( 'Email:', 'helpline-nurse' ); ?>
							<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
						</li>
					<?php endif; ?>
					<?php if ( $phone ) : ?>
						<li>
							<?php esc_html_e( 'Phone:', 'helpline-nurse' ); ?>
							<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
						</li>
					<?php endif; ?>
					<?php if ( $address ) : ?>
						<li><?php esc_html_e( 'Location:', 'helpline-nurse' ); ?> <?php echo esc_html( $address ); ?></li>
					<?php endif; ?>
				</ul>
			</div>

		</div><!-- .footer-grid -->

		<div class="footer-bottom">
			<p><?php echo wp_kses_post( $footer_copyright ); ?></p>
		</div>

	</div><!-- .container -->
</footer>
