<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			
			<?php

				$params = array(
					'post_type'      => 'my-portfolio-project',
					'posts_per_page' => -1,
					'order'          => 'ASC',
					'orderby'        => 'title',
				);

			$query = new WP_Query( $params );

			if ( $query->have_posts() ) : ?>
				<section class='project-archive-wrapper'>
					<?php
					while( $query->have_posts() ) :
						$query->the_post(); ?>
						<article class='archive-project'>
							<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
						</article>
					<?php
					endwhile;
					wp_reset_postdata(); 
				?>
				</section>
				<?php
			endif;


		?>
	

	</main><!-- #main -->

<?php

get_footer();