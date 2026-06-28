<?php
/**
 * Section: Hero
 *
 * Full-screen hero with heading, subtitle, checklist card, CTA buttons, and image.
 * All content from SCF fields on the front page.
 *
 * @package HelplineNurse
 */

$page_id       = get_the_ID();
$title         = helpline_nurse_get_field( 'hero_title', $page_id, __( 'Be a Registered', 'helpline-nurse' ) );
$title_hl      = helpline_nurse_get_field( 'hero_title_highlight', $page_id, __( 'Nurse.', 'helpline-nurse' ) );
$subtitle      = helpline_nurse_get_field( 'hero_subtitle', $page_id, __( 'UK | Canada | USA | Australia | Ireland | Middle East', 'helpline-nurse' ) );
$checklist     = helpline_nurse_get_field( 'hero_checklist', $page_id, array() );
$btn1_label    = helpline_nurse_get_field( 'hero_btn1_label', $page_id, __( 'View All Services', 'helpline-nurse' ) );
$btn1_url      = helpline_nurse_get_field( 'hero_btn1_url', $page_id, helpline_nurse_get_services_url() );
$btn2_label    = helpline_nurse_get_field( 'hero_btn2_label', $page_id, __( 'Free Consultation', 'helpline-nurse' ) );
$btn2_url      = helpline_nurse_get_field( 'hero_btn2_url', $page_id, helpline_nurse_get_contact_url() );
$hero_image    = helpline_nurse_get_field( 'hero_image', $page_id, array() );

// Default checklist if none set in SCF.
if ( empty( $checklist ) ) {
	$checklist = array(
		array( 'item' => __( 'NNAS Registration & Verification', 'helpline-nurse' ) ),
		array( 'item' => __( 'CGFNS, NMBI, NMC, ANMAC, NSCN', 'helpline-nurse' ) ),
		array( 'item' => __( 'Registration Renewal & Good Standing', 'helpline-nurse' ) ),
	);
}
?>
<section class="hero hero-modern-light" aria-label="<?php esc_attr_e( 'Hero', 'helpline-nurse' ); ?>">

	<div class="container">
		<div class="hero-content">

			<h1 class="hero-title">
				<?php echo esc_html( $title ); ?>
				<?php if ( $title_hl ) : ?>
					<span><?php echo esc_html( $title_hl ); ?></span>
				<?php endif; ?>
			</h1>

			<p class="hero-subtitle"><?php echo esc_html( $subtitle ); ?></p>

			<div class="hero-checklist-card" aria-label="<?php esc_attr_e( 'Service highlights', 'helpline-nurse' ); ?>">
				<ul class="checklist">
					<?php foreach ( $checklist as $item ) : ?>
						<?php if ( ! empty( $item['item'] ) ) : ?>
							<li>
								<?php echo helpline_nurse_icon_check( 24 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								<?php echo esc_html( $item['item'] ); ?>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="d-flex gap-2 flex-wrap">
				<?php helpline_nurse_button( $btn1_url, $btn1_label, 'btn btn-primary' ); ?>
				<?php helpline_nurse_button( $btn2_url, $btn2_label, 'btn btn-outline' ); ?>
			</div>

		</div><!-- .hero-content -->
	</div><!-- .container -->

	<!-- Hero Image -->
	<div class="hero-image-wrapper" aria-hidden="true">
		<?php if ( ! empty( $hero_image['url'] ) ) : ?>
			<img
				src="<?php echo esc_url( $hero_image['url'] ); ?>"
				alt="<?php echo esc_attr( $hero_image['alt'] ?? __( 'Professional Nurse', 'helpline-nurse' ) ); ?>"
				loading="eager"
				width="<?php echo esc_attr( $hero_image['width'] ?? '600' ); ?>"
				height="<?php echo esc_attr( $hero_image['height'] ?? '700' ); ?>"
			>
		<?php else : ?>
			<img
				src="<?php echo esc_url( HELPLINE_NURSE_URI . '/assets/images/hero.png' ); ?>"
				alt="<?php esc_attr_e( 'Professional Nurse', 'helpline-nurse' ); ?>"
				loading="eager"
				width="600"
				height="700"
			>
		<?php endif; ?>
	</div>

</section>
