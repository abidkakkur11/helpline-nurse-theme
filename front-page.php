<?php
/**
 * Front Page Template
 *
 * Displayed when a static front page is set in Settings > Reading.
 * Each section is a modular template part.
 *
 * @package HelplineNurse
 */

get_header();
?>

<main id="main-content" role="main">
	<?php get_template_part( 'template-parts/sections/hero' ); ?>
	<?php get_template_part( 'template-parts/sections/value-prop' ); ?>
	<?php get_template_part( 'template-parts/sections/services-overview' ); ?>
	<?php get_template_part( 'template-parts/sections/why-choose-us' ); ?>
	<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>
	<?php get_template_part( 'template-parts/sections/features-grid' ); ?>
</main>

<?php get_footer(); ?>
