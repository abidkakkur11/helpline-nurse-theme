<?php
/**
 * Section: About Mission & Vision
 *
 * Two-column card layout for Mission and Vision.
 * Content from SCF fields on the About page.
 *
 * @package HelplineNurse
 */

$page_id      = get_the_ID();
$mission_title = helpline_nurse_get_field( 'about_mission_title', $page_id, __( 'Our Mission', 'helpline-nurse' ) );
$mission_text  = helpline_nurse_get_field( 'about_mission_text', $page_id, __( 'To simplify the transition for nurses worldwide by bridging the gap between career aspirations and global opportunities through expert, end-to-end documentation and licensing support.', 'helpline-nurse' ) );
$vision_title  = helpline_nurse_get_field( 'about_vision_title', $page_id, __( 'Our Vision', 'helpline-nurse' ) );
$vision_text   = helpline_nurse_get_field( 'about_vision_text', $page_id, __( "To become the world's most trusted and efficient administrative partner for nurses, ensuring zero barriers in global healthcare employment.", 'helpline-nurse' ) );
?>
<section class="section-padding bg-accent position-relative overflow-hidden" aria-label="<?php esc_attr_e( 'Mission and Vision', 'helpline-nurse' ); ?>">
	<div class="bg-svg-pattern" aria-hidden="true"></div>

	<div class="container z-index-1">
		<div class="grid grid-cols-2 gap-4">

			<!-- Mission -->
			<div class="card">
				<div class="mission-icon" aria-hidden="true">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
					</svg>
				</div>
				<h3 class="mission-title"><?php echo esc_html( $mission_title ); ?></h3>
				<p class="mission-desc"><?php echo esc_html( $mission_text ); ?></p>
			</div>

			<!-- Vision -->
			<div class="card">
				<div class="mission-icon" aria-hidden="true">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<circle cx="12" cy="12" r="10"></circle>
						<path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
					</svg>
				</div>
				<h3 class="mission-title"><?php echo esc_html( $vision_title ); ?></h3>
				<p class="mission-desc"><?php echo esc_html( $vision_text ); ?></p>
			</div>

		</div>
	</div>
</section>
