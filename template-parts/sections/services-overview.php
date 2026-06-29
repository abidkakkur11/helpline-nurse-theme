<?php
/**
 * Section: Services Overview
 *
 * Displays up to 3 featured Service CPT posts in a card grid.
 * Service cards are selected via the SCF relationship field.
 * Falls back to the 3 most recent services if no posts are selected.
 *
 * @package HelplineNurse
 */

$page_id     = get_the_ID();
$badge       = helpline_nurse_get_field( 'services_overview_badge', $page_id, __( 'Our Expertise', 'helpline-nurse' ) );
$heading     = helpline_nurse_get_field( 'services_overview_heading', $page_id, __( 'Top Services', 'helpline-nurse' ) );
$description = helpline_nurse_get_field( 'services_overview_description', $page_id, __( 'We provide comprehensive, end-to-end documentation support for healthcare professionals looking to advance their global careers.', 'helpline-nurse' ) );
$cta_label   = helpline_nurse_get_field( 'services_overview_cta_label', $page_id, __( 'Explore All 20+ Services', 'helpline-nurse' ) );
$cta_url     = helpline_nurse_get_field( 'services_overview_cta_url', $page_id, helpline_nurse_get_services_url() );
$service_ids = helpline_nurse_get_field( 'services_overview_posts', $page_id, array() );

// Build the query.
$query_args = array(
	'post_type'      => 'service',
	'posts_per_page' => 6,
	'post_status'    => 'publish',
	'no_found_rows'  => true,
);

if ( ! empty( $service_ids ) ) {
	$query_args['post__in'] = array_map( 'absint', (array) $service_ids );
	$query_args['orderby']  = 'post__in';
}

$services_query = new WP_Query( $query_args );
?>
<section class="section-padding" aria-label="<?php esc_attr_e( 'Services Overview', 'helpline-nurse' ); ?>">
	<div class="container">

		<?php helpline_nurse_section_header( $heading, $badge, $description ); ?>

		<?php if ( $services_query->have_posts() ) : ?>
			<div class="grid grid-cols-3">
				<?php
				while ( $services_query->have_posts() ) :
					$services_query->the_post();
					get_template_part( 'template-parts/cards/service-card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php endif; ?>

		<?php if ( $cta_label && $cta_url ) : ?>
			<div class="text-center mt-space-lg">
				<?php helpline_nurse_button( $cta_url, $cta_label, 'btn btn-outline' ); ?>
			</div>
		<?php endif; ?>

	</div>
</section>
