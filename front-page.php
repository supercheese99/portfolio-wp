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

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );?>

		<section class='home-blog'>
			<?php
			$params = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
			);

			$query_blog = new WP_Query($params);
			if ($query_blog -> have_posts()){
				while ($query_blog -> have_posts()){
					$query_blog -> the_post();
					?>
					<article>
						<a class='post-thumb' href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
							<?php
							the_post_thumbnail('blog-post');
							?>
							<h4><?php the_title(); ?></h4>
						</a>
					</article>
					<?php
				}
				wp_reset_postdata();
			}
			?>

		</section>
			

		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
