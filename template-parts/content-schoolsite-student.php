<?php
// Template for single student
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular()) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		 ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<div class='student-photo'>
			<?php the_post_thumbnail('student-photo'); ?>
		</div>

		<div class='student-bio'>
			<?php
			if (is_singular()  || is_tax()){
				the_content();
			}else if(is_post_type_archive()){
				the_excerpt();
			}
			
		?></div>
	</div>
	




</article><!-- #post-<?php the_ID(); ?> -->
