<?php
/**
 * 404 Not Found Template
 *
 * @package HelplineNurse
 */

get_header();
?>

<main id="main-content" role="main">

	<section class="page-header" aria-label="<?php esc_attr_e( '404 Header', 'helpline-nurse' ); ?>">
		<div class="container">
			<h1><?php esc_html_e( 'Page Not Found', 'helpline-nurse' ); ?></h1>
			<p class="page-subtitle"><?php esc_html_e( "We couldn't find the page you were looking for.", 'helpline-nurse' ); ?></p>
		</div>
	</section>

	<section class="section-padding text-center">
		<div class="container">
			<div class="error-404-content">
				<div class="error-code" aria-hidden="true">404</div>
				<h2><?php esc_html_e( "Oops! That page can't be found.", 'helpline-nurse' ); ?></h2>
				<p><?php esc_html_e( "The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. Please try searching or go back to the homepage.", 'helpline-nurse' ); ?></p>

				<div class="d-flex gap-2 justify-content-center mt-space-md flex-wrap">
					<?php helpline_nurse_button( home_url( '/' ), __( 'Go to Homepage', 'helpline-nurse' ), 'btn btn-primary' ); ?>
					<?php helpline_nurse_button( helpline_nurse_get_contact_url(), __( 'Contact Us', 'helpline-nurse' ), 'btn btn-outline' ); ?>
				</div>

				<div class="mt-space-lg search-form-wrapper">
					<h3><?php esc_html_e( 'Search for What You Need', 'helpline-nurse' ); ?></h3>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
