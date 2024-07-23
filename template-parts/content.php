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

	<?php 
	if ( has_post_thumbnail() ) {
		the_post_thumbnail();
	}
	?>

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
	
			<h3><?php the_field( 'toolstack' ); ?></h3>
			<h3><?php the_field( 'my_role' ); ?></h3>
			<h3><?php the_field( 'the_process' ); ?></h3>
			<h3><?php the_field( 'lessons_learned' ); ?></h3>

			<p><?php the_field( 'tab_text' ); ?></p>
			<p><?php the_field( 'tab_text_2' ); ?></p>
			<p><?php the_field( 'tab_text_3' ); ?></p>
			<p><?php the_field( 'tab_text_4' ); ?></p>

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

	<footer class="entry-footer">
		<?php //my_portfolio_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
