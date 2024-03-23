<?php
/**
 * The template for displaying staff pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_title( '<h1 class="page-title">', '</h1>' );
				the_content( '<div class="description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */

				

			while ( have_posts() ) :

				the_post();
				// the_post_thumbnail('staff-photo');
				?>

				<p class="staff-bio"><?php the_field('staff_bio') ?></p>
				<p class="staff-courses"><?php the_field('staff_courses') ?></p>
				<a class="staff-links"><?php the_field('staff_link') ?></a>
			<?php
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>


	</main><!-- #main -->

<?php
get_footer();
