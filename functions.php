<?php
/**
 * Helpline Nurse Theme Functions
 *
 * @package HelplineNurse
 * @version 1.0.0
 */

// Prevent direct file access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Theme version constant.
define( 'HELPLINE_NURSE_VERSION', '1.0.0' );
define( 'HELPLINE_NURSE_DIR', get_template_directory() );
define( 'HELPLINE_NURSE_URI', get_template_directory_uri() );

/**
 * Load theme modules.
 */
require_once HELPLINE_NURSE_DIR . '/inc/setup.php';
require_once HELPLINE_NURSE_DIR . '/inc/enqueue.php';
require_once HELPLINE_NURSE_DIR . '/inc/customizer.php';
require_once HELPLINE_NURSE_DIR . '/inc/custom-post-types.php';
require_once HELPLINE_NURSE_DIR . '/inc/template-functions.php';
require_once HELPLINE_NURSE_DIR . '/inc/template-tags.php';
require_once HELPLINE_NURSE_DIR . '/inc/pagination.php';
require_once HELPLINE_NURSE_DIR . '/inc/breadcrumbs.php';

/**
 * Loads SCF/ACF field definitions after the fields plugin has initialized.
 *
 * Deferring this include prevents translation strings in field labels from
 * loading the theme text domain too early on WordPress 6.7+.
 *
 * @return void
 */
function helpline_nurse_load_custom_fields(): void {
	if ( function_exists( 'acf_add_local_field_group' ) ) {
		require_once HELPLINE_NURSE_DIR . '/inc/custom-fields.php';
	}
}
add_action( 'acf/init', 'helpline_nurse_load_custom_fields' );

/**Disable Gutenberg Editor */
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

/**Disable Default WP Page Editor */
add_action('init', 'remove_editor_from_pages');
function remove_editor_from_pages() {
    remove_post_type_support('page', 'editor');
}

