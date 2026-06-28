<?php
/**
 * About Page Template
 *
 * Template Name: About Page
 *
 * @package HelplineNurse
 */

get_header();

$page_id      = get_the_ID();
$hero_title   = helpline_nurse_get_field( 'about_hero_title', $page_id, get_the_title() );
$hero_subtitle = helpline_nurse_get_field( 'about_hero_subtitle', $page_id, __( 'Your trusted partner in healthcare documentation', 'helpline-nurse' ) );
$cta_title    = helpline_nurse_get_field( 'about_cta_title', $page_id, __( 'Ready to Advance Your Global Career?', 'helpline-nurse' ) );
$cta_desc     = helpline_nurse_get_field( 'about_cta_desc', $page_id, __( 'Get in touch with our experts today and take the first step towards your international nursing journey.', 'helpline-nurse' ) );
$cta_btn_label = helpline_nurse_get_field( 'about_cta_btn_label', $page_id, __( 'Contact Us Now', 'helpline-nurse' ) );
$cta_btn_url  = helpline_nurse_get_field( 'about_cta_btn_url', $page_id, helpline_nurse_get_contact_url() );
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

	<?php get_template_part( 'template-parts/sections/about-story' ); ?>

	<?php get_template_part( 'template-parts/sections/about-mission-vision' ); ?>

	<!-- CTA Banner -->
	<section class="section-padding text-center" aria-label="<?php esc_attr_e( 'Call to Action', 'helpline-nurse' ); ?>">
		<div class="container">
			<?php helpline_nurse_cta_banner( $cta_title, $cta_desc, $cta_btn_url, $cta_btn_label ); ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>
