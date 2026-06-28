<?php
/**
 * Breadcrumbs
 *
 * Outputs a schema-friendly breadcrumb trail for all page contexts.
 *
 * @package HelplineNurse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Outputs the full breadcrumb trail.
 *
 * Supports: home, blog archive, single posts, service CPT,
 * service archive, pages, categories, search, and 404.
 *
 * @return void
 */
function helpline_nurse_breadcrumbs(): void {
	global $post;

	// Don't display on the front page.
	if ( is_front_page() ) {
		return;
	}

	$breadcrumbs = array();
	$home_label  = esc_html__( 'Home', 'helpline-nurse' );
	$home_url    = esc_url( home_url( '/' ) );

	// Always start with Home.
	$breadcrumbs[] = array(
		'label' => $home_label,
		'url'   => $home_url,
	);

	if ( is_singular( 'service' ) ) {
		$services_url = get_post_type_archive_link( 'service' );
		$breadcrumbs[] = array(
			'label' => esc_html__( 'Our Services', 'helpline-nurse' ),
			'url'   => $services_url ? esc_url( $services_url ) : esc_url( home_url( '/our-services/' ) ),
		);
		$breadcrumbs[] = array(
			'label' => esc_html( get_the_title() ),
			'url'   => '',
		);
	} elseif ( is_post_type_archive( 'service' ) ) {
		$breadcrumbs[] = array(
			'label' => esc_html__( 'Our Services', 'helpline-nurse' ),
			'url'   => '',
		);
	} elseif ( is_singular( 'post' ) ) {
		if ( $blog_page_id = get_option( 'page_for_posts' ) ) {
			$breadcrumbs[] = array(
				'label' => esc_html( get_the_title( $blog_page_id ) ),
				'url'   => esc_url( get_permalink( $blog_page_id ) ),
			);
		}
		$cats = get_the_category();
		if ( ! empty( $cats ) ) {
			$breadcrumbs[] = array(
				'label' => esc_html( $cats[0]->name ),
				'url'   => esc_url( get_category_link( $cats[0]->term_id ) ),
			);
		}
		$breadcrumbs[] = array(
			'label' => esc_html( get_the_title() ),
			'url'   => '',
		);
	} elseif ( is_category() ) {
		if ( $blog_page_id = get_option( 'page_for_posts' ) ) {
			$breadcrumbs[] = array(
				'label' => esc_html( get_the_title( $blog_page_id ) ),
				'url'   => esc_url( get_permalink( $blog_page_id ) ),
			);
		}
		$breadcrumbs[] = array(
			'label' => esc_html( single_cat_title( '', false ) ),
			'url'   => '',
		);
	} elseif ( is_home() ) {
		$breadcrumbs[] = array(
			'label' => esc_html__( 'Blog', 'helpline-nurse' ),
			'url'   => '',
		);
	} elseif ( is_page() && $post instanceof WP_Post ) {
		if ( $post->post_parent ) {
			$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
			foreach ( $ancestors as $ancestor ) {
				$breadcrumbs[] = array(
					'label' => esc_html( get_the_title( $ancestor ) ),
					'url'   => esc_url( get_permalink( $ancestor ) ),
				);
			}
		}
		$breadcrumbs[] = array(
			'label' => esc_html( get_the_title() ),
			'url'   => '',
		);
	} elseif ( is_search() ) {
		$breadcrumbs[] = array(
			'label' => sprintf(
				/* translators: %s: search query */
				esc_html__( 'Search Results for "%s"', 'helpline-nurse' ),
				esc_html( get_search_query() )
			),
			'url'   => '',
		);
	} elseif ( is_404() ) {
		$breadcrumbs[] = array(
			'label' => esc_html__( 'Page Not Found', 'helpline-nurse' ),
			'url'   => '',
		);
	}

	if ( count( $breadcrumbs ) <= 1 ) {
		return;
	}

	$use_schema = ! function_exists( 'yoast_breadcrumb' ) && ! class_exists( 'RankMath' );

	echo '<nav class="breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'helpline-nurse' ) . '">';
	echo '<ol class="breadcrumb-list"' . ( $use_schema ? ' itemscope itemtype="https://schema.org/BreadcrumbList"' : '' ) . '>';

	$position = 1;
	$total    = count( $breadcrumbs );

	foreach ( $breadcrumbs as $crumb ) {
		$is_last = ( $position === $total );
		echo '<li class="breadcrumb-item' . ( $is_last ? ' active' : '' ) . '"' . ( $use_schema ? ' itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"' : '' ) . '>';

		if ( ! $is_last && ! empty( $crumb['url'] ) ) {
			echo '<a href="' . esc_url( $crumb['url'] ) . '"' . ( $use_schema ? ' itemprop="item"' : '' ) . '><span' . ( $use_schema ? ' itemprop="name"' : '' ) . '>' . esc_html( $crumb['label'] ) . '</span></a>';
		} else {
			echo '<span' . ( $use_schema ? ' itemprop="name"' : '' ) . ' aria-current="page">' . esc_html( $crumb['label'] ) . '</span>';
		}

		if ( $use_schema ) {
			echo '<meta itemprop="position" content="' . absint( $position ) . '" />';
		}
		echo '</li>';

		if ( ! $is_last ) {
			echo '<li class="breadcrumb-separator" aria-hidden="true">/</li>';
		}

		$position++;
	}

	echo '</ol></nav>';
}
