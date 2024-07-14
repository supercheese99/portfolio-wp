<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();?>

			<div id="single-project-page">
			<?php
				get_template_part( 'template-parts/content', get_post_type() ); ?>
			</div>

			<section class='more-posts'>
				<h4>More Projects:</h4>
				<?php
				$terms = get_the_terms( $post->ID, 'taxonomy' );

				$args = array(
								'post_type'      => 'my-portfolio-project',
								'posts_per_page' => -1,
								'order'          => 'ASC',
								'orderby'        => 'title',
								
															
							);
					$query = new WP_Query( $args );
					
					if ( $query -> have_posts() ){
						while ( $query -> have_posts() ) {
							$query -> the_post();
							foreach($terms as $term){
								?>
								<a href="#">
								<?php
								the_title();
								?>
								</a>
								<?php
							}
						}
						wp_reset_postdata();
					}
				?>
			</section>
		

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
