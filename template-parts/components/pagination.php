<?php
/**
 * Component: Pagination
 *
 * Wrapper that calls the pagination function from inc/pagination.php.
 * Accepts optional $args:
 *   - query (WP_Query) Custom query object.
 *
 * @package HelplineNurse
 */

$query = $args['query'] ?? null;
helpline_nurse_posts_pagination( $query );
