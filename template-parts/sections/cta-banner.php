<?php
/**
 * Section: CTA Banner
 *
 * Reusable full-width CTA banner section.
 * Accepts context via $args array passed from get_template_part().
 *
 * Expected $args:
 *   - title     (string) CTA heading
 *   - desc      (string) CTA description
 *   - btn_label (string) Button label
 *   - btn_url   (string) Button URL
 *
 * If no args are passed, uses theme defaults.
 *
 * @package HelplineNurse
 */

$title     = $args['title'] ?? __( 'Ready to Advance Your Global Career?', 'helpline-nurse' );
$desc      = $args['desc'] ?? __( 'Get in touch with our experts today and take the first step towards your international nursing journey.', 'helpline-nurse' );
$btn_label = $args['btn_label'] ?? __( 'Contact Us Now', 'helpline-nurse' );
$btn_url   = $args['btn_url'] ?? helpline_nurse_get_contact_url();
?>
<section class="section-padding text-center" aria-label="<?php esc_attr_e( 'Call to Action', 'helpline-nurse' ); ?>">
	<div class="container">
		<?php helpline_nurse_cta_banner( $title, $desc, $btn_url, $btn_label ); ?>
	</div>
</section>
