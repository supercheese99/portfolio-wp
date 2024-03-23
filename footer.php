<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="https://guialagyap.com/schoolsite/wp-content/uploads/2024/03/monster-logo.png" alt="monster-logo">
			</a>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'schoolsite-theme' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'schoolsite-theme' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'schoolsite-theme' ), 'schoolsite-theme', '<a href="https://guialagyap.com/">Guia Lagyap, Oliwia Wegner</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
