<?php
/**
 * Blog Archive Template (home.php)
 *
 * Displayed when WordPress uses a static Posts page.
 * Grid layout with featured image, category, date, title, excerpt, and pagination.
 *
 * @package HelplineNurse
 */

get_header();
?>

<main id="main-content" role="main">

	<!-- Blog Archive Header -->
	<section class="page-header" aria-label="<?php esc_attr_e( 'Blog Archive Header', 'helpline-nurse' ); ?>">
		<div class="container">
			<?php helpline_nurse_breadcrumbs(); ?>
			<h1>
				<?php
				if ( get_option( 'page_for_posts' ) ) {
					echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) );
				} else {
					esc_html_e( 'Our Blog', 'helpline-nurse' );
				}
				?>
			</h1>
			<p class="page-subtitle"><?php esc_html_e( 'Latest news, insights, and updates on international nursing', 'helpline-nurse' ); ?></p>
		</div>
	</section>

	<!-- Blog Grid -->
	<section class="section-padding" aria-label="<?php esc_attr_e( 'Blog Posts', 'helpline-nurse' ); ?>">
		<div class="container">

			<?php if ( have_posts() ) : ?>
				<div class="grid grid-cols-3">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/cards/blog-card' );
					endwhile;
					?>
				</div>

				<div class="mt-space-lg">
					<?php get_template_part( 'template-parts/components/pagination' ); ?>
				</div>

			<?php else : ?>
				<div class="no-results text-center">
					<h2><?php esc_html_e( 'No Posts Found', 'helpline-nurse' ); ?></h2>
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Try searching below.', 'helpline-nurse' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
