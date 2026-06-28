<?php
/**
 * Custom Post Types
 *
 * Registers the Service custom post type.
 *
 * @package HelplineNurse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the Service custom post type.
 *
 * - Archive URL: /our-services/
 * - Single URL:  /service/service-name/
 *
 * @return void
 */
function helpline_nurse_register_post_types(): void {
	$labels = array(
		'name'                  => esc_html_x( 'Services', 'post type general name', 'helpline-nurse' ),
		'singular_name'         => esc_html_x( 'Service', 'post type singular name', 'helpline-nurse' ),
		'menu_name'             => esc_html_x( 'Services', 'admin menu', 'helpline-nurse' ),
		'name_admin_bar'        => esc_html_x( 'Service', 'add new on admin bar', 'helpline-nurse' ),
		'add_new'               => esc_html__( 'Add New', 'helpline-nurse' ),
		'add_new_item'          => esc_html__( 'Add New Service', 'helpline-nurse' ),
		'new_item'              => esc_html__( 'New Service', 'helpline-nurse' ),
		'edit_item'             => esc_html__( 'Edit Service', 'helpline-nurse' ),
		'view_item'             => esc_html__( 'View Service', 'helpline-nurse' ),
		'all_items'             => esc_html__( 'All Services', 'helpline-nurse' ),
		'search_items'          => esc_html__( 'Search Services', 'helpline-nurse' ),
		'parent_item_colon'     => esc_html__( 'Parent Services:', 'helpline-nurse' ),
		'not_found'             => esc_html__( 'No services found.', 'helpline-nurse' ),
		'not_found_in_trash'    => esc_html__( 'No services found in Trash.', 'helpline-nurse' ),
		'featured_image'        => esc_html__( 'Service Image', 'helpline-nurse' ),
		'set_featured_image'    => esc_html__( 'Set service image', 'helpline-nurse' ),
		'remove_featured_image' => esc_html__( 'Remove service image', 'helpline-nurse' ),
		'use_featured_image'    => esc_html__( 'Use as service image', 'helpline-nurse' ),
	);

	$args = array(
		'labels'             => $labels,
		'description'        => esc_html__( 'Nursing documentation and licensing services.', 'helpline-nurse' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug'       => 'service',
			'with_front' => false,
		),
		'capability_type'    => 'post',
		'has_archive'        => 'our-services',
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-clipboard',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'service', $args );
}
add_action( 'init', 'helpline_nurse_register_post_types' );

/**
 * Flushes rewrite rules on theme activation to ensure proper URL routing.
 *
 * @return void
 */
function helpline_nurse_flush_rewrite_rules(): void {
	helpline_nurse_register_post_types();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'helpline_nurse_flush_rewrite_rules' );
