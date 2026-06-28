<?php
/**
 * Card: Blog Card
 *
 * Renders a single blog post card for the archive grid.
 * Uses the current post context (within The Loop).
 *
 * @package HelplineNurse
 */

$post_url = get_permalink();
$title    = get_the_title();
$excerpt  = get_the_excerpt();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php echo esc_url( $post_url ); ?>" class="blog-card-image-link" tabindex="-1" aria-hidden="true">
			<?php
			the_post_thumbnail(
				'helpline-blog-card',
				array(
					'class'   => 'blog-card-image',
					'loading' => 'lazy',
					'alt'     => esc_attr( $title ),
				)
			);
			?>
		</a>
	<?php else : ?>
		<?php
		$default = helpline_nurse_get_option( 'default_blog_image', array() );
		if ( ! empty( $default['url'] ) ) :
			?>
			<a href="<?php echo esc_url( $post_url ); ?>" class="blog-card-image-link" tabindex="-1" aria-hidden="true">
				<img
					src="<?php echo esc_url( $default['url'] ); ?>"
					alt=""
					class="blog-card-image"
					loading="lazy"
					width="800"
					height="450"
				>
			</a>
		<?php else : ?>
			<div class="blog-card-image blog-card-no-image" aria-hidden="true"></div>
		<?php endif; ?>
	<?php endif; ?>

	<div class="blog-card-content">
		<?php helpline_nurse_post_meta(); ?>

		<h3 class="blog-card-title">
			<a href="<?php echo esc_url( $post_url ); ?>"><?php echo esc_html( $title ); ?></a>
		</h3>

		<?php if ( $excerpt ) : ?>
			<p class="blog-card-excerpt"><?php echo esc_html( $excerpt ); ?></p>
		<?php endif; ?>

		<div class="blog-card-footer">
			<a href="<?php echo esc_url( $post_url ); ?>" class="read-more-link" aria-label="<?php echo esc_attr( sprintf( __( 'Read more about %s', 'helpline-nurse' ), $title ) ); ?>">
				<?php esc_html_e( 'Read More', 'helpline-nurse' ); ?>
				<?php echo helpline_nurse_icon_arrow_right( 16 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>
		</div>
	</div>

</article>
