<?php
/**
 * Services Archive Template
 *
 * Displayed at /our-services/ for the Service CPT archive.
 * Automatically lists all published Service posts in a grid.
 *
 * @package HelplineNurse
 */

get_header();

// Get archive hero content from SCF options page.
$hero_title   = helpline_nurse_get_option( 'services_archive_title', __( 'Our Services', 'helpline-nurse' ) );
$hero_subtitle = helpline_nurse_get_option( 'services_archive_subtitle', __( 'Comprehensive documentation support for healthcare professionals globally', 'helpline-nurse' ) );
$cta_title    = helpline_nurse_get_option( 'services_archive_cta_title', __( 'Ready to Advance Your Global Career?', 'helpline-nurse' ) );
$cta_desc     = helpline_nurse_get_option( 'services_archive_cta_desc', __( 'Get in touch with our experts today and take the first step towards your international nursing journey.', 'helpline-nurse' ) );
$cta_btn_label = helpline_nurse_get_option( 'services_archive_cta_btn_label', __( 'Contact Us Now', 'helpline-nurse' ) );
$cta_btn_url  = helpline_nurse_get_option( 'services_archive_cta_btn_url', helpline_nurse_get_contact_url() );
?>

<main id="main-content" role="main">

	<!-- Page Header -->
	<section class="page-header" aria-label="<?php esc_attr_e( 'Services Archive Header', 'helpline-nurse' ); ?>">
		<div class="container">
			<?php helpline_nurse_breadcrumbs(); ?>
			<h1><?php echo esc_html( $hero_title ); ?></h1>
			<p class="page-subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
		</div>
	</section>

	<!-- Services Grid -->
	<section class="section-padding" aria-label="<?php esc_attr_e( 'All Services', 'helpline-nurse' ); ?>">
		<div class="container">

			<div class="section-title text-center">
				<span class="badge"><?php esc_html_e( 'All Services', 'helpline-nurse' ); ?></span>
				<h2><?php esc_html_e( 'Explore What We Offer', 'helpline-nurse' ); ?></h2>
			</div>

			<?php if ( have_posts() ) : ?>
				<div class="services-grid-large">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/cards/service-card' );
					endwhile;
					?>
				</div>

				<!-- Pagination -->
				<div class="mt-space-lg">
					<?php get_template_part( 'template-parts/components/pagination' ); ?>
				</div>

			<?php else : ?>
				<div class="no-results text-center">
					<p><?php esc_html_e( 'No services found. Please check back soon.', 'helpline-nurse' ); ?></p>
					<?php helpline_nurse_button( home_url( '/' ), __( 'Back to Home', 'helpline-nurse' ), 'btn btn-primary' ); ?>
				</div>
			<?php endif; ?>

		</div>
	</section>

	<!-- Bottom CTA -->
	<section class="section-padding text-center" aria-label="<?php esc_attr_e( 'Call to Action', 'helpline-nurse' ); ?>">
		<div class="container">
			<?php helpline_nurse_cta_banner( $cta_title, $cta_desc, $cta_btn_url, $cta_btn_label ); ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>
