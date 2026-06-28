<?php
/**
 * Section: Value Proposition
 *
 * Glassmorphism card with expert documentation headline.
 * Overlaps the hero section with negative margin.
 *
 * @package HelplineNurse
 */

$page_id    = get_the_ID();
$heading    = helpline_nurse_get_field( 'vp_heading', $page_id, __( 'Expert Nursing Documentation.', 'helpline-nurse' ) );
$heading_hl = helpline_nurse_get_field( 'vp_heading_highlight', $page_id, __( 'Zero Errors.', 'helpline-nurse' ) );
$desc       = helpline_nurse_get_field( 'vp_description', $page_id, __( 'From Council renewals to Global Attestations, we manage your paperwork so you can focus on your patients. Reliable support for nurses worldwide.', 'helpline-nurse' ) );
?>
<section class="section-padding text-center glass z-index-10 mt-neg-30 hero-content-padding" aria-label="<?php esc_attr_e( 'Value Proposition', 'helpline-nurse' ); ?>">
	<div class="container">
		<h2 class="mission-title mb-space-sm">
			<?php echo esc_html( $heading ); ?>
			<?php if ( $heading_hl ) : ?>
				<span class="text-color-primary"><?php echo esc_html( $heading_hl ); ?></span>
			<?php endif; ?>
		</h2>
		<p><?php echo esc_html( $desc ); ?></p>
	</div>
</section>
