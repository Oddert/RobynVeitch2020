<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Impact
 */

?>

	<footer id="colophon" class="site-footer">
		<div data-oddert='footer.php'></div>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'Impact' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				#printf( esc_html__( 'Proudly powered by %s', 'Impact' ), 'WordPress' );
				?>
			</a>
			<?php #<span class="sep"> | </span> ?>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				#printf( esc_html__( 'Theme: %1$s by %2$s.', 'Impact' ), 'Impact', '<a href="http://underscores.me/">Underscores.me</a>' );
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'Impact' ), 'Impact', '<a href="http://oddert.github.io/">Robyn Veitch</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
