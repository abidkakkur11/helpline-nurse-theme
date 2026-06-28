<?php
/**
 * Section: Why Choose Us
 *
 * Four feature cards with SVG icons + a stats counter row.
 * All content from SCF fields.
 *
 * @package HelplineNurse
 */

$page_id  = get_the_ID();
$badge    = helpline_nurse_get_field( 'why_badge', $page_id, __( 'The Helpline Advantage', 'helpline-nurse' ) );
$heading  = helpline_nurse_get_field( 'why_heading', $page_id, __( 'Why Choose Us?', 'helpline-nurse' ) );
$desc     = helpline_nurse_get_field( 'why_description', $page_id, __( 'We are your trusted partners in navigating the complex landscape of international nursing licensure and migration.', 'helpline-nurse' ) );
$features = helpline_nurse_get_field( 'why_features', $page_id, array() );
$counters = helpline_nurse_get_field( 'counters', $page_id, array() );

// Default feature cards.
if ( empty( $features ) ) {
	$features = array(
		array(
			'icon_svg'    => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>',
			'title'       => __( 'Comprehensive Expertise', 'helpline-nurse' ),
			'description' => __( 'From Dataflow and credential verification to complex visa applications and exam bookings, we handle the technical details so you can focus on your nursing practice.', 'helpline-nurse' ),
		),
		array(
			'icon_svg'    => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>',
			'title'       => __( 'End-to-End Support', 'helpline-nurse' ),
			'description' => __( 'We are with you at every stage—from initial skill assessment and exam registration (Prometric, IELTS, PTE) to final post-arrival support.', 'helpline-nurse' ),
		),
		array(
			'icon_svg'    => '<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path>',
			'title'       => __( 'Reliability & Transparency', 'helpline-nurse' ),
			'description' => __( 'We provide clear timelines and honest guidance, ensuring you are never left guessing about the status of your applications.', 'helpline-nurse' ),
		),
		array(
			'icon_svg'    => '<circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>',
			'title'       => __( 'Tailored Solutions', 'helpline-nurse' ),
			'description' => __( "Every nurse's journey is different. We customize our services to match your unique qualifications and career goals.", 'helpline-nurse' ),
		),
	);
}

// Default counters.
if ( empty( $counters ) ) {
	$counters = array(
		array( 'number' => '10k+', 'label' => __( 'Processes Completed', 'helpline-nurse' ) ),
		array( 'number' => '30+',  'label' => __( 'Associated ECA Bodies', 'helpline-nurse' ) ),
		array( 'number' => '100%', 'label' => __( 'Happy Customers', 'helpline-nurse' ) ),
		array( 'number' => '750+', 'label' => __( 'Associated Universities', 'helpline-nurse' ) ),
	);
}
?>
<section class="section-padding bg-accent position-relative overflow-hidden" aria-label="<?php esc_attr_e( 'Why Choose Us', 'helpline-nurse' ); ?>">
	<div class="bg-svg-pattern" aria-hidden="true"></div>

	<div class="container z-index-1">

		<?php helpline_nurse_section_header( $heading, $badge, $desc ); ?>

		<!-- Feature Cards -->
		<div class="grid grid-cols-2 gap-4">
			<?php foreach ( $features as $feature ) : ?>
				<div class="feature-card">
					<div class="icon-wrapper" aria-hidden="true" style="display: flex; align-items: center; justify-content: center;">
						<?php if ( ! empty( $feature['icon_image'] ) ) : ?>
							<?php echo wp_get_attachment_image( $feature['icon_image'], 'thumbnail', false, array( 'style' => 'width: 30px; height: 30px; object-fit: contain;' ) ); ?>
						<?php else : ?>
							<svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<?php echo wp_kses( $feature['icon_svg'] ?? '', helpline_nurse_svg_allowed_tags() ); ?>
							</svg>
						<?php endif; ?>
					</div>
					<h4><?php echo esc_html( $feature['title'] ?? '' ); ?></h4>
					<p><?php echo esc_html( $feature['description'] ?? '' ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- Counters / Stats -->
		<?php if ( ! empty( $counters ) ) : ?>
			<div class="grid grid-cols-4 gap-2 mt-space-xl" aria-label="<?php esc_attr_e( 'Statistics', 'helpline-nurse' ); ?>">
				<?php foreach ( $counters as $counter ) : ?>
					<div class="stat-item">
						<div class="stat-number"><?php echo esc_html( $counter['number'] ?? '' ); ?></div>
						<div class="stat-text"><?php echo esc_html( $counter['label'] ?? '' ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
<?php
