<?php
/**
 * Index Fallback Template
 *
 * WordPress requires this file. Acts as the final fallback template.
 *
 * @package HelplineNurse
 */

get_header();
?>

<main id="main-content" role="main">

	<?php
	get_template_part(
		'template-parts/components/page-header',
		null,
		array( 'title' => __( 'Blog', 'helpline-nurse' ) )
	);
	?>

	<section class="section-padding">
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
					<h2><?php esc_html_e( 'No Content Found', 'helpline-nurse' ); ?></h2>
				</div>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
