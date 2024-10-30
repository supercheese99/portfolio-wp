<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package My Portfolio
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();?>

			<div id="single-project-page">
				<?php
				get_template_part( 'template-parts/content', get_post_type() ); 
				?>

				<!-- more projects section is in the content file -->
			</div>
		

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
