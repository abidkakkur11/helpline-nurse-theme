<?php
/**
 * Section: Google Map
 *
 * Renders a Google Maps iframe embed.
 * The embed URL is stored in the SCF 'contact_map_embed' field.
 *
 * @package HelplineNurse
 */

$page_id  = get_the_ID();
$map_url  = helpline_nurse_get_field( 'contact_map_embed', $page_id, '' );
?>
<?php if ( ! empty( $map_url ) ) : ?>
	<div class="map-wrapper" aria-label="<?php esc_attr_e( 'Office Location Map', 'helpline-nurse' ); ?>">
		<iframe
			src="<?php echo esc_url( $map_url ); ?>"
			width="100%"
			height="350"
			style="border:0;"
			allowfullscreen=""
			loading="lazy"
			referrerpolicy="no-referrer-when-downgrade"
			title="<?php esc_attr_e( 'Helpline Nurse Office Location', 'helpline-nurse' ); ?>"
		></iframe>
	</div>
<?php else : ?>
	<div class="map-placeholder" role="img" aria-label="<?php esc_attr_e( 'Map placeholder – add embed URL in Theme Options', 'helpline-nurse' ); ?>">
		<p><?php esc_html_e( 'Google Maps embed will appear here. Add the embed URL in Contact Page fields.', 'helpline-nurse' ); ?></p>
	</div>
<?php endif; ?>
