<?php
/**
 * Contact Page Template
 *
 * Template Name: Contact Page
 *
 * Two-column layout: contact info (left) + contact form (right).
 * Google Maps embed below.
 *
 * @package HelplineNurse
 */

get_header();

$page_id      = get_the_ID();
$hero_title   = helpline_nurse_get_field( 'contact_hero_title', $page_id, get_the_title() );
$hero_subtitle = helpline_nurse_get_field( 'contact_hero_subtitle', $page_id, __( "We're here to help you with your documentation needs", 'helpline-nurse' ) );
?>

<main id="main-content" role="main">

	<?php
	get_template_part(
		'template-parts/components/page-header',
		null,
		array(
			'title'    => $hero_title,
			'subtitle' => $hero_subtitle,
		)
	);
	?>

	<section class="section-padding" aria-label="<?php esc_attr_e( 'Contact', 'helpline-nurse' ); ?>">
		<div class="container">

			<div class="contact-grid">
				<?php get_template_part( 'template-parts/sections/contact-info' ); ?>
				<?php get_template_part( 'template-parts/sections/contact-form' ); ?>
			</div>

			<?php get_template_part( 'template-parts/sections/google-map' ); ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
