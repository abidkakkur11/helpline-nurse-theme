<?php
/**
 * Single Service Template
 *
 * One shared template for ALL Service CPT entries.
 * All content sections are driven by SCF fields.
 *
 * Layout:
 *   1. Service Hero (title, subtitle, image)
 *   2. Service Content (intro + feature list)
 *   3. Process Steps (4-column)
 *   4. Benefits
 *   5. FAQ (accordion)
 *   6. Bottom CTA
 *   7. Related Services
 *
 * @package HelplineNurse
 */

get_header();

while ( have_posts() ) :
	the_post();

	$post_id  = get_the_ID();
	$title    = get_the_title();
	$subtitle = helpline_nurse_get_field( 'service_hero_subtitle', $post_id, '' );
	$hero_img = helpline_nurse_get_field( 'service_hero_image', $post_id, array() );
	$intro    = helpline_nurse_get_field( 'service_intro', $post_id, get_the_content() );
	$features = helpline_nurse_get_field( 'service_features', $post_id, array() );
	$process  = helpline_nurse_get_field( 'service_process', $post_id, array() );
	$benefits = helpline_nurse_get_field( 'service_benefits', $post_id, array() );
	$faq      = helpline_nurse_get_field( 'service_faq', $post_id, array() );

	$sidebar_cta_title    = helpline_nurse_get_field( 'service_sidebar_cta_title', $post_id, __( 'Need Assistance?', 'helpline-nurse' ) );
	$sidebar_cta_desc     = helpline_nurse_get_field( 'service_sidebar_cta_desc', $post_id, __( 'Get expert guidance on your international nursing career today.', 'helpline-nurse' ) );
	$sidebar_cta_btn      = helpline_nurse_get_field( 'service_sidebar_cta_btn_label', $post_id, __( 'Contact Us', 'helpline-nurse' ) );
	$sidebar_cta_url      = helpline_nurse_get_field( 'service_sidebar_cta_btn_url', $post_id, helpline_nurse_get_contact_url() );

	$cta_title  = helpline_nurse_get_field( 'service_cta_title', $post_id, __( 'Need help with this service?', 'helpline-nurse' ) );
	$cta_desc   = helpline_nurse_get_field( 'service_cta_desc', $post_id, __( 'Get in touch with our experts today to fast-track your process.', 'helpline-nurse' ) );
	$cta_btn    = helpline_nurse_get_field( 'service_cta_btn_label', $post_id, __( 'Contact Us Now', 'helpline-nurse' ) );
	$cta_url    = helpline_nurse_get_field( 'service_cta_btn_url', $post_id, helpline_nurse_get_contact_url() );

	// Default process steps.
	if ( empty( $process ) ) {
		$process = array(
			array( 'step_title' => __( "Collect the Client's Documents", 'helpline-nurse' ), 'step_description' => '' ),
			array( 'step_title' => __( 'Initially Check the Document', 'helpline-nurse' ), 'step_description' => '' ),
			array( 'step_title' => __( 'Submission of Documents to the Authorities', 'helpline-nurse' ), 'step_description' => '' ),
			array( 'step_title' => __( 'Provide the Client with the Attested Certificate', 'helpline-nurse' ), 'step_description' => '' ),
		);
	}
	?>

	<main id="main-content" role="main">

		<!-- Service Hero -->
		<section class="service-hero" aria-label="<?php esc_attr_e( 'Service Hero', 'helpline-nurse' ); ?>">
			<div class="container">
				<?php helpline_nurse_breadcrumbs(); ?>
				<div class="service-hero-content">

					<!-- Hero Image -->
					<div>
						<?php if ( ! empty( $hero_img['url'] ) ) : ?>
							<img
								src="<?php echo esc_url( $hero_img['url'] ); ?>"
								alt="<?php echo esc_attr( $hero_img['alt'] ?? $title ); ?>"
								class="service-hero-img"
								loading="eager"
								width="<?php echo esc_attr( $hero_img['width'] ?? '600' ); ?>"
								height="<?php echo esc_attr( $hero_img['height'] ?? '400' ); ?>"
							>
						<?php elseif ( has_post_thumbnail() ) : ?>
							<?php
							the_post_thumbnail(
								'helpline-hero',
								array(
									'class'   => 'service-hero-img',
									'loading' => 'eager',
									'alt'     => esc_attr( $title ),
								)
							);
							?>
						<?php else : ?>
							<img
								src="<?php echo esc_url( HELPLINE_NURSE_URI . '/assets/images/service_dataflow.png' ); ?>"
								alt="<?php echo esc_attr( $title ); ?>"
								class="service-hero-img"
								loading="eager"
								width="600"
								height="400"
							>
						<?php endif; ?>
					</div>

					<!-- Hero Text -->
					<div class="service-hero-text">
						<h1><?php echo esc_html( $title ); ?></h1>
						<?php if ( $subtitle ) : ?>
							<h2 class="service-hero-title"><?php echo esc_html( $subtitle ); ?></h2>
						<?php endif; ?>

						<?php if ( $intro ) : ?>
							<div class="service-hero-intro">
								<?php echo wp_kses_post( $intro ); ?>
							</div>
						<?php endif; ?>

						<div class="mt-space-md">
							<?php helpline_nurse_button( '#contact-section', __( 'Get Help with This Service', 'helpline-nurse' ), 'btn btn-primary' ); ?>
						</div>
					</div>

				</div>
			</div>
		</section>

		<!-- Service Content: Features + Sidebar -->
		<section class="service-content section-padding" aria-label="<?php esc_attr_e( 'Service Details', 'helpline-nurse' ); ?>">
			<div class="container">
				<div class="blog-layout">

					<!-- Main Content -->
					<div class="blog-main">

						<?php if ( ! empty( $features ) ) : ?>
							<div class="service-features mb-space-lg">
								<h3><?php esc_html_e( 'What We Handle', 'helpline-nurse' ); ?></h3>
								<ul class="feature-list">
									<?php foreach ( $features as $feature ) : ?>
										<?php if ( ! empty( $feature['feature'] ) ) : ?>
											<li class="feature-list-item">
												<?php echo helpline_nurse_icon_check( 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
												<?php echo esc_html( $feature['feature'] ); ?>
											</li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>

						<?php if ( ! empty( $benefits ) ) : ?>
							<div class="service-benefits mb-space-lg">
								<h3><?php esc_html_e( 'Benefits', 'helpline-nurse' ); ?></h3>
								<ul class="benefit-list">
									<?php foreach ( $benefits as $benefit ) : ?>
										<?php if ( ! empty( $benefit['benefit'] ) ) : ?>
											<li class="feature-list-item">
												<?php echo helpline_nurse_icon_check( 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
												<?php echo esc_html( $benefit['benefit'] ); ?>
											</li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>

						<?php if ( ! empty( $faq ) ) : ?>
							<div class="service-faq">
								<h3><?php esc_html_e( 'Frequently Asked Questions', 'helpline-nurse' ); ?></h3>
								<div class="faq-list">
									<?php foreach ( $faq as $index => $item ) : ?>
										<?php if ( ! empty( $item['question'] ) ) : ?>
											<div class="faq-item">
												<button
													class="faq-question"
													aria-expanded="false"
													aria-controls="faq-answer-<?php echo absint( $index ); ?>"
													id="faq-btn-<?php echo absint( $index ); ?>"
												>
													<?php echo esc_html( $item['question'] ); ?>
													<svg class="faq-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
												</button>
												<div
													class="faq-answer"
													id="faq-answer-<?php echo absint( $index ); ?>"
													role="region"
													aria-labelledby="faq-btn-<?php echo absint( $index ); ?>"
													hidden
												>
													<p><?php echo esc_html( $item['answer'] ?? '' ); ?></p>
												</div>
											</div>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>

					</div><!-- .blog-main -->

					<!-- Sidebar -->
					<aside class="blog-sidebar" aria-label="<?php esc_attr_e( 'Service Sidebar', 'helpline-nurse' ); ?>">

						<div class="sidebar-widget sidebar-help-widget">
							<h4 class="sidebar-help-title sidebar-widget"><?php echo esc_html( $sidebar_cta_title ); ?></h4>
							<p class="sidebar-help-desc"><?php echo esc_html( $sidebar_cta_desc ); ?></p>
							<?php helpline_nurse_button( $sidebar_cta_url, $sidebar_cta_btn, 'btn btn-white w-100' ); ?>
						</div>

						<?php
						// Related Services (excluding current).
						$related_args = array(
							'post_type'      => 'service',
							'posts_per_page' => 4,
							'post_status'    => 'publish',
							'post__not_in'   => array( $post_id ),
							'orderby'        => 'rand',	
							'no_found_rows'  => true,
						);
						$related = new WP_Query( $related_args );
						if ( $related->have_posts() ) :
							?>
							<div class="sidebar-widget">
								<h4><?php esc_html_e( 'Other Services', 'helpline-nurse' ); ?></h4>
								<ul class="footer-links">
									<?php
									while ( $related->have_posts() ) :
										$related->the_post();
										?>
										<li>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</li>
									<?php endwhile; ?>
								</ul>
							</div>
							<?php
							wp_reset_postdata();
						endif;
						?>

					</aside>

				</div><!-- .blog-layout -->
			</div>
		</section>

		<!-- Process Steps -->
		<?php if ( ! empty( $process ) ) : ?>
			<section class="section-padding bg-accent" aria-label="<?php esc_attr_e( 'Our Process', 'helpline-nurse' ); ?>">
				<div class="container">
					<?php helpline_nurse_section_header( __( 'Our Process', 'helpline-nurse' ), '', __( 'Simple and transparent workflow', 'helpline-nurse' ) ); ?>

					<div class="process-steps">
						<?php foreach ( $process as $step_index => $step ) : ?>
							<?php if ( ! empty( $step['step_title'] ) ) : ?>
								<div class="process-step">
									<div class="step-number" aria-label="<?php echo esc_attr( sprintf( __( 'Step %d', 'helpline-nurse' ), $step_index + 1 ) ); ?>">
										<?php echo absint( $step_index + 1 ); ?>
									</div>
									<h4><?php echo esc_html( $step['step_title'] ); ?></h4>
									<?php if ( ! empty( $step['step_description'] ) ) : ?>
										<p><?php echo esc_html( $step['step_description'] ); ?></p>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<!-- Bottom CTA -->
		<section id="contact-section" class="section-padding bg-white text-center" aria-label="<?php esc_attr_e( 'Service Call to Action', 'helpline-nurse' ); ?>">
			<div class="container">
				<?php helpline_nurse_cta_banner( $cta_title, $cta_desc, $cta_url, $cta_btn ); ?>
			</div>
		</section>

	</main>

<?php
endwhile;

get_footer();
?>
