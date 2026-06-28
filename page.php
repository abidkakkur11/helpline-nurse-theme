<?php
/**
 * Generic Page Template
 *
 * Used for all standard WordPress pages (e.g. Privacy Policy, Terms, etc.)
 * Renders the page header and the WordPress editor content.
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
		array( 'title' => get_the_title() )
	);
	?>

	<section class="section-padding">
		<div class="container">
			<div class="page-content prose">
				<?php
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile;
				?>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
