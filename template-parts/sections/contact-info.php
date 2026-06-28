<?php
/**
 * Section: Contact Info
 *
 * Left column of the contact page — address, phone, email, hours.
 * Content from SCF fields (with global option fallbacks).
 *
 * @package HelplineNurse
 */

$page_id      = get_the_ID();
$section_title = helpline_nurse_get_field( 'contact_section_title', $page_id, __( 'Get in Touch', 'helpline-nurse' ) );
$section_desc  = helpline_nurse_get_field( 'contact_section_desc', $page_id, __( 'Have questions about our services or need assistance with your application? Our team is ready to help.', 'helpline-nurse' ) );
$address       = helpline_nurse_get_field( 'contact_address', $page_id ) ?: helpline_nurse_get_option( 'address', __( 'India, Riyadh', 'helpline-nurse' ) );
$phone         = helpline_nurse_get_field( 'contact_phone', $page_id ) ?: helpline_nurse_get_option( 'phone', '+91 123 456 7890' );
$email         = helpline_nurse_get_field( 'contact_email', $page_id ) ?: helpline_nurse_get_option( 'email', 'info@helplinenurse.com' );
$hours         = helpline_nurse_get_field( 'contact_hours', $page_id, __( 'Monday - Saturday: 9:00 AM - 6:00 PM&#10;Sunday: Closed', 'helpline-nurse' ) );
?>
<div class="contact-info">
	<h2 class="contact-title"><?php echo esc_html( $section_title ); ?></h2>
	<p class="contact-desc"><?php echo esc_html( $section_desc ); ?></p>

	<?php if ( $address ) : ?>
		<div class="contact-info-item">
			<div class="contact-icon" aria-hidden="true">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
					<circle cx="12" cy="10" r="3"></circle>
				</svg>
			</div>
			<div>
				<h4><?php esc_html_e( 'Office Location', 'helpline-nurse' ); ?></h4>
				<p><?php echo nl2br( esc_html( $address ) ); ?></p>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( $phone ) : ?>
		<div class="contact-info-item">
			<div class="contact-icon" aria-hidden="true">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
				</svg>
			</div>
			<div>
				<h4><?php esc_html_e( 'Phone Number', 'helpline-nurse' ); ?></h4>
				<p><a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( $email ) : ?>
		<div class="contact-info-item">
			<div class="contact-icon" aria-hidden="true">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
					<polyline points="22,6 12,13 2,6"></polyline>
				</svg>
			</div>
			<div>
				<h4><?php esc_html_e( 'Email Address', 'helpline-nurse' ); ?></h4>
				<p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( $hours ) : ?>
		<div class="contact-info-item">
			<div class="contact-icon" aria-hidden="true">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<circle cx="12" cy="12" r="10"></circle>
					<polyline points="12 6 12 12 16 14"></polyline>
				</svg>
			</div>
			<div>
				<h4><?php esc_html_e( 'Business Hours', 'helpline-nurse' ); ?></h4>
				<p><?php echo nl2br( esc_html( $hours ) ); ?></p>
			</div>
		</div>
	<?php endif; ?>
</div>
