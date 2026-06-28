<?php
/**
 * Pagination
 *
 * Outputs numbered pagination for archive and search pages.
 *
 * @package HelplineNurse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Outputs numbered pagination for the current query.
 *
 * @param \WP_Query|null $query Custom query object. Defaults to global $wp_query.
 * @return void
 */
function helpline_nurse_posts_pagination( ?\WP_Query $query = null ): void {
	global $wp_query;

	$active_query   = $query ?? $wp_query;
	$total_pages    = $active_query->max_num_pages;

	if ( $total_pages <= 1 ) {
		return;
	}

	$current_page = max( 1, get_query_var( 'paged' ) );
	$big          = 999999999; // Placeholder used for replacement.

	$paginate_args = array(
		'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'             => '?paged=%#%',
		'current'            => $current_page,
		'total'              => $total_pages,
		'prev_text'          => '&laquo; ' . esc_html__( 'Previous', 'helpline-nurse' ),
		'next_text'          => esc_html__( 'Next', 'helpline-nurse' ) . ' &raquo;',
		'type'               => 'list',
		'end_size'           => 2,
		'mid_size'           => 2,
		'before_page_number' => '<span class="screen-reader-text">' . esc_html__( 'Page', 'helpline-nurse' ) . ' </span>',
	);

	$pagination_links = paginate_links( $paginate_args );

	if ( $pagination_links ) {
		?>
		<nav class="pagination-nav" aria-label="<?php esc_attr_e( 'Posts navigation', 'helpline-nurse' ); ?>">
			<?php echo $pagination_links; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- paginate_links() is escaped internally. ?>
		</nav>
		<?php
	}
}
