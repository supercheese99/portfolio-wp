<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<header>
		<h1>
		<?php the_title(); ?>
		</h1>

		<p>
		<?php the_content(); ?>
		</p>
	</header>

	<main id="primary" class="site-main">

		<?php
			// Check rows exists.
			if( have_rows('schedule') ):

				// Loop through rows.
				while( have_rows('schedule') ) : the_row();

					// Load sub field value.
					$sub_date = get_sub_field('date');
					$sub_course = get_sub_field('course');
					$sub_instructor = get_sub_field('instructor');

					echo "<table>";
					
					echo "<td>".$sub_date."</td>";
					echo "<td>".$sub_course."</td>";
					echo "<td>".$sub_instructor."</td>";

					// echo "<tr>";
					// echo "<td>".$sub_date."</td>";
					// echo "</tr>";


					echo "</table>";
					// Do something, but make sure you escape the value if outputting directly...

				// End loop.
				endwhile;

			// No value.
			else :
				// Do something...
			endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
