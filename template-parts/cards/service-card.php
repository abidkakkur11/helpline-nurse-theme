<?php
/**
 * Card: Service Card
 *
 * Renders a single service card for archives and overview grids.
 * Designed to work within The Loop (uses current post context).
 *
 * @package HelplineNurse
 */

$service_url = get_permalink();
$title       = get_the_title();
$excerpt     = get_the_excerpt();
?>
<a href="<?php echo esc_url( $service_url ); ?>" class="card service-card service-card-image" aria-label="<?php echo esc_attr( sprintf( __( 'Learn more about %s', 'helpline-nurse' ), $title ) ); ?>">

	<div class="card-image-wrapper">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php
			the_post_thumbnail(
				'helpline-service-card',
				array(
					'loading' => 'lazy',
					'alt'     => esc_attr( $title ),
				)
			);
			?>
		<?php else : ?>
			<?php
			// Fallback to SCF default service image from options.
			$default = helpline_nurse_get_option( 'default_service_image', array() );
			if ( ! empty( $default['url'] ) ) :
				?>
				<img
					src="<?php echo esc_url( $default['url'] ); ?>"
					alt="<?php echo esc_attr( $title ); ?>"
					loading="lazy"
					width="600"
					height="400"
				>
			<?php else : ?>
				<img
					src="<?php echo esc_url( HELPLINE_NURSE_URI . '/assets/images/service_dataflow.png' ); ?>"
					alt="<?php echo esc_attr( $title ); ?>"
					loading="lazy"
					width="600"
					height="400"
				>
			<?php endif; ?>
		<?php endif; ?>
	</div>

	<div class="card-content">
		<div>
			<h3><?php echo esc_html( $title ); ?></h3>
			<?php if ( $excerpt ) : ?>
				<p><?php echo esc_html( $excerpt ); ?></p>
			<?php endif; ?>
		</div>
		<div class="link-with-icon" aria-hidden="true">
			<?php esc_html_e( 'Learn More', 'helpline-nurse' ); ?>
			<?php echo helpline_nurse_icon_arrow_right( 20 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</div>

</a>
