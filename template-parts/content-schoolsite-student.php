<?php
// Template part for displaying individual student posts
?>

<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		 ?>
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
