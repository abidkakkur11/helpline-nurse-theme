<?php
/**
 * General Archive Template
 *
 * Fallback for category, tag, author, and date archives.
 *
 * @package HelplineNurse
 */

get_header();
?>

<main id="main-content" role="main">

	<section class="page-header" aria-label="<?php esc_attr_e( 'Archive Header', 'helpline-nurse' ); ?>">
		<div class="container">
			<?php helpline_nurse_breadcrumbs(); ?>
			<?php the_archive_title( '<h1>', '</h1>' ); ?>
			<?php the_archive_description( '<p class="page-subtitle">', '</p>' ); ?>
		</div>
	</section>

	<section class="section-padding" aria-label="<?php esc_attr_e( 'Archive Posts', 'helpline-nurse' ); ?>">
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
					<h2><?php esc_html_e( 'Nothing Found', 'helpline-nurse' ); ?></h2>
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'helpline-nurse' ); ?></p>
				</div>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
