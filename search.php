<?php
/**
 * Search Results Template
 *
 * Displays search results in a blog card grid.
 *
 * @package HelplineNurse
 */

get_header();
?>

<main id="main-content" role="main">

	<section class="page-header" aria-label="<?php esc_attr_e( 'Search Results Header', 'helpline-nurse' ); ?>">
		<div class="container">
			<?php helpline_nurse_breadcrumbs(); ?>
			<h1>
				<?php
				printf(
					/* translators: %s: search query */
					esc_html__( 'Search Results for: "%s"', 'helpline-nurse' ),
					'<span>' . esc_html( get_search_query() ) . '</span>'
				);
				?>
			</h1>
		</div>
	</section>

	<section class="section-padding" aria-label="<?php esc_attr_e( 'Search Results', 'helpline-nurse' ); ?>">
		<div class="container">

			<!-- Search Form -->
			<div class="search-form-wrapper mb-space-lg">
				<?php get_search_form(); ?>
			</div>

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
					<h2><?php esc_html_e( 'No Results Found', 'helpline-nurse' ); ?></h2>
					<p><?php esc_html_e( 'Sorry, nothing matched your search terms. Please try again with different keywords.', 'helpline-nurse' ); ?></p>
				</div>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
