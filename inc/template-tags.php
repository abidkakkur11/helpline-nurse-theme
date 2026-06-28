<?php
/**
 * Template Tags
 *
 * Functions for displaying post meta, author, date, and other content-related data.
 *
 * @package HelplineNurse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Outputs the post publication date with schema-friendly markup.
 *
 * @param int|null $post_id Post ID. Defaults to current post.
 * @return void
 */
function helpline_nurse_posted_on( ?int $post_id = null ): void {
	$post_id = $post_id ?: get_the_ID();
	$time_string = sprintf(
		'<time class="entry-date published" datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( DATE_W3C, $post_id ) ),
		esc_html( get_the_date( '', $post_id ) )
	);

	echo '<span class="posted-on">' . $time_string . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Outputs the post author with a link to their archive.
 *
 * @param int|null $post_id Post ID. Defaults to current post.
 * @return void
 */
function helpline_nurse_posted_by( ?int $post_id = null ): void {
	printf(
		'<span class="byline"><a class="author-url" href="%1$s" rel="author">%2$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);
}

/**
 * Outputs the post meta bar: category, date, and author.
 *
 * @return void
 */
function helpline_nurse_post_meta(): void {
	$categories_list = get_the_category_list( esc_html__( ', ', 'helpline-nurse' ) );
	?>
	<div class="blog-card-meta entry-meta" aria-label="<?php esc_attr_e( 'Post details', 'helpline-nurse' ); ?>">
		<?php if ( $categories_list ) : ?>
			<span class="cat-links"><?php echo $categories_list; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		<?php endif; ?>
		<?php helpline_nurse_posted_on(); ?>
	</div>
	<?php
}

/**
 * Outputs the single post meta header (category, date, author).
 *
 * @return void
 */
function helpline_nurse_single_post_meta(): void {
	?>
	<div class="blog-meta" aria-label="<?php esc_attr_e( 'Post meta', 'helpline-nurse' ); ?>">
		<?php
		$categories_list = get_the_category_list( esc_html__( ', ', 'helpline-nurse' ) );
		if ( $categories_list ) :
			?>
			<span>
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icon-left" aria-hidden="true" focusable="false"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
				<?php echo $categories_list; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</span>
		<?php endif; ?>
		<span>
			<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icon-left" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
			<?php echo esc_html( get_the_date() ); ?>
		</span>
		<span>
			<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icon-left" aria-hidden="true" focusable="false"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
			<?php echo esc_html( get_the_author() ); ?>
		</span>
	</div>
	<?php
}

/**
 * Outputs post share links (social sharing).
 *
 * @return void
 */
function helpline_nurse_share_links(): void {
	$post_url   = rawurlencode( get_permalink() );
	$post_title = rawurlencode( get_the_title() );
	?>
	<div class="post-share" aria-label="<?php esc_attr_e( 'Share this post', 'helpline-nurse' ); ?>">
		<span class="share-label"><?php esc_html_e( 'Share:', 'helpline-nurse' ); ?></span>
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; // phpcs:ignore ?>"
			target="_blank" rel="noopener noreferrer" class="share-link" aria-label="<?php esc_attr_e( 'Share on Facebook', 'helpline-nurse' ); ?>">
			Facebook
		</a>
		<a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; // phpcs:ignore ?>&text=<?php echo $post_title; // phpcs:ignore ?>"
			target="_blank" rel="noopener noreferrer" class="share-link" aria-label="<?php esc_attr_e( 'Share on Twitter', 'helpline-nurse' ); ?>">
			Twitter
		</a>
		<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_url; // phpcs:ignore ?>&title=<?php echo $post_title; // phpcs:ignore ?>"
			target="_blank" rel="noopener noreferrer" class="share-link" aria-label="<?php esc_attr_e( 'Share on LinkedIn', 'helpline-nurse' ); ?>">
			LinkedIn
		</a>
		<a href="https://wa.me/?text=<?php echo $post_title . '%20' . $post_url; // phpcs:ignore ?>"
			target="_blank" rel="noopener noreferrer" class="share-link" aria-label="<?php esc_attr_e( 'Share on WhatsApp', 'helpline-nurse' ); ?>">
			WhatsApp
		</a>
	</div>
	<?php
}
