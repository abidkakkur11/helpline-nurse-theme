<?php
/**
 * Component: Page Header
 *
 * Reusable inner-page hero banner with gradient background.
 * Accepts $args from get_template_part():
 *   - title    (string)  Page title
 *   - subtitle (string)  Page subtitle
 *
 * @package HelplineNurse
 */

$title    = $args['title']    ?? get_the_title();
$subtitle = $args['subtitle'] ?? '';
?>
<section class="page-header" aria-label="<?php esc_attr_e( 'Page Header', 'helpline-nurse' ); ?>">
	<div class="container">
		<?php helpline_nurse_breadcrumbs(); ?>
		<h1><?php echo esc_html( $title ); ?></h1>
		<?php if ( ! empty( $subtitle ) ) : ?>
			<p class="page-subtitle"><?php echo esc_html( $subtitle ); ?></p>
		<?php endif; ?>
	</div>
</section>
