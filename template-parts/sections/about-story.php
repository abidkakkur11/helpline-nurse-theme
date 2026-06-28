<?php
/**
 * Section: About Story
 *
 * Glassmorphism card with company story text and image.
 * Overlaps the page header with negative margin.
 *
 * @package HelplineNurse
 */

$page_id    = get_the_ID();
$badge      = helpline_nurse_get_field( 'about_story_badge', $page_id, __( 'Our Story', 'helpline-nurse' ) );
$heading    = helpline_nurse_get_field( 'about_story_heading', $page_id, __( 'Your Trusted Partner in Global Nursing Careers', 'helpline-nurse' ) );
$paragraphs = helpline_nurse_get_field( 'about_story_paragraphs', $page_id, array() );
$image      = helpline_nurse_get_field( 'about_story_image', $page_id, array() );

if ( empty( $paragraphs ) ) {
	$paragraphs = array(
		array( 'paragraph' => __( 'At Helpline Nurse, we understand that navigating international nursing licensure and migration is a complex, high-stakes journey. Founded by professionals who know the healthcare industry firsthand, our mission is to simplify the transition for nurses worldwide.', 'helpline-nurse' ) ),
		array( 'paragraph' => __( 'We bridge the gap between your career aspirations and global opportunities by providing expert, end-to-end documentation, licensing, and career support.', 'helpline-nurse' ) ),
		array( 'paragraph' => __( 'Whether you are aiming for registration in the UK, Ireland, the Middle East, or beyond, we provide the clarity, structure, and professional guidance you need to succeed. We don\'t just process documents; we champion your career growth.', 'helpline-nurse' ) ),
	);
}
?>
<section class="section-padding mt-neg-50 z-index-10" aria-label="<?php esc_attr_e( 'Our Story', 'helpline-nurse' ); ?>">
	<div class="container">
		<div class="story-card glass d-flex gap-4">

			<div>
				<?php if ( $badge ) : ?>
					<span class="badge"><?php echo esc_html( $badge ); ?></span>
				<?php endif; ?>
				<h2 class="mission-title mb-space-sm"><?php echo esc_html( $heading ); ?></h2>

				<?php foreach ( $paragraphs as $para ) : ?>
					<?php if ( ! empty( $para['paragraph'] ) ) : ?>
						<p class="text-1-125"><?php echo esc_html( $para['paragraph'] ); ?></p>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>

			<div class="image-placeholder">
				<?php if ( ! empty( $image['url'] ) ) : ?>
					<img
						src="<?php echo esc_url( $image['url'] ); ?>"
						alt="<?php echo esc_attr( $image['alt'] ?? __( 'Helpline Nurse Team', 'helpline-nurse' ) ); ?>"
						loading="lazy"
						width="<?php echo esc_attr( $image['width'] ?? '500' ); ?>"
						height="<?php echo esc_attr( $image['height'] ?? '400' ); ?>"
					>
				<?php else : ?>
					<img
						src="<?php echo esc_url( HELPLINE_NURSE_URI . '/assets/images/about.png' ); ?>"
						alt="<?php esc_attr_e( 'Helpline Nurse Team', 'helpline-nurse' ); ?>"
						loading="lazy"
						width="500"
						height="400"
					>
				<?php endif; ?>
			</div>

		</div>
	</div>
</section>
