<?php
<<<<<<< HEAD
// Template for single student
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
=======
// Template part for displaying individual student posts
?>

<header class="entry-header">
>>>>>>> 6e00116121fe5723221313c2f67d4ebc41193e90
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		 ?>
<<<<<<< HEAD
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class='student-bio'>
			<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fwd' ),
					'after'  => '</div>',
				)
			);
		?></div>

		<div class='student-photo'>
			<?php the_post_thumbnail('student-photo'); ?>
		</div>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
=======
</header>

<div class="entry-content">
        <div class='entry-content student-bio'>
            <?php
            the_content();
            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'schoolsite' ),
                    'after'  => '</div>',
                )
            );
            ?>
        </div>

        <div class='entry-content student-photo'>
            <?php
				the_post_thumbnail( 'student-photo');
			?>
        </div>

</div>
>>>>>>> 6e00116121fe5723221313c2f67d4ebc41193e90
