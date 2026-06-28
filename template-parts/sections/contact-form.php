<?php
/**
 * Section: Contact Form
 *
 * Right column of the contact page.
 * Renders the shortcode stored in the SCF 'contact_form_shortcode' field.
 * Falls back to a native WordPress comment form structure if no shortcode is set.
 *
 * @package HelplineNurse
 */

$page_id   = get_the_ID();
$shortcode = helpline_nurse_get_field( 'contact_form_shortcode', $page_id, '' );
?>
<div class="card contact-form-card">
	<h3 class="mb-space-md"><?php esc_html_e( 'Send us a Message', 'helpline-nurse' ); ?></h3>

	<?php if ( ! empty( $shortcode ) ) : ?>
		<?php echo do_shortcode( $shortcode ); ?>
	<?php else : ?>
		<?php
		// Native WordPress contact form fallback (uses wp_nonce for security).
		$nonce_action = 'helpline_nurse_contact_form';
		?>
		<form
			id="helpline-contact-form"
			class="contact-form"
			method="post"
			action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
			novalidate
		>
			<?php wp_nonce_field( $nonce_action, 'helpline_nurse_contact_nonce' ); ?>
			<input type="hidden" name="action" value="helpline_nurse_contact">

			<div class="form-group">
				<label for="cn-name" class="form-label"><?php esc_html_e( 'Full Name', 'helpline-nurse' ); ?> <span aria-hidden="true">*</span></label>
				<input
					type="text"
					id="cn-name"
					name="cn_name"
					class="form-control"
					placeholder="<?php esc_attr_e( 'Your Name', 'helpline-nurse' ); ?>"
					required
					autocomplete="name"
				>
			</div>

			<div class="form-group">
				<label for="cn-email" class="form-label"><?php esc_html_e( 'Email Address', 'helpline-nurse' ); ?> <span aria-hidden="true">*</span></label>
				<input
					type="email"
					id="cn-email"
					name="cn_email"
					class="form-control"
					placeholder="<?php esc_attr_e( 'Your Email', 'helpline-nurse' ); ?>"
					required
					autocomplete="email"
				>
			</div>

			<div class="form-group">
				<label for="cn-phone" class="form-label"><?php esc_html_e( 'Phone Number', 'helpline-nurse' ); ?></label>
				<input
					type="tel"
					id="cn-phone"
					name="cn_phone"
					class="form-control"
					placeholder="<?php esc_attr_e( 'Your Phone Number', 'helpline-nurse' ); ?>"
					autocomplete="tel"
				>
			</div>

			<div class="form-group">
				<label for="cn-service" class="form-label"><?php esc_html_e( 'Service Needed', 'helpline-nurse' ); ?></label>
				<select id="cn-service" name="cn_service" class="form-control">
					<option value=""><?php esc_html_e( 'Select a Service...', 'helpline-nurse' ); ?></option>
					<?php
					// Dynamically populate from Service CPT.
					$services = get_posts(
						array(
							'post_type'      => 'service',
							'posts_per_page' => -1,
							'post_status'    => 'publish',
							'orderby'        => 'title',
							'order'          => 'ASC',
							'no_found_rows'  => true,
						)
					);
					foreach ( $services as $service ) :
						?>
						<option value="<?php echo esc_attr( $service->post_name ); ?>">
							<?php echo esc_html( $service->post_title ); ?>
						</option>
					<?php endforeach; ?>
					<option value="other"><?php esc_html_e( 'Other', 'helpline-nurse' ); ?></option>
				</select>
			</div>

			<div class="form-group">
				<label for="cn-message" class="form-label"><?php esc_html_e( 'Message', 'helpline-nurse' ); ?> <span aria-hidden="true">*</span></label>
				<textarea
					id="cn-message"
					name="cn_message"
					class="form-control"
					placeholder="<?php esc_attr_e( 'How can we help you?', 'helpline-nurse' ); ?>"
					required
				></textarea>
			</div>

			<button type="submit" class="btn btn-primary btn-block-sm" id="cn-submit">
				<?php esc_html_e( 'Send Message', 'helpline-nurse' ); ?>
			</button>
		</form>
	<?php endif; ?>
</div>
