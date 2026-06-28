<?php
/**
 * Section: Core Features Grid
 *
 * Five-column icon grid with feature titles and descriptions.
 * Uses fixed theme content to avoid unnecessary page fields.
 *
 * @package HelplineNurse
 */

$heading  = __( 'Core Features', 'helpline-nurse' );
$features = array(
	array(
		'icon_svg'    => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>',
		'color_class' => 'color-primary',
		'title'       => __( 'Secure Platform', 'helpline-nurse' ),
		'description' => __( '100% data protection', 'helpline-nurse' ),
	),
	array(
		'icon_svg'    => '<circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline>',
		'color_class' => 'color-accent',
		'title'       => __( '24/7 Support', 'helpline-nurse' ),
		'description' => __( 'Always here to help', 'helpline-nurse' ),
	),
	array(
		'icon_svg'    => '<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline>',
		'color_class' => 'color-primary',
		'title'       => __( 'Global Reach', 'helpline-nurse' ),
		'description' => __( 'Worldwide services', 'helpline-nurse' ),
	),
	array(
		'icon_svg'    => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>',
		'color_class' => 'color-accent',
		'title'       => __( 'Fast Processing', 'helpline-nurse' ),
		'description' => __( 'Expedited handling', 'helpline-nurse' ),
	),
	array(
		'icon_svg'    => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline>',
		'color_class' => 'color-primary',
		'title'       => __( 'Verified Experts', 'helpline-nurse' ),
		'description' => __( 'Professional team', 'helpline-nurse' ),
	),
);

$allowed_svg = helpline_nurse_svg_allowed_tags();
?>
<section class="section-padding bg-white border-top" aria-label="<?php esc_attr_e( 'Core Features', 'helpline-nurse' ); ?>">
	<div class="container text-center">
		<h2 class="mb-space-lg text-gradient"><?php echo esc_html( $heading ); ?></h2>

		<div class="grid grid-cols-5 gap-2 text-center">
			<?php foreach ( $features as $feature ) : ?>
				<div class="feature-item">
					<div class="feature-icon-circle <?php echo esc_attr( $feature['color_class'] ?? 'color-primary' ); ?>" aria-hidden="true">
						<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<?php echo wp_kses( $feature['icon_svg'] ?? '', $allowed_svg ); ?>
						</svg>
					</div>
					<h4 class="feature-title"><?php echo esc_html( $feature['title'] ?? '' ); ?></h4>
					<p class="feature-desc"><?php echo esc_html( $feature['description'] ?? '' ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
