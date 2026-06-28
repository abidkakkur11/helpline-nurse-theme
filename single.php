<?php
/**
 * Single Blog Post Template
 *
 * Featured image, title, meta, content, share buttons, related posts.
 *
 * @package HelplineNurse
 */

get_header();

while ( have_posts() ) :
	the_post();
	$post_title = get_the_title();
	?>

	<main id="main-content" role="main">

		<!-- Blog Post Header -->
		<section class="blog-header" aria-label="<?php esc_attr_e( 'Blog Post Header', 'helpline-nurse' ); ?>">
			<div class="container">
				<?php helpline_nurse_single_post_meta(); ?>
				<h1 class="blog-title"><?php echo esc_html( $post_title ); ?></h1>
			</div>
		</section>

		<div class="container">
			<div class="blog-layout">

				<!-- Main Blog Content -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-main' ); ?>>

					<?php if ( has_post_thumbnail() ) : ?>
						<?php
						the_post_thumbnail(
							'helpline-hero',
							array(
								'class'   => 'blog-hero-image',
								'loading' => 'eager',
								'alt'     => esc_attr( $post_title ),
							)
						);
						?>
					<?php endif; ?>

					<div class="blog-content blog-content-container">
						<?php the_content(); ?>

						<hr class="hr-separator">

						<?php helpline_nurse_share_links(); ?>

						<!-- Previous / Next -->
						<nav class="post-navigation" aria-label="<?php esc_attr_e( 'Post Navigation', 'helpline-nurse' ); ?>">
							<?php
							the_post_navigation(
								array(
									'prev_text' => '<span class="nav-direction">' . esc_html__( 'Previous Post', 'helpline-nurse' ) . '</span><span class="nav-title">%title</span>',
									'next_text' => '<span class="nav-direction">' . esc_html__( 'Next Post', 'helpline-nurse' ) . '</span><span class="nav-title">%title</span>',
								)
							);
							?>
						</nav>

					</div><!-- .blog-content -->

				</article>

				<!-- Sidebar -->
				<aside class="blog-sidebar" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'helpline-nurse' ); ?>">

					<!-- Categories Widget -->
					<div class="sidebar-widget">
						<h4><?php esc_html_e( 'Categories', 'helpline-nurse' ); ?></h4>
						<ul>
							<?php
							wp_list_categories(
								array(
									'title_li'   => '',
									'show_count' => true,
									'orderby'    => 'name',
								)
							);
							?>
						</ul>
					</div>

					<!-- Recent Posts Widget -->
					<div class="sidebar-widget">
						<h4><?php esc_html_e( 'Recent Posts', 'helpline-nurse' ); ?></h4>
						<?php
						$recent_posts = new WP_Query(
							array(
								'posts_per_page' => 5,
								'post_status'    => 'publish',
								'post__not_in'   => array( get_the_ID() ),
								'no_found_rows'  => true,
							)
						);
						if ( $recent_posts->have_posts() ) :
							?>
							<ul>
								<?php
								while ( $recent_posts->have_posts() ) :
									$recent_posts->the_post();
									?>
									<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>
							</ul>
							<?php
							wp_reset_postdata();
						endif;
						?>
					</div>

					<!-- Help CTA -->
					<div class="sidebar-widget sidebar-help-widget">
						<h4 class="sidebar-help-title"><?php esc_html_e( 'Need Assistance?', 'helpline-nurse' ); ?></h4>
						<p class="sidebar-help-desc"><?php esc_html_e( 'Get expert guidance on your international nursing career today.', 'helpline-nurse' ); ?></p>
						<?php helpline_nurse_button( helpline_nurse_get_contact_url(), __( 'Contact Us', 'helpline-nurse' ), 'btn btn-white w-100' ); ?>
					</div>

				</aside>

			</div><!-- .blog-layout -->
		</div>

		<!-- Related Posts -->
		<?php
		$categories = get_the_category( get_the_ID() );
		if ( ! empty( $categories ) ) :
			$cat_ids       = wp_list_pluck( $categories, 'term_id' );
			$related_query = new WP_Query(
				array(
					'category__in'   => $cat_ids,
					'posts_per_page' => 3,
					'post_status'    => 'publish',
					'post__not_in'   => array( get_the_ID() ),
					'orderby'        => 'rand',
					'no_found_rows'  => true,
				)
			);

			if ( $related_query->have_posts() ) :
				?>
				<section class="section-padding bg-accent" aria-label="<?php esc_attr_e( 'Related Posts', 'helpline-nurse' ); ?>">
					<div class="container">
						<?php helpline_nurse_section_header( __( 'Related Posts', 'helpline-nurse' ) ); ?>
						<div class="grid grid-cols-3">
							<?php
							while ( $related_query->have_posts() ) :
								$related_query->the_post();
								get_template_part( 'template-parts/cards/blog-card' );
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
				</section>
				<?php
			endif;
		endif;
		?>

	</main>

<?php
endwhile;

get_footer();
?>
