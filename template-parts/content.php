<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package My Portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				my_portfolio_posted_on();
				my_portfolio_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'my-portfolio' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);


		// display advanced custom fields
		?>
		<div class="tabs-container">

			<div class="tabs">
				<h3 id="tab-1"><?php the_field( 'toolstack' ); ?></h3>
				<h3 id="tab-2"><?php the_field( 'my_role' ); ?></h3>
				<h3 id="tab-3"><?php the_field( 'the_process' ); ?></h3>
				<h3 id="tab-4"><?php the_field( 'lessons_learned' ); ?></h3>
			</div>

			<div class="tabs-info">
				<p class="info" id="info-1"><?php the_field( 'tab_text' ); ?></p>
				<p class="info" id="info-2"><?php the_field( 'tab_text_2' ); ?></p>
				<p class="info" id="info-3"><?php the_field( 'tab_text_3' ); ?></p>
				<p class="info" id="info-4"><?php the_field( 'tab_text_4' ); ?></p>
			</div>

		</div>

		<div class="more-posts">
			<h3>More Projects:</h3>

			<div class="project-links">
				<?php
				$args = array(
					'post_type'			=> 'my-portfolio-project',
					'posts_per_page' 	=> 3,
					'post__not_in' 		=> array( get_the_ID() ),
					'orderby' 			=> 'rand'
				);

				$query = new WP_Query( $args );

				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						?>
						<h4>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h4>
						<?php
					}
					wp_reset_postdata();
				} else {
					echo '<p>No related projects found.</p>';
				}
				?>
			</div>
		</div>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'my-portfolio' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
